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
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
require_once( './api/sl_login.php');
require ('./TrackDisplay.php');
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

$htmlArray = $content->find('table[class=tableList] tr');
$resultArray = array();
if (!count($htmlArray)) {
}else {
    $count = 1;
    session_start();
    $query = new express_db();
    foreach ($htmlArray as $element) {
        if ($count != 1) {
            $td = new TrackDisplay();
            $td -> id = $element->children(0)->innertext;
            $td -> trackIdCanada = $element->children(1)->innertext;
            $td -> orderWeight = $element->children(3)->innertext;
            $td -> orderCreateTime = $element->children(6)->innertext;
            //filter data
            $td -> receiverId = $_SESSION['sender_id'];
            $td -> receiverName = $element->children(7)->innertext;
            $td -> receiverPhone = $element->children(8)->innertext;
            /*if(!$query -> package_query($td -> receiverId, $td -> receiverName, $td -> receiverPhone)){
                continue;
            }*/

            $td -> orderStatus = $element->children(9)->innertext;
            if($td -> orderStatus == ""){
                $td -> orderStatus = '在库';
            }
            $td -> orderTrack = '<a target="_blank" href="track.php?track_no=' . $td -> trackIdCanada . '">追踪</a>';
            $print_href = $element->children(10)->children(0)->href;
            $td -> trackId_SL = get_id($print_href);
            $td -> orderPrint = '<a target="_blank" href="order_print.php?id=' . $td -> trackId_SL . '&track_id=' . $td -> trackIdCanada . '">打印</a>';
            $resultArray[] = $td;
        }
        $count++;
    }
}
?>
<div class="container-fluid">
    <table class="table table-bordered table-striped">
        <?php if(sizeof($resultArray) == 0){
            echo '<thead><tr></tr></thead>';
        }else{
            echo '<thead><tr><td>序号</td><td>订单号</td><td>重量(磅)</td><td>创建时间</td><td>收件人</td><td>收件电话</td><td>状态</td><td></td><td></td></tr></thead>';
            echo '<tbody>';
            foreach ($resultArray as $td) {
                echo '<tr>';//<td>' .  . '</td>
                echo '<td>' . $td -> id . '</td><td>' . $td -> trackIdCanada . '</td><td>' . $td -> orderWeight . '</td><td>' . $td -> orderCreateTime . '</td><td>' . $td -> receiverName . '</td><td>' . $td -> receiverPhone . '</td><td>' . $td -> orderStatus . '</td><td class="text-center">' . $td -> orderTrack . '</td><td class="text-center">' . $td -> orderPrint . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
        }?>
    </table>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
