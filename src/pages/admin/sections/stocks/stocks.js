con_products = 'src/database/controllers/products_controller.php';


$(document).ready(function () {

    TBL_SEARCH('s_txt_search','tbl_stocks')

    s_load_stocks()

    $('#s_btn_add_stock').click(function () {
        s_get_product_list()
        $('#md_add_stocks').modal('show')
    })

    $('#md_sts_add_product').click(function () {

        validator = true;

        $('.div__stocks_add')
            .find('._required')
            .removeClass('border')
            .removeClass('border-danger')
            .each(function () {
                if ($(this).hasClass('_required_int')) {
                    if (!validate_int($(this).val())) {
                        $(this).addClass('border')
                        $(this).addClass('border-danger')
                        validator = false;
                    }
                }
            })

        if (validator) {
            payload_data = {
                "request_type": "product_add_product_stocks",
                "product_id": $('#sts_product_id').val(),
                "stock_count": $('#sts_stock_count').val(),
                "low_ind": $('#sts_stock_lsi').val(),
            };

            _POST(con_products, payload_data, (cb, status_code) => {
                if (cb == 600) {
                    show_toast("Add Product Fail", "Product exists, if you wish to re-stock please click the gear icon instead.", 'error')
                } else {
                    show_toast("Add Product", "Product has been added to stocks successfully.")
                    s_load_stocks()
                    $('#md_add_stocks').modal('hide')
                }
            });
        } else {
            show_toast('Validation Failed', 'Please fill up required fields', 'error')
        }


    })

    $('#md_sts_si_save').click(function () {

        validator = true;

        $('.div__stock_update')
            .find('._required')
            .removeClass('border')
            .removeClass('border-danger')
            .each(function () {
                if ($(this).hasClass('_required_int')) {
                    if (!validate_int($(this).val())) {
                        $(this).addClass('border')
                        $(this).addClass('border-danger')
                        validator = false;
                    }
                }
                if ($(this).hasClass('_required_string')) {
                    if (!validate_string($(this).val())) {
                        $(this).addClass('border')
                        $(this).addClass('border-danger')
                        validator = false;
                    }
                }

            })

        if (validator) {
            payload_data = {
                "request_type": "product_update_product_stocks",
                "product_id": $(this).attr('product_id'),
                "stock_count": $('#sts_si_stock_count').val(),
                "low_ind": $('#sts_si_stock_lsi').val(),
            };

            _POST(con_products, payload_data, (cb) => {
                show_toast("Update Stocks", "Product has been updated to stocks successfully.")
                s_load_stocks()
                $('#md_stock_info').modal('hide')
            });
        } else {
            show_toast('Validation Failed', 'Please fill up required fields', 'error')
        }
    })
})


data_collections_faq = {};

function s_get_product_list() {

    payload = {
        "request_type": "get_products_for_stocks",
        "payload_data": {}
    }

    _GET(con_products, payload, (cb) => {

        output = ``;

        $.each(cb, (k, v) => {
            output += `
                <option value="`+ v.id + `">` + v.product_name + `</option>
            `;
        })

        $('#sts_product_id').empty().append(output)
    })
}

function s_write_stock(stock_count, lsi) {
    if (stock_count > lsi) {
        return `<div class="text-light bg-success rounded" style="width:60px; margin:auto;">` + stock_count + ` </div>`
    } else {

        $('.stocks_indicator').show();
        return `<div class="text-light bg-danger rounded" style="width:60px; margin:auto;">` + stock_count + ` </div>`
    }
}


data_collections_stocks = {}

function s_load_stocks() {
    $('.stocks_indicator').hide();

    payload = {
        "request_type": "product_get_stocks",
        "payload_data": {}
    }

    _GET(con_products, payload, (cb) => {

        output = ``;
        count = 1;

        $.each(cb, (k, v) => {
            output += `
                <tr>
                    <td>`+ count + `</td>
                    <td>`+ v.product_name + `</td>
                    <td class="text-center">`+s_write_stock(v.stock_count,v.low_ind)+`</td>
                    <td class="text-center">`+ v.low_ind + `</td>
                    <td>
                    
                    <button class="btn p-0 text-dark btn_stocks_config" product_id="`+ v.id + `">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                    </td>
                </tr>

            `;
            count = count + 1;

            data_collections_stocks[v.id] = {
                product_name: v.product_name,
                stock_count: v.stock_count,
                low_ind: v.low_ind
            }
        })

        $('#tbl_stocks tbody').empty().append(output)
        $('.btn_stocks_config').unbind('click').click(function () {
            $('#md_stock_info').modal('show')
            $('#sts_si_stock_product').val(data_collections_stocks[$(this).attr('product_id')].product_name)
            $('#sts_si_stock_count').val(data_collections_stocks[$(this).attr('product_id')].stock_count)
            $('#sts_si_stock_lsi').val(data_collections_stocks[$(this).attr('product_id')].low_ind)
            $('#md_sts_si_save').attr('product_id', $(this).attr('product_id'))
        })

    })
}




function validate_int(value = 0) {
    let isnum = /^\d+$/.test(value);
    if (isnum && value > 0) {
        return true
    } else {
        return false

    }
}

function validate_string(value) {
    if (value != '') {
        return true;
    } else {
        return false;
    }
}