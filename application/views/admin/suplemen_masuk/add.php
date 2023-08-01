<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/suplemen_masuk/addProccess">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_supplier">Supplier <span class="text-sm text-danger">*</span></label>
                        <select name="id_supplier" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('supplier')->result() as $key){ ?>
                                <option value="<?=$key->id_supplier?>"><?=$key->nama_supplier?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_transaksi">Tanggal Transaksi <span class="text-sm text-danger">*</span></label>
                        <input type="date" id="tgl_transaksi" class="form-control form-control-sm" name="tgl_transaksi" required>
                    </div>
                    <div class="form-group">
                        <label for="total_harga">Total Harga <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="total_harga" class="form-control form-control-sm" name="total_harga" required>
                    </div>
                    <div class="form-group">
                        <label for="tunai">Tunai <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="tunai" class="form-control form-control-sm" name="tunai" required>
                    </div>
                    <div class="form-group">
                        <label for="kembalian">Kembalian <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="kembalian" class="form-control form-control-sm" name="kembalian" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_obat">Nama Suplemen <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="nama_obat" class="form-control form-control-sm" name="nama_obat" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan <span class="text-sm text-danger">*</span></label>
                        <select name="satuan" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('satuan')->result() as $key){ ?>
                                <option value="<?=$key->satuan?>"><?=$key->satuan?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_obat">Jenis Suplemen <span class="text-sm text-danger">*</span></label>
                        <select name="jenis_obat" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('jenis_obat')->result() as $key){ ?>
                                <option value="<?=$key->jenis_obat?>"><?=$key->jenis_obat?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="harga_beli">Harga Beli <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="harga_beli" class="form-control form-control-sm" name="harga_beli" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="jumlah_beli" class="form-control form-control-sm" name="jumlah_beli" required>
                    </div>

                    <div class="form-group">
                        <label for="sub_total">Sub Total <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="sub_total" class="form-control form-control-sm" name="sub_total" required>
                    </div>

                    <div class="form-group">
                        <label for="laba">Laba <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="laba" class="form-control form-control-sm" name="laba" required>
                    </div>
                    <div class="form-group">
                        <label for="pegawai">Pegawai <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="pegawai" class="form-control form-control-sm" name="pegawai" required>
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
