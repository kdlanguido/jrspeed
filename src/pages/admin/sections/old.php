<!-- PRODUCTS Maintenance -->
<div class="row page" id="div_cp_bm_info" style="display:none;">

<div class="col p-2  mt-3">

    <div class="page_cp_header">

        <div class="row">

            <div class="col">

                <p class="lead">Bike Information</p>

            </div>

            <div class="col-3 text-dark text-end pt-1">

                <a class="hoverable-btn mt-2" id="btn_backto_bm"> <i class="fa-solid fa-circle-arrow-left fa-xl "></i></a>

            </div>

        </div>

    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0 text-dark">

        <table class="table mt-3" id="cp_item_addtl_information">
            <thead>
                <tr>
                    <th class="text-center ps-0" width="5%">NO</th>
                    <th>Information</th>
                    <th>Details</th>
                    <th class="text-center" width="10%">TYPE</th>
                    <th width="10%">PRICE</th>
                    <th width="7%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>

    <div class="page_cp_header mt-3">

        <p class="lead">Gallery</p>

    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0 text-dark">

        <div class="row row-cols-3">

            <div class="col mb-2">
                <div class="border p-2" style="height:100%; position:relative">
                    <img src="src\img\products\bike1_front.png" style="width:100%; " alt="">
                    <i class="fa-solid fa-xmark" style="position:absolute; right:0; top:0; font-size:12pt;"></i>
                </div>
            </div>

            <div class="col mb-2">
                <div class="border p-2" style="height:100%;">
                    <img src="src\img\products\bike1_frame.png" style="width:100%;" alt="">
                </div>

            </div>

            <div class="col mb-2">
                <div class="border p-2" style="height:100%;">
                    <img src="src\img\products\bike1_diag.png" style="width:100%;" alt="">
                </div>

            </div>

            <div class="col mb-2">
                <div class="border p-2" style="height:100%;">
                    <img src="src\img\products\bike1_top.png" style="width:100%;" alt="">
                </div>
            </div>

            <div class="col mb-2">
                <div class="border p-2" style="height:100%;">
                    <img src="src\img\products\bike1_stem.png" style="width:100%;" alt="">
                </div>

            </div>

            <div class="col mb-2">
                <div class="border p-2" style="height:100%;">
                    <img src="src\img\products\bike1_shifter.png" style="width:100%;" alt="">
                </div>

            </div>

            <div class="col mb-2">
                <div class="border p-2 text-center" style="height:100%;">
                    <button class="btn" style="height:100%; width:100%"><i class="fa-solid fa-square-plus fa-beat"></i></button>
                </div>

            </div>

        </div>

    </div>

</div>

</div>

<!-- STOCKS Monitoring -->
<div class="row page" style="display:none" id="div_cp_sm">
<div class="col p-2  mt-3">

    <div class="page_cp_header">
        <p class="lead">Stocks Monitoring</p>
    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0">

        <div class="row text-dark mt-2">
            <div class="col-4">
                <div class="p-3 pt-0" style="font-size:10pt;">
                    <h6>Low Stock Indicator (LSI)</h6>
                    <span style="width:40px" class="badge text-bg-danger">#</span> - LOW STOCK
                    <span style="width:40px" class="badge text-bg-success ms-3">#</span> - HIGH STOCK
                </div>
            </div>
            <div class="col text-end">
                <input type="text" class="form-control form-control-sm float-end" style="width:300px;" placeholder="Search..." id="cp_txt_search_sm">
            </div>
        </div>

        <table class="table mt-3" id="cp_tbl_stocks">
            <thead>
                <tr>
                    <th class="text-center" width="5%">NO</th>
                    <th>NAME</th>
                    <th class="text-center" width="10%">STOCKS</th>
                    <th class="text-center" width="10%">LSI</th>
                    <th class="text-center" width="15%">LAST MODIFIED</th>
                    <th width="7%"></th>
                </tr>
            </thead>
            <tbody></tbody>

        </table>

        <div class="text-end">
            <button class="btn btn-primary btn-sm" id="btn_stocks_add">Add</button>
        </div>

    </div>

</div>

</div>

<!-- SALES Monitoring -->
<div class="row page" style="display:none" id="div_cp_slm">
<div class="col p-2  mt-3">
    <div class="page_cp_header">
        <p class="lead">Sales Monitoring</p>
    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0">

        <div class="row">
            <div class="col"></div>
            <div class="col-3">
                <input type="text" class="form-control form-control-sm mb-1" placeholder="Search...">
                <select name="" id="" class="form-select form-select-sm">
                    <option value="Date">Date</option>
                </select>
            </div>
        </div>

        <table class="table mt-2">
            <thead>
                <tr>
                    <th class="text-center ps-0" width="10%">TXN NO</th>
                    <th>CUSTOMER NAME</th>
                    <th class="text-center" width="10%">DATE</th>
                    <th width="7%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center ps-0">TP0002011</td>
                    <td>RBA 1002</td>
                    <td class="text-center">10/21/2023</td>
                    <td class="text-end">
                        <i class="fa-solid fa-eye"></i>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="text-end">
            <button class="btn btn-primary btn-sm" id="btn_generate_report"><i class="fa-solid fa-file-invoice-dollar"></i> Generate Reports</button>

        </div>

    </div>
