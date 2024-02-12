<section class="d-none d-lg-block header">

    <div class="d-flex justify-content-between pt-4 pb-2 mx-auto" style="width:90%">

        <div class="d-flex align-items-center div_header_logo">
            <img src="src/img/jrspeed.png" style="height:40px; width:40px;" alt="missing img-company-logo" id="companyLogo">
            <h3 class="fw-bold text-light my-0">JRSPEED</h3>
        </div>

        <ul class="nav nav_school">
            <li class="nav-item list_dashboard" style="display:none" id="">
                <a class="nav-link  nav-link_lg text-light" id="btn_page_dashboard" goto="page_dashboard">DASHBOARD</a>
            </li>

            <li class="nav-item" id="list_home">
                <a class="nav-link  nav-link_lg text-light" goto="page_home">HOME</a>
            </li>

            <li class="nav-item dropdown ktm-mega-menu">
                <a class="nav-link  nav-link_lg text-light" data-bs-toggle="dropdown" style="pointer-events:none"> ACCESSORIES </a>
                <div class="dropdown-menu mega-menu p-3">
                    <div class="container-fluid">
                        <div class="row row-cols-lg-6" id="div_accessories"></div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown ktm-mega-menu">
                <a class="nav-link  nav-link_lg text-light " data-bs-toggle="dropdown" style="pointer-events:none"> BIKES </a>
                <div class="dropdown-menu mega-menu p-3">

                    <div class="container-fluid">
                        <div class="row row-cols-lg-6" id="div_bikes"></div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown ktm-mega-menu">
                <a class="nav-link  nav-link_lg text-light " data-bs-toggle="dropdown" style="pointer-events:none"> COMPONENTS </a>
                <div class="dropdown-menu mega-menu p-3">
                    <div class="container-fluid">
                        <div class="row row-cols-lg-6" id="div_components"></div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-link_lg text-light" goto="page_contact">CONTACT</a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-link_lg text-light" goto="page_faq">FAQ</a>
            </li>

          
        </ul>

        <div>
            <button class="btn text-light btn_my_account"  type="button" style=" display:none;"><i class="fa-solid fa-user-gear fa-fw"></i></button>
            <button class="btn text-light" id="btn_open_cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"><i class="fa-solid fa-bag-shopping fa-fw"></i></button>
            <button class="btn text-light btn_login"><i class="fa-solid fa-user fa-fw"></i></button>
            <button class="btn text-light btn_user_logout" id="" style="color:#000; display:none;" type="button"><i class="fa-solid fa-right-from-bracket"></i></button>
        </div>

    </div>


</section>

<section class="d-block d-lg-none d-flex justify-content-between ">

    <button class="btn" data-bs-target="#mobile_sidebar" data-bs-toggle="offcanvas"><i class="fa-solid fa-bars fa-fw"></i></button>

    <div>
        <button class="btn p-1 mt-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"><i class="fa-solid fa-bars fa-bag-shopping fa-fw"></i></button>
        <button class="btn p-1 mt-2  btn_login me-2"><i class="fa-solid fa-user fa-fw"></i></button>
        <button class="btn p-1 mt-2  btn_my_account me-2" type="button" style=" display:none;"><i class="fa-solid fa-user-gear fa-fw"></i></button>

    </div>

</section>


<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasScrollingLabel"><i class="fa-solid fa-bag-shopping"></i> Shop Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <table class="table" id="tbl_shop_cart">
            <thead style="font-size:9pt">
                <th>Item</th>
                <th class="text-center" width="30%">Quantity</th>
                <th width="18%" class="text-end">Price</th>
                <th width="18%" class="text-end">Total</th>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="text-end">
            <p><span class="fw-bold">Subtotal :</span> <span class=" text-start" id="cart_subtotal_price">₱3.99</span></p>
            <button class="btn btn-primary btn-sm" id="btn_checkout" data-bs-dismiss="offcanvas" style="width:100px">Check Out</button>
        </div>

    </div>
</div>


<div class="offcanvas offcanvas-start" style="width:95%" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="mobile_sidebar">
    <div class="offcanvas-header bg-dark">
        <div class="d-flex align-items-center div_header_logo">
            <img src="src/img/jrspeed.png" style="height:40px; width:40px;" alt="missing img-company-logo" id="companyLogo">
            <h3 class="fw-bold text-light my-0">JRSPEED</h3>
        </div>
        <button type="button" data-bs-dismiss="offcanvas" class="btn text-light"><i class="fa-solid fa-bars"></i></button>
    </div>
    <div class="offcanvas-body">



        <ul class="nav" style="display:block">
            <li class="nav-item list_dashboard" style="display:none">
                <a class="nav-link" goto="page_dashboard">DASHBOARD</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" goto="page_home">HOME</a>
            </li>

            <li class="nav-item dropdown ktm-mega-menu">
                <a class="nav-link" data-bs-toggle="collapse" href="#mb_categories_accessories"> ACCESSORIES </a>
                <div class="collapse ps-4" id="mb_categories_accessories">
                    <ul class="nav" style="display:block;" id="category">
                        <li class="nav-item text-dark">
                            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#col_subcategory"> Category 1 </a>
                            <div class="collapse ps-4" id="col_subcategory">
                                <ul class="nav" style="display:block;" id="subcategory">
                                    <li class="nav-link  text-dark">Sub Category</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link  text-dark">qwe</li>
                    </ul>
                </div>
            </li>

            <li class="nav-item dropdown ktm-mega-menu">
                <a class="nav-link " data-bs-toggle="collapse" href="#mb_categories_bikes"> BIKES </a>
                <div class="collapse ps-4" id="mb_categories_bikes">
                    <ul class="nav" style="display:block;" id="category">
                        <li class="nav-item text-dark">
                            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#col_subcategory"> Category 1 </a>
                            <div class="collapse ps-4" id="col_subcategory">
                                <ul class="nav" style="display:block;" id="subcategory">
                                    <li class="nav-link  text-dark">Sub Category</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link  text-dark">qwe</li>
                    </ul>
                </div>
            </li>

            <li class="nav-item dropdown ktm-mega-menu">
                <a class="nav-link " data-bs-toggle="collapse" href="#mb_categories_components"> COMPONENTS </a>
                <div class="collapse ps-4" id="mb_categories_components">
                    <ul class="nav" style="display:block;" id="category">
                        <li class="nav-item text-dark">
                            <a class="nav-link text-dark" data-bs-toggle="collapse" href="#col_subcategory"> Category 1 </a>
                            <div class="collapse ps-4" id="col_subcategory">
                                <ul class="nav" style="display:block;" id="subcategory">
                                    <li class="nav-link  text-dark">Sub Category</li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link  text-dark">qwe</li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" goto="page_contact">CONTACT</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" goto="page_faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn_user_logout" id="header_mb_logout" style="display:none">LOGOUT</a>
            </li>
        </ul>


    </div>
</div>



<script src="src/pages/user/page_component/headers/header.js"></script>