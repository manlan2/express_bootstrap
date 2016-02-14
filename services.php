<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:42 PM
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
<div id="services" class="container-fluid text-center">
    <h2>SERVICES</h2>
    <h4>What we offer</h4>
    <br>
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-plane logo-small"></span>
            <h4>胜隆快递</h4>
            <p>胜隆快递代理: 普货,奶粉,保健品,包包,化妆品,海参西洋参及其它</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-leaf logo-small"></span>
            <h4>防震材料</h4>
            <p>有偿提供专用防震材料</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-wrench logo-small"></span>
            <h4>打包</h4>
            <p>免费打包,免费纸箱</p>
        </div>
    </div>
    <br><br>
    <div class="row">

        <div class="col-sm-4">
            <span class="glyphicon glyphicon-dashboard logo-small"></span>
            <h4>DHL</h4>
            <p>文件证件类,一周内速递</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-dashboard logo-small"></span>
            <h4>FedEx</h4>
            <p>文件证件类,一周内速递</p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-heart logo-small"></span>
            <h4>其它</h4>
            <p>其它的需要帮忙的联系我看看~能帮自然则帮~</p>
        </div>
    </div>
</div>

<?php require_once ('footer.php'); ?>
</body>
</html>
