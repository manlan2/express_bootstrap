<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:43 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title></title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<div id="pricing" class="container-fluid">
    <div class="text-center">
        <h2>Pricing</h2>
    </div>
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>文件证件类</h1>
                </div>
                <div class="panel-body">
                    <p><strong>DHL</strong>及<strong>FedEx</strong></p>
                    <p><strong>单周达</strong></p>
                    <p><strong>DHL可达绝大部分地区</strong></p>
                    <p><strong>FedEx可达主要城市</strong></p>
                    <p><strong>*需要提供收件人英文地址</strong></p>
                </div>
                <div class="panel-footer">
                    <h3>$98</h3>
                    <h4>东三省,内蒙,西藏,青海,新疆</h4>
                    <h3>$68</h3>
                    <h4>其它地区</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>普通物品</h1>
                </div>
                <div class="panel-body">
                    <p><strong>保健品</strong></p>
                    <p><strong>奶粉</strong></p>
                    <p><strong>衣物</strong></p>
                    <p><strong>包包</strong></p>
                    <p><strong>日常用品</strong></p>
                </div>
                <div class="panel-footer">
                    <h3>$4.88</h3>
                    <h4>per LB</h4>
                    <h3>特价期间</h3>
                    <h4>PS: 1LB=16OZ</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>特殊物品</h1>
                </div>
                <div class="panel-body">
                    <p><strong>海参</strong></p>
                    <p><strong>西洋参</strong></p>
                    <p><strong>电子产品</strong></p>
                    <p><strong>化妆品</strong></p>
                    <p><strong>名贵物品</strong></p>
                </div>
                <div class="panel-footer">
                    <h3>$4.88~$12</h3>
                    <h4>per LB</h4>
                    <h3>$?</h3>
                    <h4>具体请咨询</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('footer.php'); ?>
</body>
</html>