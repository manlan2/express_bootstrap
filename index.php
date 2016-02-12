<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 8:11 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>修女岛快递代理点：包裹追踪</title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
    <link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<div id="track" class="jumbotron text-center">
    <h2>修女岛快递代理点</h2>

    <form class="form-inline" action="track.php">
        <input type="text" class="form-control" id="track_no" name="track_no" size="50" placeholder="请输入胜隆单号~" required autofocus>
        <button type="submit" class="btn btn-danger">查询</button>
    </form>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>