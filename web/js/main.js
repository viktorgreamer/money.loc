$(document).on('click', '.change-lang',function (e) {
    lg = $(this).data('lg');

    $.ajax({
        url: '/site/change-lg',
        data: {lg: lg},
        type: 'post',
        success: function (response) {
            console.log(response);
        },

        /* error: function () {
             alert('error')
         }*/
    });
});



