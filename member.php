<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 10:12 PM
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
<div id="member" class="container-fluid text-center bg-grey">
    <h2>Become a member</h2><br>
    <h4>What we can do for you</h4>
    <div class="row text-center">
        <div class="col-sm-4">
            <h3>简化下单</h3>
            <p>再也不用把一个收件人的信息写无数遍了</p>
        </div>
        <div class="col-sm-4">
            <h3>方便跟单</h3>
            <p>所有包裹状态,一眼看完</p>
        </div>
        <div class="col-sm-4">
            <h3>发包提速</h3>
            <p>网上下单,减少核单时间</p>
        </div>
    </div><br>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
