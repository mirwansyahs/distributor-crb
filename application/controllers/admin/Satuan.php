<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_satuan');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'satuan',
			'headerTitle'	=> 'Daftar Satuan',
			'data'		=> $this->M_satuan->select('')->result(),
		);

		$this->backend->views('admin/satuan/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'satuan',
			'headerTitle'	=> 'Tambah Satuan',
		);

		$this->backend->views('admin/satuan/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();

		$result = $this->M_satuan->insert($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/satuan');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'satuan',
			'headerTitle'	=> 'Ubah Satuan',
			'id'			=> $id,
			'data'			=> $this->M_satuan->select(['kode_satuan' => $id])->row(),
		);

		$this->backend->views('admin/satuan/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['kode_satuan'] = $id;

		$result = $this->M_satuan->update($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/satuan');
	}

	public function delete($id = '')
	{
		$result = $this->M_satuan->delete($id);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/satuan');
	}
}
