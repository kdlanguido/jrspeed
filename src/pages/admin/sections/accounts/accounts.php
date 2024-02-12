<!-- ACCOUNTS MAINTENANCE -->
<div class="row page" id="page_accounts" style="display:none">

    <div class="col p-2  mt-3">

        <div class="page_cp_header">

            <p class="lead">Accounts Maintenance</p>

        </div>

        <input type="text" class="form-control form-control-sm mb-2" placeholder="Search..." style="width:230px; float:right" id="am_txt_search">

        <table class="table mt-3" id="am_tbl_users">
            <thead>
                <tr style="font-size:10pt">
                    <th class="text-center ps-0" width="3%">No</th>
                    <th>Name</th>
                    <th class="text-center" width="20%">User Type</th>
                    <th class="text-center" width="5%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="text-end">
            <button class="btn btn-primary btn-sm" id="btn_am_add"><i class="fa-solid fa-file-circle-plus"></i> Add</button>
            <button class="btn btn-secondary btn-sm" viewing="unarchive" id="btn_am_toggle_archive">Archive</button>

        </div>
    </div>

</div>


<!-- VIEW USER -->
<div class="modal" tabindex="-1" id="md_am_view_user">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Username</label>
                <input type="text" class="form-control mb-2" id="am_txt_username" disabled>

                <label for="">Mobile</label>
                <input type="text" class="form-control mb-2" id="am_txt_mobile" disabled>

                <label for="">Email</label>
                <input type="text" class="form-control mb-2" id="am_txt_email" disabled>

                <label for="">First Name</label>
                <input type="text" class="form-control mb-2" id="am_txt_firstname" disabled>

                <label for="">Last Name</label>
                <input type="text" class="form-control mb-2" id="am_txt_lastname" disabled>

                <label for="">Address</label>
                <textarea class="form-control mb-2" id="am_txt_address" disabled></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_am_btn_changepassword">Change Password</button>
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="md_am_btn_archive">Move to Archive</button>
            </div>
        </div>
    </div>
</div>

<!-- VIEW USER ARCHIVED -->
<div class="modal" tabindex="-1" id="md_am_view_user_archived">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Username</label>
                <input type="text" class="form-control mb-2" id="archived_am_txt_username" readonly>

                <label for="">Mobile</label>
                <input type="text" class="form-control mb-2" id="archived_am_txt_mobile" readonly>

                <label for="">Email</label>
                <input type="text" class="form-control mb-2" id="archived_am_txt_email" readonly>

                <label for="">First Name</label>
                <input type="text" class="form-control mb-2" id="archived_am_txt_firstname" readonly>

                <label for="">Last Name</label>
                <input type="text" class="form-control mb-2" id="archived_am_txt_lastname" readonly>

                <label for="">Address</label>
                <textarea class="form-control mb-2" id="archived_am_txt_address" readonly></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="archived_md_am_btn_unarchive">Unarchive</button>
            </div>
        </div>
    </div>
</div>

<!-- ADD ACCOUNT -->
<div class="modal" tabindex="-1" id="md_am_add_user">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Admin Account</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Username</label>
                <input type="text" class="form-control mb-2" id="add_am_txt_username">

                <label for="">Mobile</label>
                <input type="text" class="form-control mb-2" id="add_am_txt_mobile">

                <label for="">Email</label>
                <input type="text" class="form-control mb-2" id="add_am_txt_email">

                <label for="">First Name</label>
                <input type="text" class="form-control mb-2" id="add_am_txt_firstname">

                <label for="">Last Name</label>
                <input type="text" class="form-control mb-2" id="add_am_txt_lastname">

                <label for="">Address</label>
                <textarea class="form-control mb-2" id="add_am_txt_address"></textarea>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_am_save_account">Save</button>
            </div>
        </div>
    </div>
</div>
<script src="src/pages/admin/sections/accounts/accounts.js"></script>