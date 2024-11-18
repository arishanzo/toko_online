<?php 

class Model_kategori extends CI_Model{
    public function data_lampu()
    {
       return $this->db->get_where('tb_barang', array('kategori'=>'lampu'));
    }
    public function data_elektronik()
    {
       return $this->db->get_where('tb_barang', array('kategori'=>'elektronik'));
    }
    public function data_pakaian_pria()
    {
        return $this->db->get_where('tb_barang',array('kategori'=>'Pakaian pria'));
    }
    public function data_pakaian_wanita()
    {
        return $this->db->get_where('tb_barang', array('kategori'=>'Pakaian wanita'));
    }
    public function data_pakaian_anak()
    {
        return $this-> db->get_where('tb_barang',array('kategori'=>'Pakaian anak'));
    }
    public function data_alat_olahraga()
    {
        return $this->db->get_where('tb_barang',array('kategori'=>'Alat olahraga'));
    }
}

 ?>