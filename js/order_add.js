/**
 * Created by Ling on 2016-01-18.
 */
$(document).ready(function () {
    //get_senders();

    get_sender_receivers();
    get_products();

    /*$('#sender_select').change(function () {
        get_sender_detail();
        get_receivers();
    });*/

    $('#receiver_select').change(function () {
        get_receiver_detail();
    });

    $("#dropSheng").change(function () {
        var index = $("#dropSheng").index($(this));
        if ($(this).val() != "") {
            var str = cities.split('；');
            for (var i = 0; i < str.length - 1; i++) {
                if ($(this).val() == str[i].split('：')[0]) {
                    var strTmp = str[i].split('：')[1].split('#');
                    var selectTmp = "<option value=\"\">=城市=</option>";
                    for (var j = 0; j < strTmp.length - 1; j++) {
                        selectTmp += "<option value=\"" + strTmp[j] + "\">" + strTmp[j] + "</option>";
                    }
                    $("#dropShi").eq(index).html(selectTmp);
                    break;
                }
            }
        }else{
            $("#dropShi").html("<option value=\"\">=城市=</option>");
        }
    });

    /*$(".smart_search").click(function () {
     return false;
     //get_products();
     });*/

    $(".detailDel").click(function () {
        var index = $("tr.hoverNo .detailDel").index($(this));
        $(".tableDetail").find("tr.hoverNo").eq(index + 1).removeClass("hoverNo").addClass("hoverYes");
    });

    $(".detailAdd").click(function () {
        $(".tableDetail tr.hoverYes").eq(0).removeClass("hoverYes").addClass("hoverNo");
    });

    $("#btnTJ").click(function () {
        $("#hidShi").val($("#dropShi").val());
        if ($("#dropRoute").val() == "") {
            show_error('请选择包裹类型！');
            return false;
        }
        if ($("#txtDeliverName").val() == "") {
            show_error('请输入发件人姓名！');
            return false;
        }
        if ($("#txtDeliverMobilePhone").val() == "") {
            show_error("请输入发件人电话！");
            return false;
        }
        if ($("#txtReceiverName").val() == "") {
            show_error("请输入收件人姓名！");
            return false;
        }
        if ($("#txtReceiverMobilePhone").val() == "") {
            show_error("请输入收件人电话！");
            return false;
        }
        if ($("#txtReceiverAddress").val() == "") {
            show_error("请输入收件人地址！");
            return false;
        }
        var strOut = "";
        $(".hoverNo").each(function () {
            var index = $(".hoverNo").index($(this));
            if ($(".hoverNo .MingCheng").eq(index).val() != "") {
                strOut += $(".hoverNo .LeiBie").eq(index).val() + "—" + $(".hoverNo .MingCheng").eq(index).val() + "—" + $(".hoverNo .GuiGe").eq(index).val() + "—" + $(".hoverNo .PinPai").eq(index).val() + "—" + $(".hoverNo .ShuLiang").eq(index).val() + "—" + /*$(".hoverNo .DanJia").eq(index).val()*/ "" + "—" + $(".hoverNo .DanWei").eq(index).val() + "@";
            }
        });
        $("#hidTr").val(strOut);
        if ($("#hidTr").val() == "") {
            show_error("包裹明细必须填写！");
            return false;
        }

        if ($("#checkReceiver").is(':checked')) {
            save_receiver();
        }

        submit_data();

    });
});

function get_senders() {
    $.getJSON("order_add_p.php", {action:"get_senders"}, function (data) {
        $.each(data.Records, function (key, val) {
            $('#sender_select').append($("<option/>", {
                value: val.sender_id,
                text: val.sender_real_name,
                sender_phone: val.sender_phone,
                sender_name: val.sender_name
            }));
        });
    });
}


function get_sender_detail() {
    if($('option:selected', '#sender_select').val() == 0){
        $('#txtDeliverName').val('');
        $('#txtDeliverMobilePhone').val('');
    }else{
        $('#txtDeliverName').val($('option:selected', '#sender_select').attr('sender_name'));
        $('#txtDeliverMobilePhone').val($('option:selected', '#sender_select').attr('sender_phone'));
    }
}

function get_sender_receivers(){
    $.getJSON("order_add_p.php", {action:"get_sender_user_name", user_name:$('#hid_user_name').val()}, function (data) {
        $('#txtDeliverName').val(data.Records.sender_name);
        $('#txtDeliverMobilePhone').val(data.Records.sender_phone);
        get_receivers(data.Records.sender_id);
    });
}

