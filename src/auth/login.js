con_auth = 'src/database/controllers/auth_controller.php'

// JQUERY CLICK FUNCTION
$('#btn_t_login').click(function () {

    payload = {
        "request_type": "login",
        "payload_data": {
            "username": $('#txt_username').val(),
            "password": $('#txt_password').val(),
        }
    }

    _GET(con_auth, payload, (cb, res, msg) => {

        if (res == 403) {
            show_toast("Login Fail", "Username or password is invalid", "error");
            setCookie('sesh_authorized', 0)
            $('.btn_login').show();
            $('.btn_account').hide();
        } else if (res == 200) {

            show_toast("Login Success", "Login successful");

            setCookie('user_type', cb[0].user_type)
            setCookie('user_id', cb[0].id)
            setCookie('user_fname', cb[0].first_name)
            setCookie('user_lname', cb[0].last_name)
            setCookie('user_email', cb[0].email)
            setCookie('user_mobile', cb[0].mobile_no)
            setCookie('user_address', cb[0].address)
            setCookie('username', cb[0].username)

            setTimeout(() => {
                location.reload();
            }, 200);

        }
    })

})

$('#btn_register_account').click(function () {
    $('.page').hide()
    $('#page_register').fadeToggle()
})

$('#btn_forgot_password').click(function () {
    $('#page_login').hide();
    $('#forgot_password_box').fadeIn(800);
})

$('#btn_forgot_password_submit').click(function () {

    payload = {
        request_type: "forgot_password",
        payload_data: {
            email: $('#forgot_email').val(),
        },
    };

    _GET(con_accounts, payload, () => {
        show_toast("Forgot Password", "Please check your email for password recovery instructions.")
        $('.page').hide()
        $('#page_login').show()
    });
})

// $('#btn_r_register').click(function () {

//     payload_data = {
//         request_type: "register_account",f
//         username: $('#txt_r_username').val(),
//         password: $('#txt_r_password').val(),
//         user_type: 1,
//         mobile_no: $('#txt_r_mobile').val(),
//         email: $('#txt_r_email').val(),
//         first_name: $('#txt_r_fname').val(),
//         last_name: $('#txt_r_lname').val(),
//         address: $('#txt_r_address').val()
//     };

//     _POST(controller_here, payload_data, () => {
//         //codes here..
//     });

// })

$('#login_view_password').click(function (e) {
    if ($('#login_pw_icon').hasClass('fa-eye-slash')) {
        $('#' + $(this).attr('target_input')).attr('type', 'password')
        $('#login_pw_icon').removeClass('fa-eye-slash').addClass('fa-eye')
    } else {
        $('#' + $(this).attr('target_input')).attr('type', 'text')
        $('#login_pw_icon').removeClass('fa-eye').addClass('fa-eye-slash')
    }


})
