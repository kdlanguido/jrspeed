<!-- STOCKS MONITORING -->
<div class="row page" id="page_sales_monitoring" style="display:none">

    <div class="col p-2 mt-3">

        <div class="page_cp_header">
            <p class="lead">Sales Monitoring</p>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <select style="width:200px" id="sel__sales_monitoring" class="float-end form-select form-control-sm">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- <input type="text" class="form-control form-control-sm mb-2" placeholder="Search..." style="width:230px; float:right" id="am_txt_user_search">

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
        </div> -->
    </div>

</div>

<script src="src/pages/admin/sections/sales_monitoring/sales_monitoring.js"></script>