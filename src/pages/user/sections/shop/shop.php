<section class="page" id="page_shop" style="color:#21313C!important">

    <div class="container my-3">

        <div class="row">
            <div class="col">
            </div>
        </div>

    </div>



</section>






<script src="src/pages/user/sections/home/home.js"></script>


<!-- MODALS -->


<!-- UPLOAD PHOTO -->
<div class="modal" tabindex="-1" id="d_md_upload_profile_picture">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Profile Picture</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="file" name="" id="d_upload_pp" class="form-control">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_save_upload_pp">Save</button>
            </div>
        </div>
    </div>
</div>


<!-- EDIT INFORMATION -->
<div class="modal" tabindex="-1" id="d_md_edit_information">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control mb-2" id="txt_md_edit_name">

                <label for="">Nickname <span class="text-danger">*</span></label>
                <input type="text" class="form-control mb-2" id="txt_md_edit_nickname">


                <label class="mt-2">Weight <span class="text-danger">*</span></label>

                <div class="input-group input-group-sm">
                    <input type="number" class="form-control form-control-sm" id="txt_md_edit_weight" placeholder="Ex : 110">
                    <span class="input-group-text" id="basic-addon2">KG</span>
                </div>

                <label class="mt-2">Category</label>
                <input type="text" class="form-control form-control-sm" id="sel_md_edit_category" readonly>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_md_edit_information_save">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- ACCEPT APPLICATION -->
<div class="modal" tabindex="-1" id="d_md_accept_club_application">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Accept Club Application</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to accept this puller's application?
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_confirm_accept_application">Accept</button>
            </div>
        </div>
    </div>
</div>