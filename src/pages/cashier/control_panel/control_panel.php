<?php

include 'src/pages/cashier/page_component/headers/header.php';

?>

<!-- PANE cashier -->
<section id="page_cashier_cp" class="mx-0 px-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <ul id="sidebar_cashier">

                    <li class="mb-2 ms-3">
                        <small class="text-secondary">MONITORING</small>
                        <ul class="sidenav-list ms-0 ps-1">
                            <li class="mb-1 sidebar_btn" goto="page_orders">
                                <a class="text-dark ms-1 active">
                                    <i class="fa-solid fa-sack-dollar fa-fw fa-sm pe-1"></i>
                                    Orders Monitoring
                                </a>
                            </li>
                            <li class="mb-1 sidebar_btn" goto="page_stocks">
                                <a class="text-dark ms-1">
                                    <i class="fa-solid fa-cart-flatbed fa-fw fa-sm pe-1"></i></i>
                                    Stocks Monitoring
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="mb-1 ms-3">
                        <small class="text-secondary">SYSTEM</small>
                        <ul class="sidenav-list ms-0 ps-1">

                            <li class="mb-1">
                                <a class="text-dark ms-1 btn_logout">
                                    <i class="fa-solid fa-arrow-right-from-bracket fa-fw fa-sm pe-1"></i>
                                    Logout
                                </a>
                            </li>

                        </ul>
                    </li>



                </ul>
            </div>
            <div class="col">

                <?php
                include 'src/pages/cashier/sections/orders/orders.php';
                include 'src/pages/cashier/sections/stocks/stocks.php';
                ?>



            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_vw_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="col">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control mb-2" id="vwp_name" readonly>

                                    <label for="">Type</label>
                                    <input type="text" class="form-control mb-2" id="vwp_type" readonly>

                                    <label for="">Price</label>
                                    <input type="text" class="form-control mb-2" id="vwp_price" readonly>

                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control mb-2" id="vwp_description" rows="3" readonly></textarea>
                                </div>

                                <div class="col-6 align-middle">
                                    <img width="100%" class="mt-3" id="vwp_img">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_ed_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Product Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="col">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control mb-2" id="edp_name">

                                    <label for="">Type</label>
                                    <select name="" id="edp_type" class="form-select  mb-2"> </select>

                                    <label for="">Price</label>
                                    <input type="text" class="form-control mb-2" id="edp_price">

                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control mb-2" id="edp_description" rows="8"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_goto_more_info">More Information</button>
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_edp_save">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_add_product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                    <label for="">Name</label>
                                    <input type="text" class="form-control mb-2" id="apd_name">

                                    <label for="">Type</label>
                                    <select name="" id="apd_type" class="form-select  mb-2">
                                        <option value="BIKE">BIKE</option>
                                        <option value="ACCESORY">ACCESORY</option>
                                    </select>

                                    <label for="">Price</label>
                                    <input type="text" class="form-control mb-2" id="apd_price">

                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control mb-2" id="apd_description" rows="3"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_cp_save_product">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_add_stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="col">
                                    <label for="">Product</label>
                                    <select name="" id="stock_product_id" class="form-select mb-2"></select>

                                    <label for="">Stock Count</label>
                                    <input type="text" class="form-control mb-2" id="edp_stock_count">

                                    <label for="">LSI</label>
                                    <input type="text" class="form-control mb-2" id="edp_lsi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" id="btn_sm_add" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_edit_stock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Stock</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="col">
                                    <label for="">Product</label>
                                    <select name="" id="esm_product_id" class="form-select mb-2"></select>

                                    <label for="">Stock Count</label>
                                    <input type="text" class="form-control mb-2" id="esm_stock_count">

                                    <label for="">LSI</label>
                                    <input type="text" class="form-control mb-2" id="esm_lsi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" id="btn_sm_edit" data-bs-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_vw_transaction_detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Detail</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">

                                <div class="col">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control mb-2" id="vwp_name" readonly>

                                    <label for="">Type</label>
                                    <input type="text" class="form-control mb-2" id="vwp_type" readonly>

                                    <label for="">Price</label>
                                    <input type="text" class="form-control mb-2" id="vwp_price" readonly>

                                    <label for="">Description</label>
                                    <textarea type="text" class="form-control mb-2" id="vwp_description" rows="3" readonly></textarea>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_generate_report" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Generate Sales Report</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <div class="row">
                                <div class="col">
                                    <label for="">Date From</label>
                                    <input type="date" value="2023-04-01" class="form-control mb-2" id="vwp_name" readonly>

                                    <label for="">Date To</label>
                                    <input type="date" value="2023-04-01" class="form-control mb-2" id="vwp_type" readonly>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm">Generate</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_add_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control mb-2" id="cp_aa_user">

                                    <label for="">Password</label>
                                    <input type="text" class="form-control mb-2" id="cp_aa_pass">

                                    <label for="">Position</label>
                                    <select name="" id="cp_aa_position" class="form-select mb-2">
                                        <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                        <option value="CASHIER">CASHIER</option>
                                        <option value="CUSTOMER">CUSTOMER</option>
                                    </select>

                                    <label for="">Email</label>
                                    <input type="text" class="form-control mb-2" id="cp_aa_email">

                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control mb-2" id="cp_aa_contact">

                                    <label for="">First Name</label>
                                    <input type="text" class="form-control mb-2" id="cp_aa_fname">

                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control mb-2" id="cp_aa_lname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_aa_save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_update_account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Account</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_user">

                                    <label for="">Password</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_pass">

                                    <label for="">Position</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_position">

                                    <label for="">Email</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_email">

                                    <label for="">Mobile</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_contact">

                                    <label for="">First Name</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_fname">

                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control mb-2" id="cp_ua_lname">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="btn_ua_save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_add_faq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add FAQ</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="">Question</label>
                                    <input type="text" class="form-control mb-2" id="afaq_question">

                                    <label for="">Answer</label>
                                    <!-- <input type="text" class="form-control mb-2" id="afaq_answer"> -->
                                    <textarea name="" id="afaq_answer" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="cp_afaq_save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_edit_faq" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit FAQ</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="">Question</label>
                                    <input type="text" class="form-control mb-2" id="efaq_question">

                                    <label for="">Answer</label>
                                    <textarea name="" id="efaq_answer" cols="30" rows="10" class="form-control form-control-sm"></textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="cp_efaq_save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_add_dm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Delivery Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="">City</label>
                                    <input type="text" class="form-control mb-2" id="adm_city">

                                    <label for="">Fee</label>
                                    <input type="text" class="form-control mb-2" id="adm_fee">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="cp_adm_save">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade text-dark" id="cp_md_edit_dm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Delivery Details</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="">City</label>
                                    <input type="text" class="form-control mb-2" id="edm_city">

                                    <label for="">Fee</label>
                                    <input type="text" class="form-control mb-2" id="edm_fee">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-sm" data-bs-dismiss="modal" id="cp_edm_save">Save</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<script src="src/pages/admin/control_panel/control_panel.js"></script>
<!-- <script src="src/func/all.js"></script> -->

<!-- <script src="src/func/admin.js"></script> -->