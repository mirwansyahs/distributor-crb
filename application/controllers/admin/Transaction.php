<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_transaction');
		$this->load->model('M_obat');
		$this->load->model('M_pelanggan');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'transaction',
			'headerTitle'	=> 'Daftar Transaksi',
		);

		if ($this->userdata->role == "user"){
			$data['data'] = $this->M_transaction->select(['username' => $this->userdata->username])->result();
		}else{
			$data['data'] = $this->M_transaction->select('')->result();

		}

		$this->backend->views('admin/transaction/list', $data);
	}
	
	public function exportpdf()
	{
		$data = array(
			'active'		=> 'transaction',
			'headerTitle'	=> 'Daftar Transaksi',
		);

		if ($this->userdata->role == "user"){
			$data['data'] = $this->M_transaction->select(['username' => $this->userdata->username])->result();
		}else{
			$data['data'] = $this->M_transaction->select('')->result();

		}

		$this->load->view('admin/transaction/exportpdf', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'transaction',
			'headerTitle'	=> 'Tambah Transaksi',
		);

		$this->backend->views('admin/transaction/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();
		$dataObat = $this->M_obat->select(['kode_obat' => $data['kode_obat']])->row();
		$dataPelanggan = $this->M_pelanggan->select(['id_pelanggan' => $data['id_pelanggan']])->row();
		$data['tgl_penjualan']	= $data['tgl_penjualan'];
		$data['total']			= $data['jumlah_beli'];
		$data['total_harga']	= $data['jumlah_beli'] * $dataObat->harga_jual;
		$data['sub_total']		= $data['jumlah_beli'] * $dataObat->harga_jual;
		$data['laba']			= $data['jumlah_beli'] * $dataObat->laba;
		$data['kembalian']		= $data['tunai'] - $data['total_harga'];
		$data['pegawai']		= $this->M_admin->select('', '', '', '', '', 'admin')->row()->nama;
		$data['nama_pelanggan']	= $dataPelanggan->nama_pelanggan;
		$data['nama_obat']		= $dataObat->nama_obat;
		$data['harga_jual']		= $dataObat->harga_jual;
		// var_dump($data);

		$result = $this->M_transaction->insert($data);
		if ($result){
			$data['no_faktur'] = $this->db->insert_id();
			$this->M_transaction->insert_detail($data);
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/transaction');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'transaction',
			'headerTitle'	=> 'Ubah Transaksi',
			'id'			=> $id,
			'data'			=> $this->M_transaction->select(['no_faktur' => $id])->row(),
		);

		$this->backend->views('admin/transaction/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['no_faktur'] = $id;

		$result = $this->M_transaction->update($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/transaction');
	}

	public function delete($id = '')
	{
		$result = $this->M_transaction->delete($id);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/transaction');
	}
}
