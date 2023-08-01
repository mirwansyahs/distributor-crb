<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/jenis_obat/editProccess/<?=$id?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jenis_obat">Nama Jenis Suplemen <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="jenis_obat" class="form-control form-control-sm" name="jenis_obat" required value="<?=$data->jenis_obat?>">
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
