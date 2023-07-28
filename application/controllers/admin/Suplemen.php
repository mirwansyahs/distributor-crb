<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suplemen extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_obat');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'suplemen',
			'subactive'		=> 'data suplemen',
			'headerTitle'	=> 'Daftar Suplemen',
			'data'		=> $this->M_obat->select('')->result(),
		);

		$this->backend->views('admin/suplemen/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'suplemen',
			'subactive'		=> 'data suplemen',
			'active1'		=> 'suplemen add',
			'subactive1'		=> 'data suplemen add',
			'headerTitle'	=> 'Tambah Suplemen',
		);

		$this->backend->views('admin/suplemen/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();

		$result = $this->M_obat->insert($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/suplemen');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'suplemen',
			'headerTitle'	=> 'Ubah Suplemen',
			'id'			=> $id,
			'data'			=> $this->M_obat->select(['kode_obat' => $id])->row(),
		);

		$this->backend->views('admin/suplemen/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['kode_obat'] = $id;

		$result = $this->M_obat->update($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/suplemen');
	}

	public function delete($id = '')
	{
		$result = $this->M_obat->delete($id);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/suplemen');
	}
}
