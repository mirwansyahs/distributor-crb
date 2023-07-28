<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function select($id = '', $username = '', $offset = '', $limit = '', $random = '', $role = ''){
		if ($id != ''){
			$this->db->where('id_user', $id);
		}

		if ($username != ''){
			$this->db->where('username', $username);
		}
		
		if ($offset != '' || $limit != '') {
			$this->db->limit($limit, $offset);
		}

		if ($random != ''){
			$this->db->order_by('rand()');
		}

		if ($role != ''){
			$this->db->where('role', $role);
		}
					$this->db->from('user');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'username'		=> $data['username'],
			'password'		=> md5($data['password']),
			'nama'			=> $data['nama'],
			'role'			=> $data['role'],
		);

		$response = $this->db->insert('user', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('user', $data, ['id_user' => $data['id_user']]);
		return $response;
	}

	public function delete($id_user){
        $arr = array(
            'id_user' => $id_user
        );

		return $this->db->delete('user', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */