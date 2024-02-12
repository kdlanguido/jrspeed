<!-- FEEDBACK MAINTENANCE -->
<div class="row page" id="page_feedbacks" style="display:none">

    <div class="col p-2  mt-3">

        <div class="page_cp_header">

            <p class="lead">Customers Feedback</p>

        </div>

        <input type="text" class="form-control form-control-sm mb-2" placeholder="Search..." style="width:230px; float:right" id="fb_txt_search">

        <table class="table mt-3" id="tbl_fbm">
            <thead>
                <tr style="font-size:10pt">
                    <th class="text-center ps-0" width="3%">No</th>
                    <th class="text-center" width="15%">Customer</th>
                    <th class="text-center" width="15%">Email</th>
                    <th class="text-center" width="15%">Feedback</th>
                    <th class="text-center" width="3%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>


    </div>

</div>


<script src="src/pages/admin/sections/feedbacks/feedbacks.js"></script>


<!-- CONFIRM MODAL -->
<div class="modal fade" tabindex="-1" id="md_fb_view">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer Feedback Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="">Customer</label>
                <input type="text" class="form-control mb-2" id="md_fb_customer" readonly>

                <label for="">Email</label>
                <input type="text" class="form-control mb-2" id="md_fb_email" readonly>

                <label for="">Subject</label>
                <input type="text" class="form-control mb-2" id="md_fb_subject" readonly>

                <label for="">Feedback</label>
                <textarea type="text" class="form-control mb-2" rows="7" id="md_fb_feedback" readonly></textarea>

            </div>
          
        </div>
    </div>
</div>