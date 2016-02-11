<?php

require_once('db-config.php');

class express_db
{

    protected $db_user = DB_USER;

    protected $db_password = DB_PASSWORD;

    protected $db_name = DB_NAME;

    protected $db_host = DB_HOST;

    public $conn;

    public $db_connect_error;

    public $db_execute_result;

    private $table_sender = 'EX_SENDER';
    private $table_receiver = 'EX_RECEIVER';
    private $table_package = 'EX_PACKAGE';
    private $table_product = 'EX_PRODUCT';
    private $action_insert = 'INSERT';
    private $action_delete = 'DELETE';
    private $action_update = 'UPDATE';
    private $action_query_all = 'SELECT ALL';
    private $action_query_id = 'SELECT ONE';

    public function get_sql($action, $table_name, $data, $id=null){
        $sql = '';
        switch ($action) {
            case $this->action_insert:
                switch ($table_name) {
                    case $this->table_sender:

                        break;
                    case $this->table_receiver:
                        break;
                    case $this->table_package:
                        break;
                    case $this->table_product:
                        break;
                    default:
                }
                break;
            case $this->action_delete:

                break;
            case $this->action_update:
                break;
            case $this->action_query_all:
                switch ($table_name) {
                    case $this->table_sender:

                        break;
                    case $this->table_receiver:
                        break;
                    case $this->table_package:
                        break;
                    case $this->table_product:
                        break;
                    default:
                }
                break;
            default:
                switch ($table_name) {
                    case $this->table_sender:
                        $sql = "INSERT INTO EX_SENDER (sender_name, sender_phone, sender_address, sender_notes, sender_real_name) VALUES ('".$data['sender_name']."','".$data['sender_phone']."','".$data['sender_address']."','".$data['sender_notes']."','".$data['sender_real_name']."')";
                        break;
                    case $this->table_receiver:
                        break;
                    case $this->table_package:
                        break;
                    case $this->table_product:
                        break;
                    default:
                }
        }
        return $sql;
    }

    public function sender_insert($sender_name, $sender_real_name, $sender_phone, $sender_address = '', $sender_notes = '')
    {
        $this->db_connect();
        $sender_address = $this->conn->real_escape_string($sender_address);
        $sql_insert = "INSERT INTO EX_SENDER (sender_name, sender_phone, sender_address, sender_notes, sender_real_name) VALUES ('$sender_name', '$sender_phone', '$sender_address', '$sender_notes', '$sender_real_name')";

        if ($this->conn->query($sql_insert) == TRUE) {
            $this->db_execute_result = true;

            $sql_last_insert = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER WHERE sender_id = LAST_INSERT_ID()";
            $result = $this->conn->query($sql_last_insert);
            $row = $result->fetch_object();

            $result_json['Result'] = "OK";
            $result_json['Record'] = $row;
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }
        $this->db_close();
        echo json_encode($result_json);
    }

    public function sender_del($id)
    {
        $this->db_connect();

        $sql_del = "DELETE FROM EX_SENDER WHERE sender_id=$id";
        if ($this->conn->query($sql_del) == TRUE) {
            $this->db_execute_result = true;

            $result_json['Result'] = "OK";
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }

        $this->db_close();
        echo json_encode($result_json);

    }

    public function sender_update($id, $sender_name, $sender_real_name, $sender_phone, $sender_address = '', $sender_notes = '')
    {
        $this->db_connect();
        $sender_address = $this->conn->real_escape_string($sender_address);
        $sql = "UPDATE EX_SENDER SET sender_name='$sender_name', sender_real_name='$sender_real_name', sender_phone= '$sender_phone', sender_address='$sender_address', sender_notes='$sender_notes' WHERE sender_id = $id";

        if ($this->conn->query($sql) == true) {
            $this->db_execute_result = true;
            $result_json = array();
            $result_json['Result'] = "OK";
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }

        $this->db_close();
        echo json_encode($result_json);
    }

    public function senders_query()
    {
        $this->db_connect();
        $result_json = array();
        //$sql = $this->format_sql($this->action_query_all, $this->table_sender, $this->table_sender_array);
        $sql = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER";
        $result = $this->conn->query($sql);

        //if ($result->num_rows > 0) {
            $this->db_execute_result = true;
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result_json['Result'] = "OK";
            $result_json['Records'] = $rows;
        //} else {
        //    $this->db_execute_result = false;
        //    $result_json['Result'] = "ERROR";
        //}
        $this->db_close();
        echo json_encode($result_json);
    }

