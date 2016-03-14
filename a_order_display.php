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
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
require_once( './api/sl_login.php');
$track_result = array('Result'=>'', ''=> 'Records');
//$query_url 所有订单http://ctc366.com/Member/OrderListMember.aspx
$options = array(
    'http' => array(
        'method' => 'GET',
        'header' => 'Cookie: ' . $cookie_login,
    )
);
$context = stream_context_create($options);
$content = file_get_html($query_url, false, $context);

$htmlArray = $content->find('table[class=tableList] tr');//<table class="tableList">
if (!count($htmlArray)) {
    $track_result['Result'] = "ERROR";
    $track_result['Records'] = "没有定单信息";
} else {
    $order_display = "";
    $order_display .= '<table class="table table-bordered table-striped">';
    $count = 1;
    foreach ($htmlArray as $element) {
        $order_display .= '<tr>';
        $order_display .= '<td>' . $element->children(0)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(1)->innertext . '</td>';
        $trackNo = '';
        $print_id = '';
        if ($count != 1) {
            $print_href = $element->children(10)->children(0)->href;
            $print_id = get_id($print_href);
            $trackNo = $element->children(1)->plaintext;
            $order_display .= '<td>' . $element->children(2)->innertext . '</td>';
        } else {
            $order_display .= '<td>包裹信息</td>';
        }

        $order_display .= '<td>' . $element->children(3)->innertext . '</td>';
        //$order_display .= '<td>' . $element->children(4)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(5)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(6)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(7)->innertext . '</td>';
        $order_display .= '<td>' . $element->children(8)->innertext . '</td>';

        if ($count != 1) {
            $child_9 = $element->children(9);
            if($child_9->innertext == ''){
                $order_display .= '<td>在库</td>';
                $order_display .= '<td><a target="_blank" href= "#">修改</a>|<a target="#" href= "#">取消</a></td>';
            }else{
                $order_display .= '<td>' . $element->children(9)->innertext . '</td>';
                $order_display .= '<td><a target="_blank" href="track.php?track_no=' . $trackNo . '">追踪</a></td>';
            }
        }else{
            $order_display .= '<td>' . $element->children(9)->innertext . '</td>';
            $order_display .= '<td></td>';
        }

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
