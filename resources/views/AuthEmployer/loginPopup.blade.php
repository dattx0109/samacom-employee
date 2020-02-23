<div id="modal-form" class="modal fade modal-no-padding" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup-frm-container">
                    <h2 class="m-t-none m-b">Đăng nhập</h2>
                    <form class="m-t" role="form">
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" id="phone" placeholder="Nhập số điện thoại" class="form-control" min= "6" max = "100">
                            <span class="text-danger notificaiton_phone pull-right text-under-input"></span>
                        </div>
                        <div class="form-group">
                            <label>Mật Khẩu</label>
                            <input type="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                            <span class="text-danger notificaiton_password pull-right text-under-input"></span>
                        </div>
                        <div class="popup-frm-btn-container">
                            <div class="btn btn-sm btn-primary pull-right" id="btnLogin"><strong>Đăng nhập</strong></div>
                        </div>
                    </form>
                    <div class="popup-text-block">
                        <p>Chưa có tài khoản? <a href="{{url('/register')}}">Tạo tài khoản mới</a></p>
                    </div>
                </div>
                <div class="popup-noti-block">
                    <a href="javascrip:void(0)">Quên mật khẩu?</a>
                </div>
                <div class="popup-modal-btn" >
                    <div class="popup-modal-btn__Inner" data-dismiss="modal">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>