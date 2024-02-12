$('.nav-link_lg').click(function () {
    $('.nav-link_lg').css('color', '#fff')
    $('.nav-link_lg').css('font-weight', 'normal')
    $(this).css('font-weight', 'bold')
    $('.page').hide()
    $('#' + $(this).attr('goto')).fadeToggle();
})

$('.nav-link').click(function () {
    $('.page').hide()
    $('#' + $(this).attr('goto')).fadeToggle();
})


$('.btn_login').click(function () {
    $('.page').hide();
    $('#page_login').fadeToggle();
    $('#forgot_password_box').hide();
    setCookie('cur_page', 'login')
})


