con_products = 'src/database/controllers/products_controller.php';

$(document).ready(function () {
    TBL_SEARCH('cp_bikelist_search','cp_tbl_productlist')
    p_load_all_products()
    $('#a__sidebar_products').css('font-weight','bold')
})

$('#btn__products_view_archive').click(function(){
    $('#cp_tbl_productlist').hide();
    $('#cp_tbl_productlist_archived').show();
    $('#btn__products_hide_archive').show();
    $('#btn__products_view_archive').hide();
    $('#btn_pm_add').hide();
    $('#p__pm_title').text('Archived Products')
    p_load_archived_products();
})
$('#btn__products_hide_archive').click(function(){
    $('#cp_tbl_productlist').show();
    $('#cp_tbl_productlist_archived').hide();
    $('#btn__products_hide_archive').hide();
    $('#btn__products_view_archive').show();
    $('#btn_pm_add').show();
    $('#p__pm_title').text('Products Maintenance')
})

$('#btn_pm_add').click(function () {
    $('#md_pm_product_view').modal('show')
    $('#btn_pm_gallery').hide();
    $('#pm_txt_product_name').val("")
    $('#pm_txt_description').val("")
    $('#pm_sel_tag').val("")
    $('#pm_sel_category').val("")
    $('#pm_sel_sub_category').val("")
    $('#txt_pm_price').val("")
    $('#pm_ref_no').val("")
    $('#pm_txt_category').val("")
    $('#pm_txt_sub_category').val("")

    $('#btn_pm_save').attr('func', 'add')
})

$('#btn_pm_gallery').click(function () {
    p_load_product_images($(this).attr('product_id'));
})

$('#btn_pm_save').click(function () {
    if ($(this).attr('func') == 'add') {

        payload_data = {
            "request_type": 'product_maintenance_add',
            "product_name": $('#pm_txt_product_name').val(),
            "price": $('#txt_pm_price').val(),
            "category": is_not_null($('#pm_sel_category').val(), $('#pm_txt_category').val()),
            "sub_category": is_not_null($('#pm_sel_sub_category').val(), $('#pm_txt_sub_category').val()),
            "description": $('#pm_txt_description').val(),
            "product_tag": $('#pm_sel_tag').val(),
        }

        _POST(con_products, payload_data, (cb) => {
            show_toast('Add Product', 'Product added successfully')
            p_load_all_products()
        })

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
    }

    if ($(this).attr('func') == 'edit') {
        payload_data = {
            "request_type": 'product_maintenance_edit',
            "product_name": $('#pm_txt_product_name').val(),
            "price": $('#txt_pm_price').val(),
            "category": is_not_null($('#pm_sel_category').val(), $('#pm_txt_category').val()),
            "sub_category": is_not_null($('#pm_sel_sub_category').val(), $('#pm_txt_sub_category').val()),
            "description": $('#pm_txt_description').val(),
            "product_tag": $('#pm_sel_tag').val(),
            "product_id": $(this).attr('product_id')
        }

        _POST(con_products, payload_data, (cb) => {
            show_toast('Update Product', 'Product updated successfully')
            p_load_all_products()
        })
    }
})

$('#btn_pm_upload_image').click(function () {
    $('#md_pm_product_upload_image').modal('show')
    $('#md_pm_product_view').modal('hide')
})

$('#btn_pm_img_upload').click(function () {

    var input = document.getElementById('file_pm_image')

    payload_data = {
        "request_type": 'product_maintenance_upload_img',
        "product_id": $(this).attr('product_id'),
        "dir": input.files[0]
    }

    _POST(con_products, payload_data, (cb) => {
        show_toast('Upload Image', 'Upload image successful')
        $('#btn_pm_gallery').trigger('click')
        $('#md_pm_product_view').modal('show')

    })
})


function is_not_null(input1, input2) {
    if (input1 == null || input1 == ' ' || input1 == '') {
        return input2;
    } else {
        return input1;
    }
}

