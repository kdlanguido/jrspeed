

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../..//lib/phpmailer/src/Exception.php';
require '../..//lib/phpmailer/src/PHPMailer.php';
require '../..//lib/phpmailer/src/SMTP.php';


session_start();
ini_set('display_errors', 1);

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
} else if ($option == "add_to_cart") {

    $db = new Database();

    $q = '
        SELECT 
            *
        FROM
            tbl_stocks
        WHERE
            product_id = :product_id
    ';

    $d = [
        "product_id" => $_POST['product_id'],
    ];

    $stocks = $db->read($q, $d)[0];

    $q = '
        SELECT 
            *
        FROM
            tbl_cart
        WHERE
            user_info = :user_info
        AND
            status = "PENDING"
    ';

    $d = [
        "user_info" => $_POST['user_info'],
    ];

    $res = $db->read($q, $d);

    // IF NO CART FOUND
    if (empty($res)) {

        $order_no = 'ORD.' . date('Ymd') . rand(111111, 999999);

        $q = '
            INSERT INTO 
                tbl_cart(
                    order_no,
                    user_info
                )
            VALUES
                (
                    :order_no,
                    :user_info
                )
        ';

        $d = [
            'order_no' => $order_no,
            'user_info' => $_POST['user_info']
        ];

        $res = $db->update($q, $d);

        if ($stocks['stock_count'] >= $_POST['qty']) {

            $q = '
                INSERT INTO 
                    tbl_cart_items(
                        order_no,
                        product_id,
                        qty
                    )
                VALUES
                    (
                        :order_no,
                        :product_id,
                        :qty
                    )
            ';

            $d = [
                'order_no' => $order_no,
                'product_id' => $_POST['product_id'],
                'qty' => $_POST['qty']
            ];

            $res = $db->update($q, $d);

            echo $res;
        } else {
            echo 0;
        }
    }
    // IF THERES EXISTING CART
    else {

        $q = '
            SELECT 
                qty
            FROM
                tbl_cart_items
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';

        $d = [
            "order_no" => $res[0]['order_no'],
            "product_id" => $_POST['product_id'],
        ];

        $current_qty = $db->read($q, $d);

        if (!empty($current_qty)) {
            $current_qty = $current_qty[0]['qty'];

            $new_qty = $_POST['qty'] + $current_qty;

            if ($stocks['stock_count'] >= $new_qty) {

                $order_no = $res[0]['order_no'];

                $q = '
                    UPDATE 
                        tbl_cart_items
                    SET
                        qty =:qty
                    WHERE
                        order_no = :order_no
                    AND
                        product_id = :product_id
                ';


                $d = [
                    'order_no' => $order_no,
                    'product_id' => $_POST['product_id'],
                    'qty' => $new_qty
                ];

                $res = $db->update($q, $d);

                echo $res;
            } else {
                echo 0;
            }
        } else {
            if ($stocks['stock_count'] >= $_POST['qty']) {

                $order_no = $res[0]['order_no'];

                $q = '
                    INSERT INTO 
                        tbl_cart_items(
                            order_no,
                            product_id,
                            qty
                        )
                    VALUES
                        (
                            :order_no,
                            :product_id,
                            :qty
                        )
                ';

                $d = [
                    'order_no' => $order_no,
                    'product_id' => $_POST['product_id'],
                    'qty' => $_POST['qty']
                ];

                $res = $db->update($q, $d);

                echo $res;
            } else {
                echo 0;
            }
        }
    }
} else if ($option == "load_cart") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_cart
            WHERE
                user_info = :user_info
            AND
                status = "PENDING"
        ';


    $d = [
        "user_info" => $payload_data['user_info']
    ];

    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        $q = '
            SELECT 
                *
            FROM
                tbl_cart_items A
            LEFT JOIN
                tbl_products B
            ON
                A.product_id = B.id
            WHERE
                order_no = :order_no
        ';

        $d = [
            "order_no" => $res[0]['order_no']
        ];

        $data = $db->read($q, $d);

        if (empty($data)) {
            $db->err_msg_empty();
        } else {
            echo $db->suc_msg_get($data);
        }
    }
} else if ($option == "dec_qty_cart") {

    $db = new Database();

    $q = '
            SELECT 
               qty
            FROM
                tbl_cart_items
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';

    $d = [
        "order_no" => $_POST['order_no'],
        "product_id" => $_POST['product_id']
    ];

    $res = $db->read($q, $d);

    $qty = $res[0]['qty'];

    $qty--;

    if ($qty <= 0) {
        $q = '
            DELETE FROM
                tbl_cart_items
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';
    } else {
        $q = '
            UPDATE
                tbl_cart_items
            SET 
                qty = :qty
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';

        $d = [
            "order_no" => $_POST['order_no'],
            "product_id" => $_POST['product_id'],
            "qty" => $qty,
        ];
    }

    $f = $db->update($q, $d);
} else if ($option == "inc_qty_cart") {

    $db = new Database();

    $q = '
        SELECT 
            *
        FROM
            tbl_stocks
        WHERE
            product_id = :product_id
    ';

    $d = [
        "product_id" => $_POST['product_id'],
    ];

    $stocks = $db->read($q, $d)[0];

    $q = '
            SELECT 
               qty
            FROM
                tbl_cart_items
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';

    $d = [
        "order_no" => $_POST['order_no'],
        "product_id" => $_POST['product_id']
    ];

    $res = $db->read($q, $d);

    $qty = $res[0]['qty'];

    $qty++;

    if ($stocks['stock_count'] >= $qty) {
        $q = '
            UPDATE
                tbl_cart_items
            SET 
                qty = :qty
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';

        $d = [
            "order_no" => $_POST['order_no'],
            "product_id" => $_POST['product_id'],
            "qty" => $qty,
        ];
        $f = $db->update($q, $d);
        echo $f;
    } else {
        echo 0;
    }



    // if ($qty == 0) {
    //     $q = '
    //         DELETE FROM
    //             tbl_cart_items
    //         WHERE
    //             order_no = :order_no
    //         AND
    //             product_id = :product_id
    //     ';
    //     $f = $db->update($q, $d);
    // } else {
    //     if ($stocks['stock_count'] >= $qty) {
    //         $q = '
    //         UPDATE
    //             tbl_cart_items
    //         SET 
    //             qty = :qty
    //         WHERE
    //             order_no = :order_no
    //         AND
    //             product_id = :product_id
    //     ';

    //         $d = [
    //             "order_no" => $_POST['order_no'],
    //             "product_id" => $_POST['product_id'],
    //             "qty" => $qty,
    //         ];
    //         $f = $db->update($q, $d);
    //         echo $f;
    //     } else {
    //         echo 0;
    //     }
    // }
} else if ($option == "enter_qty_cart") {

    $db = new Database();

    $q = '
        SELECT 
            *
        FROM
            tbl_stocks
        WHERE
            product_id = :product_id
    ';

    $d = [
        "product_id" => $_POST['product_id'],
    ];

    $stocks = $db->read($q, $d)[0];

    if ($_POST['qty'] <= 0) {
        $q = '
            DELETE FROM
                tbl_cart_items
            WHERE
                order_no = :order_no
            AND
                product_id = :product_id
        ';
        $d = [
            "order_no" => $_POST['order_no'],
            "product_id" => $_POST['product_id']
        ];
        $f = $db->update($q, $d);
        echo $f;
    } else {
        if ($stocks['stock_count'] >= $_POST['qty']) {
            $q = '
                UPDATE
                    tbl_cart_items
                SET 
                    qty = :qty
                WHERE
                    order_no = :order_no
                AND
                    product_id = :product_id
            ';

            $d = [
                "order_no" => $_POST['order_no'],
                "product_id" => $_POST['product_id'],
                "qty" => $_POST['qty'],
            ];
            $f = $db->update($q, $d);
            echo $f;
        } else {
            echo 0;
        }
    }
} else if ($option == "confirm_checkout") {

    $db = new Database();

    // CHECK EMAIL IF USER EXISTS | GET USER ID
    $get_uid_q = '
        SELECT
            id
        FROM
            tbl_users
        WHERE
            email = :email
    ';

    $d_email = [
        "email" => $_POST['email']
    ];

    $user_information = $db->read($get_uid_q, $d_email);

    if (empty($user_information)) {
        $q = '
            INSERT INTO
                tbl_users(
                    email,
                    password,
                    mobile_no,
                    first_name,
                    last_name,
                    address
                )
            VALUES(
                :email,
                :password,
                :mobile_no,
                :first_name,
                :last_name,
                :address
            )
        ';

        $d = [
            "email" => $_POST['email'],
            "password" => generate_password(),
            "mobile_no" => $_POST['mobile_no'],
            "first_name" => $_POST['first_name'],
            "last_name" => $_POST['last_name'],
            "address" => $_POST['address'],
        ];

        $db->update($q, $d);

        $user_information = $db->read($get_uid_q, $d_email);
        $user_id =  $user_information[0]['id'];

        $link = ' http://localhost/jrspeed/changepass.php?y=';

        $subject = 'Account Creation';
        $message = '
        Hello ' . $_POST['first_name'] . ',<br>
        Your account has been created.
        <br><br>
        Username : <b>' . $_POST['email'] . '</b><br>
        <br><br>
        Kindly click this link to change password<br><br>
        ' . $link . $user_id . '

        <br><br>
Thank you for shopping with JRSpeed
        ';

        send_email($subject, $message, $_POST['email']);

        // COMPOSE EMAIL FOR NEW ACCOUNT CREATION..
        //** THANK YOU FOR USING JRSPEED WEBSITE YOUR USERNAME IS : @email AND PASSWORD IS gx5nNQJQuT */
    } else {
        // COMPOSE EMAIL FOR ACCOUNT VERIFICATION..

    }

    $user_id =  $user_information[0]['id'];

    // COLLECT CART ITEMS
    $q = '
        SELECT 
            *
        FROM
            tbl_cart_items
        WHERE
            order_no = :order_no
    ';

    $d = [
        "order_no" => $_POST['order_no']
    ];

    $cart_items = $db->read($q, $d);

    // CREATE ORDER
    $q = '
        INSERT INTO
            tbl_orders(
                order_no,
                user_id
            )
        VALUES
            (
                :order_no,
                :user_id
            )
    ';

    $d = [
        "order_no" => $_POST['order_no'],
        "user_id" => $user_id,
    ];

    $db->update($q, $d);

    // ADD ITEMS TO ORDER
    $q = '
        INSERT INTO
            tbl_order_items(
                order_no,
                product_id,
                qty
            )
        VALUES
            (
                :order_no,
                :product_id,
                :qty
            )
    ';

    foreach ($cart_items as $key => $value) {

        $d = [
            "order_no" => $_POST['order_no'],
            "product_id" => $value['product_id'],
            "qty" => $value['qty']
        ];

        $db->update($q, $d);
    }

    // CREATE PAYMENT INFORMATION 
    $q = '
        INSERT INTO
            tbl_order_payment(
                order_no,
                payment_method
            )
        VALUES
            (
                :order_no,
                :payment_method
            )
    ';

    $d = [
        "order_no" => $_POST['order_no'],
        "payment_method" => $_POST['payment_mode']
    ];

    $x = $db->update($q, $d);


    // SET CART STATUS ORDERED
    $q = '
        UPDATE
            tbl_cart
        SET
            status  = "COMPLETED"
        WHERE
            order_no = :order_no
    ';

    $d = [
        "order_no" => $_POST['order_no']
    ];

    $db->update($q, $d);
} else if ($option == "load_order") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_cart
            WHERE
                user_info = :user_info
            AND
                status = "PENDING"
        ';


    $d = [
        "user_info" => $payload_data['user_info']
    ];

    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        $q = '
            SELECT 
                *
            FROM
                tbl_cart_items A
            LEFT JOIN
                tbl_products B
            ON
                A.product_id = B.id
            WHERE
                order_no = :order_no
        ';

        $d = [
            "order_no" => $res[0]['order_no']
        ];

        $data = $db->read($q, $d);

        if (empty($data)) {
            $db->err_msg_empty();
        } else {
            echo $db->suc_msg_get($data);
        }
    }
} else if ($option == "get_orders") {

    $db = new Database();

    $order_information = [];

    $q = '
            SELECT 
               *
            FROM
                tbl_orders
            WHERE
                user_id = :user_id
            ORDER BY 
                id 
            DESC
        ';


    $d = [
        "user_id" => $payload_data['user_id']
    ];

    $order_information  = $db->read($q, $d);

    if (empty($order_information)) {
        $db->err_msg_empty();
    } else {
        $data_temp = [];

        $q = '
            SELECT 
                *,
                (
                    SELECT
                        dir
                    FROM
                        tbl_product_img
                    WHERE
                        product_id = A.product_id
                    AND
                        type = 1
                ) as img
            FROM
                tbl_order_items A
            LEFT JOIN
                tbl_products B
            ON
                A.product_id = B.id
            WHERE
                order_no = :order_no
        ';

        $q_payment = '
            SELECT
                *
            FROM
                tbl_order_payment
            WHERE
                order_no = :order_no
        
        ';

        foreach ($order_information as $key => $value) {

            $d = [
                "order_no" => $value['order_no']
            ];

            $order_items = $db->read($q, $d);
            $order_payments = $db->read($q_payment, $d);

            array_push($data_temp, ['order_information' =>  $value, 'order_items' => $order_items, 'order_payment_information' => $order_payments]);
        }

        if (empty($data_temp)) {
            $db->err_msg_empty();
        } else {
            echo $db->suc_msg_get($data_temp);
        }
    }
} else if ($option == "cancel_order") {

    $db = new Database();

    $q = '
            UPDATE
                tbl_orders
            SET
                status = "CANCELLED",
                date_updated = CURRENT_TIMESTAMP()
            WHERE
                order_no = :order_no
        ';

    $d = [
        "order_no" => $_POST['order_no']
    ];

    echo $db->update($q, $d);
} else if ($option == "received_order") {

    $db = new Database();

    $q = '
            UPDATE
                tbl_orders
            SET
                status = "COMPLETED",
                date_updated = CURRENT_TIMESTAMP()
            WHERE
                order_no = :order_no
        ';

    $d = [
        "order_no" => $_POST['order_no']
    ];

    $res = $db->update($q, $d);

    echo 'affected ' . $res;
} else if ($option == "get_all_orders") {

    $db = new Database();

    $order_information = [];

    $q = '
            SELECT 
               *
            FROM
                tbl_orders A
            LEFT JOIN
                tbl_users B
            ON
                B.id = A.user_id
            ORDER BY 
                A.id 
            DESC
        ';


    $order_information  = $db->read($q);


    if (empty($order_information)) {
        $db->err_msg_empty();
    } else {
        $data_temp = [];

        $q = '
            SELECT 
                *,
                (
                    SELECT
                        dir
                    FROM
                        tbl_product_img
                    WHERE
                        product_id = A.product_id
                    AND
                        type = 1
                ) as img
            FROM
                tbl_order_items A
            LEFT JOIN
                tbl_products B
            ON
                A.product_id = B.id
           
            WHERE
                A.order_no = :order_no
        ';

        $q_payment = '
            SELECT
                *
            FROM
                tbl_order_payment
            WHERE
                order_no = :order_no
        ';

        foreach ($order_information as $key => $value) {

            $d = [
                "order_no" => $value['order_no']
            ];

            $order_items = $db->read($q, $d);
            $order_payments = $db->read($q_payment, $d);

            array_push($data_temp, ['order_information' =>  $value, 'order_items' => $order_items, 'order_payment_information' => $order_payments]);
        }

        if (empty($data_temp)) {
            $db->err_msg_empty();
        } else {
            echo $db->suc_msg_get($data_temp);
        }
    }
} else if ($option == "om_confirm_accept_pending_order") {

    $db = new Database();

    $enough_stocks = true;

    $new_stock_info = [];

    $q = '
        SELECT
            product_id,
            qty
        FROM
            tbl_order_items
        WHERE
            order_no = :order_no
    ';

    $d = [
        "order_no" => $_POST['order_no']
    ];

    $order_items = $db->read($q, $d);

    foreach ($order_items as $key => $item) {

        $q = '
            SELECT
                stock_count
            FROM
                tbl_stocks
            WHERE
                product_id = :product_id
        ';

        $d = [
            "product_id" => $item['product_id']
        ];

        $info = $db->read($q, $d);

        if ($info[0]['stock_count'] < $item['qty']) {
            $enough_stocks = false;
        } else {
            array_push($new_stock_info, [$item['product_id'], $info[0]['stock_count'] - $item['qty']]);
        }
    }

    if ($enough_stocks) {
        $q = '
            SELECT
                payment_method
            FROM
                tbl_order_payment
            WHERE
                order_no = :order_no
        ';

        $d = [
            "order_no" => $_POST['order_no']
        ];

        $order_detail = $db->read($q, $d);

        if ($order_detail[0]['payment_method'] == 'cod') {
            $q = '
            UPDATE
                tbl_orders
            SET
                status = "TO_RECEIVE",
                date_updated = CURRENT_TIMESTAMP(),
                tracking_no = :tracking_no
            WHERE
                order_no = :order_no
        ';


            $d = [
                "order_no" => $_POST['order_no'],
                "tracking_no" => $_POST['tracking_no'],
            ];
        } else {
            $q = '
            UPDATE
                tbl_orders
            SET
                status = "TO_PAY",
                date_updated = CURRENT_TIMESTAMP()
            WHERE
                order_no = :order_no
        ';
        }

        $res = $db->update($q, $d);

        $q = '
            UPDATE
                tbl_order_payment
            SET
                shipping_fee = :shipping_fee
            WHERE
                order_no = :order_no
        ';

        $d = [
            "order_no" => $_POST['order_no'],
            "shipping_fee" => $_POST['shipping_fee']
        ];

        $res = $db->update($q, $d);


        foreach ($new_stock_info as $key => $item) {

            $q = '
                UPDATE
                    tbl_stocks
                SET
                    stock_count = :stock_count
                WHERE
                    product_id = :product_id
            ';

            $d = [
                "product_id" => $item[0],
                "stock_count" => $item[1]
            ];

            $res = $db->update($q, $d);
        }
    } else {
        echo 600;
    }
} else if ($option == "send_payment") {

    $rand_uniq = rand(1111, 9889);

    $tempname = $_FILES["proof"]["tmp_name"];

    $folder = "src/public/payment_proofs/p_" . $rand_uniq .  $_FILES["proof"]["name"];

    move_uploaded_file($tempname,  "../../public/payment_proofs/p_" . $rand_uniq .  $_FILES["proof"]["name"]);

    $db = new Database();

    $q = '
            UPDATE
                tbl_order_payment
            SET
                status = "PAYMENT_FOR_CONFIRMATION",
                payment_proof = :payment_proof,
                reference_no = :reference_no
            WHERE
                order_no = :order_no
        ';

    $d = [
        "order_no" => $_POST['order_no'],
        "reference_no" => $_POST['reference_no'],
        "payment_proof" => $folder
    ];

    $res = $db->update($q, $d);

    echo 'affected ' . $res;
} else if ($option == "confirm_accept_payment") {

    $db = new Database();

    $q = '
            UPDATE
                tbl_order_payment
            SET
                payment_received_date = CURRENT_TIMESTAMP(),
                status = "PAID"
            WHERE
                order_no = :order_no
        ';

    $d = [
        "order_no" => $_POST['order_no']
    ];

    $res = $db->update($q, $d);

    echo 'affected ' . $res;
} else if ($option == "deliver_paid_order") {

    $db = new Database();

    $q = '
            UPDATE
                tbl_orders
            SET
                tracking_no = :tracking_no,
                status = "TO_RECEIVE"
            WHERE
                order_no = :order_no
        ';

    $d = [
        "order_no" => $_POST['order_no'],
        "tracking_no" => $_POST['tracking_no'],
    ];

    $res = $db->update($q, $d);

    echo 'affected ' . $res;
} else if ($option == "get_completed_orders") {

    $db = new Database();

    $q = '
            SELECT
                order_no,
                month(date) as month,
                year(date) as year
            FROM
                tbl_orders
            WHERE
                status = "COMPLETED"
            AND
                year(date) = :year
        ';
        
    $d = [
        'year' => $payload_data['year']
    ];

    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_order_items") {

    $db = new Database();

    $q = '
            SELECT
                product_id,
                qty
            FROM
                tbl_order_items
            WHERE
                order_no = :order_no
        ';

    $d = [
        'order_no' => $payload_data['order_no']
    ];

    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}





function send_email($subject, $message, $email)
{

    $mailer = new PHPMailer(true);
    $mailer->isSMTP();
    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'email.jrspeedph@gmail.com';
    $mailer->Password = 'kzdosezbpjaapxxj';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setFrom('email.jrspeedph@gmail.com');

    $mailer->addAddress($email);
    $mailer->isHTML(true);
    $mailer->Subject = $subject;
    $mailer->Body = $message;
    $mailer->send();
}
