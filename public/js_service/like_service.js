(function ($, window, document) {
    $(function () {
        // $.noConflict();
        // let clickLike = $('.like-cv');
        // clickLike.on('click', function () {
        //     var id = $(this).attr('data-id');
        //     console.log(id);
        //     let insertLike = $.post('/like-cv', {'cv_id': id});
        //     insertLike.done(function (data) {
        //         console.log(data);
        //         if (data === true) {
        //             clickLike.html('Bỏ thích');
        //         } else {
        //             clickLike.html('Thích');
        //         }
        //     });
        // });

        let clickViewDetail = $('.detail-cv');
        clickViewDetail.on('click', function () {
            console.log(1);
            var id = $(this).attr('data-id');
            console.log(id);

        });

        $('#reset_fillter').click(function(){
            $('#city').prop('selectedIndex',0);
            $('#field').prop('selectedIndex',0);
            $('#type_view').prop('selectedIndex',0);
        })

        $('#city').on('change', function () {
            let city = $(this).val();
            let district = $.get('/district/list-by-city?city=' + city);
            let districtHtml = '<option value="">Chọn quận huyện</option>';
            district.done(function (data) {
                let countDistrict = data.length;
                for(let i = 0;i<countDistrict;i++ ){
                    districtHtml = districtHtml+'<option value="'+data[i].id+'">'+data[i].name +'</option>';
                }
                $('#district').html(districtHtml);
                $(".chosen-select").trigger("chosen:updated");
            });
            district.fail(function(data){
                $('#district').html(districtHtml);
                $(".chosen-select").trigger("chosen:updated");
            });
        })
    });

}(window.jQuery, window, document));
function clickLike(id)
{
    let insertLike = $.post('/like-cv', {'cv_id': id});
    let btnLike = $('#btn_like_'+id);
    if(btnLike.hasClass('is-active')){
        btnLike.removeClass('is-active');
    }else{
        btnLike.addClass('is-active');
    }

        // console.log(data);
        // if (data === true) {
        //     btnLike.addClass('is-active');
        // }if (data === 0){
        //     btnLike.addClass('is-active');
        // }
        // else {
        //     btnLike.removeClass('is-active');
        // }
}
