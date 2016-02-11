/**
 * Created by simon on 18/01/16.
 */
var senders_source = {};
$(document).ready(function () {
    $('#LoadRecordsButton').click(function (e) {
        e.preventDefault();
        $('#receivers_div').jtable('load', {
            receiver_name: $('#receiver_name').val().trim(),
            sender_id: $('#senders_name').val(),
        });
    });

    $.getJSON("receiver_p.php", {action: "get_senders"}, function (data) {
        $.each(data.Records, function (key, val) {
            $('#senders_name').append($("<option/>", {
                value: val.sender_id,
                text: val.sender_real_name,
            }));
            senders_source[val.sender_id] = val.sender_real_name;
        });
        getReceivers();

        $('#LoadRecordsButton').click();
    });

});

function getReceivers() {
    $('#receivers_div').jtable({
        paging: true, //Enable paging
        pageSize: 10, //Set page size (default: 10)
        sorting: true, //Enable sorting
        defaultSorting: 'receiver_name ASC', //Set default sorting
        title: '收件人',
        actions: {
            listAction: 'receiver_p.php?action=get_receivers_page',
            createAction: 'receiver_p.php?action=create_receiver',
            updateAction: 'receiver_p.php?action=update_receiver',
            deleteAction: 'receiver_p.php?action=del_receiver'
        },//receiver_id</td><td>sender_name</td><td>receiver_name</td><td>receiver_phone</td><td>receiver_address
        fields: {
            receiver_id: {
                key: true,
                create: false,
                edit: false,
                list: false
            },
            receiver_name: {
                title: '姓名',
                width: '5%'
            },
            receiver_phone: {
                title: '电话',
                width: '10%',
                sorting: false,
                //type: 'date'
            },
            receiver_province: {
                title: '省市',
                width: '5%',
                options: provinces,
            },
            receiver_city: {
                title: '市区',
                width: '5%',
                dependsOn: 'receiver_province',
                options: function (data) {
                    if (data.source == 'list') {
                        //Return url of all countries for optimization.
                        //This method is called for each row on the table and jTable caches options based on this url.
                        return get_cities();
                    }

                    //This code runs when user opens edit/create form or changes continental combobox on an edit/create form.
                    //data.source == 'edit' || data.source == 'create'
                    return get_city(data.dependedValues.receiver_province);
                },
            },
            receiver_address: {
                title: '地址',
                width: '25%',
                sorting: false,
            },
            /*receiver_notes: {
             title: '备注',
             create: false,
             edit: false,
             list: false
             },*/
            sender_id: {
                title: '发件人',
                options: senders_source,
                //edit: false,
            },
        }
    });

    //$('#receivers_div').jtable('load');
}

function get_cities() {
    var selectTmp = {'':'=城市='};
    var str = cities.split('；');
    for (var i = 0; i < str.length - 1; i++) {
        var strTmp = str[i].split('：')[1].split('#');
        for (var j = 0; j < strTmp.length - 1; j++) {
            selectTmp[strTmp[j]] = strTmp[j];
        }
    }
    return selectTmp;
}

function get_city(receiver_province) {
    var selectTmp = {'':'=城市='};
    var str = cities.split('；');
    for (var i = 0; i < str.length - 1; i++) {
        if (receiver_province == str[i].split('：')[0]) {
            var strTmp = str[i].split('：')[1].split('#');
            for (var j = 0; j < strTmp.length - 1; j++) {
                selectTmp[strTmp[j]] = strTmp[j];
            }
            break;
        }

    }
    return selectTmp;
}