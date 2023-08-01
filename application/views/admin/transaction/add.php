<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/transaction/addProccess">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="id_pelanggan">Pelanggan <span class="text-sm text-danger">*</span></label>
                        <select name="id_pelanggan" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('pelanggan')->result() as $key){ ?>
                                <option value="<?=$key->id_pelanggan?>"><?=$key->nama_pelanggan?></option>
                            <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="kode_obat">Suplemen <span class="text-sm text-danger">*</span></label>
                        <select name="kode_obat" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('obat')->result() as $key){ ?>
                                <option value="<?=$key->kode_obat?>"><?=$key->nama_obat?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_penjualan">Tanggal Order <span class="text-sm text-danger">*</span></label>
                        <input type="date" id="tgl_penjualan" class="form-control form-control-sm" name="tgl_penjualan" required value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="jumlah_beli" class="form-control form-control-sm" name="jumlah_beli" required>
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

<script>



</script>
