$(document).ready(function() {
    $('.edit').hide();

    $('.delete').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'deleteCategory',
            data: { delete: id },
        });
        $(this).parents('tr').remove();
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


        $.ajax({
            type: 'POST',
            url: 'editCategory',
            data: {
                id: id,
                name: $('.in' + id)[0].value,
            },
        });
        window.location.href = 'category'
    });
});