function p_load_all_products() {

    payload = {
        "request_type": "get_products_all",
        "payload_data": {
        }
    }

    _GET(con_products, payload, (cb) => {

        count = 1;
        output = ``;
        output_1 = `<option value=""> </option>`;
        output_2 = `<option value=""> </option>`;

        category_collections = [];
        sub_category_collections = [];

        $.each(cb, (k, v) => {
            output += `
                <tr>
                    <td class="text-center">`+ count + `</td>
                    <td>`+ v.product_name + `</td>
                    <td class="text-center">`+ v.product_tag + `</td>
                    <td class="text-center">`+ v.category + `</td>
                    <td class="text-center">`+ v.sub_category + `</td>
                    <td class="text-center">`+ format_number(v.price) + `</td>
                    <td class="text-center">
                        <button class="btn p-0 text-dark btn_view_product" product_id="`+ v.id + `">
                            <i class="fa-solid fa-gear"></i>
                        </button>

                        <button class="btn p-0 text-danger btn_del_product" product_id="`+ v.id + `">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                </tr>
            `;
            count = count + 1;

            if (!category_collections.includes(v.category) && v.category != ' ' && v.category != '') {
                output_1 += `<option value="` + v.category + `">` + v.category + `</option>`;
                category_collections.push(v.category)
            }

            if (!sub_category_collections.includes(v.sub_category) && v.sub_category != ' ' && v.sub_category != '') {
                output_2 += `<option value="` + v.sub_category + `">` + v.sub_category + `</option>`;
                sub_category_collections.push(v.sub_category)
            }

        })

        $('#cp_tbl_productlist tbody').empty().append(output)
        $('#pm_sel_category').empty().append(output_1)
        $('#pm_sel_sub_category').empty().append(output_2)

        $('.btn_view_product').click(function () {
            p_load_product_information($(this).attr('product_id'))
            p_load_product_images($(this).attr('product_id'))

        })

        $('.btn_del_product').click(function () {
            product_id = $(this).attr('product_id')

            $('#btn_confirm_delete_product').attr('product_id', product_id)
            $('#h_md_delete_product_confirm').modal('show')

            $('#btn_confirm_delete_product')
                .unbind('click')
                .click(function () {
                    payload_data = {
                        request_type: "product_maintenance_del_product",
                        id: product_id
                    };

                    _POST(con_products, payload_data, () => {
                        p_load_all_products()
                        show_toast("Delete Product", "Product has been deleted successfully.")
                    });
                })

        })
    })
}


function p_load_archived_products() {

    payload = {
        "request_type": "get_products_archived",
        "payload_data": {
        }
    }

    _GET(con_products, payload, (cb) => {

        count = 1;
        output = ``;

        $.each(cb, (k, v) => {
            output += `
                <tr>
                    <td class="text-center">`+ count + `</td>
                    <td>`+ v.product_name + `</td>
                    <td class="text-center">`+ v.product_tag + `</td>
                    <td class="text-center">`+ v.category + `</td>
                    <td class="text-center">`+ v.sub_category + `</td>
                    <td class="text-center">`+ format_number(v.price) + `</td>
                    <td class="text-center">
                        <button class="btn p-0 text-primary btn__product_unarchive" title="Unarchive Product" product_id="`+ v.id + `">
                            <i class="fa-solid fa-arrows-rotate"></i>
                        </button>
                    </td>
                </tr>
            `;
            count = count + 1;
        })

        $('#cp_tbl_productlist_archived tbody').html(output)

        $('.btn__product_unarchive').unbind('click').click(function(){
            payload = {
                request_type: "unarchive_product",
                product_id: $(this).attr('product_id')
            };

            _POST(con_products, payload, (cb) => {
                if (cb == 1) {
                    p_load_archived_products()
                    p_load_all_products()

                    show_toast('Unarchive Product', 'A product has been removed from archive list')

                } else {
                    show_toast('Contact Administrator', 'Post Failed : No rows affected', 'error')
                }
            })
        })
    })
}

