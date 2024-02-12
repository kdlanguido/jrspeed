con_faq = 'src/database/controllers/faq_controller.php';

$(document).ready(function () {
    TBL_SEARCH('fb_txt_search','tbl_fbm')
    get_fbs();
})

data_collections_feedbacks = {}

function get_fbs() {

    payload = {
        request_type: "get_feedbacks",
        payload_data: {},
    };

    _GET(con_faq, payload, (cb) => {

        count = 1;

        output = '';

        $.each(cb, (k, v) => {

            output += `
                <tr>
                    <td class="text-center">`+ count + `</td>
                    <td class="text-center">`+ v.name + `</td>
                    <td class="text-center">`+ v.email + `</td>
                    <td class="text-center">`+ v.subject + `</td>
                    <td>
                        <button class="btn btn_fb_view" fb_id="`+ v.id + `"><i class="fa-solid fa-eye"></i></button>
                    </td>
                </tr>
            `;

            count = count + 1;

            data_collections_feedbacks[v.id] = {
                name: v.name,
                email: v.email,
                subject: v.subject,
                information: v.message,
            }
        })




        $('#tbl_fbm tbody').empty().append(output)

        $('.btn_fb_view').unbind('click').click(function () {
            $('#md_fb_view').modal('show')
            $('#md_fb_customer').val(data_collections_feedbacks[$(this).attr('fb_id')].name)
            $('#md_fb_email').val(data_collections_feedbacks[$(this).attr('fb_id')].email)
            $('#md_fb_subject').val(data_collections_feedbacks[$(this).attr('fb_id')].subject)
            $('#md_fb_feedback').val(data_collections_feedbacks[$(this).attr('fb_id')].information)
        })
    })

}