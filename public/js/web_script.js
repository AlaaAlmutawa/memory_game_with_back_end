
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
    $.ajax({
        type: "GET",
        url: '/get_top_10',
        data: {"difficulty":$currentLevel},
        success: function(data) {
            $('.top-10').html(data);
        }
    })
}
$(document).ready(function() {
    displayEasy();//display the game
    //display top 10 in the easy
    displayTop();

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
             form.submit();
        }
});
function share(){
    FB.ui(
  {
    method: 'share',
    href: 'http://sephora-game.dev/',
  },
  // callback
  function(response) {
    if (response && !response.error_message) {
      alert('Posting completed.');
    } else {
      alert('Error while posting.');
    }
  }
);
}
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