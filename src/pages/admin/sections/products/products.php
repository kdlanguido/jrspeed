<!-- PRODUCTS Maintenance -->
<div class="row page" id="page_product_maintenance">

    <div class="col p-2  mt-3">

        <div class="page_cp_header">

            <p class="lead" id="p__pm_title">Product Maintenance</p>

        </div>

        <div class="page_cp_content mt-1 pt-2 border-top px-0">

            <div class="row">

                <div class="col d-flex justify-content-end">
                    <input type="text" class="form-control form-control-sm" placeholder="Search..." style="width:230px" id="cp_bikelist_search">
                </div>

            </div>

            <table class="table mt-3" id="cp_tbl_productlist">
                <thead>
                    <tr style="font-size:10pt">
                        <th class="text-center ps-0" width="3%">No</th>
                        <th width="20%">Product Name</th>
                        <th class="text-center" width="10%">Tag</th>
                        <th class="text-center" width="13%">Category</th>
                        <th class="text-center" width="13%">Sub-Category</th>
                        <th class="text-center" width="13%">Price</th>
                        <th class="text-center" width="5%"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <table class="table mt-3" id="cp_tbl_productlist_archived" style="display:none">
                <thead>
                    <tr style="font-size:10pt">
                        <th class="text-center ps-0" width="3%">No</th>
                        <th width="20%">Product Name</th>
                        <th class="text-center" width="10%">Tag</th>
                        <th class="text-center" width="13%">Category</th>
                        <th class="text-center" width="13%">Sub-Category</th>
                        <th class="text-center" width="13%">Price</th>
                        <th class="text-center" width="5%"></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="text-end">
                <button class="btn btn-primary btn-sm" id="btn_pm_add"><i class="fa-solid fa-file-circle-plus"></i> Add</button>
                <button class="btn btn-secondary btn-sm" id="btn__products_view_archive">Archive</button>
                <button class="btn btn-secondary btn-sm" id="btn__products_hide_archive" style="display:none">Back</button>
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

                        </ul>

                        <div class="tab-content">
                            <div class="border p-2 border-top-0 tab-pane fade show active div__product_maintenance" id="tab_product_information" role="tabpanel">

                                <label style="font-size:9pt;" class="mt-2">Product name</label>
                                <input type="text" class="form-control _required _required_string" id="pm_txt_product_name">

                                <label style="font-size:9pt;" class="mt-2">Description</label>
                                <textarea id="pm_txt_description" rows="5" class="form-control _required _required_string"></textarea>

                                <label style="font-size:9pt;" class="mt-2">Tag</label>
                                <select id="pm_sel_tag" class="form-select _required _required_string">
                                    <option value="bikes">Bikes</option>
                                    <option value="accessories">Accessories</option>
                                    <option value="components">Components</option>
                                </select>

                                <label style="font-size:9pt;" class="mt-2">Category</label>
                                <div class="d-flex gap-1">
                                    <select id="pm_sel_category" class="form-select _required _required_string_related">
                                        <option value=" "> </option>
                                    </select>
                                    <input type="text" id="pm_txt_category" class="form-control _required _required_string_related">
                                </div>
                                <div class="text-end text-muted category_sm" style="font-size:8pt;">If category is new type here</div>

                                <label style="font-size:9pt;" class="">Sub-Category</label>
                                <div class="d-flex gap-1">
                                    <select id="pm_sel_sub_category _required _required_string_related" class="form-select">
                                        <option value=" "> </option>
                                    </select>
                                    <input type="text" id="pm_txt_sub_category" class="form-control _required _required_string_related">
                                </div>
                                <div class="text-end text-muted category_sm" style="font-size:8pt;">If category is new type here</div>

                                <label style="font-size:9pt;" for="">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">₱</span>
                                    <input type="number" class="form-control _required _required_string" id="txt_pm_price">
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="txt_pm_is_featured">
                                    <label class="form-check-label" for="txt_pm_is_featured">
                                        Featured Item
                                    </label>
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

        <!-- RECEIVED ORDER CONFIRM -->
        <div class="modal" tabindex="-1" id="h_md_delete_product_confirm">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_confirm_delete_product">Confirm</button>
                    </div>
                </div>
            </div>
        </div>



    </div>

</div>

<script src="src/pages/admin/sections/products/products.js"></script>