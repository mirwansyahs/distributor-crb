<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/supplier/addProccess">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="nama_supplier" class="form-control form-control-sm" name="nama_supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="alamat" class="form-control form-control-sm" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="jenis_kelamin" class="form-control form-control-sm" name="jenis_kelamin" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_person">Contact Person <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="contact_person" class="form-control form-control-sm" name="contact_person" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="no_telepon" class="form-control form-control-sm" name="no_telepon" required>
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