    public function senders_login_check($name, $password)
    {
        $this->db_connect();
        $name = $this->conn->real_escape_string($name);
        $password = $this->conn->real_escape_string($password);
        $sql = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER WHERE user_name = '$name' and user_password = '$password'";
        $result = $this->conn->query($sql);
        return $result->num_rows == 1;
    }

    public function senders_query_page($jtStartIndex, $jtPageSize, $jtSorting)
    {
        $this->db_connect();
        $sql_page = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER ORDER BY $jtSorting LIMIT $jtStartIndex, $jtPageSize";
        $result = $this->conn->query($sql_page);

        //if ($result->num_rows > 0) {
        $this->db_execute_result = true;

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $result_json = array();
        $result_json['Result'] = "OK";
        $result_json['Records'] = $rows;
        //} else {
        //    $this->db_execute_result = false;
        //}

        $sql_count = "SELECT count(*) as total from EX_SENDER";
        $result = $this->conn->query($sql_count);
        $row = $result -> fetch_assoc();
        $result_json['TotalRecordCount'] = $row['total'];
        //{ Result = "OK", Records = students, TotalRecordCount = studentCount }
        $this->db_close();
        echo json_encode($result_json);
    }

    public function sender_query_id($id)
    {
        $this->db_connect();
        $result_json = array();
        $sql = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER WHERE sender_id = " . $id;
        $result = $this->conn->query($sql);

        //if ($result->num_rows > 0) {
            $this->db_execute_result = true;
            // output data of each row
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result_json['Result'] = "OK";
            $result_json['Records'] = $rows;
        //} else {
        //    $this->db_execute_result = false;
        //    $result_json['Result'] = "ERROR";
        //}
        $this->db_close();
        echo json_encode($result_json);
    }

    public function sender_query_user_name_obj($user_name)
    {
        $this->db_connect();
        $result_json = array();
        $sql = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name, user_level FROM EX_SENDER WHERE user_name = '" . $user_name . "'";
        $result = $this->conn->query($sql);

        $this->db_execute_result = true;
        // output data of each row
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $result_json['Result'] = "OK";
        $result_json['Records'] = $rows[0];
        $this->db_close();
        return $rows[0];
    }

    public function sender_query_user_name($user_name)
    {
        $this->db_connect();
        $result_json = array();
        $sql = "SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER WHERE user_name = '" . $user_name . "'";
        $result = $this->conn->query($sql);

        $this->db_execute_result = true;
        // output data of each row
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $result_json['Result'] = "OK";
        $result_json['Records'] = $rows[0];
        $this->db_close();
        echo json_encode($result_json);
    }

    public function receiver_insert($sender_id, $receiver_name, $receiver_phone, $receiver_province, $receiver_city, $receiver_address)
    {
        $this->db_connect();
        $receiver_address = $this->conn->real_escape_string($receiver_address);
        $sql_insert = "INSERT INTO EX_RECEIVER (sender_id, receiver_name, receiver_phone, receiver_province, receiver_city, receiver_address) VALUES ('$sender_id', '$receiver_name', '$receiver_phone', '$receiver_province', '$receiver_city', '$receiver_address')";

        if ($this->conn->query($sql_insert) == TRUE) {
            $this->db_execute_result = true;

            $sql_last_insert = "SELECT receiver_id, sender_id, receiver_name, receiver_phone, receiver_province, receiver_city, receiver_address FROM EX_RECEIVER WHERE receiver_id = LAST_INSERT_ID()";
            $result = $this->conn->query($sql_last_insert);
            $row = $result->fetch_object();

            $result_json['Result'] = "OK";
            $result_json['Record'] = $row;
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }
        $this->db_close();
        echo json_encode($result_json);
    }

    public function receiver_del($id)
    {
        $this->db_connect();

        $sql_del = "DELETE FROM EX_RECEIVER WHERE receiver_id=$id";
        if ($this->conn->query($sql_del) == TRUE) {
            $this->db_execute_result = true;

            $result_json['Result'] = "OK";
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }

        $this->db_close();
        echo json_encode($result_json);

    }

    public function receiver_update($receiver_id, $sender_id, $receiver_name, $receiver_phone, $receiver_province, $receiver_city, $receiver_address)
    {
        $this->db_connect();
        $receiver_address = $this->conn->real_escape_string($receiver_address);
        $sql = "UPDATE EX_RECEIVER SET sender_id='$sender_id', receiver_name='$receiver_name', receiver_phone= '$receiver_phone', receiver_province='$receiver_province', receiver_city='$receiver_city', receiver_address='$receiver_address' WHERE receiver_id = $receiver_id";

        if ($this->conn->query($sql) == true) {
            $this->db_execute_result = true;
            $result_json = array();
            $result_json['Result'] = "OK";
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }

        $this->db_close();
        echo json_encode($result_json);
    }

