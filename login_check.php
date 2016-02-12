<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 10:22 PM
 */
?>
<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {

}else{
    header("Location:login.php");
}
