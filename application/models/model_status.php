<?php
class Model_status extends CI_Model
{
    // public function tampil_data()
    // {
    //     return $this->db->get('tb_barang')->result();
    // }
    public function tampil_dt($user)
    {
        // $user = $this->session->userdata('id');
        $result = $this->db->where('id_user', $user)->get('tb_invoice')->result_array();
        if ($result->num_rows() > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
