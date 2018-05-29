<?php
class Category_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->main_table = 'categories';
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

    public function FetchCategories($field = "", $extracond = "",$orderby=""){
        if($field == ""){
            $field = "*";
        }
        $this->db->select($field, false);
        $this->db->from($this->main_table);

        if ($extracond != "") {
            $this->db->where($extracond);
        }

        if ($orderby != "") {
            $this->db->order_by($orderby);
        }

        $list_data = $this->db->get()->result();
        // echo $this->db->last_query();
        // die();
        return $list_data;
    }
}
?>