$('.nav-link').click(function () {
    $('.nav-link').css('color', '#fff')
    $('.nav-link').css('font-weight', 'normal')
    $(this).css('font-weight', 'bold')
    $('.page').hide()
    $('#' + $(this).attr('goto')).fadeToggle();
})

$('#btn_login').click(function () {
    $('.page').hide();
    $('#page_login').fadeToggle();
    setCookie('cur_page', 'login')
})
