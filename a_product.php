<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 11/02/16
 * Time: 5:06 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title></title>
    <?php require_once ('head-meta.php'); ?>
    <link rel="stylesheet" href="js/jtable.2.4.0/themes/lightcolor/gray/jtable.min.css" type="text/css"/>
    <script src="js/jtable.2.4.0/jquery.jtable.min.js" type="text/javascript"></script>
    <script src="js/api.js"></script>
    <script src="js/product.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu.php'); ?>
<?php require_once ('login_check_99.php'); ?>
<div class="container-fluid">
    <div class="filtering">
        <form>
            分类:
            <select id="categories" name="categories">
                <option selected="selected" value="">所有分类</option>
            </select>
            条形码: <input type="text" name="bar_code" id="bar_code" />
            品牌（英文）: <input type="text" name="brand_en" id="brand_en" />
            <button type="submit" id="LoadRecordsButton">检索</button>
        </form>
    </div>
    <div id="products_div"></div>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
