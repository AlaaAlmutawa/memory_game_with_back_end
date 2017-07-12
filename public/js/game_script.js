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
    //we can use a generator that generates the colors (see below)
    //the below alg. generates random colors based on the number of disks that are required for the level of difficulties.
    //the issue here that this alg. will generate random new colors for sure, but the shades sometimes are so close to the point where the user might not distinguish the difference from the first sight. 
    /*
    while(colors.length<=$disks_number/2){
        var color = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
        if(color!='#b9babb' && color.length==7) {
            colors.push(color);
        }
    }
    */ 
    //or we can predefine the colors in an array 
    //the hard option is the most colors and it requires 21 different colors.>>28 colors are in the array enough for 8*7 plate  
    //i am going to predefine the colors to avoid the player confusion with the different shades that can be generated using an alg. 
    colors = ['#000000', '#800000', '#FF0000', '#808000', '#008000', '#008080', '#000080', '#800080', '#FF69B4', '#FF7F50', '#FFD700', '#F4A460', '#A52A2A', '#4682B4', '#006400','#00FF00', '#00FA9A', '#4B0082', '#2F4F4F', '#7B68EE' , '#6B8E23' , '#DC143C' , '#2E8B57' ,'#EE82EE', '#E6E6FA' ,'#98FB98','#BC8F8F','#FFE4E1']; 
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
           $disks.flip(); 
            j++;
            i++;
        }
    }
    gameArray.forEach(shuffleArray);
    for(var i = 0; i < $disks.length; i++){
        var id = $disks.eq(i).attr('id'); 
        var coordinates = id.split(',');
        var x = coordinates[0]; 
        var y = coordinates[1]; 
        $disks.eq(i).children().eq(1).css('background-color', gameArray[x][y]);

    }
    $disks.on('click',flipped); 

}
function flipped(){
   $(this).addClass('flipped');
    checkGame(); 
}
function checkMemoryGameConditions(){
    if($('.flipped').length >= 2){
        $('.flipped').flip(false);
        $('.flipped').removeClass('flipped');
    }
}
function checkGame(){
    var flippedDisk = $('.flipped');
    if(flippedDisk.length == 2){
        if(flippedDisk.eq(0).children().eq(1).css("background-color") == flippedDisk.eq(1).children().eq(1).css("background-color")){
            flippedDisk.addClass("found");
            flippedDisk.off('.flip'); 
            flippedDisk.addClass("found");
            flippedDisk.off('click');
            flippedDisk.removeClass("flipped");
        }else{
            setTimeout(checkMemoryGameConditions,400);
        }
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
        }
    });
});

// Alternative to assign colors to disks
// var total = (rows * cols) / 2
// either generate "total" number of indices to index random colors in array or generate "total" number of distinct random colors (a, b, c)
// fill a new array with the random colors (doubled) => [a,a,b,b,c,c]
// shuffle the new array
// iterate through the new array of colors and fill the disks with the colors of the shuffled array in order