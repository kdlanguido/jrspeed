<!-- STOCKS MONITORING -->
<div class="row page" id="page_stocks" style="display:none">

    <div class="col p-2 mt-3">

        <div class="page_cp_header">

            <p class="lead">Stocks Monitoring</p>

        </div>

        <input type="text" class="form-control form-control-sm mb-2" placeholder="Search..." style="width:230px; float:right" id="am_txt_user_search">

        <table class="table mt-3" id="tbl_stocks">
            <thead>
                <tr style="font-size:10pt">
                    <th class="text-center ps-0" width="5%">No</th>
                    <th>Product</th>
                    <th class="text-center" width="10%">Remaining</th>
                    <th class="text-center" width="10%">Low Indicator</th>
                    <th class="text-center pe-0" width="5%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="text-end">
            <button class="btn btn-primary btn-sm" id="s_btn_add_stock"><i class="fa-solid fa-file-circle-plus"></i> Add</button>
            <button class="btn btn-secondary btn-sm" viewing="unarchive" id="btn_am_toggle_archive">Archive</button>
        </div>
    </div>

</div>



<!-- ADD STOCK -->
<div class="modal" tabindex="-1" id="md_add_stocks">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Item to Stocks</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <label>Product</label>
                <select name="" id="sts_product_id" class="form-select mb-2">
                    <option></option>
                </select>

                <label>Stock Count</label>
                <input type="text" class="form-control  mb-2" id="sts_stock_count">

                <label>Low Stock Indicator</label>
                <input type="text" class="form-control  mb-2" id="sts_stock_lsi">

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_sts_add_product">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- STOCK INFORMATION -->
<div class="modal" tabindex="-1" id="md_stock_info">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Stock Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <label>Product</label>
                <input type="text" class="form-control mb-2" id="sts_si_stock_product" readonly>

                <label>Stock Count</label>
                <input type="text" class="form-control mb-2" id="sts_si_stock_count">

                <label>Low Stock Indicator</label>
                <input type="text" class="form-control mb-2" id="sts_si_stock_lsi">

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_sts_si_save">Save Changes</button>
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


<script src="src/pages/admin/sections/stocks/stocks.js"></script>