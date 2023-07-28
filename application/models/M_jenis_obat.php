<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis_obat extends CI_Model {
	
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
				$this->db->from('jenis_obat');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'jenis_obat'   => $data['jenis_obat'],
        );

        $response = $this->db->insert('jenis_obat', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'jenis_obat'   => $data['jenis_obat'],
        );

        $response = $this->db->update('jenis_obat', $arr, ['id_jenis_obat' => $data['id_jenis_obat']]);

        return $response;
    }
	
    function delete($id_jenis_obat = '')
    {
        $arr = array(
            'id_jenis_obat' => $id_jenis_obat
        );

        $response = $this->db->delete('jenis_obat', $arr);
        return $response;
    }

}

?>
