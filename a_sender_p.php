<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 5:02 PM
 */
require_once( './default-init.php');
require_once( './db/db-config.php');
require_once( './db/db-operation.php');

$query = new express_db();
if(isset($_GET["action"]) && $_GET["action"] == "get_senders_page"){
$data = file_get_contents('php://input');
parse_str($data);
$query -> senders_query_page($_GET["jtStartIndex"], $_GET["jtPageSize"], $_GET["jtSorting"]);
}else if(isset($_GET["action"]) && $_GET["action"] == "get_senders"){
$query -> senders_query();
}else if(isset($_GET["action"]) && $_GET["action"] == "create_sender") {
$data = file_get_contents('php://input');//sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name
parse_str($data);
$query -> sender_insert($sender_name, $sender_real_name, $sender_phone, $sender_address, $sender_notes);
}else if(isset($_GET["action"]) && $_GET["action"] == "update_sender"){
$data = file_get_contents('php://input');
parse_str($data);
$query -> sender_update($sender_id, $sender_name, $sender_real_name, $sender_phone, $sender_address, $sender_notes);
}else if(isset($_GET["action"]) && $_GET["action"] == "del_sender"){
$data = file_get_contents('php://input');
parse_str($data);
$query -> sender_del($sender_id);
}