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
} else if ($option == "get_products_all") {

    $q = '
            SELECT 
               *
            FROM
                tbl_products
            WHERE
                is_archived = 0
        ';

    $db = new Database();
    $res = $db->read($q);

    if (count($res) < 0) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_products_archived") {

    $q = '
            SELECT 
               *
            FROM
                tbl_products
            WHERE
                is_archived = 1
        ';

    $db = new Database();
    $res = $db->read($q);

    if (count($res) < 0) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_products_for_stocks") {

    $q = '
            SELECT 
               *
            FROM
                tbl_products
            WHERE
                id not in (
                    SELECT 
                        product_id
                    FROM
                        tbl_stocks
                )
        ';

    $db = new Database();
    $res = $db->read($q);


    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_categories") {

    $q = '
            SELECT DISTINCT 
                product_tag,
                category,
                sub_category
            FROM
                tbl_products
        ';

    $db = new Database();
    $res = $db->read($q);


    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_products_information_by_id") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_products
            WHERE
                id = :id
        ';

    $d = [
        'id' => $payload_data['product_id']
    ];

    $res = $db->read($q, $d);


    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_product_images") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_product_img
            WHERE
                product_id = :id
        ';

    $d = [
        'id' => $payload_data['product_id']
    ];

    $res = $db->read($q, $d);


    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_product_by_category") {

    $db = new Database();

    $q = '
            SELECT 
               *,
               (
                    SELECT 
                        dir 
                    FROM 
                        tbl_product_img 
                    WHERE 
                        type = 1 
                    AND 
                        product_id = A.id
                ) as dir
            FROM
                tbl_products A
            WHERE
                category = :category
          
        ';

    $d = [
        'category' => $payload_data['category']
    ];

    $res = $db->read($q, $d);


    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_product_by_subcategory") {

    $db = new Database();

    $q = '
            SELECT 
                *,
                (
                    SELECT 
                        dir 
                    FROM 
                        tbl_product_img 
                    WHERE 
                        type = 1 
                    AND 
                        product_id = A.id
                ) as dir
            FROM
                tbl_products A
            WHERE
                sub_category = :sub_category

        ';

    $d = [
        'sub_category' => $payload_data['sub_category']
    ];

    $res = $db->read($q, $d);


    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "get_product_by_id") {

    $db = new Database();

    $q = '
            SELECT 
                *
            FROM
                tbl_products
            WHERE
                id = :product_id
            AND
                is_archived = 0
        ';

    $d = [
        'product_id' => $payload_data['product_id']
    ];

    $product_information = $db->read($q, $d);

    $q = '
        SELECT 
            *
        FROM
            tbl_product_img
        WHERE
            product_id = :product_id
    ';

    $product_imgs = $db->read($q, $d);


    $q = '
        SELECT 
            *
        FROM
            tbl_stocks
        WHERE
            product_id = :product_id
    ';

    $product_stocks = $db->read($q, $d);

    $data = [
        'product_information' => $product_information,
        'product_imgs' => $product_imgs,
        'product_stocks' => $product_stocks,
    ];

    if (empty($data)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($data);
    }
} else if ($option == "get_featured") {

    $db = new Database();

    $q = '
            SELECT 
                *
            FROM
                tbl_products A
            LEFT JOIN
                tbl_product_img B
            ON
                A.id = B.product_id
            WHERE
                is_featured = 1
            AND
                type = 1
            AND
                is_archived = 0

        ';

    $res = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "product_add_in_featured") {
    $db = new Database();

    $q = "
        UPDATE 
            tbl_products
        SET
            is_featured = 1
        WHERE
            id = :product_id
    ";

    $d = [
        'product_id' => $_POST['product_id']
    ];

    $res = $db->update($q, $d);
    echo $res;
} else if ($option == "product_remove_in_featured") {
    $db = new Database();

    $q = "
        UPDATE 
            tbl_products
        SET
            is_featured = 0
        WHERE
            id = :product_id
    ";

    $d = [
        'product_id' => $_POST['product_id']
    ];

    $res = $db->update($q, $d);
    echo $res;
} else if ($option == "product_maintenance_add") {

    $db = new Database();

    $q = '
        INSERT INTO 
            tbl_products(product_name,price,category,sub_category,description,product_tag)
        VALUES
            (:product_name,:price,:category,:sub_category,:description,:product_tag)
    ';

    $d = [
        'product_name' => $_POST['product_name'],
        'price' => $_POST['price'],
        'category' => $_POST['category'],
        'sub_category' => $_POST['sub_category'],
        'description' => $_POST['description'],
        'product_tag' => $_POST['product_tag']
    ];

    $res = $db->update($q, $d);
} else if ($option == "product_maintenance_edit") {

    $q = '
        UPDATE
            tbl_products
        SET
            product_name = :product_name,
            price = :price,
            category=:category,
            sub_category=:sub_category,
            description=:description,
            product_tag=:product_tag
        WHERE
            id=:product_id
    ';


    $db = new Database();

    $d = [
        'product_name' => $_POST['product_name'],
        'price' => $_POST['price'],
        'category' => $_POST['category'],
        'sub_category' => $_POST['sub_category'],
        'description' => $_POST['description'],
        'product_tag' => $_POST['product_tag'],
        'product_id' => $_POST['product_id']
    ];

    $res = $db->update($q, $d);
} else if ($option == "product_maintenance_upload_img") {

    $rand_uniq = rand(1111, 9889);

    $tempname = $_FILES["dir"]["tmp_name"];

    $folder = "src/public/products/u_" . $rand_uniq .  $_FILES["dir"]["name"];

    move_uploaded_file($tempname,  "../../public/products/u_" . $rand_uniq .  $_FILES["dir"]["name"]);

    // check if gallery has picture
    $q = '
        SELECT 
            *
        FROM
            tbl_product_img
        WHERE
            product_id = :id
        
    ';

    $d = [
        'id' => $_POST['product_id']
    ];

    $res = $db->read($q, $d);

    if (empty($res)) {
        $type = 1;
    } else {
        $type = 0;
    }

    $q = '
        INSERT INTO 
            tbl_product_img(product_id,dir,type,name)
        VALUES
            (:product_id,:dir,:type,:name)
    ';

    $db = new Database();

    $d = [
        'product_id' => $_POST['product_id'],
        'dir' => $folder,
        'type' => $type,
        'name' => $_FILES["dir"]["name"]
    ];

    $res = $db->update($q, $d);
} else if ($option == "product_maintenance_del_img") {

    $q = '
        DELETE FROM
            tbl_product_img
        WHERE
            id=:id
    ';


    $db = new Database();

    $d = [
        'id' => $_POST['id']
    ];

    $res = $db->update($q, $d);
} else if ($option == "product_maintenance_del_product") {

    $db = new Database();

    $q = '
        UPDATE
            tbl_products
        SET 
            is_archived = 1
        WHERE
            id = :id
    ';

    $d = [
        'id' => $_POST['id']
    ];

    $res = $db->update($q, $d);
} else if ($option == "product_get_stocks") {

    $db = new Database();

    $q = '
            SELECT 
               *
            FROM
                tbl_stocks A
            LEFT JOIN
                tbl_products B
            ON
                A.product_id = B.id
        ';

    $res = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "product_get_prices") {

    $db = new Database();

    $q = '
        SELECT 
            id as product_id,
            price
        FROM
            tbl_products
    ';

    $res = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
} else if ($option == "product_add_product_stocks") {
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
        'product_id' => $_POST['product_id'],
    ];
    $res = $db->read($q, $d);

    if (empty($res)) {
        $q = '
            INSERT INTO 
                tbl_stocks(
                    stock_count,
                    product_id,
                    low_ind
                )
            VALUES
                (
                    :stock_count,
                    :product_id,
                    :low_ind
                )
        ';

        $d = [
            'stock_count' => $_POST['stock_count'],
            'product_id' => $_POST['product_id'],
            'low_ind' => $_POST['low_ind'],
        ];

        $db->update($q, $d);
    } else {
        echo 600;
    }
} else if ($option == "product_update_product_stocks") {
    $db = new Database();

    $q = '
        UPDATE
            tbl_stocks
        SET
            stock_count = :stock_count,
            low_ind = :low_ind
        WHERE
            product_id = :product_id
    ';

    $d = [
        'stock_count' => $_POST['stock_count'],
        'low_ind' => $_POST['low_ind'],
        'product_id' => $_POST['product_id']
    ];

    $res = $db->update($q, $d);
} else if ($option == "unarchive_product") {

    $db = new Database();

    $q = '
        UPDATE
            tbl_products
        SET
            is_archived = 0
        WHERE
            id = :product_id
    ';

    $d = [
        'product_id' => $_POST['product_id']
    ];

    $res = $db->update($q, $d);

    echo $res;
}
