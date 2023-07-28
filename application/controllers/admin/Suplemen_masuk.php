<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplemen_masuk extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_detail_obat_masuk');
		$this->load->model('M_obat_masuk');
		$this->load->model('M_obat');
		$this->load->model('M_supplier');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'suplemen',
			'subactive'		=> 'data suplemen masuk',
			'headerTitle'	=> 'Daftar Suplemen Masuk',
			'data'		=> $this->M_obat_masuk->select('')->result(),
		);

		$this->backend->views('admin/suplemen_masuk/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'suplemen',
			'subactive'		=> 'data suplemen masuk',
			'active1'		=> 'suplemen add',
			'subactive1'		=> 'data suplemen masuk add',
			'headerTitle'	=> 'Tambah Suplemen Masuk',
		);

		$this->backend->views('admin/suplemen_masuk/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();

		var_dump($data);
		$result = $this->M_obat_masuk->insert($data);
		if ($result){
			$data['no_faktur']	= $this->db->insert_id();
			$data['harga_jual']	= ($data['harga_beli'] * 20) / 100;
			$data['stok']		= 1;
			$data['stok_min']	= 1;
			$insertObat = $this->M_obat->insert($data);
			$data['kode_obat']	= $this->db->insert_id();
			$data['nama_supplier'] = $this->M_supplier->select(['id_supplier' => $data['id_supplier']])->row()->nama_supplier;
			$insertDetailSuplemen = $this->M_detail_obat_masuk->insert($data);
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/suplemen_masuk');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'suplemen',
			'subactive'		=> 'data suplemen masuk',
			'headerTitle'	=> 'Ubah Suplemen Masuk',
			'id'			=> $id,
			'data'			=> $this->M_obat_masuk->select(['obat_masuk.no_faktur' => $id])->row(),
		);

		$this->backend->views('admin/suplemen_masuk/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['no_faktur'] = $id;

		$result = $this->M_obat_masuk->update($data);
		if ($result){
			$getDataObatMasuk 			= $this->M_obat_masuk->select(['obat_masuk.no_faktur' => $data['no_faktur']])->row();
			$getDataDetailObatMasuk 	= $this->M_detail_obat_masuk->select(['no_faktur' => $data['no_faktur']])->row();
			$getDataObat 				= $this->M_obat->select(['kode_obat' => $getDataDetailObatMasuk->kode_obat])->row();
			// var_dump($getDataObat);

			$data['kode_obat']	= $getDataObat->kode_obat;
			$data['harga_jual']	= $getDataObat->harga_jual;
			$data['stok']		= $getDataObat->stok;
			$data['stok_min']	= $getDataObat->stok_min;
			$updateObat = $this->M_obat->update($data);

			$data['nama_supplier'] = $getDataDetailObatMasuk->nama_supplier;
			$insertDetailSuplemen = $this->M_detail_obat_masuk->update($data);

			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/suplemen_masuk');
	}

	public function delete($id = '')
	{
		$data['no_faktur'] = $id;
		$result = $this->M_obat_masuk->delete($id);
		if ($result){
			$getDataObatMasuk 			= $this->M_obat_masuk->select(['obat_masuk.no_faktur' => $data['no_faktur']])->row();
			$getDataDetailObatMasuk 	= $this->M_detail_obat_masuk->select(['no_faktur' => $data['no_faktur']])->row();
			$getDataObat 				= $this->M_obat->select(['kode_obat' => $getDataDetailObatMasuk->kode_obat])->row();

			$result = $this->M_obat->delete($getDataObat->kode_obat);
			$result = $this->M_detail_obat_masuk->delete($data['no_faktur']);

			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/suplemen_masuk');
	}
}
