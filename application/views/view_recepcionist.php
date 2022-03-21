<?php>

public function get_by_id($id_pemesanan)
{
    $qwery = $this->db->get_where($this->_view, array('id_pemesanan'));
    return $qwery
}