</div>
</div>

<!-- ACCOUNT Maintenance -->
<div class="row page" style="display:none" id="div_cp_am">
<div class="col p-2  mt-3">
    <div class="page_cp_header">
        <p class="lead">Account Maintenance</p>
    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0">

        <div class="row bo">

            <div class="col text-end">
                <input type="text" class="form-control form-control-sm float-end mb-2" style="width:300px;" placeholder="Search..." id="cp_search_account_maintenance">
            </div>
        </div>

        <table class="table mt-3" id="cp_tbl_accountlist">
            <thead>
                <tr>
                    <th class="text-center ps-0" width="5%">NO</th>
                    <th class="text-center">USERNAME</th>
                    <th class="text-center">EMAIL</th>
                    <th class="text-center" width="20%">CONTACT NO</th>
                    <th class="text-center" width="15%">POSITION</th>
                    <th width="7%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="text-end">
            <button class="btn btn-primary btn-sm" id="btn_aa_add_account"><i class="fa-solid fa-user-plus"></i> Add</button>

        </div>
    </div>
</div>
</div>

<!-- FAQ Maintenance -->
<div class="row page" style="display:none" id="div_cp_faqm">
<div class="col p-2  mt-3">
    <div class="page_cp_header">
        <p class="lead">Frequently Asked Questions Maintenance</p>
    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0">

        <div class="row">

            <div class="col text-end">
                <input type="text" class="form-control form-control-sm float-end" style="width:300px;" placeholder="Search..." id="txt_faq_search">
            </div>
        </div>

        <table class="table mt-3" id="cp_tbl_faq">
            <thead>
                <tr>
                    <th class="text-center ps-0" width="5%">NO</th>
                    <th class="text-center" width="25%">QUESTION</th>
                    <th class="text-center">ANSWER</th>
                    <th width="7%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="text-end">

            <button class="btn btn-primary btn-sm" id="btn_faqm_add"> Add</button>

        </div>
    </div>
</div>
</div>

<!-- DELIVERY Maintenance -->
<div class="row page" style="display:none" id="div_cp_dm">
<div class="col p-2  mt-3">
    <div class="page_cp_header">
        <p class="lead">Delivery Maintenance</p>
    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0">

        <div class="row">

            <div class="col text-end">
                <input type="text" class="form-control form-control-sm float-end" style="width:300px;" placeholder="Search..." id="txt_dm_search">
            </div>
        </div>

        <table class="table mt-3" id="cp_tbl_dm">
            <thead>
                <tr>
                    <th class="text-center ps-0" width="5%">NO</th>
                    <th class="text-center">CITY</th>
                    <th class="text-center" width="15%">FEE</th>
                    <th width="7%"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <div class="text-end">

            <button class="btn btn-primary btn-sm" id="btn_dm_add"> Add</button>

        </div>
    </div>
</div>
</div>

<!-- Customers Feedback Maintenance -->
<div class="row page" style="display:none" id="div_cp_cf">
<div class="col p-2  mt-3">
    <div class="page_cp_header">
        <p class="lead">Customers Feedbacks</p>
    </div>

    <div class="page_cp_content mt-1 pt-2 border-top px-0">

        <div class="row">
            <div class="col text-end">
                <input type="text" class="form-control form-control-sm float-end" style="width:300px;" placeholder="Search..." id="txt_dm_search">
            </div>
        </div>

        <div class="row my-2">
            <div class="col-4">
                <div class="list-group border" style="font-size:9pt; height: 75vh; overflow-y:auto;" id="list_cf"></div>
            </div>
            <div class="col">
                <div class="border text-dark pt-4 px-4 pb-1" style="height:75vh; overflow-y:auto; font-size:10pt;">
                    <label for="">Client</label>
                    <input type="text" class="form-control form-control-sm mb-2" id="cp_cf_from" readonly>

                    <label for="">Subject</label>
                    <input type="text" class="form-control form-control-sm mb-2" id="cp_cf_subject" readonly>

                    <textarea name="" id="cp_cf_message" cols="30" rows="10" class="form-control" style="height:77.5%;" readonly></textarea>

                    <button class="btn btn-primary btn-sm mt-2 mb-0 float-end">Reply</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>