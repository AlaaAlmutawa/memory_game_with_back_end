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
}
function timer() {
    if(!gameIsOver()) {
        t = setTimeout(add, 1000);
    }else{
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
    while(colors.length<=$disks_number/2){
        var color = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
        if(color!='#b9babb' && color.length==7) {
            colors.push(color);
        }
    }
    colors = shuffleArray(colors);
    var i = 0;
    var j = 0;
    for(var x=0; x<rows; x++){
        gameArray[x] = [];
        for(var y=0; y<cols; y++){
            if(i==$disks_number/2){
                i = 0;
            }
            gameArray[x][y]=colors[i];
            $disks.eq(j).attr("id",''+x+','+y+'');
           $disks.eq(j).children().eq(1).css('background-color', colors[i]);
            j++;
            i++;
        }
    }
    gameArray.forEach(shuffleArray);
}
function showColorFor5Seconds(){
    var element = $(this);
    var id = element.attr('id');
    var fields = id.split(',');
    var color = gameArray[fields[0]][fields[1]];
    if($('.disk-clicked').length<2) {
        //element.css('background-color', color);
        element.addClass("disk-clicked");
        element.find('.back').css('transform', 'translateY(180 deg)');
        element.find('.front').css('transform', '');
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
    var clickedDisk = $('.disk-clicked');
    if(clickedDisk.eq(0).css("background-color") == clickedDisk.eq(1).css("background-color")){
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
$('#start').submit(function(e){
    e.preventDefault();
    //set a timer once clicked and show the user the time spent playing while playing
    var data = $(this).serializeArray();
    $.ajax({
        type:"POST",
        url: '/start-game',
        data: data,
        success:function(){
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