/**
 * Created by simon on 18/01/16.
 */
$(document).ready(function () {
    getSenders();
});

function getSenders(){
    $('#senders_div').jtable({
        paging: true, //Enable paging
        pageSize: 10, //Set page size (default: 10)
        sorting: true, //Enable sorting
        defaultSorting: 'sender_real_name ASC', //Set default sorting
        title: '发件人',
        actions: {
            listAction: 'a_sender_p.php?action=get_senders_page',
            createAction: 'a_sender_p.php?action=create_sender',
            updateAction: 'a_sender_p.php?action=update_sender',
            //deleteAction: 'sender_p.php?action=del_sender'
        },//sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name
        fields: {
            sender_id: {
                key: true,
                create: false,
                edit: false,
                list: false
            },
            sender_real_name: {
                title: '姓名',
                width: '10%'
            },
            sender_name: {
                title: '发件名',
                //edit: false,
            },
            sender_phone: {
                title: '电话',
                width: '10%',
                sorting : false,
                //type: 'date'
            },
            sender_address: {
                title: '地址',
                width: '20%'
            },
            sender_notes: {
                title: '备注',
                /*create: false,
                 edit: false,*/
                 list: false
            }
        }
    });

    $('#senders_div').jtable('load');
}
