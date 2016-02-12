<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 7:13 PM
 */?>
<?php
require_once( './default-init.php');
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
?>
<?php
if(isset($_POST['user_p0']) && isset($_POST['user_p1']) && isset($_POST['user_p2'])){
    var_dump($_POST);
    if($_POST['user_p1'] != $_POST['user_p2']){
        header("Location:profile.php?p=1");
    }else{
        $query = new express_db();
        session_start();
        if($query->senders_login_check($_SESSION['user_name'], $_POST['user_p0'])) {
            $query->sender_password_update($_SESSION['user_name'], $_POST['user_p1']);
            header("Location:profile.php?p=0");
        }else{
            header("Location:profile.php?p=2");
        }
    }
}else{
    header("Location:profile.php");
}
