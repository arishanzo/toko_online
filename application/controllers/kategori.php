<?php  
class Kategori extends CI_Controller{
    public function lampu()
    {
        $data['lampu']=$this->model_kategori->data_lampu()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kategori/lampu',$data);
        $this->load->view('templates/footer');
    }
    public function elektronik()
    {
        $data['elektronik']=$this->model_kategori->data_elektronik()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('elektronik',$data);
        $this->load->view('templates/footer');
    }
    public function pakaian_pria()
    {
        $data['pakaian_pria']=$this->model_kategori->data_pakaian_pria()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_pria',$data);
        $this->load->view('templates/footer');
    }
    public function pakaian_wanita()
    {
        $data['pakaian_wanita']=$this->model_kategori->data_pakaian_wanita()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_wanita', $data);
        $this->load->view('templates/footer');
    }
    public function pakaian_anak()
    {
        $data['pakaian_anak']=$this->model_kategori->data_pakaian_anak()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pakaian_anak',$data);
        $this->load->view('templates/footer');
    }
    public function alat_olahraga()
    {
        $data['alat_olahraga']=$this->model_kategori->data_alat_olahraga()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('alat_olahraga',$data);
        $this->load->view('templates/footer');
    }
}
?>