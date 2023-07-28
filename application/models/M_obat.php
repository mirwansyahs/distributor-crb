<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {
	
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
				$this->db->from('obat');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'nama_obat'   => $data['nama_obat'],
            'satuan'   => $data['satuan'],
            'jenis_obat'   => $data['jenis_obat'],
            'harga_beli'   => $data['harga_beli'],
            'harga_jual'   => $data['harga_jual'],
            'stok'   => $data['stok'],
            'stok_min'   => $data['stok_min'],
            'laba'   => $data['laba'],
        );

        $response = $this->db->insert('obat', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'nama_obat'   => $data['nama_obat'],
            'satuan'   => $data['satuan'],
            'jenis_obat'   => $data['jenis_obat'],
            'harga_beli'   => $data['harga_beli'],
            'harga_jual'   => $data['harga_jual'],
            'stok'   => $data['stok'],
            'stok_min'   => $data['stok_min'],
            'laba'   => $data['laba'],
        );

        $response = $this->db->update('obat', $arr, ['kode_obat' => $data['kode_obat']]);

        return $response;
    }
	
    function delete($kode_obat = '')
    {
        $arr = array(
            'kode_obat' => $kode_obat
        );

        $response = $this->db->delete('obat', $arr);
        return $response;
    }

}

?>
