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

    $postData = array(//'' => '',
        '__VIEWSTATE' => $add_view,
        'dropRoute' => 1,//1
        'txtDeliverName' => 2,//2
        'txtDeliverMobilePhone' => 3,//3
        'txtReceiverName' => 4,//4
        'txtReceiverMobilePhone' => 5,//5
        'dropSheng' => 6,//6
        'dropShi' => 7,//7
        'hidShi' => 7,
        'txtReceiverAddress' => 8,//8
        'hidTr' => '类别-名称-规格-品牌-数量-单价-单位@',//9-11：var strOut +=  类别-名称-规格-品牌-数量-单价-单位@
        'txtWeight' => 15,//15
        'txtSafeFree' => 16,//16
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
