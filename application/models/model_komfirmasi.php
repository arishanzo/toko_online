<?php
class model_komfirmasi extends CI_Model
{
    public function index()
    {
        $data = array(
            "nama" => $this->input->POST('nama'),
            "provinsi" => $this->input->POST('prov'),
            "kota" => $this->input->POST('kota'),
            "expedisi" => $this->input->POST('expedisi'),
            "paket" => $this->input->POST('paket'),
            "ongkir" => $this->input->POST('alamat'),
            "alamat" => $this->input->POST('alamat'),
            "no_telp" => $this->input->POST('no_telp'),
            "totalbelanja" => $this->input->POST('belanja')
        );
    }
}
