<div class="page login_regular" id="page_login" style="display:none;">

    <div class="container mt-5" id="login_box">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="text-center">
                    <h4>Welcome</h4>
                    <p> You're about to pedal it out,<br>please sign in</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <label for="">Username or Email</label>
                <div class="position-relative">
                    <i class="fa-solid fa-user position-absolute" style="color:#BFC0C1; top:12px; left:10px;"></i>
                    <input type="text" class="form-control mb-2" style="padding-left: 35px;" id="txt_username">
                </div>

                <label for="">Password</label>
                <div class="position-relative">
                    <i class="fa-solid fa-lock position-absolute" style="color:#BFC0C1; top:12px; left:10px;"></i>
                    <input type="password" class="form-control" style="padding-left: 35px;" id="txt_password">
                    <a class="btn  position-absolute " target_input="txt_password" id="login_view_password" style="color:#3f4041; top:0; right:0;">
                        <i class="fa-solid fa-eye" id="login_pw_icon"></i>
                    </a>

                </div>

                <div class="d-flex justify-content-between align-items-center login_buttons_footer">
                    <div>
                        <a id="btn_forgot_password">Forgot password?</a>
                    </div>

                    <button class="btn btn-primary btn-sm mt-2" id="btn_t_login" style="width:120px;">Login</button>
                </div>

                <div class="mt-3 d-flex align-items-center flex-column">
                    Are you not registered yet, <a id="btn_register_account">Register account</a><br>
                </div>
            </div>
        </div>

    </div>


</div>


<div class="container-fluid mt-5" id="forgot_password_box" style="display:none;">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="text-center">
                <h4>Forgot Password</h4>
                <p>If you forgot your password please provide your registered email. We will send an account recovery instructions.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center flex-column">
            <label for="">Email</label>
            <input type="text" class="form-control" id="forgot_email" style="">
            <div class="text-end mt-2">
                <button class="btn btn-primary btn-sm" style="width:120px;" id="btn_forgot_password_submit">Recover</button>
            </div>
        </div>
    </div>
</div>

<script src="src/auth/login.js"></script>