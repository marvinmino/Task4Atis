$(document).ready(function() {
    $('.edit').hide();

    $('.delete').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: '../deleteComment',
            data: { delete: id },
        });
        $('.hide' + id).remove();
    });

    $('.cat').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        console.log(id);
        $('.show' + id).hide();
        $('.edit' + id).show();
    });
    $('.go').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var slug = $('.article').attr('id')

        $.ajax({
            type: 'POST',
            url: '../editComment',
            data: {
                id: id,
                text: $('.in' + id)[0].value,
                slug: slug,
            },
            success: function(response) {

                $("body").html(response);
            }
        });
    });
    $('.comment').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var articleId = $('.articleId').attr('id');
        var text = $('.commenttext').val();
        console.log(text);
        $.ajax({
            type: 'POST',
            url: '../comment',
            data: {
                articleId: articleId,
                comment: text,
            },
            success: function(response) {

                $("body").html(response);
            }
        });
        $('.hide' + id).remove();
    });
});