<?php

use LDAP\Result;

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-IjAY9Ez8J_qZb2oeVgTDhEXE', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('komfirmasipembayaran');
	}

	public function token()
	{
		$nama = $this->input->POST('nama');
		$provinsi = $this->input->POST('prov');
		$kota = $this->input->POST('kota');
		$expedisi = $this->input->POST('expedisi');
		$paket = $this->input->POST('paket');
		$ongkir = $this->input->POST('ongkir');
		$alamat = $this->input->POST('alamat');
		$no_telp = $this->input->POST('no_telp');
		$totalbelanja = $this->input->POST('bayar');

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $totalbelanja, // no decimal allowed for creditcard
		);
		$item = 0;

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $totalbelanja,
			'quantity' => 1,
			'name' => "Total Yang Harus Di Bayar"
		);


		// Optional
		$item_details = array($item1_details);

		// Optional
		$billing_address = array(
			'first_name'    => $nama,
			'address'       => $alamat,
			'city'          => $kota,
			'phone'         => $no_telp,
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'last_name'     => $nama,
			'address'       => $alamat,
			'city'          => $kota,
			'phone'         => $no_telp,
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $nama,
			'phone'         => $no_telp,
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 200
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			// 'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->get('result_data'), true);

		$nama = $this->input->get('nama');
		$provinsi = $this->input->get('prov');
		$kota = $this->input->get('kota');
		$expedisi = $this->input->get('expedisi');
		$paket = $this->input->get('paket');
		$ongkir = $this->input->get('ongkir');
		$alamat = $this->input->get('alamat');
		$no_telp = $this->input->get('no_telp');
		$totalbelanja = $this->input->get('bayar');
		$user =  $this->input->get('id');
		$data = [
			'id_invoice' => $result['order_id'],
			'id_user' => $user,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_wa' => $no_telp,
			'expedisi' => $expedisi,
			'paket' => $paket,
			'tgl_pesan' => $result['transaction_time'],
			'pembayaran' => $result['payment_type'],
			'jmlh_pesanan' => $totalbelanja,
			'status_code' => $result['status_code'],
			'struk' => $result['pdf_url']

		];
		$id_invoice = $result['order_id'];
		foreach ($this->cart->contents() as $item) {

			$pesan = array(
				'id_invoice'    => $id_invoice,
				'id_brg'        => $item['id'],
				'nama_brg'      => $item['name'],
				'jumlah'        => $item['qty'],
				'harga'         => $item['price'],
			);
			$this->db->insert('tb_pesanan', $pesan);
		}
		$simpan = $this->db->insert('tb_invoice', $data);
		if ($simpan) {
			redirect(base_url() . "dashboard/statuspembayaran");
		} else {
			echo "gagal";
		}
	}
}
