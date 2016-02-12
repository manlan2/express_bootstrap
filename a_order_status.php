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
<?php require_once ('login_check_99.php'); ?>
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
        //echo '<td>' . $element->children(0)->innertext . '</td>';
        if ($count != 1) {
            $print_href = $element->children(1)->children(0)->href;
            $print_id = get_id($print_href);
            $trackNo = $element->children(1)->plaintext;
            //var_dump($element);
            $order_display .= '<td>' . $print_id . '</td>';
            $order_display .= '<td><a target="_blank" href="./order_print.php?id=' . $print_id . '&track_id=' . $trackNo . '">' . $trackNo . '</a></td>';
            //echo '<td><a href="http://ctc366.com' . $print_href . '">' . $trackNo . '</a></td>';
            //<img alt="1000001477" src="http://ctc366.com/code128.aspx?num=1000001477" class="btnPrint" style="position: absolute; right: 10px; top: 5px;">
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
        <?php if($track_result['Result'] == 'OK'){ ?>
        <div class="display_all_orders" id="display_all_orders"><?php echo $track_result['Records'] ?></div>
        <?php }else{ ?>
        <div class="track_result"><div class="track_result_fail" id="track_result_fail"><?php echo $track_result['Records']?></div>
        <?php } ?>
        </div>
    </div>
<?php require_once ('footer.php'); ?>
</body>
</html>
