<?php

class Attendance_model extends CI_Model {

    //table name.
    var $tableName = "attendance";

    //constructor of the model
    function __construct() {
        parent::__construct();
    }

    /* This method will get the count of all the records in the table
     * param where is to specify your selections conditions
     */

    function getTotalRecordsNumber($where = "") {
        if ($where != "") {
            if (is_string($where))
                $this->db->where($where, NULL, FALSE);
            else
                $this->db->where($where);
        }
        $this->db->from($this->tableName);
        $res = $this->db->count_all_results();
        //$query->free_result();
        return $res;
    }

    /* This method will get one record from the table
     * param key field name is the name of the column you want to specify the condition for (where ____ = ___)
     * param key field value is the value of that coulumn
     */

    function getRecord($keyFieldName, $keyFieldValue) {
        $query = $this->db->get_where($this->tableName, array($keyFieldName => $keyFieldValue));
        $res = $query->row();
        $query->free_result();
        return $res;
    }

    /* This method return the selected records from the table
     * $where is the where clause
     * $from to select from which result u wat to start selecting
     * $rows the number of rows you want to show
     * $sortby which coloumn u wanted ur result to be sorted to
     * $sortType desc or asc
     */

    function getRecords($where = "", $from = 0, $rows = 0, $sortBy = "entrytime", $sortType = "acs") {
        $this->db->order_by($sortBy, $sortType);
        if ($where != "") {
            if (is_string($where))
                $this->db->where($where, NULL, FALSE);
            else
                $this->db->where($where);
        }
        if ($from == 0 && $rows == 0) {
            $query = $this->db->get($this->tableName);
        } else {
            $query = $this->db->get($this->tableName, $rows, $from);
        }
        $res = $query->result_array();
        $query->free_result();
        return $res;
    }

    /* This method is used to insert new value in the table
     * $fieldsValues is an array of culumns name as keys and their values respectively
     */
    
    function insert_ori($table, $fieldsValues) {
        $this->db->insert($table, $fieldsValues);
        return $this->db->insert_id();
    }
    
    function insert($fieldsValues) {
        //$fieldsValues["date_entered"] = date("Y-m-d H:i:s");
        $this->db->insert("users", $fieldsValues);
        return $this->db->insert_id();
    }

    /* This method is used to update an already exsited record in the table
     * $id is the the id of the record that you want to be updated
     * $fieldsValues is an array of columns names as keys and their values to be updated.
     */

    function update($id, $fieldsValues) {
        return $this->db->update("users", $fieldsValues, array('user_id' => $id));
    }
    
    function delete($id){
        return $this->db->delete('users', array('user_id' => $id));
    }
    
    function update_others($table, $fieldsValues, $id) {
        return $this->db->update($table, $fieldsValues, $id);
    }
    
    function insert_others($table, $fieldsValues) {
        $this->db->insert($table, $fieldsValues);
        return $this->db->insert_id();
    }

    function total_staff($status = 3, $org = 'ALL', $email = "") {
        // 0 out 1 in
//        if ($status == 0) {
//            $query = $this->db->query("SELECT * FROM aga_users WHERE status = 0 order by user_full_name");
//        } elseif ($status == 1) {
//            $query = $this->db->query("SELECT * FROM aga_users WHERE status = 1 order by user_full_name");
//        }
//        else{
//            $query = $this->db->query("SELECT * FROM aga_users order by user_full_name");
//        }
        if($status == 0 || $status == 1){
            $this->db->where('status', $status);
        }
        if($org != 'ALL' && !empty($org)){
            $this->db->where('organization', $org);
        }
        if(!empty($email)){
            $this->db->where('user_email', $email);
        }
        $this->db->order_by('user_full_name asc');
        $query = $this->db->get('users');
        
        $res = $query->result_array();
        $query->free_result();
        return $res;
    }
    
    function attendance_desc(){
        $query = $this->db->query("describe attendance");
        $res = $query->result_array();
        $query->free_result();
        return $res;
    }
    
    function custom($where){
        $query = $this->db->query("SELECT * FROM attendance WHERE $where INTO OUTFILE 'file.csv'
                    FIELDS TERMINATED BY ','");
    }
    
    function table_data($org, $date1, $date2, $employee){
//        SELECT a.*, b.*
//FROM aga_users a
//RIGHT JOIN attendance b ON b.user_id = a.user_id
//WHERE organization = 'AGA' and date between "2015-09-01" AND "2015-09-25" and a.user_id = 51 and timein >= "11:00:00" 
//ORDER BY last_update, entrytime desc, `where` asc
        $this->db->select('a.*, b.* FROM users a',FALSE);
        $this->db->join('attendance b', 'b.user_id = a.user_id', 'right');
        $this->db->where("entrytime BETWEEN '$date1' AND '$date2'");
        if(!empty($org) && $org != "ALL"){
            $this->db->where("organization", $org);
        }
        if(!empty($employee)){
            $this->db->where("a.user_id", $employee);
        }        
        $this->db->order_by('lastupdate desc, `where` asc');
        
        $query = $this->db->get();
        
//        die(var_dump($query));
        $res = $query->result_array();
        $query->free_result();
        return $res;
    }
    
    function get_user($e) {
        $query = $this->db->query("SELECT * FROM users WHERE md5_id = '$e'");
        $res = $query->row();
        $query->free_result();
        return $res;
    }
    
    function check_entry($id) {
        $query = $this->db->get_where('attendance', array(//making selection
            'id' => $id
        ));

        $count = $query->num_rows(); //counting result from query
        
        if($count === 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    

}
