<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_obat');
		$this->load->model('M_transaction');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'laporan',
			'subactive'		=> 'data laporan',
			'headerTitle'	=> 'Daftar Laporan',
		);

		$data['obat']			= $this->M_obat->select(['kode_obat' => @$_GET['kode_obat']])->row();
		$data['pelangganOrder'] = $this->M_transaction->select('', '', '', 'transaksi_penjualan.id_pelanggan')->result();

		$this->backend->views('admin/laporan/list', $data);
	}

	public function exportpdf()
	{
		$data = array(
			'active'		=> 'laporan',
			'subactive'		=> 'data laporan',
			'headerTitle'	=> 'Daftar Laporan',
		);

		$data['obat']			= $this->M_obat->select(['kode_obat' => @$_GET['kode_obat']])->row();
		$data['pelangganOrder'] = $this->M_transaction->select('', '', '', 'transaksi_penjualan.id_pelanggan')->result();

		$this->load->view('admin/laporan/exportpdf', $data);
	}

}
