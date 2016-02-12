<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 10:26 PM
 */
?>
<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] && isset($_SESSION['user_level']) && $_SESSION['user_level'] >= 10) {

}else{
    header("Location:login.php");
}