<?php
class midtrains extends CI_Controller
{
    public function checkout_snap()
    {


        $this->load->view('checkout_snap');
    }
    public function checkout_vtweb()
    {
        $this->load->view('checkout_vtweb');
    }
}
