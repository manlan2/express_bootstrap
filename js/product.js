/**
 * Created by simon on 18/01/16.
 */
$(document).ready(function () {
    for(var key in categories){
        $('#categories').append($("<option/>", {
            value: key,
            text: categories[key]
        }));
    }

    $('#LoadRecordsButton').click(function (e) {
        e.preventDefault();
        $('#products_div').jtable('load', {
            pro_barcode: $('#bar_code').val().trim(),
            pro_brand_en: $('#brand_en').val().trim(),
            pro_category: $('#categories').val(),
        });
    });

    getProducts();

    $('#LoadRecordsButton').click();
});

function getProducts(){
    $('#products_div').jtable({
        paging: true, //Enable paging
        pageSize: 100, //Set page size (default: 10)
        sorting: true, //Enable sorting
        defaultSorting: 'pro_barcode ASC', //Set default sorting
        title: '商品库',
        actions: {
            listAction: 'a_product_p.php?action=get_products_page',
            createAction: 'a_product_p.php?action=create_product',
            updateAction: 'a_product_p.php?action=update_product',
            deleteAction: 'a_product_p.php?action=del_product'
        },//pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare
        fields: {
            pro_id: {
                key: true,
                create: false,
                edit: false,
                list: false
            },
            pro_category: {
                title: '分类',
                options: categories,
                //edit: false,
                width: '5%'
            },
            pro_barcode: {
                title: '条形码',
                width: '4%'
            },
            pro_name_en: {
                title: '英文名',
                width: '18%',
                //edit: false,
            },
            pro_name_cn: {
                title: '中文名',
                width: '5%',
                sorting : false,
                //type: 'date'
            },
            pro_order_name: {
                title: '使用名',
                width: '5%',
                list: false
            },
            pro_brand_en: {
                title: '品牌（英文）',
                //edit: false,
            },
            pro_brand_cn: {
                title: '品牌（中文）',
                width: '5%',
                sorting : false,
                list: false
            },
            pro_weight: {
                title: '重量',
                width: '3%',
                sorting : false,
                list : false
            },
            pro_size: {
                title: '规格',
                width: '4%',
                sorting : false,
            },
            pro_type: {
                title: '单位',
                options: units,
                sorting : false,
                width: '2%'
            },
            pro_note: {
                title: '备注',
                create: false,
                edit: false,
                list: false
            }
        }
    });
}