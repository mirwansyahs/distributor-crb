<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaction extends CI_Model {
	
	public function select($arr = null, $like = null, $notlike = null, $groupby = null){
        if ($arr != null){
            $this->db->where($arr);
        }
        if ($like != null){
            $this->db->like($like);
        }
        if ($notlike != null){
            $this->db->not_like($notlike);
        }
        if ($groupby != null){
            $this->db->group_by($groupby);
        }

				$this->db->select('*');
				$this->db->from('transaksi_penjualan');
                // $this->db->join('detail_penjualan', 'detail_penjualan.no_faktur = transaksi_penjualan.no_faktur');
                $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penjualan.id_pelanggan');
                $this->db->join('obat', 'obat.kode_obat = transaksi_penjualan.kode_obat');
		$data = $this->db->get();
		return $data;
	}

	public function get_transaction($arr = null, $groupby = null){
        if ($arr != null){
            $this->db->where($arr);
        }
        if ($groupby != null){
            $this->db->group_by($groupby);
        }

				$this->db->select('*');
				$this->db->from('transaksi_penjualan');
                $this->db->join('detail_penjualan', 'detail_penjualan.no_faktur = transaksi_penjualan.no_faktur');
                $this->db->join('pelanggan', 'pelanggan.id_pelanggan = transaksi_penjualan.id_pelanggan');
                $this->db->join('obat', 'obat.kode_obat = transaksi_penjualan.kode_obat');
		$data = $this->db->get();
		return $data;
	}

    public function insert($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'id_pelanggan'   => $data['id_pelanggan'],
            'kode_obat'   => $data['kode_obat'],
            'tgl_penjualan'   => $data['tgl_penjualan'],
            'total'   => $data['total'],
            'tunai'   => $data['tunai'],
            'kembalian'   => $data['kembalian'],
            'total_harga'   => $data['total_harga'],
            'pegawai'   => $data['pegawai'],
        );

        $response = $this->db->insert('transaksi_penjualan', $arr);

        return $response;
    }
	
    public function insert_detail($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'no_faktur'   => $data['no_faktur'],
            'tgl_penjualan'   => $data['tgl_penjualan'],
            'id_pelanggan'   => $data['id_pelanggan'],
            'nama_pelanggan'   => $data['nama_pelanggan'],
            'kode_obat'   => $data['kode_obat'],
            'nama_obat'   => $data['nama_obat'],
            'harga_jual'   => $data['harga_jual'],
            'jumlah_beli'   => $data['jumlah_beli'],
            'sub_total'   => $data['sub_total'],
            'laba'   => $data['laba'],
        );

        $response = $this->db->insert('detail_penjualan', $arr);

        return $response;
    }
	
    public function update($data){
        date_default_timezone_set('asia/jakarta');
        $arr = array(
            'no_faktur'   => $data['no_faktur'],
            'id_pelanggan'   => $data['id_pelanggan'],
            'kode_obat'   => $data['kode_obat'],
            'tgl_penjualan'   => $data['tgl_penjualan'],
            'total'   => $data['total'],
            'tunai'   => $data['tunai'],
            'kembalian'   => $data['kembalian'],
            'total_harga'   => $data['total_harga'],
            'pegawai'   => $data['pegawai'],
        );

        $response = $this->db->update('transaksi_penjualan', $arr, ['no_faktur' => $data['no_faktur']]);

        return $response;
    }
	
    function delete($no_faktur = '')
    {
        $arr = array(
            'no_faktur' => $no_faktur
        );

        $response = $this->db->delete('transaksi_penjualan', $arr);
        return $response;
    }

}

?>
