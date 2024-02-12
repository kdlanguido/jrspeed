con_products = 'src/database/controllers/products_controller.php';


$(document).ready(function () {

    s_load_stocks()

    $('#s_btn_add_stock').click(function () {
        s_get_product_list()
        $('#md_add_stocks').modal('show')
    })

    $('#md_sts_add_product').click(function () {

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
            }
        });
    })

    $('#md_sts_si_save').click(function () {

        payload_data = {
            "request_type": "product_update_product_stocks",
            "product_id": $(this).attr('product_id'),
            "stock_count": $('#sts_si_stock_count').val(),
            "low_ind": $('#sts_si_stock_lsi').val(),
        };

        _POST(con_products, payload_data, (cb) => {
            show_toast("Update Stocks", "Product has been updated to stocks successfully.")
            s_load_stocks()
        });
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


data_collections_stocks = {}

function s_load_stocks() {
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
                    <td class="text-center">`+ v.stock_count + `</td>
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
