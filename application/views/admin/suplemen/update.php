<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/suplemen/editProccess/<?=$id?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_obat">Nama Suplemen <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="nama_obat" class="form-control form-control-sm" name="nama_obat" required value="<?=$data->nama_obat?>">
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan <span class="text-sm text-danger">*</span></label>
                        <select name="satuan" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('satuan')->result() as $key){ ?>
                                <option value="<?=$key->satuan?>" <?=$key->satuan == $data->satuan ? 'selected': ''?>><?=$key->satuan?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_obat">Jenis Suplemen <span class="text-sm text-danger">*</span></label>
                        <select name="jenis_obat" class="form-control form-control-sm">
                            <?php foreach ($this->db->get_where('jenis_obat')->result() as $key){ ?>
                                <option value="<?=$key->jenis_obat?>" <?=($key->jenis_obat == $data->jenis_obat) ? 'selected' : ''?>><?=$key->jenis_obat?></option>
                            <?php } ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="harga_beli">Harga Beli <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="harga_beli" class="form-control form-control-sm" name="harga_beli" required value="<?=$data->harga_beli?>">
                    </div>

                    <div class="form-group">
                        <label for="harga_jual">Harga Jual <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="harga_jual" class="form-control form-control-sm" name="harga_jual" required value="<?=$data->harga_jual?>">
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="stok" class="form-control form-control-sm" name="stok" required value="<?=$data->stok?>">
                    </div>

                    <div class="form-group">
                        <label for="stok_min">Stok Min <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="stok_min" class="form-control form-control-sm" name="stok_min" required value="<?=$data->stok_min?>">
                    </div>

                    <div class="form-group">
                        <label for="laba">Laba <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="laba" class="form-control form-control-sm" name="laba" required value="<?=$data->laba?>">
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
