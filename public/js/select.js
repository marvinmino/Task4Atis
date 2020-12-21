$('#select').on('change', function(e) {
    e.preventDefault();
    var category = $(this).val();
    console.log(category);
    $.ajax({
        type: 'POST',
        url: 'categorysel',
        data: { select: category },
        success: function(response) {

            $("body").html(response);
        }
    });
});