    public function receivers_query()
    {
        $this->db_connect();
        $result_json = array();
        $sql = "SELECT r.receiver_id, r.receiver_name, r.receiver_phone, r.receiver_province, r.receiver_city, r.receiver_address, r.receiver_postal, s.sender_id, s.sender_name, s.sender_real_name FROM EX_RECEIVER r, EX_SENDER s WHERE r.sender_id = s.sender_id";
        $result = $this->conn->query($sql);

        //if ($result->num_rows > 0) {
            $this->db_execute_result = true;
            // output data of each row
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result_json['Result'] = "OK";
            $result_json['Records'] = $rows;
        /*} else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }*/

        $this->db_close();
        echo json_encode($result_json);
    }

    public function receivers_query_page($jtStartIndex, $jtPageSize, $jtSorting, $sender_id, $receiver_name)
    {
        $sql_query = "";
        if($sender_id || $receiver_name){
            $sql_query .= " where";
            if($sender_id){
                $sql_query .= " sender_id = '$sender_id' and";
            }
            if($receiver_name){
                $sql_query .= " receiver_name LIKE '%$receiver_name%' and";
            }
            $sql_query = substr($sql_query, 0, strlen($sql_query)-4);
        }


        $this->db_connect();
        $sql_page = "SELECT receiver_id, sender_id, receiver_name, receiver_phone, receiver_province, receiver_city, receiver_address, receiver_postal FROM EX_RECEIVER".$sql_query." ORDER BY $jtSorting LIMIT $jtStartIndex, $jtPageSize";
        $result = $this->conn->query($sql_page);

        //if ($result->num_rows > 0) {
        $this->db_execute_result = true;

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $result_json = array();
        $result_json['Result'] = "OK";
        $result_json['Records'] = $rows;
        //} else {
        //    $this->db_execute_result = false;
        //}

        $sql_count = "SELECT count(*) as total from EX_RECEIVER".$sql_query;
        $result = $this->conn->query($sql_count);
        $row = $result -> fetch_assoc();
        $result_json['TotalRecordCount'] = $row['total'];
        //{ Result = "OK", Records = students, TotalRecordCount = studentCount }
        $this->db_close();
        echo json_encode($result_json);
    }

    public function receivers_query_sender_id($id)
    {
        $this->db_connect();
        $result_json = array();
        $sql = "SELECT receiver_id, receiver_name, receiver_phone, receiver_province, receiver_city, receiver_address, receiver_postal FROM EX_RECEIVER WHERE sender_id = " . $id;
        $result = $this->conn->query($sql);

        //if ($result->num_rows > 0) {
            $this->db_execute_result = true;
            // output data of each row
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result_json['Result'] = "OK";
            $result_json['Records'] = $rows;
        /*} else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }*/
        $this->db_close();
        echo json_encode($result_json);
    }

    public function product_insert($pro_category, $pro_barcode, $pro_name_en, $pro_name_cn, $pro_order_name, $pro_brand_en, $pro_brand_cn, $pro_weight, $pro_size, $pro_type, $pro_note=null, $spare=null)
    {
        $result_json = array();

        $this->db_connect();
        $pro_name_en = $this->conn->real_escape_string($pro_name_en);
        $pro_brand_en = $this->conn->real_escape_string($pro_brand_en);
        //$sql = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT";
        $sql_insert = "INSERT INTO EX_PRODUCT(pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare) VALUE ('$pro_category', '$pro_barcode', '$pro_name_en', '$pro_name_cn', '$pro_order_name', '$pro_brand_en', '$pro_brand_cn', '$pro_weight', '$pro_size', '$pro_type', '$pro_note', '$spare')";

        if ($this->conn->query($sql_insert) == TRUE) {
            $this->db_execute_result = true;

            $sql_last_insert = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT WHERE pro_id = LAST_INSERT_ID()";
            $result = $this->conn->query($sql_last_insert);
            $row = $result->fetch_object();

            $result_json['Result'] = "OK";
            $result_json['Record'] = $row;
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }
        $this->db_close();
        echo json_encode($result_json);
    }

    public function product_del($pro_id)
    {
        $result_json = array();
        $this->db_connect();

        //$sql = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT";
        $sql_del = "DELETE FROM EX_PRODUCT WHERE pro_id = '$pro_id'";

        if ($this->conn->query($sql_del) == TRUE) {
            $this->db_execute_result = true;

            $result_json['Result'] = "OK";
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }

        $this->db_close();
        echo json_encode($result_json);
    }

