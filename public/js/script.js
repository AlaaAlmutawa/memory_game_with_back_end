/**
 * Created by alaaj on 6/14/17.
 */

var timer_text = $('#timer');
var seconds = 0;
var minutes = 0;
var hours = 0;
var t;
 var gameArray = [];
var cols;
var rows;
var time;
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

function add() {
    seconds++;
    if (seconds >= 60) {
        seconds = 0;
        minutes++;
        if (minutes >= 60) {
            minutes = 0;
            hours++;
        }
    }
    time = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
    timer_text.text(time);
    timer();
    console.log("i am here");
}
function timer() {
    if(!gameIsOver()) {
        t = setTimeout(add, 1000);
    }else{
        console.log(time);
        afterGame();
        return true;
    }
}
function afterGame(){
    $('.after-game').removeClass("hidden");
    $('.before-game').addClass("hidden");
    $('.section.game').addClass("hidden");
    $('.popup h1').append(" "+time);
    $('.popup').removeClass("hidden");
    $('#time_record').val(time);
    var $value = $('#difficulty').val();
    $('input [type=hidden] [name=difficulty]').val($value);
}
function removeLevelsDiv(){
    $('.difficulties').addClass("hidden");
}
function fillColors(){ //fill the colors behind the disks to be revealed once the disk is clicked
    var $disks = $('.disk');
    var colors = [];
    var $disks_number = $disks.length;
    console.log($disks_number);
    console.log(colors.length);
    while(colors.length<=$disks_number/2){
        var color = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
        if(color!='#b9babb' && color.length==7) {
            colors.push(color);
        }
    }
    //var colors = ['#6b4052', '#edcbd4', '#f8cd62', '#7c6258', '#9a986f', '#896539', '#009cb7', '#3f6bae', '#6a5994', '#8fc9c2' ]; //the number of colors have to be hlf the number of the disks
    colors = shuffleArray(colors);
   // console.log("affter shuffle")
    var i = 0;
    var j = 0;
    //console.log("loop"+ rows);
    for(var x=0; x<rows; x++){
        gameArray[x] = [];
        for(var y=0; y<cols; y++){
            if(i==$disks_number/2){
                i = 0;
            }
            gameArray[x][y]=colors[i];
            $disks.eq(j).attr("id",''+x+','+y+'');
           $disks.eq(j).children().eq(1).css('background-color', color);
            console.log("id",''+x+','+y+'');
            j++;
            i++;
        }
    }
    gameArray.forEach(shuffleArray);
}
function showColorFor5Seconds(){
    var element = $(this);
    var id = element.attr('id');
    console.log(id);
    var fields = id.split(',');
    var color = gameArray[fields[0]][fields[1]];
    console.log(color);
    if($('.disk-clicked').length<2) {
        //element.css('background-color', color);
        element.addClass("disk-clicked");
        element.find('.back').css('transform', 'translateY(0 deg)');
        element.find('.front').css('transform', 'translateY(-180 deg)');
        checkGame();
    }else{
        checkGame();
        //$('.disk-clicked').css('background-color','#b9babb');
        $('.flip').removeClass('flip');
        $('.disk-clicked').childern.eq(0).addClass("flip");
        $('.disk-clicked').removeClass("disk-clicked");
        element.css('background-color', color);
        element.addClass("disk-clicked");
        element.childern().eq(1).addClass("flip");
    }
}
function checkGame(){
    console.log("checkGame is being called")
    var clickedDisk = $('.disk-clicked');
    if(clickedDisk.eq(0).css("background-color") == clickedDisk.eq(1).css("background-color")){
        console.log("found tWO");
        clickedDisk.addClass("found");
        clickedDisk.removeClass("disk-clicked");

    }
}
function gameIsOver(){
    if($('.found').length==cols*rows){
        return true; //game is done
    }else{
        return false;
    }
}
function displayEasy(){
        $(".difficulties a").removeClass("clicked");//happens in both
        $('#difficulty').removeAttr('id');//doesnt matter?
        $('#level-btn-easy').addClass("clicked");//happens in both
        $('#level-btn-easy').parent().attr('id','difficulty');//happens in index
        $("input[type='hidden'][name='difficulty']").val("easy");//happens in index
        $.ajax({
            type: "GET",
            url: '/display_easy',
            success: function(data) {
                $('#game').html(data);

            }
        });
    displayTop();

}
function displayTop(){
    var $currentLevel = $('#difficulty').attr('value');
    console.log($currentLevel);
    $.ajax({
        type: "GET",
        url: '/get_top_10',
        data: {"difficulty":$currentLevel},
        success: function(data) {
            console.log(data);
            $('.top-10').html(data);
        }
    })
}
$(document).ready(function() {
    displayEasy();//display the game
    //display top 10 in the easy
    displayTop();

});
$('#start').submit(function(e){
    e.preventDefault();
    //set a timer once clicked and show the user the time spent playing while playing
    var data = $(this).serializeArray();
    $.ajax({
        type:"POST",
        url: '/start-game',
        data: data,
        success:function(){
            console.log("someone clicked!");
            cols = $('#cols_number').val();
            rows = $('#rows_number').val();
            $('#start-btn').addClass("hidden");
            timer_text.removeClass("hidden");
            timer_text.text("00:00:00");
            removeLevelsDiv();
            fillColors(); //method that would set each disk to a certian color that can be flipped to be reaveled
            timer();
            $('.disk').click(showColorFor5Seconds);
        }
    });
});

