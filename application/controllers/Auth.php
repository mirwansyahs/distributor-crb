<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if ($this->session->userdata('status') != null)
		{
			redirect('admin/home');
		}else{
			$this->load->view('login');
		}
	}

	public function secure()
	{
		$data = $this->input->post();
		$username = trim($data['email']);
		$password = trim($data['password']);

		$data = $this->db->get_where('user', ['username' => $username, 'password' => md5($password)]);
		
		if ($data->num_rows() == 0) {			
			$arr = array(
				'succ'	=> 0,
				'msg'	=> "Username / Password salah."
			);
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$session = [
				'userdata' => $data->row(),
				'status' => "Loged in"
			];
			

			$this->session->set_userdata('file_manager',true);
			$this->session->set_userdata($session);
			if (@$this->input->get('redirect')){
				$redirect = $this->input->get('redirect');
			}else{
				$redirect = "admin/home";
			}
			
			$arr = array(
				'succ'		=> 1,
				'msg'		=> "Login berhasil",
				'data'		=> array(
					'redirect'	=> $redirect
				)
			);
		}
		echo json_encode($arr);
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
