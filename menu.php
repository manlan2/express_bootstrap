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
            <a class="navbar-brand" href="index.php">Panda2ici</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">关于 <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu nav-font">
                        <li><a href="services.php">服务</a></li>
                        <li><a href="pricing.php">价格</a></li>
                        <li><a href="member.php">成为会员</a></li>
                        <li><a href="about.php">关于</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">联系我</a></li>
                <li><a href="track.php">查单</a></li>
                <?php
                session_start();
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">会员 <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu nav-font">
                            <li><a href="order_add.php">网上下单</a></li>
                            <li><a href="order_display.php">已下订单</a></li>
                            <li><a href="receiver.php">收件人</a></li>
                            <li><a href="profile.php">我的信息</a></li>';
                if (isset($_SESSION['user_level']) && $_SESSION['user_level'] >= 10) {
                    echo '<li><a href="track_xyj.php">西游寄跟单</a></li>
                                <li><a href="#">西游寄下单</a></li>';
                } ?>
            </ul>
            </li>
            <?php if (isset($_SESSION['user_level']) && $_SESSION['user_level'] == 99) {
                echo '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">管理员 <span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu nav-font">
                                <li><a href="a_order_display.php">订单跟踪</a></li>
                                <li><a href="a_sender.php">发件人</a></li>
                                <li><a href="a_receiver.php">收件人</a></li>
                                <li><a href="a_product.php">产品库</a></li>
                            </ul>
                        </li>';
            }
            } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                    echo '<li><a href="profile.php"><span>' . $_SESSION['user_name'] . ' </span></a></li><li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
                } else {
                    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                } ?>
            </ul>
        </div>
    </div>
</nav>