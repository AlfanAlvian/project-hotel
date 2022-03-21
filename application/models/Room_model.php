<?php

   class Room_model extends CI_model
   {
   	
   	private $_table = 'tb_kamar',
   		$_view = 'v_kamar';

   	public function get_all()
   	{
   		$qwery = $this->db->get_where($this->_view);
   		return $qwery->result();
   	}
   	public function insert($room)
   	{
   		return $this->db->insert($this->table, $room);
   	}
   	public function get_by_id($id_kamar)
   	{
   		$qwery = $this->db->get_where($this->_table,array('id_kamar' => $id_kamar));
   		return $qwery;
   	}
   	public function update($room)
   	{
   		if (!isset($room['id_kamar'])) {
   			return;
   		}

   		return $this->db->update($this->_table, $room,['id_kamar' => $room['id_kamar']]);
   	}
   	public function delete($id)
   	{
   		if (!$id) {
   			return;
   		}

   		return $this->db->delete($this->_table,['id_kamar' => $id]);
   	}

   }   