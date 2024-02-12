<div class="landing_page" style="display:none">

    <?php


    if ($_SESSION['sesh_access_level'] == 1) {
        include 'src/pages/user/page_component/headers/header.php';
        include 'src/pages/user/sections/home/home.php';
        include 'src/pages/user/sections/shop/shop.php';
    }
    // else if ($_SESSION['sesh_access_level'] == 2) {
    //     include 'src/pages/admin/page_component/headers/header.php';
    //     include 'src/pages/admin/control_panel/control_panel.php';
    // }


    include 'src/auth/login.php';

    ?>




    <script src="src/pages/user/landing_page.js"></script>
</div>