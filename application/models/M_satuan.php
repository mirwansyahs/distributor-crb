<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_satuan extends CI_Model {
	
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
				$this->db->from('satuan');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'satuan'   => $data['satuan'],
        );

        $response = $this->db->insert('satuan', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'satuan'   => $data['satuan'],
        );

        $response = $this->db->update('satuan', $arr, ['kode_satuan' => $data['kode_satuan']]);

        return $response;
    }
	
    function delete($kode_satuan = '')
    {
        $arr = array(
            'kode_satuan' => $kode_satuan
        );

        $response = $this->db->delete('satuan', $arr);
        return $response;
    }

}

?>
