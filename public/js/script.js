/**
 * Created by alaaj on 6/14/17.
 */

var timer_text = $('#timer');
var seconds = 0;
var minutes = 0;
var hours = 0;
var t;
 var gameArray = [];
var cols = 5;
var row = 4;
var time;
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
}
function removeLevelsDiv(){
    $('.difficulties').addClass("hidden");
}
function fillColors(){ //fill the colors behind the disks to be revealed once the disk is clicked
    var colors = ['#6b4052', '#edcbd4', '#f8cd62', '#7c6258', '#9a986f', '#896539', '#009cb7', '#3f6bae', '#6a5994', '#8fc9c2' ]; //the number of colors have to be hlf the number of the disks
    colors = shuffleArray(colors);
    var i = 0;
    for(var x=0; x<row; x++){
        gameArray[x] = [];
        for(var y=0; y<cols; y++){
            if(i==10){
                i = 0;
            }
            gameArray[x][y]=colors[i];
            i++;
        }
    }
    gameArray.forEach(shuffleArray);
    i = 0;
    var disks = $('div.disk');
    for(x=0; x<row;x++){
        for(y=0; y<cols; y++){
            disks.eq(i).attr("id",''+x+','+y+'');
            i++;
        }
    }
}
function showColorFor5Seconds(){
    var element = $(this);
    var id = element.attr('id');
    console.log(id);
    var fields = id.split(',');
    var color = gameArray[fields[0]][fields[1]];
    console.log(color);
    if($('.disk-clicked').length<2) {
        element.css('background-color', color);
        element.addClass("disk-clicked");
        checkGame();
    }else{
        checkGame();
        $('.disk-clicked').css('background-color','#b9babb');
        $('.disk-clicked').removeClass("disk-clicked");
        element.css('background-color', color);
        element.addClass("disk-clicked");
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
    if($('.found').length==cols*row){
        return true; //game is done
    }else{
        return false;
    }
}
function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}
$('#start-btn').on('click', function(){
    //set a timer once clicked and show the user the time spent playing while playing
    $('#start-btn').addClass("hidden");
    timer_text.removeClass("hidden");
    timer_text.text("00:00:00");
    removeLevelsDiv();
    timer();
    fillColors(); //method that would set each disk to a certian color that can be flipped to be reaveled
    $('.disk').click(showColorFor5Seconds);
});
$('#level-btn-easy').on('click',function(){
    $(".difficulties a").removeClass("clicked");
    $('#level-btn-easy').addClass("clicked");
});
$('#level-btn-hard').on('click',function(){
    $(".difficulties a").removeClass("clicked");
    $('#level-btn-hard').addClass("clicked");
});
$('#level-btn-medium').on('click',function(){
    $(".difficulties a").removeClass("clicked");
    $('#level-btn-medium').addClass("clicked");
});
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




