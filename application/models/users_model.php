<?php

class Users_model extends CI_Model {

    //table name.
    var $tableName = "users";

    //constructor of the model
    function ProductsModel() {
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

    function getRecords($where = "", $from = 0, $rows = 0, $sortBy = "user_email, last_update", $sortType = "acs") {
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

    function insert($fieldsValues) {
        //$fieldsValues["date_entered"] = date("Y-m-d H:i:s");
        $this->db->insert($this->tableName, $fieldsValues);
        return $this->db->insert_id();
    }

    /* This method is used to update an already exsited record in the table
     * $id is the the id of the record that you want to be updated
     * $fieldsValues is an array of columns names as keys and their values to be updated.
     */

    function update($id, $fieldsValues) {
        return $this->db->update($this->tableName, $fieldsValues, array('id' => $id));
    }
    
    function total_staff(){
        $query = $this->db->query("SELECT COUNT(*) count FROM aga_attendance");
        $res = $query->row();
        $query->free_result();
        return $res->count;
    }

}
