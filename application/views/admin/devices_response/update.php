<div class="card">
    <div class="card-header">
        <h3 class="card-title"><?=@$headerTitle?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form id="form1" method="POST" action="<?=base_url()?>admin/deviceresponse/editProccess/<?=$code?>/<?=$id?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kodeDevice">Kode Perangkat <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="kodeDevice" class="form-control form-control-sm" name="device_code" value="<?=$data->device_code?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nomorResponse">Nomor Respon <span class="text-sm text-danger">*</span></label>
                        <input type="number" id="nomorResponse" class="form-control form-control-sm" name="response_number" required min="1" max="9999" value="<?=$data->response_number?>">
                    </div>
                    <div class="form-group">
                        <label for="nilaiResponse">Nilai Respon <span class="text-sm text-danger">*</span></label>
                        <input type="text" id="nilaiResponse" class="form-control form-control-sm" name="response_value" required value="<?=$data->response_value?>">
                    </div>

                    <div class="col-md-12">
                        <div class="form-group text-left" style="float: left;">
                            <button type="button" onclick="javascript:{window.history.back()}" class="btn btn-danger">
                                <i class="fas fa-chevron-left"></i> Kembali
                            </button>
                        </div>
                        <div class="form-group text-right" style="float: right;">
                            <button type="submit" class="btn btn-info" id="btnSubmit">
                                <i class="far fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                </div>
            </div>
        </form>
    </div>
</div>

<?=$this->session->flashdata('msg')?>
