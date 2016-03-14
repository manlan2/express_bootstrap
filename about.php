<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:32 PM
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
<div id="about" class="container-fluid text-center">
    <h2>About</h2><br>
    <div class="row">
        <div class="col-sm-8">
            <h2>修女岛快递代理点</h2><br>
            <h4>小站提供在线下单查单功能,下单功能目前只向<span class="label label-success">修女岛快递客户</span>开放.</h4><br>
            <p>声明: 小站只是尽可能提供下单的便利,但由于时间原因,本人并不能100％保证网站的正常持续运作.在允许的条件下,我会继续改进网站体验.如果你有其它想法,请直接联系我~</p>
            <br><a class="btn btn-default btn-lg" href="contact.php">Get in Touch</a>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-signal logo"></span>
        </div>
    </div>
</div>
<div class="container-fluid bg-grey">
    <div class="row">
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-globe logo"></span>
        </div>
        <div class="col-sm-8">
            <h2>NEXT?</h2><br>
            <h4><strong>MISSION:</strong> 网上下单,跟单.简化下单步骤,节省大家的<span class="label label-danger">时间!时间!时间!</span></h4><br>
            <!--<h4><strong>NEXT:</strong> 提供其它快递公司的查询,无论你选不选我,我把服务先提供给你~</h4><br>-->
        </div>
    </div>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
