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
}else if(isset($_GET["action"]) && $_GET["action"] == "get_sender_user_name"){
    $query -> sender_query_user_name($_GET["user_name"]);
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
    parse_str($data);
    $result = $query->package_insert($hidDeliverID, $txtDeliverName, $txtDeliverMobilePhone, $hidReceiverID, $txtReceiverName, $txtReceiverMobilePhone, $dropSheng, $dropShi, $txtReceiverAddress, $hidTr, 0, 0, 0, $txtWeight, $txtSafeFree, $pkg_notes='', $pkg_status='0');
    if($result){
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
    }else{
        $result_json['Result'] = "ERROR";
        $result_json['Records'] = "";
    }

    echo json_encode($result_json);
}
