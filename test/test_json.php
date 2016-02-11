<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 3:16 PM
 */
$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
echo $arr['e'];
$json = json_encode($arr);
echo $json;
echo $json["c"];
echo json_decode("$json");