    public function product_update($pro_id, $pro_category, $pro_barcode, $pro_name_en, $pro_name_cn, $pro_order_name, $pro_brand_en, $pro_brand_cn, $pro_weight, $pro_size, $pro_type, $pro_note=null, $spare=null)
    {
        $this->db_connect();
        $pro_name_en = $this->conn->real_escape_string($pro_name_en);
        $pro_brand_en = $this->conn->real_escape_string($pro_brand_en);
        //$sql = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT";
        $sql = "UPDATE EX_PRODUCT SET pro_category = '$pro_category', pro_barcode='$pro_barcode', pro_name_en='$pro_name_en', pro_name_cn='$pro_name_cn', pro_order_name='$pro_order_name', pro_brand_en='$pro_brand_en', pro_brand_cn='$pro_brand_cn', pro_weight='$pro_weight', pro_size='$pro_size', pro_type='$pro_type', pro_note='$pro_note', spare='$spare' WHERE pro_id = '$pro_id'";

        if ($this->conn->query($sql) == true) {
            $this->db_execute_result = true;
            $result_json = array();
            $result_json['Result'] = "OK";
        } else {
            $this->db_execute_result = false;
            $result_json['Result'] = "ERROR";
        }

        $this->db_close();
        echo json_encode($result_json);
    }

    public function products_query()
    {
        $this->db_connect();

        $sql = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT";
        $result = $this->conn->query($sql);

        //if ($result->num_rows > 0) {
            $this->db_execute_result = true;

            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result_json = array();
            $result_json['Result'] = "OK";
            $result_json['Records'] = $rows;
        /*} else {
            $this->db_execute_result = false;
        }*/

        $this->db_close();
        echo json_encode($result_json);
    }

    public function products_query_page($jtStartIndex, $jtPageSize, $jtSorting, $pro_barcode, $pro_brand_en, $pro_category)
    {
        $sql_query = "";
        if($pro_barcode || $pro_brand_en || $pro_category){
            $sql_query .= " where";
            if($pro_barcode){
                $sql_query .= " pro_barcode LIKE '%$pro_barcode%' and";
            }
            if($pro_brand_en){
                $sql_query .= " pro_brand_en LIKE '%$pro_brand_en%' and";
            }
            if($pro_category){
                $sql_query .= " pro_category LIKE '%$pro_category%' and";
            }
            $sql_query = substr($sql_query, 0, strlen($sql_query)-4);
        }


        $this->db_connect();
        $sql_page = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT".$sql_query." ORDER BY $jtSorting LIMIT $jtStartIndex, $jtPageSize";
        $result = $this->conn->query($sql_page);

        //if ($result->num_rows > 0) {
            $this->db_execute_result = true;

            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            $result_json = array();
            $result_json['Result'] = "OK";
            $result_json['Records'] = $rows;
        //} else {
        //    $this->db_execute_result = false;
        //}

        $sql_count = "SELECT count(*) as total from EX_PRODUCT".$sql_query;
        $result = $this->conn->query($sql_count);
        $row = $result -> fetch_assoc();
        $result_json['TotalRecordCount'] = $row['total'];
        //{ Result = "OK", Records = students, TotalRecordCount = studentCount }
        $this->db_close();
        echo json_encode($result_json);
    }

    public function products_query_search()
    {
        $this->db_connect();

        //$sql = "SELECT pro_id, pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_order_name, pro_brand_en, pro_brand_cn, pro_weight, pro_size, pro_type, pro_note, spare FROM EX_PRODUCT";
        $sql = "SELECT CONCAT(pro_barcode,'-', pro_name_en, '-', pro_name_cn) AS 'label', pro_category, pro_barcode, pro_name_en, pro_name_cn, pro_brand_en, pro_size, pro_type FROM EX_PRODUCT ORDER BY pro_category ASC";
        $result = $this->conn->query($sql);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        $this->db_close();
        echo json_encode($rows);
    }

