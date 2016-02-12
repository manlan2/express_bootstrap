<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 5:01 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>收件人</title>
    <?php require_once ('head-meta.php'); ?>
    <link rel="stylesheet" href="js/jtable.2.4.0/themes/lightcolor/gray/jtable.min.css" type="text/css"/>
    <script src="js/jtable.2.4.0/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="js/api.js"></script>
    <script src="js/receiver.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<?php require_once ('login_check.php'); ?>
<div class="container-fluid">
    <div id="receivers_div"></div>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
