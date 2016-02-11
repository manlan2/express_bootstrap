<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 5:05 PM
 */
require_once( './default-init.php');
require_once( './db/db-config.php');
require_once( './db/db-operation.php');
$query = new express_db();
if(isset($_GET["action"]) && $_GET["action"] == "get_products_page"){
    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> products_query_page($_GET["jtStartIndex"], $_GET["jtPageSize"], $_GET["jtSorting"], $pro_barcode, $pro_brand_en, $pro_category);
}else if(isset($_GET["action"]) && $_GET["action"] == "get_products"){
    $query -> products_query();
}else if(isset($_GET["action"]) && $_GET["action"] == "create_product") {
    //$pro_category, $pro_barcode, $pro_name_en, $pro_name_cn, $pro_order_name, $pro_brand_en, $pro_brand_cn, $pro_weight, $pro_size, $pro_type, $pro_note=null, $spare=null
    //$query -> product_insert_jTable($_POST['pro_category'], $_POST['$pro_barcode'], $_POST['$pro_name_en'], $_POST['$pro_name_cn'], $_POST['$pro_order_name'], $_POST['$pro_brand_en'], $_POST['$pro_brand_cn'], $_POST['$pro_weight'], $_POST['$pro_size'], $_POST['$pro_type']);

    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> product_insert($pro_category, $pro_barcode, $pro_name_en, $pro_name_cn, $pro_order_name, $pro_brand_en, $pro_brand_cn, $pro_weight, $pro_size, $pro_type);
}else if(isset($_GET["action"]) && $_GET["action"] == "update_product"){
    //$query -> product_update_jTable($_POST['pro_id'], $_POST['pro_category'], $_POST['$pro_barcode'], $_POST['$pro_name_en'], $_POST['$pro_name_cn'], $_POST['$pro_order_name'], $_POST['$pro_brand_en'], $_POST['$pro_brand_cn'], $_POST['$pro_weight'], $_POST['$pro_size'], $_POST['$pro_type']);

    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> product_update($pro_id, $pro_category, $pro_barcode, $pro_name_en, $pro_name_cn, $pro_order_name, $pro_brand_en, $pro_brand_cn, $pro_weight, $pro_size, $pro_type);
}else if(isset($_GET["action"]) && $_GET["action"] == "del_product"){
    //$query -> product_del_jTable($_POST['pro_id']);

    $data = file_get_contents('php://input');
    parse_str($data);
    $query -> product_del($pro_id);
}