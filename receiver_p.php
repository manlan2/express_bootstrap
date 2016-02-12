<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 5:04 PM
 */
require_once( './default-init.php');
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
$query = new express_db();
if(isset($_GET["action"]) && $_GET["action"] == "get_receivers_page"){
    $data = file_get_contents('php://input');
    parse_str($data);
    session_start();
    $query -> receivers_query_page($_GET["jtStartIndex"], $_GET["jtPageSize"], $_GET["jtSorting"], $_SESSION['sender_id']);
}else if(isset($_GET["action"]) && $_GET["action"] == "get_receivers"){
    $query -> receivers_query();
}else if(isset($_GET["action"]) && $_GET["action"] == "create_receiver") {
    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> receiver_insert($sender_id, $receiver_name, $receiver_phone, $receiver_province, $receiver_city, $receiver_address);
}else if(isset($_GET["action"]) && $_GET["action"] == "update_receiver"){
    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> receiver_update($receiver_id, $sender_id, $receiver_name, $receiver_phone, $receiver_province, $receiver_city, $receiver_address);
}else if(isset($_GET["action"]) && $_GET["action"] == "del_receiver"){
    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> receiver_del($receiver_id);
}