<?php

class facility_model extends CI_Model
{
  
	private $_table = 'tb_fasilitas';

	public function get_all()
	{
		$query = $this->db->get_where($this->_table);
		return $query->result();



	}
	public function insert($fasilitas)
	{
		return $this->db->insert($this->_table, $fasilitas);
	}
	public function get_by_id($id_fasilitas)
	{
		$query = $this->db->get_where($this->_table, array('id_fasilitas' => $id_fasilitas));

		return $query;

	}
	public function update($fasilitas){
		if (!isset($fasilitas['id_fasilitas'])) {
			return;
		}
		return $this->db->update($this->_table, $fasilitas, ['id_fasilitas' => $fasilitas['id_fasilitas']]); 


	}
	public function delete($id)
	{
		if (!$id) {
			return;
	
	}
	    return $this->db->delete($this->_table, ['id_fasilitas' => $id]);
	}
}