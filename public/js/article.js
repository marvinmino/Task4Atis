function saveOrder() {
    var article = "";
    $(".articlediv").each(function(i) {
        if (article == '') {
            article = $(this).attr('data-task-id');
        } else
            article += "," + $(this).attr('data-task-id');
    });
    $.ajax({
        type: 'POST',
        url: 'sort',
        data: { sorts: article },
        success: function(response) {
            // $('body').html(response)
        }
    });
}
$("#sortable").sortable({
    update: function(event, ui) {

        saveOrder();
    }
});