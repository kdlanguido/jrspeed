<!-- FAQ MAINTENANCE -->
<div class="row page" id="page_faq" style="display:none">

    <div class="col p-2  mt-3">

        <div class="page_cp_header">

            <p class="lead">FAQ Maintenance</p>

        </div>

        <input type="text" class="form-control form-control-sm mb-2" placeholder="Search..." style="width:230px; float:right" id="fm_txt_search">

        <table class="table mt-3" id="fm_tbl_faq">
            <thead>
                <tr style="font-size:10pt">
                    <th class="text-center ps-0" width="5%">No</th>
                    <th width="35%">Question</th>
                    <th width="55%">Answer</th>
                    <th class="text-center pe-0" width="5%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="text-end">
            <button class="btn btn-primary btn-sm" id="btn_fm_add"><i class="fa-solid fa-file-circle-plus"></i> Add</button>
            <button class="btn btn-secondary btn-sm" viewing="unarchive" id="btn_am_toggle_archive">Archive</button>

        </div>
    </div>

</div>



<!-- ADD FAQ -->
<div class="modal" tabindex="-1" id="md_fm_add_faq">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add FAQ</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <label for="">Question</label>
                <textarea class="form-control mb-2" rows="5" id="fm_txt_question"></textarea>


                <label for="">Answer</label>
                <textarea class="form-control mb-2" rows="5" id="fm_txt_answer"></textarea>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_fm_save">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE FAQ -->
<div class="modal" tabindex="-1" id="md_fm_update_faq">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update FAQ</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <label for="">Question</label>
                <textarea class="form-control mb-2" rows="5" id="fm_txt_update_question"></textarea>


                <label for="">Answer</label>
                <textarea class="form-control mb-2" rows="5" id="fm_txt_update_answer"></textarea>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_fm_update_save">Save</button>
            </div>
        </div>
    </div>
</div>


<script src="src/pages/admin/sections/faq/faq.js"></script>