function p_load_product_information(product_id) {

    payload = {
        "request_type": "get_products_information_by_id",
        "payload_data": {
            product_id: product_id
        }
    }

    _GET(con_products, payload, (cb) => {

        count = 1;
        output = ``;

        $('#pm_txt_category').val("")
        $('#pm_txt_sub_category').val("")
        $('#txt_pm_price').val("")
        $('#pm_txt_product_name').val("")
        $('#pm_txt_description').val("")

        $.each(cb, (k, v) => {
            $('#pm_txt_product_name').val(v.product_name)
            $('#pm_txt_description').val(v.description)
            $('#pm_sel_tag').val(v.product_tag)
            $('#pm_sel_category').val(v.category)
            $('#pm_sel_sub_category').val(v.sub_category)
            $('#txt_pm_price').val(v.price)
            $('#pm_ref_no').val(v.ref_no)

            $('#btn_pm_img_upload').attr('product_id', v.id)
            $('#btn_pm_gallery').attr('product_id', v.id)
            $('#btn_pm_save').attr('product_id', v.id)

            if (v.is_featured == 1) {
                $('#txt_pm_is_featured').attr('product_id', v.id)
                $('#txt_pm_is_featured').prop('checked', true)


            } else {
                $('#txt_pm_is_featured').attr('product_id', v.id)
                $('#txt_pm_is_featured').prop('checked', false)

            }

            $('#txt_pm_is_featured').unbind('click').click(function () {


                if ($(this).prop('checked') == false) {
                    payload = {
                        request_type: "product_remove_in_featured",
                        product_id: $(this).attr('product_id')
                    };

                    _POST(con_products, payload, (cb) => {
                        if (cb == 1) {
                            show_toast('Featured Product Remove', 'A product has been removed from Featured Products')

                        } else {
                            show_toast('Contact Administrator', 'Post Failed : No rows affected', 'error')
                        }
                    })
                } else {
                    payload = {
                        request_type: "product_add_in_featured",
                        product_id: $(this).attr('product_id')
                    };

                    _POST(con_products, payload, (cb) => {
                        if (cb == 1) {
                            show_toast('Featured Product Add', 'A product has been added to Featured Products')


                        } else {
                            show_toast('Contact Administrator', 'Post Failed : No rows affected', 'error')
                        }
                    })
                }



            })


        })


        $('#btn_pm_gallery').show();
        $('#btn_pm_save').attr('func', 'edit')
        $('#md_pm_product_view').modal('show')


    })
}

function p_load_product_images(product_id) {
    payload = {
        "request_type": "get_product_images",
        "payload_data": {
            product_id: product_id
        }
    }

    _GET(con_products, payload, (cb, status) => {

        count = 1;
        output = ``;

        $.each(cb, (k, v) => {
            output += `
                <tr>
                    <td>`+ v.name + `</td>
                    <td><img src="`+ v.dir + `" height="150px" width="100%" style="object-fit:contain"></td>
                    <td>
                        <a img_id="`+ v.id + `" class="btn_pm_del_img"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            `;
        })

        if (status == 204) {
            $('.alert_no_img').show();
            $('#tbl_pm_product_imgs tbody').empty()

        } else {
            $('.alert_no_img').hide();
            $('#tbl_pm_product_imgs tbody').empty().append(output)

            $('.btn_pm_del_img').click(function () {

                payload_data = {
                    "request_type": 'product_maintenance_del_img',
                    "id": $(this).attr('img_id')
                }

                _POST(con_products, payload_data, (cb) => {
                    show_toast('Delete Image', 'Delete image successful')
                    $('#btn_pm_gallery').trigger('click')
                    $('#md_pm_product_view').modal('show')

                })
            })

        }

    })
}
