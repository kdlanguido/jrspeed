<?php
// PAG NAGRELOAD MAKEEP YUNG SESSION/TRANSACTION
session_start();


if (!array_key_exists('sesh_authorized', $_SESSION) || $_SESSION['sesh_authorized'] == 0) {
    $_SESSION['sesh_authorized'] = 0;
    $_SESSION['sesh_access_level'] = 1;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRSpeed PH</title>
    <link rel="stylesheet" href="src/lib/bootstrap/bs5/bs.css">
    <link rel="stylesheet" href="src/lib/fontawesome/css/all.css">
    <link rel="shortcut icon" type="image/jpg" href="src/img/favicon.ico"/>
    <?php


    echo ' 
        <link rel="stylesheet" href="src/pages/user/user_landing_style.css">
        <link rel="stylesheet" href="src/pages/user/page_component/headers/header.css">
        <link rel="stylesheet" href="src/pages/user/sections/home/home.css">
        <link rel="stylesheet" href="src/pages/admin/control_panel/control_panel.css">
        <link rel="stylesheet" href="src/pages/admin/page_component/headers/header.css">
        <link rel="stylesheet" href="src/pages/cashier/control_panel/control_panel.css">
    ';

    ?>

    <style>
        body {
            overflow-x: hidden
        }
    </style>

</head>

<body>

    <input type="hidden" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" id="txt_ip_address">

    <!--TOAST OUTPUT-->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1100">
        <div id="misc_toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fa-solid toast_icon fa-circle-info me-2 fa-lg pt-1 d-none" id="toast_icon_information" style="color:#1A73E8"></i>
                <i class="fa-solid toast_icon fa-circle-exclamation me-2 fa-lg pt-1 d-none" id="toast_icon_error" style="color:#E63F31"></i>
                <i class="fa-solid toast_icon fa-circle-exclamation me-2 fa-lg pt-1 d-none" id="toast_icon_warning" style="color:#FAC427"></i>
                <strong class="me-auto text-black" id="toast_title"></strong>
                <small>Just Now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-dark " id="toast_body"></div>
        </div>
    </div>

    <script src="src/lib/bootstrap/bs5/bs.js"></script>
    <script src="src/lib/jquery/jquery-3.7.0.js"></script>
    <script src="src/lib/jquery/jqueryui-1.13.2.js"></script>
    <script src="src/lib/fontawesome/js/all.js"></script>
    <script src="src/lib/chartjs/chartjs.js"></script>
    <script src="src/func/system.js"></script>
    <script>
        function ctb(string) {
            navigator.clipboard.writeText(string);
        }
    </script>

    <!--CHECK IF USER IS ADMIN OR USER-->
    <?php

    if ($_SESSION['sesh_access_level'] == 1) {
        include 'src/pages/user/landing_page.php';
    } else if ($_SESSION['sesh_access_level'] == 3) {
        include 'src/pages/cashier/control_panel/control_panel.php';
    } else {
        include 'src/pages/admin/control_panel/control_panel.php';
    }
    ?>

</body>

</html>