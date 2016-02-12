<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 8:43 PM
 */
?>
<?php
session_start();
session_destroy();
header('Location:index.php');
?>