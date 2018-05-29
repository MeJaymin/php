<?php
class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->main_table = 'users';
        $this->primary_key = "id";
    }

    public function Insert_Data($data) {
        if($data['email'])
        {
            $email = $data['email'];
            $where = "(email= '$email')";
        }

        $query = $this->db->get_where($this->main_table, $where);
        if ($query->num_rows() == 0) 
        {
        	$this->db->insert($this->main_table, $data);
        	return $this->db->insert_id();
        }
        else
        {
        	return false;
        }
    }

    public function checkData($field ="", $extracond = ""){

        if($field == ""){
            $field = "*";
        }
        $this->db->select($field, false);
        $this->db->from($this->main_table);

        if ($extracond != "") {
            $this->db->where($extracond);
        }

        $list_data = $this->db->get()->result();
        //echo $this->db->last_query();die;
        return $list_data;
    }

    public function update($data = array(), $where = "", $wherein = False) {
        if ($wherein) {
            $this->db->where_in($this->primary_key, $where);
        } else {
            $this->db->where($where);
        }

        return $this->db->update($this->main_table, $data);
         /*echo $this->db->last_query();
        die();*/
    }
    
    public function delete($where) {
        $this->db->where_in('id', $where);
        return $this->db->delete($this->main_table);
    }
}
?>