    /* var $table_sender_array = array('sender_id' => '', 'sender_name' => '', 'sender_phone' => '', 'sender_address' => '', 'sender_real_name' => '');
    var $table_receiver_array = array('receiver_id' => '', 'sender_id' => '', 'receiver_name' => '', 'receiver_phone' => '', 'receiver_province' => '', 'receiver_city'=>'', 'receiver_address'=>'');

    private function format_sql($action, $table_name, $data, $id=null)
    {
        $sql = '';
        switch ($action) {
            case $this->action_insert://注意主键
                switch ($table_name) {
                    case $this->table_sender:
                        //INSERT INTO EX_SENDER (sender_name, sender_phone, sender_address, sender_notes, sender_real_name) VALUES ($sender_name, $sender_phone, $sender_address, $sender_notes, $sender_real_name)
                        //INSERT INTO EX_SENDER(sender_id,sender_name,sender_phone,sender_address,sender_real_name,sender_notes) values ("",测试,123123,"",真名,"")
                        $sql = 'INSERT INTO '.$table_name.'(';
                        $str_key = implode(',', array_keys($data));
                        $pos_key = strpos($str_key,",");
                        $sql .= substr($str_key, $pos_key+1, strlen($str_key)-$pos_key);
                        $sql .= ') values (';
                        $str_value = $this->implode_empty_data($data);
                        $pos_value = strpos($str_value,",");
                        $sql .= substr($str_value, $pos_value+1, strlen($str_value)-$pos_value);;
                        $sql .= ')';
                        break;
                    case $this->table_receiver:
                        break;
                    case $this->table_package:
                        break;
                    case $this->table_product:
                        break;
                    default:
                }
                break;
            case $this->action_delete:

                break;
            case $this->action_update:
                break;
            case $this->action_query_all:
                switch ($table_name) {
                    case $this->table_sender:
                        //SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER;
                        $sql = 'SELECT ';
                        $sql .= implode(',', array_keys($data));
                        $sql .= ' FROM '.$this->table_sender;
                        break;
                    case $this->table_receiver:
                        break;
                    case $this->table_package:
                        break;
                    case $this->table_product:
                        break;
                    default:
                }
                break;
            default:
                switch ($table_name) {
                    case $this->table_sender:
                        //SELECT sender_id, sender_name, sender_phone, sender_address, sender_notes, sender_real_name FROM EX_SENDER WHERE sender_id = " . $id;
                        $sql = 'SELECT ';
                        $sql .= implode(',', array_keys($data));
                        $sql .= ' FROM '.$this->table_sender.' WHERE sender_id='.$id;
                        break;
                    case $this->table_receiver:
                        break;
                    case $this->table_package:
                        break;
                    case $this->table_product:
                        break;
                    default:
                }
        }
        return $sql;
    }*/

    public function insert()
    {
        $this->db_connect();

        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

        if ($this->conn->query($sql) == TRUE) {
            $this->db_execute_result = true;
        } else {
            $this->db_execute_result = false;
        }

        $this->db_close();
    }

    public function insert_multiple()
    {
        $this->db_connect();

        $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com');";
        $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
        $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";

        if ($this->conn->multi_query($sql) == TRUE) {
            $this->db_execute_result = true;
        } else {
            $this->db_execute_result = false;
        }

        $this->db_close();
    }

    public function delete_by_id($id)
    {
        $this->db_connect();

        $sql = "DELETE FROM MyGuests WHERE id=3";
        if ($this->conn->query($sql) == TRUE) {
            $this->db_execute_result = true;
        } else {
            $this->db_execute_result = false;
        }
        $this->db_close();
    }

    public function update()
    {
        $this->db_connect();

        $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

        if ($this->conn->query($sql) == TRUE) {
            $this->db_execute_result = true;
        } else {
            $this->db_execute_result = false;
        }

        $this->db_close();
    }

    public function query()
    {
        $this->db_connect();

        $sql = "SELECT id, firstname, lastname FROM MyGuests";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $this->db_execute_result = true;
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        } else {
            $this->db_execute_result = false;
        }

        $this->db_close();
    }

    public function db_connect()
    {
        /*$this->db_user = DB_USER;
        $this->db_password = DB_PASSWORD;
        $this->db_name = DB_NAME;
        $this->db_host = DB_HOST;*/
        $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name);
        // Check connection
        if ($this->conn->connect_error) {
            $this->db_connect_error = $this->conn->connect_error;
            return false;
        } else {
            $this->conn->set_charset('utf8');
            return true;
        }
    }

    public function db_close()
    {
        $this->conn->close();
    }

    /*private function implode_empty_key($array){
        $result = '';
        $arr_length = count($array);
        for($x = 0; $x < $arr_length; $x++) {
            if($x==0){
                continue;
            }
            $result.=','.$array[$x];
        }
        return substr($result, 1, strlen($result)-1);
    }*/

    private function implode_empty_data($array){
        $result = '';
        /*$arr_length = count($array);
        for($x = 0; $x < $arr_length; $x++) {
            if($x==0){
                continue;
            }
            if(empty($array[$x])){
                $result .= ',""';
            }else{
                $result.=','.$array[$x];
            }
        }
        return substr($result, 1, strlen($result)-1);*/
        foreach($array as $key=>$value){
            if(empty($value)){
                $result .= ',""';
            }else{
                $result.=',"'.$value.'"';
            }
        }
        return substr($result, 1, strlen($result)-1);
    }
}
