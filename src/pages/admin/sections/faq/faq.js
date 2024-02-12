con_faq = 'src/database/controllers/faq_controller.php';

$(document).ready(function () {
    f_load_faq()
    TBL_SEARCH('fm_txt_search','fm_tbl_faq')

    $('#btn_fm_add').click(function () {
        $('#md_fm_add_faq').modal('show')
    })








    $('#md_fm_save').click(function () {
        payload_data = {
            "request_type": "add_faq",
            "question": $('#fm_txt_question').val(),
            "answer": $('#fm_txt_answer').val(),
        };

        _POST(con_faq, payload_data, (cb) => {
            show_toast("Add FAQ", "FAQ added successfully.")
            f_load_faq()
        });
    })

    $('#md_fm_update_save').click(function () {
        payload_data = {
            "request_type": "update_faq",
            "id": $(this).attr('faq_id'),
            "question": $('#fm_txt_update_question').val(),
            "answer": $('#fm_txt_update_answer').val(),
        };

        _POST(con_faq, payload_data, (cb) => {
            show_toast("Update FAQ", "FAQ updated successfully.")
            f_load_faq()
        });
    })
})


data_collections_faq = {};

function f_load_faq() {

    payload = {
        "request_type": "get_faq",
        "payload_data": {}
    }

    _GET(con_faq, payload, (cb) => {
        output = ``;
        count = 1;

        $.each(cb, (k, v) => {

            data_collections_faq[v.id] = v

            output += `
                <tr>
                    <td class="text-center">`+ count + `</td>
                    <td>`+ v.question + `</td>
                    <td>`+ v.answer + `</td>
                    <td>
                        <a class="btn_fm_update" faq_id="`+ v.id + `"><i class="fa-solid fa-gear "></i></a>
                        <a class="text-danger btn_fm_delete" faq_id="`+ v.id + `"><i class="fa-solid fa-trash-can "></i></a>
                    </td>
                </tr>
            `
            count = count + 1;
        })


        $('#fm_tbl_faq tbody').empty().append(output)
        $('.btn_fm_update').unbind('click').click(function () {
            $('#md_fm_update_faq').modal('show')
            $('#md_fm_update_save').attr('faq_id', $(this).attr('faq_id'))
            $('#fm_txt_update_question').val(data_collections_faq[$(this).attr('faq_id')].question)
            $('#fm_txt_update_answer').val(data_collections_faq[$(this).attr('faq_id')].answer)
        })

        $('.btn_fm_delete').unbind('click').click(function () {
            payload_data = {
                "request_type": "delete_faq",
                "id": $(this).attr('faq_id'),
            };

            _POST(con_faq, payload_data, (cb) => {
                show_toast("Delete FAQ", "FAQ deleted successfully.")
                f_load_faq()
            });
        })

    })
}
