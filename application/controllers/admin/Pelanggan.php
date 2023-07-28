<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pelanggan');
	}
	
	public function index()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'pelanggan',
			'headerTitle'	=> 'Daftar Pelanggan',
			'data'		=> $this->M_pelanggan->select('')->result(),
		);

		$this->backend->views('admin/pelanggan/list', $data);
	}

	public function add()
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'pelanggan',
			'headerTitle'	=> 'Tambah Pelanggan',
		);

		$this->backend->views('admin/pelanggan/add', $data);
	}

	public function addProccess()
	{
		$data = $this->input->post();
		$data['role']	= 'user';
		$data['nama']	= $data['nama_pelanggan'];

		$result = $this->M_admin->insert($data);
		if ($result){
			$result = $this->M_pelanggan->insert($data);
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

		redirect('admin/pelanggan');
	}
	public function edit($id = '')
	{
		$data = array(
			'active'		=> 'master',
			'subactive'		=> 'pelanggan',
			'headerTitle'	=> 'Ubah Pelanggan',
			'id'			=> $id,
			'data'			=> $this->M_pelanggan->select(['id_pelanggan' => $id])->row(),
		);

		$this->backend->views('admin/pelanggan/update', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['id_pelanggan'] = $id;

		$result = $this->M_pelanggan->update($data);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect('admin/pelanggan');
	}

	public function delete($id = '')
	{
		$result = $this->M_pelanggan->delete($id);
		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

		redirect('admin/pelanggan');
	}
}
