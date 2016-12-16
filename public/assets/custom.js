$( document ).ready(function() {
    $('.del-confirm').submit(function() {
        var c = confirm("Delete?");
        return c; //you can just return c because it will be true or false
    });

    $('.modalLink').on('click',function(){

        var title = $(this).text();
        var desc = $(this).parent().find('.description').text();
        var link = $(this).parent().parent().find('.provider').attr('href');
        $('#feedModalLabel').text(title);
        $('#feedModal .modal-body').text(desc);
        $('#feedModal .btn-open').attr('href',link);

    })
});