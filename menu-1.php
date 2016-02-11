<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 8:14 PM
 */
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index-1.php">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="order_new.php">NEW</a></li>
                <li><a href="#services">UPDATE</a></li>
                <li><a href="order_status.php">PRINTING</a></li>
                <li><a href="order_display.php">TRACKING</a></li>
                <li><a href="#">PROFILE</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                session_start();
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
                    echo '<li><a href="logout.php"><span>'.$_SESSION['user_name'].' </span><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                }else{
                    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
