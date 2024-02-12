

collections = {};

$(document).ready(function () {

    LOADING_EFFECT()
    setCookie('USER_IP', $('#txt_ip_address').val())




})

function LOADING_EFFECT() {
    setTimeout(() => {

        $('#loading_overlay').show()
        $('.landing_page').hide();
        $('.landing_page').fadeToggle();
        $('#loading_overlay').fadeToggle()

    }, 1000);
}

function _GET(controller, data, func) {
    $.getJSON(controller, ENC(data), function (data) {
        func(CRACK_RES(data), data.status, data.msg)
    })
}

function _POST(controller, data, func) {

    var fd = new FormData();

    $.each(data, (k, v) => {
        fd.append(k, v)
    })

    $.ajax({
        url: controller,
        data: fd,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
            func(data, data.status, data.msg)
        },
        error: function (data) {
            console.error(data)
        }
    });
}
function TBL_SEARCH(input, table) {
    $(document).ready(function () {
        $("#" + input + "").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#" + table + " tbody tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    console.log('TABLE : ' + table + ' | Trigger : ' + input +'   successfully added search function...')
}
function ENC(data) {
    return btoa(JSON.stringify(data))
}

function SENC(data) {
    return btoa(data)
}

function SDEC(data) {
    return atob(data)
}

function CRACK_RES(cb) {


    if (cb.status == 200) {

        if (cb.data.length > 0) {

            return JSON.parse(atob(cb.data))
        }
    } else {
        console.error(cb.msg)
    }
}

function GENERATE_COLLECTIONS(table, data) {
    temp_data = {};

    $.each(data, function (k, v) {
        temp_data[k] = v;
    })

    collections[table] = temp_data;
}

function GENERATE_COLLECTIONS_ARRAY(table, data) {

    temp_data = [];

    $.each(data, function (k, v) {
        $.each(v, (key, val) => {
            temp_data.push(val)
        })
    })

    collections[table] = temp_data;
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) {
        return SDEC(parts.pop().split(";").shift());
    }
}

function setCookie(cookieName, cookieValue) {
    document.cookie = cookieName + "=" + SENC(cookieValue) + ";";
}

function deleteCookie(cookieName) {
    document.cookie = cookieName + "= ; expires = Thu, 01 Jan 1970 00:00:00 GMT"
}

function is_valid_email(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (input.match(validRegex)) {
        return true;

    } else {
        return false;
    }

}

function show_toast(title, message, type = "information") {
    $("#toast_title").text(title)
    $("#toast_body").empty().append(message)
    $('.toast_icon').addClass('d-none')
    $('#toast_icon_' + type).removeClass('d-none')
    $('#misc_toast').toast('show')
}



