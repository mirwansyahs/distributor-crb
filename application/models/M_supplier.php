<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {
	
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
				$this->db->from('supplier');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'nama_supplier'   => $data['nama_supplier'],
            'alamat'   => $data['alamat'],
            'jenis_kelamin'   => $data['jenis_kelamin'],
            'contact_person'   => $data['contact_person'],
            'no_telepon'   => $data['no_telepon'],
        );

        $response = $this->db->insert('supplier', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'nama_supplier'   => $data['nama_supplier'],
            'alamat'   => $data['alamat'],
            'jenis_kelamin'   => $data['jenis_kelamin'],
            'contact_person'   => $data['contact_person'],
            'no_telepon'   => $data['no_telepon'],
        );


        $response = $this->db->update('supplier', $arr, ['id_supplier' => $data['id_supplier']]);

        return $response;
    }
	
    function delete($id_supplier = '')
    {
        $arr = array(
            'id_supplier' => $id_supplier
        );

        $response = $this->db->delete('supplier', $arr);
        return $response;
    }

}

?>