function get_receivers(sender_id) {
    initial_receivers();

    $.getJSON("order_add_p.php", {action:"get_receivers", id:sender_id}, function (data) {
        $.each(data.Records, function (key, val) {
            $('#receiver_select').append($("<option/>", {//receiver_id, receiver_name, receiver_phone, receiver_province, receiver_city, receiver_address, receiver_postal
                value: val.receiver_id,
                text: val.receiver_name,
                receiver_phone: val.receiver_phone,
                receiver_province : val.receiver_province,
                receiver_city : val.receiver_city,
                receiver_address : val.receiver_address
            }));
        });
    });
}

function get_receiver_detail() {
    $('#hidReceiverID').val($('#receiver_select').val());
    $('#txtReceiverName').val($('option:selected', '#receiver_select').text());
    $('#txtReceiverMobilePhone').val($('option:selected', '#receiver_select').attr('receiver_phone'));
    $('#dropSheng').val($('option:selected', '#receiver_select').attr('receiver_province')).change();
    $('#dropShi').val($('option:selected', '#receiver_select').attr('receiver_city'));
    $('#txtReceiverAddress').val($('option:selected', '#receiver_select').attr('receiver_address'));
}

function save_receiver(){
    if($('#hidReceiverID').val() == '' || $('#hidReceiverID').val() == "请选择"){
        $.ajax({
            url: "order_add_p.php",
            data: {
                action : "save_receiver",
                sender_id : $('#sender_select').val(),
                receiver_name: $("#txtReceiverName").val(),
                receiver_phone : $("#txtReceiverMobilePhone").val(),
                receiver_province : $("#dropSheng").val(),
                receiver_city : $("#dropShi").val(),
                receiver_address : $("#txtReceiverAddress").val()
            },

            success: function( resp ) {
            },
            error: function() {
                show_contact();
            }
        });
    }else{
        $.ajax({
            url: "order_add_p.php",
            data: {
                action : "update_receiver",
                receiver_id : $('#hidReceiverID').val(),
                sender_id : $('#sender_select').val(),
                receiver_name: $("#txtReceiverName").val(),
                receiver_phone : $("#txtReceiverMobilePhone").val(),
                receiver_province : $("#dropSheng").val(),
                receiver_city : $("#dropShi").val(),
                receiver_address : $("#txtReceiverAddress").val()
            },

            success: function( resp ) {
            },
            error: function() {
                show_contact();
            }
        });
    }
}

function submit_data(){
    $.ajax({
        dataType: "json",
        url: "order_add_p.php",
        method: "POST",
        data: {
            'dropRoute': $("input[name=dropRoute]:checked").val(),//1
            'txtDeliverName': $("#txtDeliverName").val(),//2
            'txtDeliverMobilePhone': $("#txtDeliverMobilePhone").val(),//3
            'txtReceiverName': $("#txtReceiverName").val(),//4
            'txtReceiverMobilePhone': $("#txtReceiverMobilePhone").val(),//5
            'dropSheng': $('#dropSheng').val(),
            'dropShi': $("#dropShi").val(),
            'hidShi': $("#hidShi").val(),
            'txtReceiverAddress': $("#txtReceiverAddress").val(),//8
            'hidTr': $("#hidTr").val(),//9-11：var strOut +=  类别-名称-规格-品牌-数量-单价-单位@
            'txtWeight': $("#txtWeight").val(),//15
            'txtSafeFree': $("#txtSafeFree").val(),//16
            'txtNote':$("#txtNote").val(),
        },
        beforeSend: function() {
            //$('#order_load').show();
        },
        success: function( resp ) {
            //$('#order_load').hide();
            if(resp.Result == "ERROR"){
                //show_contact();
            }else{
                window.location.href = "order_display.php";
                /*$( "#dialog-confirm" ).dialog({
                 resizable: false,
                 height:140,
                 modal: true,
                 buttons: {
                 "查看定单": function() {
                 $( this ).dialog( "close" );
                 },
                 Cancel: function() {
                 $( this ).dialog( "close" );
                 }
                 }
                 });*/

                //resp.Records
                /*var d = dialog({
                 width: 300,
                 title: '提示',
                 content: '订单提交成功！',
                 okValue: '查看订单',
                 ok: function () {
                 window.location.href = base_url + "?p=4";
                 },
                 cancelValue: '确定',
                 cancel: function () {
                 }
                 });
                 d.show();*/
            }
        },
        error: function() {
            show_contact();
        }
    });
}

function initial_receivers(){
    $('#receiver_select').html('<option id="0" selected>请选择</option>');
    $('#receiver_select').change();

}

