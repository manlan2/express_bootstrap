<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 10/02/16
 * Time: 11:22 PM
 */
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>修女岛快递代理点：懒人下单</title>
    <?php require_once ('head-meta.php'); ?>
    <link href="css/portal.css" rel="stylesheet" type="text/css">
    <link href="css/add_order.css" rel="stylesheet" type="text/css">
    <script src="js/api.js"></script>
    <script src="js/order_add.js"></script>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<?php require_once ('menu-1.php'); ?>
<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){

}else{
    header('Location:login.php');
}
?>
<div class="container" style="margin-top: 5%">
<div class="show_content">
    <table class="tableAdd">
        <tr>
            <td class="tdTitle">发件人信息</td>
            <td class="tdTitle" colspan="3">
                <input type="hidden" name="hid_user_name" id="hid_user_name" value="<?php session_start(); echo $_SESSION["user_name"]?>"/>
                <!--<select name="sender_id" id="sender_select" class="showName">
                    <option value="0" selected>请选择</option>
                </select>-->
            </td>
        </tr>
        <tr>
            <th><span>*</span>姓名：
            </th>
            <td>
                <input type="hidden" name="hidDeliverID" id="hidDeliverID"/>
                <input name="txtDeliverName" type="text" id="txtDeliverName" style="width:150px;"/>
            </td>
            <th><span>*</span>电话：
            </th>
            <td>
                <input name="txtDeliverMobilePhone" type="text" id="txtDeliverMobilePhone" style="width:150px;"/>
            </td>
        </tr>
        <!--<tr>
            <th>地址：
            </th>
            <td colspan="3">
                <input name="txtDeliverAddress" type="text" id="txtDeliverAddress" style="width:400px;" />
            </td>
        </tr>-->
        <!--<tr>
            <th></th>
            <td colspan="3">
                <input id="checkDeliver" type="checkbox" name="checkDeliver" /><label for="checkDeliver">保存发件人</label>
            </td>
        </tr>-->
        <tr>
            <td class="tdTitle">收件人信息</td>
            <td class="tdTitle" colspan="3"><select name="receiver_id" id="receiver_select" class="showName">
                    <option id="0" selected>请选择</option>
                </select></td>
        </tr>
        <tr>
            <th><span>*</span>收件人：
            </th>
            <td>
                <input type="hidden" name="hidReceiverID" id="hidReceiverID"/>
                <input name="txtReceiverName" type="text" id="txtReceiverName" style="width:150px;"/>
            </td>
            <th><span>*</span>电话：
            </th>
            <td>
                <input name="txtReceiverMobilePhone" type="text" id="txtReceiverMobilePhone" style="width:150px;"/>
            </td>
        </tr>
        <tr>
            <th><span>*</span>地址：
            </th>
            <td colspan="3">
                <select name="dropSheng" id="dropSheng">
                    <option value="">=省份=</option>
                    <option value="北京市">北京市</option>
                    <option value="天津市">天津市</option>
                    <option value="上海市">上海市</option>
                    <option value="重庆市">重庆市</option>
                    <option value="辽宁省">辽宁省</option>
                    <option value="吉林省">吉林省</option>
                    <option value="黑龙江省">黑龙江省</option>
                    <option value="河北省">河北省</option>
                    <option value="山西省">山西省</option>
                    <option value="河南省">河南省</option>
                    <option value="山东省">山东省</option>
                    <option value="江苏省">江苏省</option>
                    <option value="安徽省">安徽省</option>
                    <option value="江西省">江西省</option>
                    <option value="浙江省">浙江省</option>
                    <option value="福建省">福建省</option>
                    <option value="广东省">广东省</option>
                    <option value="海南省">海南省</option>
                    <option value="台湾省">台湾省</option>
                    <option value="贵州省">贵州省</option>
                    <option value="云南省">云南省</option>
                    <option value="四川省">四川省</option>
                    <option value="湖南省">湖南省</option>
                    <option value="湖北省">湖北省</option>
                    <option value="陕西省">陕西省</option>
                    <option value="甘肃省">甘肃省</option>
                    <option value="青海省">青海省</option>
                    <option value="内蒙古自治区">内蒙古自治区</option>
                    <option value="西藏自治区">西藏自治区</option>
                    <option value="新疆维吾尔自治区">新疆维吾尔自治区</option>
                    <option value="广西壮族自治区">广西壮族自治区</option>
                    <option value="宁夏回族自治区">宁夏回族自治区</option>
                </select>
                <select name="dropShi" id="dropShi" class="showCity">
                    <option value="">=城市=</option>
                </select>
                <input type="hidden" name="hidShi" id="hidShi"/>
                <input name="txtReceiverAddress" type="text" id="txtReceiverAddress" style="width:350px;"/>
            </td>
        </tr>
        <!--<tr>
            <th>邮编：
            </th>
            <td colspan="3">
                <input name="txtReceiverPostCard" type="text" id="txtReceiverPostCard" style="width:150px;"/>
            </td>
        </tr>-->
        <tr>
            <th></th>
            <td colspan="3">
                <input id="checkReceiver" type="checkbox" name="checkReceiver"/><label
                    for="checkReceiver">保存收件人</label>
            </td>
        </tr>
        <tr>
            <td class="tdTitle">包裹信息
            </td>
            <td class="tdTitle" colspan="3">
                <input type="radio" name="dropRoute" value="4" checked>普通货物
                <input type="radio" name="dropRoute" value="2">化妆品
                <input type="radio" name="dropRoute" value="3">奶粉
                <input type="radio" name="dropRoute" value="1">海参
            </td>
        </tr>
        <tr>
            <th><span>*</span>物品明细：
            </th>
            <td colspan="3">
                <input type="hidden" name="hidTr" id="hidTr"/>
                <div style="width: 50%; float: left; color: #FF0000;">规格：例如120粒，658g，300ml</div>
                <div style="width: 50%; float: left; color: #FF0000;">品牌：例如健美生，蔻驰，MK等</div>
                <!--<div style="width: 50%; float: left; color: #FF0000;">数量：只需要输入数字</div>-->
                <!--<div style="width: 50%; float: left; color: #FF0000;">单价：可不填</div>-->
                <table class="tableDetail">
                    <tr>
                        <th>
                            <div class="table_search">检索条形码或名称</div>
                        </th>
                        <th>物品类别<b>*</b></th>
                        <th>物品名称<b>*</b></th>
                        <th>规格<b>*</b></th>
                        <th>品牌<b>*</b></th>
                        <th>数量<b>*</b></th>
                        <!--<th>单价</th>-->
                        <th>单位<b>*</b></th>
                        <th style="width: 30px;"></th>
                    </tr>
                    <tr class="hoverNo">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td></td>
                    </tr>
                    <tr class="hoverNo">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverNo">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                    <tr class="hoverYes">
                        <td><input class="search_class"></td>
                        <td><select class="LeiBie">
                                <option value=""></option>
                                <option value="食品/保健品">┝食品/保健品</option>
                                <option value="食品">　┝食品</option>
                                <option value="保健品">　┝保健品</option>
                                <option value="奶粉">┝奶粉</option>
                                <option value="婴儿奶粉">　┝婴儿奶粉</option>
                                <option value="成人奶粉">　┝成人奶粉</option>
                                <option value="衣服鞋靴纺织品">┝衣服鞋靴纺织品</option>
                                <option value="个人洗护及化妆品">┝个人洗护及化妆品</option>
                                <option value="海参/西洋参">┝海参/西洋参</option>
                                <option value="电子产品">┝电子产品</option>
                                <option value="箱包">┝箱包</option>
                                <option value="挎包、背包、提包">　┝挎包、背包、提包</option>
                                <option value="钱包、钥匙包">　┝钱包、钥匙包</option>
                                <option value="其他箱包">　┝其他箱包</option>
                                <option value="其他各类物品">┝其他各类物品</option>
                            </select></td>
                        <td><input class="MingCheng" type="text"/></td>
                        <td><input class="GuiGe" type="text"/></td>
                        <td><input class="PinPai" type="text"/></td>
                        <td><input class="ShuLiang" type="text"/></td>
                        <!--<td><input class="DanJia" type="text"/></td>-->
                        <td><select class="DanWei">
                                <option value=""></option>
                                <option value="个">个</option>
                                <option value="件">件</option>
                                <option value="瓶">瓶</option>
                                <option value="盒">盒</option>
                                <option value="块">块</option>
                                <option value="罐">罐</option>
                                <option value="包">包</option>
                                <option value="支">支</option>
                                <option value="袋">袋</option>
                                <option value="双">双</option>
                                <option value="条">条</option>
                                <option value="桶">桶</option>
                            </select></td>
                        <td><a class="detailDel">删除</a></td>
                    </tr>
                </table>
                <!--<input class="smart_search" type="button" value="物品检索"/>-->
                <input class="detailAdd" type="button" value="添加"/>
            </td>
        </tr>
        <tr>
            <th><span>*</span>重量：
            </th>
            <td>
                <input name="txtWeight" type="text" id="txtWeight" style="width:100px;"/>(磅)
            </td>
            <th>保险：
            </th>
            <td>
                <input name="txtSafeFree" type="text" id="txtSafeFree" style="width:100px;"/>($)
            </td>

        </tr>
        <tr>
            <!--<th>复核重量：
            </th>
            <td>
                <input name="txtWeightTrue" type="text" id="txtWeightTrue" style="width:100px;"/>(磅)
            </td>-->
            <th>备注：
            </th>
            <td>
                <input name="txtNote" type="text" id="txtNote" style="width:200px;"/>
            </td>
        </tr>
    </table>
    <input type="button" name="btnTJ" value="创建" id="btnTJ" class="btnAdd"/>
</div>
</div>
<?php require_once ('footer.php'); ?>
</body>
</html>
