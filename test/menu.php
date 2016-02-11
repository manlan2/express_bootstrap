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
            <a class="navbar-brand" href="index.php">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="services.php">SERVICES</a></li>
                        <li><a href="pricing.php">PRICING</a></li>
                        <li><a href="member.php">MEMBER</a></li>
                    </ul>
                </li>
                <li><a href="contact.php">CONTACT</a></li>

                <li><a href="track.php">TRACKING</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
                {
                   echo  ' <li><a href="logout.php"><span>'.$_SESSION['user_name'].'</span><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';

                }else{?>

                    <li></li>
                <?php}?>
            </ul>
        </div>
    </div>
</nav>