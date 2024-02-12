<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../..//lib/phpmailer/src/Exception.php';
require '../..//lib/phpmailer/src/PHPMailer.php';
require '../..//lib/phpmailer/src/SMTP.php';

// MAG KIKEEP NG TRANSACTION(SESSION) KAHIT I RELOAD
session_start();



include_once __DIR__ . "/../database.php";

function generate_password()
{
    // SET OF CHARS
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // DITO MAISTORE
    $randomString = '';

    // LENGTH = 10
    for ($i = 0; $i < 10; $i++) {
        // random number
        $index = rand(0, strlen($characters) - 1);

        // iaaccess char variable para makabuo ng 10 chars random password
        $randomString .= $characters[$index];
    }

    return $randomString;
}


// INSTANTIATE
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
} else if ($option == "register_account") {

    $db = new Database();

    $q = "
            INSERT INTO 
                tbl_users(
                    username,
                    password,
                    user_type,
                    mobile_no,
                    email,
                    first_name,
                    last_name,
                    address
            )
            VALUES  
                (
                    :username,
                    :password,
                    :user_type,
                    :mobile_no,
                    :email,
                    :first_name,
                    :last_name,
                    :address

            )
    ";

    $d = [
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'user_type' => $_POST['user_type'],
        'mobile_no' => $_POST['mobile_no'],
        'email' => $_POST['email'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'address' => $_POST['address'],
    ];

    $db->update($q, $d);

    $q = 'SELECT id FROM tbl_users ORDER BY id DESC LIMIT 1';

    $id = $db->read($q)[0]['id'];

    send_email('Account Creation', 'Thank you for registering in JRSPEEDPH, <br>Click this link to start using JRSPEEDPH<br>jrspeed.com.ph/changepass.php?y=' . $id, $_POST['email']);
} else if ($option == "get_all_users") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_users
            WHERE
                is_archived = 0
            ORDER BY 
                id 
            DESC
        ';

    $res  = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_all_archived_users") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_users
            WHERE
                is_archived = 1
            ORDER BY 
                id 
            DESC
        ';

    $res  = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "add_admin_account") {

    $db = new Database();

    $q = '
            INSERT INTO
                tbl_users(
                    username, 
                    password, 
                    user_type, 
                    mobile_no, 
                    email, 
                    first_name, 
                    last_name, 
                    address
                ) 
            VALUES
                (
                    :username, 
                    :password, 
                    :user_type, 
                    :mobile_no, 
                    :email, 
                    :first_name, 
                    :last_name, 
                    :address 
                )
        ';

    $d = [
        'username' => $_POST['username'],
        'password' => generate_password(),
        'user_type' => 2,
        'mobile_no' => $_POST['mobile_no'],
        'email' => $_POST['email'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'address' => $_POST['address'],
    ];

    $db->update($q, $d);
} else if ($option == "archive_account") {

    $db = new Database();

    $q = '
            UPDATE 
                tbl_users
            SET
                is_archived = 1
            WHERE
                id = :id
        ';

    $d = [
        'id' => $_POST['id'],
    ];

    $db->update($q, $d);
} else if ($option == "unarchive_account") {

    $db = new Database();

    $q = '
            UPDATE 
                tbl_users
            SET
                is_archived = 0
            WHERE
                id = :id
        ';

    $d = [
        'id' => $_POST['id'],
    ];

    $db->update($q, $d);
} else if ($option == "check_if_email_exists") {
    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_users
            WHERE
                email = :email
        ';

    $d = [
        'email' => $payload_data['email'],
    ];

    $res  = $db->read($q, $d);

    if (empty($res)) {
        echo json_encode(
            [
                'status' => 200,
                'msg' => 'Get Success...',
                'data' => base64_encode(0)
            ]
        );
    } else {
        echo json_encode(
            [
                'status' => 200,
                'msg' => 'Get Success...',
                'data' => base64_encode(1)
            ]
        );
    }
} else if ($option == "check_if_username_exists") {
    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_users
            WHERE
                username = :username
        ';

    $d = [
        'username' => $payload_data['username'],
    ];

    $res  = $db->read($q, $d);

    if (empty($res)) {
        echo json_encode(
            [
                'status' => 200,
                'msg' => 'Get Success...',
                'data' => base64_encode(0)
            ]
        );
    } else {
        echo json_encode(
            [
                'status' => 200,
                'msg' => 'Get Success...',
                'data' => base64_encode(1)
            ]
        );
    }
} else if ($option == "update_account_information") {

    $db = new Database();

    $q = '
            UPDATE 
                tbl_users
            SET
                username = :username,
                email = :email,
                mobile_no = :mobile,
                first_name = :first_name,
                last_name = :last_name,
                address = :address
            WHERE
                id = :id
        ';

    $d = [
        'id' => $_POST['id'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'mobile' => $_POST['mobile'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'address' => $_POST['address'],
    ];

    $res = $db->update($q, $d);

    $q = '
        SELECT 
            username,
            mobile_no,
            email,
            first_name,
            last_name,
            address
        FROM
            tbl_users
        WHERE
            id = :id
    ';

    $d = [
        'id' => $_POST['id'],
    ];

    $res = $db->read($q, $d);

    echo json_encode($res);
} else if ($option == "change_password") {
    $q = '
        UPDATE
            tbl_users
        SET
            password = :password
        WHERE
            id = :id
    ';

    $d = [
        'id' => $_POST['i'],
        'password' => $_POST['password'],
    ];

    $res = $db->update($q, $d);
} else if ($option == "forgot_password") {

    $q = '
        SELECT 
            id,
            first_name
        FROM
            tbl_users
        WHERE
            email = :email
    ';

    $d = [
        'email' => $payload_data['email'],
    ];

    $user_id = $db->read($q, $d)[0]['id'];

    $subject = 'Account Recovery';
    $message = 'Hello ' . $db->read($q, $d)[0]['first_name'] . '<br><br><br>
    We received your account recovery request.<br><br>Kindly click this <a href ="jrspeed.com.ph/changepass.php?y=' . $user_id . '">link</a> 
    to reset your password.';
    send_email($subject, $message, $payload_data['email']);
}



function send_email($subject, $message, $email)
{
    $mailer = new PHPMailer(true);
    $mailer->isSMTP();
    $mailer->Host = 'mail.jrspeed.com.ph';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'noreply@jrspeed.com.ph';
    $mailer->Password = 'xQuZ^qHo}s#M';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 26;
    $mailer->setFrom('noreply@jrspeed.com.ph', 'JRSPEEDPH');
    $mailer->SMTPDebug = 2;
    $mailer->addAddress($email);
    $mailer->isHTML(true);
    $mailer->Subject = $subject;
    $mailer->Body = $message;

    $mailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mailer->send();
}
