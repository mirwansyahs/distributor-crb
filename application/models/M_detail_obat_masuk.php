<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_obat_masuk extends CI_Model {
	
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
				$this->db->from('detail_obat_masuk');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'no_faktur'   => $data['no_faktur'],
            'tgl_transaksi'   => $data['tgl_transaksi'],
            'nama_supplier'   => $data['nama_supplier'],
            'kode_obat'   => $data['kode_obat'],
            'nama_obat'   => $data['nama_obat'],
            'harga_beli'   => $data['harga_beli'],
            'jumlah_beli'   => $data['jumlah_beli'],
            'sub_total'   => $data['sub_total'],
            'pegawai'   => $data['pegawai'],
            'laba'   => $data['laba'],
        );

        $response = $this->db->insert('detail_obat_masuk', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'no_faktur'   => $data['no_faktur'],
            'tgl_transaksi'   => $data['tgl_transaksi'],
            'nama_supplier'   => $data['nama_supplier'],
            'kode_obat'   => $data['kode_obat'],
            'nama_obat'   => $data['nama_obat'],
            'harga_beli'   => $data['harga_beli'],
            'jumlah_beli'   => $data['jumlah_beli'],
            'sub_total'   => $data['sub_total'],
            'pegawai'   => $data['pegawai'],
            'laba'   => $data['laba'],
        );

        $response = $this->db->update('detail_obat_masuk', $arr, ['no_faktur' => $data['no_faktur']]);

        return $response;
    }
	
    function delete($no_faktur = '')
    {
        $arr = array(
            'no_faktur' => $no_faktur
        );

        $response = $this->db->delete('detail_obat_masuk', $arr);
        return $response;
    }

}

?>
