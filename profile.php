<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 9:44 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title></title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
    <link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<div id="contact" class="container-fluid bg-grey">
    <h2 class="text-center">PROFILE</h2>
    <div class="jumbotron profile">
        <form class="profile-form" method="post" action="profile_p.php">
            <?php
            if(isset($_GET['p'])){
                if($_GET['p']==0){
                    echo '<div class="alert alert-success" role="alert">Your password has been updated!</div>';
                }else if($_GET['p']==1){
                    echo '<div class="alert alert-danger" role="alert">New passwords din\'t match each other.</div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">Something isn\'t correct, try again?</div>';
                }
            }
            ?>
            <div class="input-group">
                <span class="input-group-addon">User Info</span>
                <label class="form-control">User Name:<span class="label label-info"><?php echo $_SESSION['user_name'] ?></span></label>
                <label class="form-control">Phone No. :<span class="label label-info"><?php echo $_SESSION['sender_phone'] ?></span></label>
            </div>
            <label for="basic-url">New Password</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">Password</span>
                <input type="password" class="form-control" id="user_p0" name="user_p0" aria-describedby="basic-addon3" placeholder="Old Password">
                <input type="password" class="form-control" id="user_p1" name="user_p1" aria-describedby="basic-addon3" placeholder="New Password">
                <input type="password" class="form-control" id="user_p2" name="user_p2" aria-describedby="basic-addon3" placeholder="New Password">
            </div>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
