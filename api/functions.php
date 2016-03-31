<?php

/**
 * 从链接中取得参数ID的值
 * @param $str
 * @return mixed
 */
function get_id($str){
    $query_string = parse_url($str, PHP_URL_QUERY);
    parse_str($query_string, $vars);
    return $vars['ID'];
}


/**
 * 取得链接中的数字
 * @param $str
 * @return mixed
 */
function find_num($str){
    return preg_replace('/\D/s', '', $str);
}

function find_express_name($str){//国内转运物流名称：顺丰快递   物流编号：976727845380
    $matches = array();
    preg_match('/[\x{4e00}-\x{9fa5}]{2}快递/u', $str, $matches);
    return $matches[0];
}

function is_login(){
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
        return true;
    }else{
        return false;
    }
}