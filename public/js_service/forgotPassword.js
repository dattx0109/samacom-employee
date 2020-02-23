(function($, window, document) {
        let email = $('#email');
        let btnSubmit = $('#btnSubmit');
        let error_email         =$('.error_email');
        let error_email1         =$('.error_email1');
        btnSubmit.on("click",function () {
            email.change(function () {
            });
            let emailAdvisory        = email.val();
            let data = {
                email         : emailAdvisory,
            };
            let advisory = $.post('/post-forgot-password', data)
            advisory.done(function(data){

                if (data.email != null){
                    $('#btnSubmit').attr("disabled", true)
                    $('.error_email').hide();
                    console.log(data.email)
                    $('#myModal').modal('show');
                    $('#thep').text(emailAdvisory);
                    $('#dong').on("click",function () {
                        location.reload();
                    })
                }else {
                    error_email1.append('<span class="help-block m-b-none " style="color: red">' + 'Tài khoản này chưa được đăng ký' + '</span>');
                    $('.error_email1').show();
                    $('.error_email').hide();
                }


            });
            advisory.fail(function (data) {
                let errors = data.responseJSON.error;
                console.log(errors)
                if (typeof errors.email != 'undefined') {
                    error_email.append('<span class="help-block m-b-none " style="color: red">' + errors.email[0] + '</span>');
                    $('.error_email').show();
                    $('.error_email1').hide();

                }

            })
        })

}(window.jQuery, window, document));
// $('#myModal').modal('show');
