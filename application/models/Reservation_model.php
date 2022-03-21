<?php

class Reservation_model extends CI_Model
{
   private $_table = 'tb_pemesanan',
   $view = 'v_detail_pemesanan';

   public function insert($reservation)
   {
      if (!reservation){
         return;
      }
   return $this->db->insert($this->_table, $reservation);
   }
   public function get_all()
   {
      $qwery = $this->db->get_where($this->_view);
      return $qwery->result();
   }
   public function update($reservation)
   {
      if (!isset($reservation['id_peesanan'])){
         return;
      }
      return $this->db->update($this->_table, $reservation, ['id_pemesanan' => $reservation['id_pemesanan']]);
   }
}

?>