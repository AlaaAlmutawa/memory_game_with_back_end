$('.difficulty-toggle').on('click', function(){
    var data = $(this).data('id');
    $('.thank-you').addClass("hidden"); 
    $('.edit-admin').removeClass("hidden");
    $.ajax({
        type: "GET", 
        url: '/admin/edit', 
        data: {'difficulty':data}, 
        success: function(data){
            $('#difficulty-level').val(data['difficulty']);
            $('#edit-level-option').text(data['difficulty']);
            $('#cols').val(data['cols']);
            $('#rows').val(data['rows']);
        }
    })
});
// make this one function>> .. DONE

$('#edit-difficulty').submit(function(e){
    e.preventDefault();
    $('.edit-admin').addClass("hidden"); 
    var data = $(this).serializeArray();
    $.ajax({
        type: "POST",
        url: '/admin/edit-options',
        data: data,
        success: function (data) {
            // todo show success message (NOT ALERT) .. DONE (need to do the layout better for the thank-you div)
            $('.thank-you').removeClass("hidden"); 
        }
    });
});
