<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat_masuk extends CI_Model {
	
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

				$this->db->select('*, obat.kode_obat as obat_id');
				$this->db->from('obat_masuk');
                $this->db->join('detail_obat_masuk', 'obat_masuk.no_faktur = detail_obat_masuk.no_faktur');
                $this->db->join('obat', 'detail_obat_masuk.kode_obat = obat.kode_obat');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'id_supplier'   => $data['id_supplier'],
            'tgl_transaksi'   => $data['tgl_transaksi'],
            'total_harga'   => $data['total_harga'],
            'tunai'   => $data['tunai'],
            'kembalian'   => $data['kembalian'],
            'pegawai'   => $data['pegawai'],
        );

        $response = $this->db->insert('obat_masuk', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'id_supplier'   => $data['id_supplier'],
            'tgl_transaksi'   => $data['tgl_transaksi'],
            'total_harga'   => $data['total_harga'],
            'tunai'         => $data['tunai'],
            'kembalian'   => $data['kembalian'],
            'pegawai'   => $data['pegawai'],
        );

        $response = $this->db->update('obat_masuk', $arr, ['no_faktur' => $data['no_faktur']]);

        return $response;
    }
	
    function delete($no_faktur = '')
    {
        $arr = array(
            'no_faktur' => $no_faktur
        );

        $response = $this->db->delete('obat_masuk', $arr);
        return $response;
    }

}

?>
