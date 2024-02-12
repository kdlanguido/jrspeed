<?php
session_start();

include_once __DIR__ . "/../models/clubs_model.php";
include_once __DIR__ . "/../database.php";

function generate_password()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < 10; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}



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
} else if ($option == "add_faq") {

    $db = new Database();

    $q = "
            INSERT INTO 
                tbl_faq(
                    question,
                    answer
                )
            VALUES(
                    :question,
                    :answer
                )
    ";

    $d = [
        'question' => $_POST['question'],
        'answer' => $_POST['answer']
    ];

    $db->update($q, $d);
} else if ($option == "update_faq") {

    $db = new Database();

    $q = "
            UPDATE
                tbl_faq
            SET
                question=:question,
                answer=:answer
            WHERE
                id = :id
    ";

    $d = [
        'question' => $_POST['question'],
        'answer' => $_POST['answer'],
        'id' => $_POST['id']
    ];

    $db->update($q, $d);
} else if ($option == "delete_faq") {

    $db = new Database();

    $q = "
            DELETE FROM
                tbl_faq
            WHERE
                id = :id
    ";

    $d = [
        'id' => $_POST['id']
    ];

    $db->update($q, $d);
} else if ($option == "get_faq") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_faq
        ';

    $res  = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "add_feedback") {

    $db = new Database();

    $q = "
            INSERT INTO 
                customer_feedback(
                    name,
                    email,
                    subject,
                    message
                )
            VALUES  
                (
                    :name,
                    :email,
                    :subject,
                    :message
                )
    ";

    $d = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'subject' => $_POST['subject'],
        'message' => $_POST['message']
    ];

    $db->update($q, $d);
} else if ($option == "get_feedbacks") {

    $db = new Database();

    $q = '
            SELECT 
                *
            FROM
                customer_feedback
            ORDER BY
                id
            DESC
        ';

    $res = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}