function get_products(){
    /*var d = dialog({
     width: 800,
     title: '商品库',
     url : 'product/product.html',
     });
     d.show();*/

    $.widget( "custom.catcomplete", $.ui.autocomplete, {
        _create: function() {
            this._super();
            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
        },
        _renderMenu: function( ul, items ) {
            var that = this,
                currentCategory = "";
            $.each( items, function( index, item ) {
                var li;
                if ( item.pro_category != currentCategory ) {
                    ul.append( "<li class='ui-autocomplete-category'>" + item.pro_category + "</li>" );
                    currentCategory = item.pro_category;
                }
                li = that._renderItemData( ul, item );
                /*if ( item.category ) {
                 li.attr( "aria-label", item.label );
                 li.attr( "bar_code", item.bar_code);
                 }*/
            });
        }
    });



    $.getJSON("order_add_p.php", {action:"get_products"}, function (data) {
        $( ".search_class" ).catcomplete({
            delay: 0,
            source: data,
            //pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare
            select: function( event, ui ) {
                var pro_json = ui.item;//pro_id as value, pro_category, pro_barcode, pro_name_en, pro_name_cn, CONCAT(pro_barcode,'-', pro_name_en) as label, pro_brand_en, pro_size, pro_type

                var this_category = $(this).parent().next();
                this_category.children().first().val(pro_json.pro_category);

                var this_pro_name_cn = this_category.next();
                this_pro_name_cn.children().first().val(pro_json.pro_name_cn);

                var this_pro_size = this_pro_name_cn.next();
                this_pro_size.children().first().val(pro_json.pro_size);

                var this_pro_brand_en = this_pro_size.next();
                this_pro_brand_en.children().first().val(pro_json.pro_brand_en);

                var this_amount = this_pro_brand_en.next();
                this_amount.children().first().first().val(1);

                var this_pro_type = this_amount.next();
                this_pro_type.children().first().val(pro_json.pro_type);
            }
        });
    });

}

function get_products_2(){
    $.widget( "custom.combobox", {
        _create: function() {
            this.wrapper = $( "<span>" )
                .addClass( "custom-combobox" )
                .insertAfter( this.element );

            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
        },

        _createAutocomplete: function() {
            var selected = this.element.children( ":selected" ),
                value = selected.val() ? selected.text() : "";

            this.input = $( "<input>" )
                .appendTo( this.wrapper )
                .val( value )
                .attr( "title", "" )
                .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                .autocomplete({
                    delay: 0,
                    minLength: 0,
                    source: $.proxy( this, "_source" )
                })
                .tooltip({
                    tooltipClass: "ui-state-highlight"
                });

            this._on( this.input, {
                autocompleteselect: function( event, ui ) {
                    ui.item.option.selected = true;
                    this._trigger( "select", event, {
                        item: ui.item.option
                    });
                },

                autocompletechange: "_removeIfInvalid"
            });
        },

        _createShowAllButton: function() {
            var input = this.input,
                wasOpen = false;

            $( "<a>" )
                .attr( "tabIndex", -1 )
                .attr( "title", "Show All Items" )
                .tooltip()
                .appendTo( this.wrapper )
                .button({
                    icons: {
                        primary: "ui-icon-triangle-1-s"
                    },
                    text: false
                })
                .removeClass( "ui-corner-all" )
                .addClass( "custom-combobox-toggle ui-corner-right" )
                .mousedown(function() {
                    wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                })
                .click(function() {
                    input.focus();

                    // Close if already visible
                    if ( wasOpen ) {
                        return;
                    }

                    // Pass empty string as value to search for, displaying all results
                    input.autocomplete( "search", "" );
                });
        },

        _source: function( request, response ) {
            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
            response( this.element.children( "option" ).map(function() {
                var text = $( this ).text();
                if ( this.value && ( !request.term || matcher.test(text) ) )
                    return {
                        label: text,
                        value: text,
                        option: this
                    };
            }) );
        },

        _removeIfInvalid: function( event, ui ) {

            // Selected an item, nothing to do
            if ( ui.item ) {
                return;
            }

            // Search for a match (case-insensitive)
            var value = this.input.val(),
                valueLowerCase = value.toLowerCase(),
                valid = false;
            this.element.children( "option" ).each(function() {
                if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                    this.selected = valid = true;
                    return false;
                }
            });

            // Found a match, nothing to do
            if ( valid ) {
                return;
            }

            // Remove invalid value
            this.input
                .val( "" )
                .attr( "title", value + " didn't match any item" )
                .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
                this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.autocomplete( "instance" ).term = "";
        },

        _destroy: function() {
            this.wrapper.remove();
            this.element.show();
        }
    });

    $( ".search_class" ).combobox();
}