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
        <h4>Choose a payment plan that works for you</h4>
    </div>
    <div class="row">
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>Basic</h1>
                </div>
                <div class="panel-body">
                    <p><strong>20</strong> Lorem</p>
                    <p><strong>15</strong> Ipsum</p>
                    <p><strong>5</strong> Dolor</p>
                    <p><strong>2</strong> Sit</p>
                    <p><strong>Endless</strong> Amet</p>
                </div>
                <div class="panel-footer">
                    <h3>$19</h3>
                    <h4>per month</h4>
                    <button class="btn btn-lg">Sign Up</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>Pro</h1>
                </div>
                <div class="panel-body">
                    <p><strong>50</strong> Lorem</p>
                    <p><strong>25</strong> Ipsum</p>
                    <p><strong>10</strong> Dolor</p>
                    <p><strong>5</strong> Sit</p>
                    <p><strong>Endless</strong> Amet</p>
                </div>
                <div class="panel-footer">
                    <h3>$29</h3>
                    <h4>per month</h4>
                    <button class="btn btn-lg">Sign Up</button>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                    <h1>Premium</h1>
                </div>
                <div class="panel-body">
                    <p><strong>100</strong> Lorem</p>
                    <p><strong>50</strong> Ipsum</p>
                    <p><strong>25</strong> Dolor</p>
                    <p><strong>10</strong> Sit</p>
                    <p><strong>Endless</strong> Amet</p>
                </div>
                <div class="panel-footer">
                    <h3>$49</h3>
                    <h4>per month</h4>
                    <button class="btn btn-lg">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once ('footer.php'); ?>
</body>
</html>