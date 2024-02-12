con_accounts = 'src/database/controllers/accounts_controller.php';

$(document).ready(function () {

    TBL_SEARCH('am_txt_search','am_tbl_users');

    am_load_accounts()

    $("#am_txt_user_search").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#am_tbl_users tbody tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#btn_am_add').click(function () {
        $('#md_am_add_user').modal('show')
    })

    $('#md_am_save_account').click(function () {
        payload_data = {
            "request_type": "add_admin_account",
            "username": $('#add_am_txt_username').val(),
            "password": $('#add_am_txt_password').val(),
            "mobile_no": $('#add_am_txt_mobile').val(),
            "email": $('#add_am_txt_email').val(),
            "first_name": $('#add_am_txt_firstname').val(),
            "last_name": $('#add_am_txt_lastname').val(),
            "address": $('#add_am_txt_address').val(),
        };

        _POST(con_accounts, payload_data, (cb) => {
            show_toast("Add Account", "Account added successfully")
            am_load_accounts()
        });
    })

    $('#btn_am_toggle_archive').click(function () {
        if ($(this).attr('viewing') == 'unarchive') {
            $('#btn_am_toggle_archive').text('Back')
            $(this).attr('viewing', 'archive')
            am_load_accounts_archive()
        } else {
            $(this).attr('viewing', 'unarchive')
            $('#btn_am_toggle_archive').text('Archive')
            am_load_accounts()
        }
    })
})

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

function am_load_accounts() {

    payload = {
        "request_type": "get_all_users",
        "payload_data": {}
    }

    data_collections_accounts = [];

    _GET(con_accounts, payload, (cb) => {

        output = ``;
        count = 1;

        $.each(cb, (k, v) => {

            data_collections_accounts[v.id] = v

            user_type = ``;

            if (v.user_type == 2) {
                user_type = 'Admin'
            } else {
                user_type = 'Customer'
            }

            output += `
            <tr>
                <td class="text-center">`+ count + `</td>
                <td>`+ v.first_name + ' ' + v.last_name + `</td>
                <td class="text-center">`+ user_type + `</td>
                <td>
                    <a class="am_btn_view_user" user_id="`+ v.id + `"><i class="fa-solid fa-eye "></i></a>
                </td>
            </tr>
            
            `;

            count = count + 1;
        })

        $('#am_tbl_users tbody').empty().append(output)

        $('.am_btn_view_user').unbind('click').click(function () {

            $('#md_am_view_user').modal('show')

            $('#md_am_btn_changepassword').attr('user_id', $(this).attr('user_id'))
            $('#md_am_btn_archive').attr('user_id', $(this).attr('user_id'))

            $('#am_txt_username').val(data_collections_accounts[$(this).attr('user_id')].username)
            $('#am_txt_mobile').val(data_collections_accounts[$(this).attr('user_id')].mobile_no)
            $('#am_txt_email').val(data_collections_accounts[$(this).attr('user_id')].email)
            $('#am_txt_firstname').val(data_collections_accounts[$(this).attr('user_id')].first_name)
            $('#am_txt_lastname').val(data_collections_accounts[$(this).attr('user_id')].last_name)
            $('#am_txt_address').val(data_collections_accounts[$(this).attr('user_id')].address)

        })

        $('#md_am_btn_changepassword').unbind('click').click(function () {
            payload = {
                email_to: $('#am_txt_email').val(),
                subject: 'Change Password Notification',
                body: `Hello <b>`+$('#am_txt_firstname').val()+`</b>,
                <br><br>A password reset has been requested for your account.
                <br><br>Kindly Click this <a href="http://localhost/jrspeed/changepass.php?y=`+$(this).attr('user_id')+`">link</a> 
                to reset your password. 

                <br><br><br>Thank you!
                `
            };

            _POST('src/database/controllers/emailer.php', payload, (cb) => {
                show_toast("Change Password", "Change password instruction has been sent to user email.")
            })

        })

        $('#md_am_btn_archive').unbind('click').click(function () {
            payload_data = {
                "request_type": "archive_account",
                "id": $(this).attr('user_id')
            };

            _POST(con_accounts, payload_data, (cb) => {
                show_toast("Archive Account", "Account archived successfully")
                am_load_accounts()
            });
        })
    })
}

function am_load_accounts_archive() {

    data_collections_accounts = [];

    payload = {
        "request_type": "get_all_archived_users",
        "payload_data": {}
    }

    _GET(con_accounts, payload, (cb) => {

        output = ``;
        count = 1;

        $.each(cb, (k, v) => {

            data_collections_accounts[v.id] = v

            user_type = ``;

            if (v.user_type == 2) {
                user_type = 'Admin'
            } else {
                user_type = 'Customer'
            }

            output += `
                <tr>
                    <td class="text-center">`+ count + `</td>
                    <td>`+ v.first_name + ' ' + v.last_name + `</td>
                    <td class="text-center">`+ user_type + `</td>
                    <td>
                        <a class="am_btn_view_user_archived" user_id="`+ v.id + `"><i class="fa-solid fa-eye "></i></a>
                    </td>
                </tr>
            
            `;

            count = count + 1;
        })

        $('#am_tbl_users tbody').empty().append(output)

        $('.am_btn_view_user_archived').unbind('click').click(function () {

            $('#md_am_view_user_archived').modal('show')

            $('#archived_md_am_btn_unarchive').attr('user_id', $(this).attr('user_id'))

            $('#archived_am_txt_username').val(data_collections_accounts[$(this).attr('user_id')].username)
            $('#archived_am_txt_mobile').val(data_collections_accounts[$(this).attr('user_id')].mobile_no)
            $('#archived_am_txt_email').val(data_collections_accounts[$(this).attr('user_id')].email)
            $('#archived_am_txt_firstname').val(data_collections_accounts[$(this).attr('user_id')].first_name)
            $('#archived_am_txt_lastname').val(data_collections_accounts[$(this).attr('user_id')].last_name)
            $('#archived_am_txt_address').val(data_collections_accounts[$(this).attr('user_id')].address)
        })


        $('#archived_md_am_btn_unarchive').unbind('click').click(function () {
            payload_data = {
                "request_type": "unarchive_account",
                "id": $(this).attr('user_id')
            };

            _POST(con_accounts, payload_data, (cb) => {
                show_toast("Unarchive Account", "Account unarchived successfully")
                am_load_accounts_archive()
            });

        })
    })
}

