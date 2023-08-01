<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_obat extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_jenis_obat');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'jenis obat',
			'headerTitle'	=> 'Daftar Jenis Suplemen',
			'data'		=> $this->M_jenis_obat->select('')->result(),
		);

		$this->backend->views('admin/jenis_obat/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'jenis obat',
			'headerTitle'	=> 'Tambah Jenis Suplemen',
		);

		$this->backend->views('admin/jenis_obat/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();

		$result = $this->M_jenis_obat->insert($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/jenis_obat');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'jenis obat',
			'headerTitle'	=> 'Ubah Jenis Suplemen',
			'id'			=> $id,
			'data'			=> $this->M_jenis_obat->select(['id_jenis_obat' => $id])->row(),
		);

		$this->backend->views('admin/jenis_obat/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['id_jenis_obat'] = $id;

		$result = $this->M_jenis_obat->update($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/jenis_obat');
	}

	public function delete($id = '')
	{
		$result = $this->M_jenis_obat->delete($id);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/jenis_obat');
	}
}
