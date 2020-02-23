(function ($, window, document) {
    $(function () {
        let openContact = $('.open_contact');
        openContact.on('click', function () {
            var id_cv = $(this).attr('data-id');
            let insertOpenContact = $.post('/click-open-contact', {'cv_id': id_cv});
            insertOpenContact.then(function (data) {
                console.log(data);
                if (data.code === 2) {
                    $("#myModalNotOpenContact").modal()
                } else {
                    location.reload();
                }
            });
        })
    });

}(window.jQuery, window, document));

// chuc nang like trong trang detail
function clickLike(id)
{
    let insertLike = $.post('/like-cv-detail', {'cv_id': id});
    var btnLike = parseInt($('#count_like').html());
    insertLike.then(function (data) {
        if(data == 0){
            btnLike = ++btnLike;
            $('#count_like').html(btnLike);
        }else {
            btnLike = --btnLike;
            $('#count_like').html(btnLike);
        }
    })

}
