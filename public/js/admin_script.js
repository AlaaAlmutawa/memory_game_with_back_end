$('.difficulty-toggle').on('click', function(){
    var data = $(this).data('id');
    $('.thank-you').addClass("hidden"); 
    $('.edit-admin').removeClass("hidden");
    $.ajax({
        type: "GET", 
        url: '/admin/edit', 
        data: {'difficulty':data},
        beforeSend: function(){
            $('#difficulty-level').val(data);
            $('#edit-level-option').text(data);
        }, 
        success: function(data){
            $('#cols').val(data['cols']);
            $('#rows').val(data['rows']);
        }
    })
});

$('#edit-difficulty').submit(function(e){
    e.preventDefault();
    $('.edit-admin').addClass("hidden"); 
    var data = $(this).serializeArray();
    $.ajax({
        type: "POST",
        url: '/admin/edit-options',
        data: data,
        success: function (data) {
            $('.thank-you').removeClass("hidden"); 
        }
    });
});
