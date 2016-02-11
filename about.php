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
<div id="about" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2>About Company Page</h2><br>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <br><button class="btn btn-default btn-lg">Get in Touch</button>
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
            <h2>Our Values</h2><br>
            <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
            <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
