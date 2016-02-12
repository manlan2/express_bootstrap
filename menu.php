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
            <a class="navbar-brand" href="index.php">Ling</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="pricing.php">PRICING</a></li>
                        <li><a href="member.php">MEMBER</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">CONTACT</a></li>
                <?php
                session_start();
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">MY <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="order_new.php">NEW</a></li>
                            <li><a href="#">UPDATE</a></li>
                            <li><a href="order_status.php">PRINTING</a></li>
                            <li><a href="order_display.php">TRACKING</a></li>
                            <li><a href="receiver.php">收件人</a></li>
                            <li><a href="profile.php">PROFILE</a></li>';
                if (isset($_SESSION['user_level']) && $_SESSION['user_level'] >= 10) {
                    echo '<li><a href="track_xyj.php">西游寄跟单</a></li>
                                <li><a href="#">西游寄下单</a></li>';
                } ?>
            </ul>
            </li>
            <?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 99) {
                echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ADMIN <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="a_order_display.php">TRACKING</a></li>
                                <li><a href="a_order_status.php">MANAGING</a></li>
                                <li><a href="a_sender.php">SENDER</a></li>
                                <li><a href="a_receiver.php">RECEIVER</a></li>
                                <li><a href="a_product.php">PRODUCT</a></li>
                            </ul>
                        </li>';
            }
            } ?>
            <li><a href="track.php">TRACKING</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                    echo '<li><a href="logout.php"><span>' . $_SESSION['user_name'] . ' </span><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                } ?>
            </ul>
        </div>
    </div>
</nav>