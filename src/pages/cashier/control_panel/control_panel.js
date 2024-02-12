con_auth = 'src/database/controllers/auth_controller.php'


$('.sidebar_btn').click(function () {
    $('.sidebar_btn').css('font-weight', 'normal')

    $(this).css('font-weight', 'bold')
    $('.page').hide()
    $('#' + $(this).attr('goto')).fadeToggle();
})



$('.btn_logout').click(function () {


    payload = {
        "request_type": "logout"
    }

    _POST(con_auth, payload, (cb, res, msg) => {

        setCookie('cur_page', 'login')
        deleteCookie('user_id')
        deleteCookie('user_fname')
        deleteCookie('user_lname')
        deleteCookie('user_email')
        deleteCookie('user_mobile')
        deleteCookie('user_address')
        deleteCookie('username')
        location.reload();
        
    })

})