$('#level-btn-easy').on('click',displayEasy);
$('#level-btn-hard').on('click',function(){
    $(".difficulties a").removeClass("clicked");
    $('#difficulty').removeAttr('id');
    $('#level-btn-hard').addClass("clicked");
    $('#level-btn-hard').parent().attr('id','difficulty');
    $("input[type='hidden'][name='difficulty']").val("hard");
    $.ajax({
        type: "GET",
        url: '/display_hard',
        success: function(data) {
            $('#game').html(data);
            console.log(data);
            displayTop();

        }
    });


});
$('#level-btn-medium').on('click',function(){
    $(".difficulties a").removeClass("clicked");
    $('#difficulty').removeAttr('id');
    $('#level-btn-medium').addClass("clicked");
    $('#level-btn-medium').parent().attr('id','difficulty');
    $("input[type='hidden'][name='difficulty']").attr('value', 'medium');
    $.ajax({
        type: "GET",
        url: '/display_medium',
        success: function(data) {
            $('#game').html(data);
            displayTop();

        }
    });
});

// todo it's not working
$("#register-form").validate({
        // Specify validation rules
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            "first_name": "required",
            "last_name": "required",
            "email": "required"

        },
        // Specify validation error messages
        messages: {
            "first_name": "Please enter your first name",
            "last_name": "Please enter your last name",
            "email": "Please enter your email address"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            // todo add ajax for backend
            // form.submit();
        }
});

// < TODO make one function
$('#easy').on('click',function(){
    $.ajax({
        type: "GET",
        url: '/edit-easy',
        success: function(data) {
            $('.popup').removeClass("hidden");
            $('#difficulty').val(data['difficulty']);
            $('#edit-level-option').text("Easy");
            $('#cols').val(data['cols']);
            $('#rows').val(data['rows']);
        }
    })
});

$('#medium').on('click',function(){
    $.ajax({
        type: "GET",
        url: '/edit-medium',
        success: function(data) {
            $('.popup').removeClass("hidden");
            $('#difficulty').val(data['difficulty']);
            $('#edit-level-option').text("Medium");
            $('#cols').val(data['cols']);
            $('#rows').val(data['rows']);

        }
    })
});

$('#hard').on('click',function() {
    $.ajax({
        type: "GET",
        url: '/edit-hard',
        success: function(data) {
            $('.popup').removeClass("hidden");
            $('#difficulty').val(data['difficulty']);
            $('#edit-level-option').text("Hard");
            $('#cols').val(data['cols']);
            $('#rows').val(data['rows']);

        }
    })
});
// TODO make one function />

$('#edit-difficulty').submit(function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
    $.ajax({
        type: "POST",
        url: '/edit-options',
        data: data,
        success: function (data) {
            // todo show success message (NOT ALERT)
            console.log(data);
        }
    });
    $('.popup').addClass("hidden");
});

$('#fb').submit(function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
   $.ajax({
        type: "POST",
        url: '/share',
        data: data,
        success: function(){
        }
   });
});




