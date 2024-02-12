<?php
session_start();

include_once __DIR__ . "/../database.php";

$db = new Database();

$option = false;

if ($_GET) {
    $option = $db->VALIDATE_GET_REQUEST($_GET);
    $payload_data = $db->COLLECT_PAYLOAD($_GET);
} else if (isset($_POST)) {
    $option = $_POST['request_type'];
}

if (!$option) {
    echo json_encode(
        [
            'status' => 400,
            'msg' => 'Bad request.',
            'data' => []
        ]
    );
    exit;
} else if ($option == "login") {
    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_users
            WHERE
               ( username = :username OR email = :email)
            AND
                password = :password
        ';

    $d = [
        "username" => $payload_data['username'],
        "email" => $payload_data['username'],
        "password" => $payload_data['password']
    ];
    
    $res = $db->read($q, $d);


    if (empty($res)) {
        echo json_encode(
            [
                'status' => 403,
                'msg' => 'invalid username/password',
                'data' => []
            ]
        );
        $_SESSION['sesh_authorized'] = 0;
        $_SESSION['sesh_access_level'] = 1;
    } else {

        $_SESSION['id'] = $res[0]['id'];
        $_SESSION['sesh_access_level'] = $res[0]['user_type'];
        $_SESSION['sesh_authorized'] = 1;

        echo json_encode(
            [
                'status' => 200,
                'msg' => 'login success',
                'data' => base64_encode(json_encode($res))
            ]
        );
    }
} else if ($option == "logout") {

    session_destroy();
    session_start();
    $_SESSION['sesh_authorized'] = 0;
    $_SESSION['sesh_access_level'] = 1;
}
