<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_supplier');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'supplier',
			'headerTitle'	=> 'Daftar Supplier',
			'data'		=> $this->M_supplier->select('')->result(),
		);

		$this->backend->views('admin/supplier/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'supplier',
			'headerTitle'	=> 'Tambah Supplier',
		);

		$this->backend->views('admin/supplier/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();

		$result = $this->M_supplier->insert($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/supplier');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'supplier',
			'headerTitle'	=> 'Ubah Supplier',
			'id'			=> $id,
			'data'			=> $this->M_supplier->select(['id_supplier' => $id])->row(),
		);

		$this->backend->views('admin/supplier/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['id_supplier'] = $id;

		$result = $this->M_supplier->update($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/supplier');
	}

	public function delete($id = '')
	{
		$result = $this->M_supplier->delete($id);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/supplier');
	}
}
