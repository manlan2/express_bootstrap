<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 10:00 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>修女岛快递代理点：西游寄查单</title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<?php require_once ('login_check_10.php'); ?>
<div id="track" class="jumbotron text-center">
    <h2>修女岛快递代理点</h2>

    <form class="form-inline">
        <input type="text" class="form-control" id="track_no" name="track_no" size="50" placeholder="请输入13或15位西游寄单号~" required autofocus>
        <button type="submit" class="btn btn-danger">查询</button>
    </form>
</div>

<?php
require_once ('default-init.php');
$track_result = array('Result'=>'', 'Records'=> '');
if (isset($_GET["track_no"])) {
    $track_no_canada = $_GET["track_no"];
    if (!(strlen($track_no_canada) == 13 || strlen($track_no_canada) == 15)) {
        $track_result['Result'] = "ERROR";
        $track_result['Records'] = "请输入有效的定单号～";
    }else {//西游订单号:HIA160104000016//EMS运单号:1194757971506
        $html = file_get_html($track_xyj . $track_no_canada);
        $result_json = json_decode($html);
        $result_data_array = $result_json->data;
        $result_data = $result_data_array[0];
        if ($result_data->Status != '-1') {
            $result_array = $result_data->Trace;
            $message = '<table class="table table-bordered">';
            $message .= '<tr><td>定单号</td><td>'.$track_no_canada.'</td></tr>';
            $message .= '<tr><td>时间</td>';
            $message .= '<td>    状态</td></tr>';
            foreach ($result_array as $element) {
                $message .= '<tr>';
                $message .= '<td>';
                $message .= $element->RoutetimeStr;
                $message .= '</td>';
                $message .= '<td>';
                $message .= $element->Routeinfo;
                $message .= '</td>';
                $message .= '</tr>';
            }
            $message .= '</table>';
            $track_result['Result'] = "OK";
            $track_result['Records'] = $message;
        } else {
            $track_result['Result'] = "ERROR";
            $track_result['Records'] = "查询不到定单信息~";
        }

    }
}
?>
<div class="container">
    <?php if($track_result['Result'] == 'OK'){
        echo '<div class="track_xyj_result_success" id="track_result_success">'.$track_result['Records'].'</div>';
    }else{
        echo '<div class="track_result_fail" id="track_result_fail">'.$track_result['Records'].'</div>';
    } ?>
</div>

<?php require_once ('footer.php'); ?>
</body>
</html>
