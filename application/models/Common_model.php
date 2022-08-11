<?php

class Common_model extends CI_Model {


	public function getAllData($table_name)
	{
		$query = $this->db->get($table_name)->result();  
    return $query; 
	}

	public function insertData($table_name, $data)
	{
		$this->db->insert($table_name, $data);
		return $this->db->insert_id();
  }

	public function deleteData($table_name, $id)
	{
		return $this->db->delete($table_name, ['id'=> $id]);
	}
}
