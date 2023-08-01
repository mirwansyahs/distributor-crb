<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/transaction/editProccess/<?=$id?>">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="id_pelanggan">Pelanggan <span class="text-sm text-danger">*</span></label>
                        <select name="id_pelanggan" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('pelanggan')->result() as $key){ ?>
                                <option value="<?=$key->id_pelanggan?>" <?=$data->id_pelanggan == $key->id_pelanggan ? 'selected' : ''?>><?=$key->nama_pelanggan?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_obat">Suplemen <span class="text-sm text-danger">*</span></label>
                        <select name="kode_obat" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('obat')->result() as $key){ ?>
                                <option value="<?=$key->kode_obat?>" <?=$data->kode_obat == $key->kode_obat ? 'selected' : ''?>><?=$key->nama_obat?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_penjualan">Tanggal Penjualan <span class="text-sm text-danger">*</span></label>
                        <input type="date" id="tgl_penjualan" class="form-control form-control-sm" name="tgl_penjualan" required value="<?=$data->tgl_penjualan?>">
                    </div>
                    <div class="form-group">
                        <label for="total">Total <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="total" class="form-control form-control-sm" name="total" required value="<?=$data->total?>">
                    </div>
                    <div class="form-group">
                        <label for="tunai">Tunai <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="tunai" class="form-control form-control-sm" name="tunai" required value="<?=$data->tunai?>">
                    </div>
                    <div class="form-group">
                        <label for="kembalian">Kembalian <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="kembalian" class="form-control form-control-sm" name="kembalian" required value="<?=$data->kembalian?>">
                    </div>
                    <div class="form-group">
                        <label for="total_harga">Total Harga <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="total_harga" class="form-control form-control-sm" name="total_harga" required value="<?=$data->total_harga?>">
                    </div>

                    <div class="form-group">
                        <label for="pegawai">Pegawai <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="pegawai" class="form-control form-control-sm" name="pegawai" required value="<?=$data->pegawai?>">
                    </div>

                    <div class="form-group text-left" style="float: left">
                        <button type="button" onclick="javascript:{window.history.back()}" class="btn btn-danger">
                            <i class="fas fa-chevron-left"></i> Kembali
                        </button>
                    </div>
                    
                    <div class="form-group text-right" style="float: right">
                        <button type="submit" class="btn btn-info" id="btnSubmit">
                            <i class="far fa-save"></i> Simpan
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>

<?=$this->session->flashdata('msg')?>
