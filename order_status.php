<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 18/01/16
 * Time: 2:41 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>修女岛快递代理点：查看订单</title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
    <link href="css/add_order.css" rel="stylesheet" type="text/css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<?php require_once ('login_check.php'); ?>
<?php
require_once ('./default-init.php');
require_once('./db/db-config.php');
require_once('./db/db-operation.php');

require_once('./api/sl_login.php');
//待处理订单http://ctc366.com/Member/OrderListDcl.aspx
$options = array(
    'http' => array(
        'method' => 'GET',
        'header' => 'Cookie: ' . $cookie_login,
    )
);
$context = stream_context_create($options);
$content = file_get_html($order_list_url, false, $context);

$htmlArray = $content->find('table[class=tableList] tr');//<table class="tableList">
$track_result = array('Result'=>'', 'Records'=> '');
if (count($htmlArray)<=1) {
    $track_result['Result'] = "ERROR";
    $track_result['Records'] = "目前没有需要打印的定单～";
} else {
    $order_display = '<table class="table table-bordered table-striped">';
    $count = 1;
    foreach ($htmlArray as $element) {

        $order_display .= '<tr>';
        if ($count != 1) {
            //filter data
            $receiver_name = $element->children(4)->innertext;
            $receiver_phone = $element->children(5)->innertext;
            $query = new express_db();
            session_start();
            if(!$query -> package_query($_SESSION['sender_id'], $receiver_name, $receiver_phone)){
                continue;
            }

            $print_href = $element->children(1)->children(0)->href;
            $print_id = get_id($print_href);
            $trackNo = $element->children(1)->plaintext;
            $order_display .= '<td>' . $print_id . '</td>';
            $order_display .= '<td><a target="_blank" href="./order_print.php?id=' . $print_id . '&track_id=' . $trackNo . '">' . $trackNo . '</a></td>';
            $order_display .= '<td>' . $element->children(2)->innertext . '</td>';
        } else {
            $order_display .= '<td>' . $element->children(0)->innertext . '</td>';
            $order_display .= '<td>' . $element->children(1)->innertext . '</td>';
            $order_display .= '<td>包裹信息</td>';
        }
        $order_display .= '<td>' . $element->children(3)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(4)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(5)->innertext . '</td>';
        $order_display .= '</tr>';
        $count++;
    }

    $order_display .= '</table>';

    $track_result['Result'] = "OK";
    $track_result['Records'] = $order_display;
}
?>
    <div class="container-fluid">
        <?php echo $track_result['Records'] ?>
    </div>
<?php require_once ('footer.php'); ?>
</body>
</html>
