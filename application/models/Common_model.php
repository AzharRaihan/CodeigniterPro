<?php

class Common_model extends CI_Model {


	/**
	 * Gell All Data
	 * Param $tabel_name,
	 * return 
	 */
	public function getAllData($table_name)
	{
		$query = $this->db->get($table_name)->result();  
    return $query; 
	}
	/**
	 * Insert Data
	 * Param $tabel_name, $data,
	 * return 
	 */
	public function insertData($table_name, $data)
	{
		$this->db->insert($table_name, $data);
		return $this->db->insert_id();
  }
	/**
	 * Edit By Id
	 * Param $id, $table_name,
	 * return 
	 */
	public function editData($id, $table_name)
  {
		$this->db->select("*");
		$this->db->from($table_name);
		$this->db->where("id", $id);
    return $this->db->get()->row();
  }
	/**
	 * Update By Id
	 * Param $data, $id, $table_name
	 * return 
	 */
	public function updateData($data, $id, $table_name)
	{
		$this->db->where('id', $id);
		$this->db->update($table_name, $data);
	}
	/**
	 * Delete By Id
	 * Param $tabel_name, $id,
	 * return 
	 */
	public function deleteData($table_name, $id)
	{
		return $this->db->delete($table_name, ['id'=> $id]);
	}



}
