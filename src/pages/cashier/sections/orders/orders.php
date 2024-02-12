<!-- ORDERS MONITORING -->
<div class="row page" id="page_orders">

    <div class="col p-2  mt-3">

        <div class="page_cp_header d-flex justify-content-between">
            <p class="lead">Orders Monitoring</p>
        </div>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark active om_btn_load_pending" data-bs-toggle="tab" data-bs-target="#om_pending_tab" type="button" role="tab">Pending</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark om_btn_load_to_pay" data-bs-toggle="tab" data-bs-target="#om_topay_tab" type="button" role="tab">For Payment</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark om_btn_load_to_receive" data-bs-toggle="tab" data-bs-target="#om_toreceive_tab" type="button" role="tab">To Deliver</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark om_btn_load_completed" data-bs-toggle="tab" data-bs-target="#om_complete_tab" type="button" role="tab">Completed</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="border border-top-0 p-3 tab-pane fade show active" style="min-height:20vh; max-height:75vh; overflow-y:auto" id="om_pending_tab" role="tabpanel" tabindex="0">
            </div>

            <div class="border border-top-0 p-3 tab-pane fade" style="min-height:20vh; max-height:75vh; overflow-y:auto" id="om_topay_tab" role="tabpanel" tabindex="0">
                <div class="card p-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h6>ORDER # : 858746</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-1">Pay</button>
                            <button class="btn btn-sm btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                    <table></table>
                </div>
                <div class="card p-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h6>ORDER # : 13146</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-1">Pay</button>
                            <button class="btn btn-sm btn-outline-danger">Cancel</button>
                        </div>
                    </div>
                    <table></table>
                </div>
            </div>

            <div class="border border-top-0 p-3 tab-pane fade" style="min-height:20vh; max-height:75vh; overflow-y:auto" id="om_toreceive_tab" role="tabpanel" tabindex="0">
                <div class="card p-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h6>ORDER # : 858746</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-1">Order Received</button>
                            <button class="btn btn-sm btn-outline-secondary">Track</button>
                        </div>
                    </div>
                    <table></table>
                </div>
                <div class="card p-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h6>ORDER # : 13146</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-1">Order Received</button>
                            <button class="btn btn-sm btn-outline-secondary">Track</button>
                        </div>
                    </div>
                    <table></table>
                </div>
            </div>

            <div class="border border-top-0 p-3 tab-pane fade" style="min-height:20vh; max-height:75vh; overflow-y:auto" id="om_complete_tab" role="tabpanel" tabindex="0">
                <div class="card p-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h6>ORDER # : 858746</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-1">View Details</button>
                        </div>
                    </div>
                    <table></table>
                </div>

                <div class="card p-2 mt-2">
                    <div class="d-flex justify-content-between">
                        <h6>ORDER # : 13146</h6>
                        <div class="d-flex">
                            <button class="btn btn-sm btn-outline-secondary me-1">View Details</button>
                        </div>
                    </div>
                    <table></table>
                </div>
            </div>
        </div>

        <!-- Modal add/edit product -->
        <div class="modal fade" id="md_pm_product_view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Maintenance</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab_product_information" type="button" role="tab">Information</button>
                            </li>

                            <li class="nav-item" id="btn_pm_gallery" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_product_gallery" type="button" role="tab">Gallery</button>
                            </li>

                            <li class="nav-item" id="btn_pm_variation" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab_product_variation" type="button" role="tab">Variations</button>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="border p-2 border-top-0 tab-pane fade show active" id="tab_product_information" role="tabpanel">

                                <label style="font-size:9pt;" class="mt-2">Product name</label>
                                <input type="text" class="form-control" id="pm_txt_product_name">

                                <label style="font-size:9pt;" class="mt-2">Description</label>
                                <textarea id="pm_txt_description" rows="5" class="form-control"></textarea>

                                <label style="font-size:9pt;" class="mt-2">Tag</label>
                                <select id="pm_sel_tag" class="form-select">
                                    <option value="bikes">Bikes</option>
                                    <option value="accessories">Accessories</option>
                                    <option value="components">Components</option>
                                </select>

                                <label style="font-size:9pt;" class="mt-2">Category</label>
                                <div class="d-flex gap-1">
                                    <select id="pm_sel_category" class="form-select">
                                        <option value=" "> </option>
                                    </select>
                                    <input type="text" id="pm_txt_category" class="form-control">
                                </div>
                                <div class="text-end text-muted category_sm" style="font-size:8pt;">If category is new type here</div>

                                <label style="font-size:9pt;" class="">Sub-Category</label>
                                <div class="d-flex gap-1">
                                    <select id="pm_sel_sub_category" class="form-select">
                                        <option value=" "> </option>
                                    </select>
                                    <input type="text" id="pm_txt_sub_category" class="form-control">
                                </div>
                                <div class="text-end text-muted category_sm" style="font-size:8pt;">If category is new type here</div>

                                <label style="font-size:9pt;" for="">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">₱</span>
                                    <input type="number" class="form-control" id="txt_pm_price">
                                </div>

                            </div>

                            <div class="border p-2 border-top-0 tab-pane" id="tab_product_gallery" role="tabpanel">

                                <table class="table" id="tbl_pm_product_imgs">
                                    <thead>
                                        <th>Path</th>
                                        <th></th>
                                        <th width="5%"></th>
                                    </thead>
                                    <tbody style="font-size:10pt;">

                                    </tbody>
                                </table>

                                <div class="alert rounded alert_no_img" style="background:#E8E8E9">No image yet</div>


                                <div class="text-end">
                                    <button class="btn btn-sm border rounded" id="btn_pm_upload_image">Add</button>
                                </div>

                            </div>

                            <div class="border p-2 border-top-0 tab-pane" id="tab_product_variation" role="tabpanel">

                                <table class="table" id="">
                                    <thead>
                                        <th>Path</th>
                                        <th></th>
                                        <th width="5%"></th>
                                    </thead>
                                    <tbody style="font-size:10pt;">

                                    </tbody>
                                </table>

                                <div class="alert rounded alert_no_img" style="background:#E8E8E9">No image yet</div>


                                <div class="text-end">
                                    <button class="btn btn-sm border rounded" id="btn_pm_upload_image">Add</button>
                                </div>

                            </div>

                        </div>

                        <div class="text-end mt-2" id="div_btn_add">
                            <button class="btn border rounded btn-primary btn-sm" data-bs-dismiss="modal" id="btn_pm_save">Save</button>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <!-- Modal add image -->
        <div class="modal fade" id="md_pm_product_upload_image" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload image</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="file" class="form-control" id="file_pm_image">
                        <div class="text-end mt-2" id="div_btn_add">
                            <button class="btn border rounded btn-primary btn-sm" data-bs-dismiss="modal" id="btn_pm_img_upload">Upload</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Accept Pending Order -->
        <div class="modal" tabindex="-1" id="md_om_accept_pending_order">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Accept Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Order No</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_order_no">

                        <label for="">Order Date</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_order_date">

                        <label for="">Order Items</label>
                        <div style="border:1px dashed rgba(0, 0, 0, 0.175);; border-radius:5px; max-height:250px; overflow-y:auto;" class="mb-2">
                            <table class="table table-borderless" id="mdom_tbl_order_items"></table>
                        </div>

                        <label for="">Customer Name</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_customer_name">

                        <label for="">Email</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_email">

                        <label for="">Mobile Number</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_mobileno">

                        <label for="">Address</label>
                        <textarea type="text" class="form-control mb-2" readonly id="mdom_txt_address"></textarea>

                        <label for="">Payment Method</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_paymentmode">

                        <label for="">Shipping Fee <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-2" id="mdom_txt_shipping_fee">

                        <div id="mdom_div_tracking_no" style="display:none;">
                            <label for="">Tracking No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" id="mdom_txt_tracking_no">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="om_btn_confirm_accept_pending_order">Confirm</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Preview Payment -->
        <div class="modal" tabindex="-1" id="md_om_view_payment">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Accept Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Reference No</label>
                        <input type="text" class="form-control mb-2" readonly id="mdom_txt_reference_no">

                        <label for="">Payment Proof</label>
                        <a id="mdom_a_payment_proof" target="_blank"><img id="mdom_img_payment_proof" style="border-radius:10px; width:100%; height:50%; object-fit:contain"></a>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_om_accept_payment">Confirm Payment</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Accept Payment -->
        <div class="modal" tabindex="-1" id="md_om_accept_payment">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirm Payment</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Did you receive the payment already?<br>This action is not reversible.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_om_btn_accept_payment_confirm">Payment Received</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- DELIVER ORDER -->
        <div class="modal" tabindex="-1" id="md_om_deliver_order">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Deliver Order</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Tracking No</label>
                        <input type="text" class="form-control mb-2" id="mdom_txt_del_tracking_no">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_om_btn_deliver_order">Deliver Order</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- CONFIRM MODAL -->
        <div class="modal fade" tabindex="-1" id="md_om_cancel_order">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cancel Customer Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Customer Email</label>
                        <input type="text" class="form-control mb-2" id="md_om_co_email" disabled>

                        <label for="">Reason</label>
                        <textarea name="" id="md_om_co_reason" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="md_om_cancel_order_btn_confirm">Confirm</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

<script src="src/pages/cashier/sections/orders/orders.js"></script>