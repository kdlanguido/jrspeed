<?php
include "../database.php";

function get_clubs()
{
    $q = '
            SELECT 
                *
            FROM
                tbl_clubs;
        ';

    $db = new Database();
    $res = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}

function get_club_info($payload_data)
{
    $q = '
        SELECT 
            *
        FROM
            tbl_clubs
        WHERE
            id = :club_id
    ';

    $d = [
        "club_id" => $payload_data['club_id']
    ];

    $db = new Database();
    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}

function get_club_members($payload_data)
{
    $q = '
        SELECT 
            *,
            (
                SELECT 
                    count(user_id) 
                FROM 
                    tbl_club_members 
                WHERE  is_approved = 1) as listed_members,
            name,
            A.user_id as A
        FROM
            tbl_club_members A
        LEFT JOIN
            tbl_profile B
        ON
            A.user_id = B.user_id
        WHERE
            club_id = :club_id
    ';

    $d = [
        "club_id" => $payload_data['club_id']
    ];

    $db = new Database();
    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}

function get_club_roster()
{
    $q = '
            SELECT 
                *
            FROM
                tbl_club_members;
        ';

    $db = new Database();
    $res = $db->read($q);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}

function get_clubpage_config($payload_data)
{
    $q = '
        SELECT 
            *
        FROM
            tbl_clubpage_configuration A
        LEFT JOIN
            tbl_clubs B
        ON
            A.club_id = B.id
        WHERE
            A.club_id = :club_id
    ';


    $d = [
        "club_id" => $payload_data['club_id']
    ];

    $db = new Database();
    $res = $db->read($q, $d);

    if (empty($res)) {
        $db->err_msg_empty();
    } else {
        echo $db->suc_msg_get($res);
    }
}
