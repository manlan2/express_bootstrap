<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:59 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>修女岛快递代理点：包裹追踪</title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu-1.php'); ?>
<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){

}else{
    header('Location:login.php');
}
?>
<?php require_once ('footer.php'); ?>

</body>
</html>