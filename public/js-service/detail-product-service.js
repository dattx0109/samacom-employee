(function ($) {
    $(function () {
        let btn_request = $('.btn-request');
        let count = $('#selectbox1');
        let error = $('.error-request');
        let locationHref = $(location).attr('href');
        selectPackage($('.main').find('input').val());
        $('.click').on('click',function(){
            $('.click').removeClass('main');
            $(this).addClass("main");
            var id = $(this).find('input').val();
            selectPackage(id);
        });
        $('#selectbox1').on('change', function(){
            // console.log($(this).val() * $('.price').html());
            $('.total_price').html($(this).val() * $('.price').html());
        });
        btn_request.on('click', function () {
            let parts = locationHref.split("/");
            let last_part = parts[parts.length - 1];
            let request = $.post('/product/send-request', {'count': count.val(),'id':$('.main').find('input').val(),'group_package_id':last_part});
            request.then(function (data) {
                error.html('');
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('', 'Gửi yêu cầu thành công');

                }, 1300);
                $('.request-buy-package').html('<hr>\n' +
                    '                                            <div>\n' +
                    '                                                <span\n' +
                    '                                                    class="text-info text-center">Yêu cầu của bạn đang được xử lí</span>\n' +
                    '                                            </div>');
            });
            request.fail(function (data) {
                // error.html(data.responseJSON.errors.count[0])  ;
            })
        });

        function selectPackage(id) {
            let district = $.get('/detail-package/' + id);
            district.done(function (data) {
                console.log(data);
                $('.detail-package').html(data.description);
                $('.price').html(parseInt(data.price));
                $('.price_sale').html(parseInt(data.price_sale));
                $('#selectbox1').val(1);
                $('.total_price').html(parseInt(data.price_sale));
            });
            district.fail(function (data) {

            });
        }
    });
})(window.jQuery);
