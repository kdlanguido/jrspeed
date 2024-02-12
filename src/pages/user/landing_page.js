con_products = 'src/database/controllers/products_controller.php';
con_auth = 'src/database/controllers/auth_controller.php'


$('#btn_enrollnow').click(function () {
    $('.page').hide();
    $('#page_enroll_now').fadeToggle();
})

$(document).ready(function () {

    u_load_all_products()

    if (getCookie('user_id')) {

        $('.list_dashboard').show()
        h_load_orders(getCookie('user_id'))
        $('.btn_login').hide();
        $('.btn_user_logout').show();
        $('.btn_my_account').show();
        $('#header_mb_logout').show()
    } else {
        $('.list_dashboard').hide()
        $('.btn_my_account').hide();
        $('#header_mb_logout').hide()

    }
})



$('.btn_user_logout').click(function () {

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
        $('#header_mb_logout').hide();
    })
})


function u_load_all_products() {


    payload = {
        "request_type": "get_categories",
        "payload_data": {}
    }

    output_accessories = ``;
    output_bikes = ``;
    output_components = ``;

    mobile_output_accessories = ``;
    mobile_output_bikes = ``;
    mobile_output_components = ``;

    list_sc = [];

    written_categories_in_accessories = [];
    written_categories_in_bikes = [];
    written_categories_in_components = [];



    _GET(con_products, payload, (cb) => {

        $.each(cb, (k, v) => {

            if (!list_sc.includes([btoa(v.category + v.product_tag).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-'), v.product_tag, v.category, v.sub_category])) {
                list_sc.push([btoa(v.category + v.product_tag).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-'), v.product_tag, v.category, v.sub_category])
            }

            if (!written_categories_in_accessories.includes(v.category) && v.product_tag == 'accessories') {
                output_accessories += `
                    <div class="col mt-4 item_category">
                        <a class="text-muted h6 btn_view_category" product_category="`+ v.category + `" style="text-decoration:none">` + v.category.toUpperCase() + `</a>
                        <ul id="sub_cat_`+ btoa(v.category + v.product_tag).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + `"></ul>
                    </div>
                `;

                mobile_output_accessories += `
                    <a class="nav-link text-dark btn_view_category" product_category="`+ v.category + `">` + v.category.toUpperCase() + `</a>
                `;

                written_categories_in_accessories.push(v.category)
            }

            if (!written_categories_in_bikes.includes(v.category) && v.product_tag == 'bikes') {
                output_bikes += `
                    <div class="col mt-4 item_category">
                        <a class="text-muted h6 btn_view_category" product_category="`+ v.category + `" style="text-decoration:none">` + v.category.toUpperCase() + `</a>
                        <ul id="sub_cat_`+ btoa(v.category + v.product_tag).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + `"></ul>
                    </div>
                `;

                mobile_output_bikes += `
                    <a class="nav-link text-dark btn_view_category" product_category="`+ v.category + `">` + v.category.toUpperCase() + `</a>
                `;


                written_categories_in_bikes.push(v.category)
            }

            if (!written_categories_in_components.includes(v.category) && v.product_tag == 'components') {
                output_components += `
                    <div class="col mt-4 item_category">
                        <a class="text-muted h6 btn_view_category" product_category="`+ v.category + `" style="text-decoration:none">` + v.category.toUpperCase() + `</a>
                        <ul id="sub_cat_`+ btoa(v.category + v.product_tag).replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-') + `"></ul>
                    </div>
                `;

                mobile_output_components += `
                    <a class="nav-link text-dark btn_view_category" product_category="`+ v.category + `">` + v.category.toUpperCase() + `</a>
                `;

                written_categories_in_components.push(v.category)
            }

        })

        $('#div_accessories').empty().append(output_accessories);
        $('#div_bikes').empty().append(output_bikes);
        $('#div_components').empty().append(output_components);

        // MOBILE
        $('#mb_categories_accessories').empty().append(mobile_output_accessories);
        $('#mb_categories_bikes').empty().append(mobile_output_bikes);
        $('#mb_categories_components').empty().append(mobile_output_components);

        $('.btn_view_category').click(function () {
            h_load_product_by_category($(this).attr('product_category'))
        })


        output_accessories = ``;
        output_bikes = ``;
        output_components = ``;

        written_categories_in_accessories = [];
        written_categories_in_bikes = [];
        written_categories_in_components = [];

        temp_ = 0;
        output = '';

        count = 1;

        $.each(list_sc, (k, v) => {

            if (temp_ == 0) {
                output += `<li><a class="text-muted btn_view_subcategory" product_subcategory="` + v[3] + `">` + v[3] + `</a></li>`;
                temp_ = v[0];
            } else if (temp_ == v[0]) {
                output += `<li><a class="text-muted btn_view_subcategory" product_subcategory="` + v[3] + `">` + v[3] + `</a></li>`;

            } else {
                $('#sub_cat_' + temp_).empty().append(output)
                temp_ = v[0];
                output = `<li><a class="text-muted btn_view_subcategory" product_subcategory="` + v[3] + `">` + v[3] + `</a></li>`;
            }

            if (count == list_sc.length) {
                $('#sub_cat_' + v[0]).empty().append(output)
            }

            count = count + 1;

        })



        $('.btn_view_subcategory').click(function () {
            h_load_product_by_subcategory($(this).attr('product_subcategory'))
        })
    })
}

function format_number(nStr) {

    nStr = Math.round(nStr * 100) / 100
    nStr = nStr + '';


    if (nStr.includes('.')) {
        nStr = parseFloat(nStr)

        return nStr.toLocaleString('en-US', { maximumFractionDigits: 2 })

    } else {

        nStr = parseFloat(nStr)
        return nStr.toLocaleString('en-US', { maximumFractionDigits: 2 }) + '.00'

    }


}

function only_numbers(textbox, inputFilter, errMsg) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop", "focusout"].forEach(function (event) {
        textbox.addEventListener(event, function (e) {
            if (inputFilter(this.value)) {
                // Accepted value.
                if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                    this.classList.remove("input-error");
                    this.setCustomValidity("");
                }

                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            }
            else if (this.hasOwnProperty("oldValue")) {
                // Rejected value: restore the previous one.
                this.classList.add("input-error");
                this.setCustomValidity(errMsg);
                this.reportValidity();
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            }
            else {
                // Rejected value: nothing to restore.
                this.value = "";
            }
        });
    });
}

function validate_string(value) {
    if (value != '') {
        return true;
    } else {
        return false;
    }
}
function isNumber(value) {
    return typeof value === 'number';
}
function validate_mobile_no(value = 0) {
    let isnum = /^\d+$/.test(value);
    console.log(isnum)
    if (isnum) {
        if (value.length == 11) {
            return true;
        } else {
            return false;
        }
    } else {
        return false

    }
}

function validate_int(value = 0) {
    let isnum = /^\d+$/.test(value);
    console.log(isnum)
    if (isnum) {
        return true
    } else {
        return false

    }
}

function validate_email(value) {
    return String(value)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}


// $('.btn_view_category').click(function () {
//     alert('test')
// })

