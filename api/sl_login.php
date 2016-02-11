<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 13/01/16
 * Time: 12:36 AM
 */

$postData = array(
    '__VIEWSTATE' => $login_view,
    'txtEmail' => $login_name,
    'txtPassword' => $login_password,
    'btnLogin' => $button_login,
);
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $login_url,
    CURLOPT_HEADER => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
));

header('Content-Type: text/html; charset=utf-8');

preg_match_all('/Set-Cookie:(.*?);/i', curl_exec($ch), $cookie_array); //正则匹配
curl_close($ch); //关闭curl

$cookie_login = implode(';', $cookie_array[1]);