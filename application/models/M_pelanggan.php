<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {
	
	public function select($arr = null, $like = null, $notlike = null){
        if ($arr != null){
            $this->db->where($arr);
        }
        if ($like != null){
            $this->db->like($like);
        }
        if ($notlike != null){
            $this->db->not_like($notlike);
        }

				$this->db->select('*');
				$this->db->from('pelanggan');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'nama_pelanggan'    => $data['nama_pelanggan'],
            'username'          => $data['username'],
            'no_telepon'        => $data['no_telepon'],
            'alamat'            => $data['alamat'],
            'kelompok_usia'     => $data['kelompok_usia'],
        );

        $response = $this->db->insert('pelanggan', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'nama_pelanggan'    => $data['nama_pelanggan'],
            'no_telepon'        => $data['no_telepon'],
            'alamat'            => $data['alamat'],
            'kelompok_usia'     => $data['kelompok_usia'],
        );

        $response = $this->db->update('pelanggan', $arr, ['id_pelanggan' => $data['id_pelanggan']]);

        return $response;
    }
	
    function delete($id_pelanggan = '')
    {
        $arr = array(
            'id_pelanggan' => $id_pelanggan
        );

        $response = $this->db->delete('pelanggan', $arr);
        return $response;
    }

}

?>
