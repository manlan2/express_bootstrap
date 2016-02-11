<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 02/01/16
 * Time: 9:55 PM
 */

require_once( './default-init.php');
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
require_once ('./api/sl_login.php');
$query = new express_db();
if(isset($_GET["action"]) && $_GET["action"] == "get_senders"){
    $query -> senders_query();
}else if(isset($_GET["action"]) && $_GET["action"] == "get_receivers"){
    $query -> receivers_query_sender_id($_GET["id"]);
}else if(isset($_GET["action"]) && $_GET["action"] == "save_receiver"){
    $query -> receiver_insert($_GET['sender_id'], $_GET["receiver_name"], $_GET["receiver_phone"], $_GET["receiver_province"], $_GET["receiver_city"], $_GET["receiver_address"]);
}else if(isset($_GET["action"]) && $_GET["action"] == "update_receiver"){
    $query -> receiver_update($_GET['receiver_id'], $_GET['sender_id'], $_GET["receiver_name"], $_GET["receiver_phone"], $_GET["receiver_province"], $_GET["receiver_city"], $_GET["receiver_address"]);
}else if(isset($_GET["action"]) && $_GET["action"] == "get_products"){
    $query -> products_query_search();
}else{
    $data = file_get_contents('php://input');
    //sender_id=0&hidDeliverID=&txtDeliverName=DongMei+Yi&txtDeliverMobilePhone=4388823000&receiver_id=%E8%AF%B7%E9%80%89%E6%8B%A9&hidReceiverID=&txtReceiverName=%E6%9D%9C%E7%87%95%E5%A6%AE&txtReceiverMobilePhone=13974277377&dropSheng=%E5%B9%BF%E4%B8%9C%E7%9C%81&dropShi=&hidShi=&txtReceiverAddress=%E7%99%BD%E4%BA%91%E5%8C%BA%E5%B9%BF%E5%B7%9E%E5%A4%A7%E9%81%93%E5%8C%97%E6%80%A1%E6%96%B0%E8%B7%AF203%E5%8F%B7903%E6%88%BF&dropRoute=4&hidTr=%E4%BF%9D%E5%81%A5%E5%93%81%E2%80%94123%E2%80%9412%E2%80%9432%E2%80%9412%E2%80%94%E2%80%94%E4%BB%B6%40&txtWeight=&txtSafeFree=&btnTJ=%E5%88%9B%E5%BB%BA
    parse_str($data);

    $postData = array(//'' => '',
        '__VIEWSTATE' => $add_view,
        'dropRoute' => $dropRoute,//1
        'txtDeliverName' => $txtDeliverName,//2
        'txtDeliverMobilePhone' => $txtDeliverMobilePhone,//3
        'txtReceiverName' => $txtReceiverName,//4
        'txtReceiverMobilePhone' => $txtReceiverMobilePhone,//5
        'dropSheng' => $dropSheng,//6
        'dropShi' => $dropShi,//7
        'hidShi' => $hidShi,
        'txtReceiverAddress' => $txtReceiverAddress,//8
        'hidTr' => $hidTr,//9-11：var strOut +=  类别-名称-规格-品牌-数量-单价-单位@
        'txtWeight' => $txtWeight,//15
        'txtSafeFree' => $txtSafeFree,//16
        'txtNote' => '',
        'btnTJ' => $button_add,
    );

    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $add_url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_COOKIE => $cookie_login,
        CURLOPT_RETURNTRANSFER => 1,
    ));
    $content = curl_exec($ch);
    curl_close($ch);

    $result_json['Result'] = "OK";
    $result_json['Records'] = "";
    echo json_encode($result_json);
}
