<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:39 PM
 */
?>
<div id="track" class="jumbotron text-center">
    <h1>Company</h1>
    <p>We specialize in blablabla</p>
    <form class="form-inline">
        <input type="text" class="form-control" id="track_no" name="track_no" size="50" placeholder="请输入10位胜隆单号~" required autofocus>
        <button type="submit" class="btn btn-danger">查询</button>
    </form>
</div>
<?php
require_once ('default-init.php');
if (isset($_GET["track_no"])) {
    $track_result_array = array();
    $track_no_canada = $_GET["track_no"];//3660019513
    if (strlen($track_no_canada) < 10) {
        $track_result = array('Result'=>'', 'Records'=> '', 'Track_no'=> '');
        $track_result['Result'] = "ERROR";
        $track_result['Records'] = "请输入有效的定单号～";
        $track_result['Track_no'] = strlen($track_no_canada);
        array_push($track_result_array, $track_result);
    }else{
        $track_array_no = explode( ',', trim($track_no_canada));
        foreach($track_array_no as $track_no){
            if(strlen($track_no) != 0){
                $track_result = array('Result'=>'', 'Records'=> '', 'Track_no'=> '');
                $track_result['Track_no'] = trim($track_no);
                $html = file_get_html($track_url_canada . $track_no);
                $html_array = $html->find('table[class=yundanTable] tr');
                if (!count($html_array)) {
                    $track_result['Result'] = "ERROR";
                    $message = '<table><tr>';
                    $message .= '<td>订单编号:'.$track_result['Track_no'] .'查询不到定单信息~</td>';
                    /*$message .= '<td>查询不到定单信息~</td>';*/
                    $message .= '</tr></table>';
                    $track_result['Records'] = $message;
                }else{
                    $message = '<table class="track_result_table">';
                    foreach ($html_array as $element) {
                        $message .=  '<tr>';
                        if ($element->children(1)) {
                            $message .= '<td>' . $element->children(0)->innertext . '</td>';
                            $message .= '<td>' . $element->children(1)->innertext . '</td>';
                        } else {
                            if ($element->children(0)->children(0)) {
                                $url_china_src = $element->children(0)->children(0)->children(0)->src;;
                                $url_frame_china = $url_frame . find_num($url_china_src);
                                $message .= '<tr><td colspan="2" >';
                                $message .= '<iframe frameborder="0" scrolling="no" style="overflow:hidden;" src="' . $url_frame_china . '" width="100%" height="260px"></iframe>';
                                $message .= '</td></tr>';
                            } else {
                                $message .= '<td colspan="2">' . $element->children(0)->innertext . '</td>';
                            }
                        }
                        $message .=  '</tr>';
                    }
                    $message .= '</table>';
                    $track_result['Result'] = "OK";
                    $track_result['Records'] = $message;
                }
                array_push($track_result_array, $track_result);
            }
        }
    }
}
?>
<div class="track_result">
    <div class="track_result_fail" id="track_result_fail"></div>
    <div class="track_result_success" id="track_result_success">
        <?php
        if (isset($_GET["track_no"])) {
            foreach($track_result_array as $track_result){
                echo  $track_result['Records'];
                echo '<br>';
            }
        }
        ?>
    </div>
</div>
