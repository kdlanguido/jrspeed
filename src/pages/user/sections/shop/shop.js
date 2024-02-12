$(document).ready(function(){

    $('.header_link').click(function(){
        
        alert($(this).attr('goto'))
    })

})



// con_accounts = 'src/database/controllers/accounts_controller.php'



// function match_card(title, p1, p2, res) {

//     if (res == 'win') {
//         res = `<h5 style="color:green">WIN</h5>`;
//     }
//     else {
//         res = `<h5 style="color:red">LOSE</h5>`;
//     }

//     return `
        
//         <div class="card mb-3 py-3 container-fluid" style="display:none">
//             <div class="row">
//                 <div style="font-size:9pt;" class="col d-flex justify-content-between border-bottom">
//                     <h5>`+ title + `</h5>
//                     `+ res + `
//                 </div>
//             </div>
//             <div class="row mt-4 mx-auto" style="width:335px;">
//                 <div class="col-5 d-flex justify-content-center">
//                     <label style="font-family: oswald; font-size:20pt;" class="me-3">`+ p1 + `</label>
//                 </div>

//                 <div class="col-2 d-flex justify-content-center align-items-center">
//                     <img src="src/img/vs.jpg" height="auto" width="70px" alt="">
//                 </div>

//                 <div class="col-5 d-flex  justify-content-center">
//                     <label style="font-family: oswald; font-size:20pt;" class="ms-3">`+ p2 + `</label>
//                 </div>
//             </div>
//         </div>
//     `

// }

// function membership_tier(tier) {
//     if (tier == 'bronze') { return bronze_badge }
//     else if (tier == 'gold') { return gold_badge }
//     else if (tier == 'silver') { return silver_badge }
// }

// function membersince(isapproved, date) {

//     if (isapproved == 0) {
//         return alert_for_approval
//     } else {
//         return date
//     }
// }

// function get_pullerdata() {
//     payload = {
//         "request_type": "get_pullerdata",
//         "payload_data": {
//             "uid": getCookie('uid')
//         }
//     }

//     _GET(con_accounts, payload, (cb) => {

//         $.each(cb, (k, v) => {

//             if (v.profile_picture == null) {
//                 $('#div_pi_profilepic').empty().append(`
//                 <span class="h1 border d-flex justify-content-center align-items-center no_image mx-auto" style="width: 150px;height: 150px;border-radius: 50%;">?</span>
//                 <button class="btn btn-outline-secondary btn-sm mb-2 btn_d_changephoto">Change photo</button>
//                 `)

//             } else {
//                 $('#div_pi_profilepic').empty().append(`<img src="` + v.profile_picture + `" style="height: 200px;" class="mx-auto mt-1">
//                 <button class="btn btn-outline-secondary btn-sm mt-2 mb-1 btn_d_changephoto">Change photo</button>`)
//             }

//             click_function_profile_pic()

//             $('#img_pi_clublogo').attr('src', v.club_logo)
//             $('#img_mc_clublogo').attr('src', v.club_logo)

//             $('#txt_pi_name').text(v.fullname.toUpperCase())
//             $('#txt_pi_alias').text(v.nickname.toUpperCase())
//             $('#txt_pi_weight').text(v.weight)
//             $('#txt_pi_membershiptier').empty().append(membership_tier(v.member_type))
//             $('#txt_pi_clubname').text(v.club_name.toUpperCase())
//             $('#txt_pi_clubposition').text(v.club_position.toUpperCase())

//             $('#txt_md_edit_name').val(v.fullname)
//             $('#txt_md_edit_nickname').val(v.nickname)
//             $('#txt_md_edit_weight').val(v.weight)
//             $('#sel_md_edit_category').val(v.category)

//             if (v.club_position.toUpperCase() == 'FOUNDER' || v.club_position.toUpperCase() == 'ADMIN') {
//                 $('#btn_d_manageclub').show();
//                 $('#btn_d_manageclub').attr('club_id', v.club_id)
//             } else {

//                 $('#btn_d_manageclub').hide();
//             }

//             $('#txt_pi_category').text(v.category.toUpperCase())
//             $('#txt_pi_membersince').empty().append(membersince(v.is_approved, v.approved_date))
//             $('#img_pi_clublogo').attr('src', v.club_logo)

//         })
//     })

// }






// $('#btn_d_edit_information').click(function () {
//     $('#d_md_edit_information').modal('show');
// })


















// $(document).ready(function () {

//     get_pullerdata(getCookie('uid'))

//     $('#div_matches').empty().append(alert_no_record)

//     $('#btn_save_upload_pp').click(function () {

//         var input = document.getElementById('d_upload_pp')

//         payload_data = {
//             "file": input.files[0],
//             "uid": getCookie('uid'),
//             "request_type": "update_profilepic"
//         }

//         _POST(con_accounts, payload_data, () => {
//             show_toast('Update Photo', 'Profile photo has been updated successfully.')
//             get_pullerdata(getCookie('uid'))
//         })
//     })

//     $('#btn_md_edit_information_save').click(function () {
//         payload_data = {
//             "request_type": 'update_account_information',
//             "uid": getCookie('uid'),
//             "name": $('#txt_md_edit_name').val(),
//             "nickname": $('#txt_md_edit_nickname').val(),
//             "weight": $('#txt_md_edit_weight').val(),
//             "category": $('#sel_md_edit_category').val(),
//         }

