<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda Belum login
            <button type="button" class="close" data-dismiss="alert" area-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
            redirect('auth/login');
        }
    }


    public function tambah_ke_keranjang($id)
    {
        $stokbarang = $this->model_barang->find($id);


        if ($stokbarang->stok > 0) {
            $data = array(
                'id'    => $stokbarang->id_brg,
                'qty'    => 1,
                'price'    => $stokbarang->harga,
                'name'    => $stokbarang->nama_brg,
                'berat'    => $stokbarang->berat
            );
            $this->cart->insert($data);
            redirect('welcome');
        } else {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('alert', $stokbarang);
            $this->load->view('templates/footer');
        }
    }
    public function detail_keranjang()
    {

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('welcome');
    }
    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('data_barang/detail_keranjang');
    }
    public function statuspemesanan()
    {

        $user = $this->session->userdata('id');
        $data['status'] = $this->model_barang->tampil_dtstatus($user);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('status', $data);
        $this->load->view('templates/footer');
    }
    public function statuspembayaran()
    {
        $this->cart->destroy();
        $user = $this->session->userdata('id');
        $data['status'] = $this->model_barang->tampil_dtstatus($user);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('status', $data);
        $this->load->view('templates/footer');
    }
    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }
    public function komfirmasi_pesanan()
    {
        $nama = $this->input->POST('nama');
        $provinsi = $this->input->POST('prov');
        $kota = $this->input->POST('kota');
        $expedisi = $this->input->POST('expedisi');
        $paket = $this->input->POST('paket');
        $ongkir = $this->input->POST('ongkir');
        $alamat = $this->input->POST('alamat');
        $no_telp = $this->input->POST('no_telp');
        $totalbelanja = $this->input->POST('belanja');
        $data['komfirmasi'] = array(
            "nama" => $nama,
            "provinsi" => $provinsi,
            "kota" => $kota,
            "expedisi" => $expedisi,
            "paket" => $paket,
            "ongkir" => $ongkir,
            "alamat" => $alamat,
            "no_telp" => $no_telp,
            "belanja" => $totalbelanja
        );

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('komfirmasipembayaran', $data);
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf Pesanan anda Gagal Diproses !";
        }
    }

    public function detailstatus($id_invoice)
    {
        $data['status'] = $this->model_barang->detail_status($id_invoice);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
    public function detail_barang($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
    public function detail($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_invoice', $data);
        $this->load->view('templates/footer');
    }
    public function cari()
    {
        $keyword = $_POST['keyword'];
        // var_dump($keyword);
        $barang['barang'] = $this->model_barang->ambil_data($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('search', $barang);
        $this->load->view('templates/footer');
    }
    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('search', $data);
        $this->load->view('templates/footer');
    }
}
