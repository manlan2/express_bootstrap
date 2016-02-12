<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 4:56 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>元数据管理</title>
    <?php require_once ('head-meta.php'); ?>
    <link rel="stylesheet" href="js/jtable.2.4.0/themes/lightcolor/gray/jtable.min.css" type="text/css"/>
    <script src="js/jtable.2.4.0/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="js/api.js"></script>
    <script src="js/sender.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<?php require_once ('login_check_99.php'); ?>
<?php
require_once ('./default-init.php');
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
?>
<div class="container-fluid">
    <div id="senders_div"></div>
</div>
<?php require_once ('footer.php'); ?>

</body>
</html>