//         _POST(con_accounts, payload_data, (cb) => {
//             show_toast('Update Information', 'Account has been updated successfully')
//             get_pullerdata(getCookie('uid'))
//         })
//     })



// })

// current_club_id = 0

// $('#btn_d_manageclub').click(function () {
//     current_club_id = $(this).attr('club_id');

//     $('.page').hide();
//     $('#page_manageclub').fadeToggle();
//     d_load_club_info($(this).attr('club_id'))

// })

// function d_load_club_info(club_id) {

//     payload = {
//         "request_type": "get_club_info",
//         "payload_data": {
//             "club_id": club_id
//         }
//     }

//     _GET(con_clubs, payload, (cb) => {

//         $('#txt_mc_clubname').text(cb[0].name)
//         $('#txt_mc_tagline').text(cb[0].tagline)
//         $('#txt_mc_establishedyear').text(cb[0].establish)
//         $('#txt_mc_alias').text(cb[0].alias)
//         $('#txt_mc_region').text(cb[0].region)

//         payload = {
//             "request_type": "get_club_members",
//             "payload_data": {
//                 "club_id": club_id
//             }
//         }

//         _GET(con_clubs, payload, (cb) => {
//             applying_count = 0;

//             d_outputs_listed_members = '';
//             d_outputs_unlisted_members = '';

//             $('#txt_mc_members').text(cb[0].listed_members)


//             $.each(cb, function (k, v) {
//                 if (v.is_approved == 1) {

//                     if (v.position == 'founder') {
//                         d_outputs_listed_members += `
//                             <tr>
//                                 <td>
//                                 `+ v.name + `
//                                 </td>
    
//                                 <td width="10%">
//                                     <span class="badge rounded-pill text-bg-dark"><i class="fa-solid fa-crown"></i> FOUNDER</span>
//                                 </td>
    
//                                 <td class="text-end" width="5%">
//                                     <a><i class="fa-solid fa-eye text-dark me-2" style="font-size:13pt"></i></a>
//                                 </td>
//                             </tr>
//                         `;
//                     } else if (v.position == 'admin') {
//                         d_outputs_listed_members += `
//                             <tr>
//                                 <td>
//                                 `+ v.name + `
//                                 </td>
    
//                                 <td width="10%">
//                                     <span class="badge rounded-pill text-bg-success">ADMIN</span>
//                                 </td>
    
//                                 <td class="text-end" width="5%">
//                                     <a><i class="fa-solid fa-eye text-dark me-2" style="font-size:13pt"></i></a>
//                                 </td>
//                             </tr>
//                             `;
//                     }
//                     else {
//                         d_outputs_listed_members += `
//                         <tr>
//                             <td>
//                             `+ v.name + `
//                             </td>
    
//                             <td width="10%">
    
//                             </td>
    
//                             <td class="text-end" width="5%">
//                                 <a><i class="fa-solid fa-eye text-dark me-2" style="font-size:13pt"></i></a>
//                             </td>
//                         </tr>
//                         `;
//                     }
//                 }
//                 else {
//                     applying_count = applying_count + 1;
//                     d_outputs_unlisted_members += `
//                     <tr>
//                         <td id="txt_mc_clubname">`+ v.name + `</td>
//                         <td class="text-end">
//                             <a class="btn_hover" id="btn_mc_decline_application"  user_id="`+ v.user_id + `"><i class="fa-solid fa-user-xmark text-danger me-2" style="font-size:13pt"></i></a>
//                             <a class="btn_hover" id="btn_mc_accept_application" user_id="`+ v.user_id + `"><i class="fa-solid fa-user-check text-success" style="font-size:13pt"></i></a>
//                         </td>
    
//                     </tr>
//                     `
//                 }
//             })


//             if (applying_count > 0) {
//                 $('#span_mc_no_of_applications').text(applying_count)
//                 $('#span_mc_no_of_applications').show();
//             }else{
//                 $('#span_mc_no_of_applications').text(0)
//                 $('#span_mc_no_of_applications').hide();
//             }
//             $('#tbl_mc_listed_members tbody').empty().append(d_outputs_listed_members)
//             $('#tbl_mc_applying_members tbody').empty().append(d_outputs_unlisted_members)


//             $('#btn_mc_accept_application').unbind('click').click(function () {
//                 $("#d_md_accept_club_application").modal('show')
//                 $('#btn_confirm_accept_application').attr('user_id', $(this).attr('user_id'))
//             })

//             $('#btn_mc_decline_application').unbind('click').click(function () {
//                 $("#d_md_deny_club_application").modal('show')
//             })

//             $('#btn_confirm_accept_application').unbind('click').click(function () {
//                 payload_data = {
//                     "request_type": 'accept_club_application',
//                     "approved_by": getCookie('uid'),
//                     "user_id": $(this).attr('user_id')
//                 }

//                 _POST(con_clubs, payload_data, (cb) => {
//                     show_toast('Accept Member', 'Member has been accepted successfully')
//                     d_load_club_info(current_club_id)
//                 })
//             })
//         })
//     })




// }


// // $('#btn_confirm_accept_application').click(function ())
