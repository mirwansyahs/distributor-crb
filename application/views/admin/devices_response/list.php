    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Filter <?=@$headerTitle?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form id="form1" method="GET" action="<?=base_url()?>admin/deviceresponse/a/<?=$code?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggalAwal">Tanggal Awal <span class="text-sm text-danger">*</span></label>
                                    <input type="date" id="tanggalAwal" class="form-control form-control-sm" name="start_date" value="<?=@$_GET['start_date']?>">
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="tanggalAkhir">Tanggal Akhir <span class="text-sm text-danger">*</span></label>
                                    <input type="date" id="tanggalAkhir" class="form-control form-control-sm" name="end_date" value="<?=@$_GET['end_date']?>">
                                </div>

                                    <div class="form-group text-right" style="float: right;">
                                        <button type="submit" class="btn btn-info" id="btnSubmit">
                                            <i class="far fa-save"></i> Filter
                                        </button>
                                    </div>
                                    <div class="form-group text-right" style="float: left;">
                                        <a href="<?=base_url()?>admin/deviceresponse/a/<?=$code?>">
                                            <button type="button" class="btn btn-danger" id="btnSubmit">
                                                <i class="fa fa-times"> </i> Clear
                                            </button>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar <?=@$headerTitle?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Perangkat</th>
                                <th>Respon</th>
                                <th width="15%">Tanggal Respon</th>
                                <th class="text-center" width="10%">
                                    <a href="<?=base_url()?>admin/deviceresponse/add/<?=$code?>">
                                        <button class="btn btn-info btn-sm">
                                            <i class="far fa-plus-square"></i>
                                        </button>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach ($data as $key) {
                            ?>
                            <tr>
                                <td>
                                    <label class="badge badge-info"><?=$key->device_type?></label>
                                    <label class="badge badge-success"><?=$key->device_code?></label>
                                    <br/>
                                    <?=$key->device_name?>
                                </td>
                                <td>
                                    <?=$key->response_value?>
                                </td>
                                <td>
                                    <label class="badge badge-info">
                                        <?=$key->response_date?>
                                    </label>
                                </td>
                                <td>
                                    <a href="<?=base_url()?>admin/deviceresponse/edit/<?=$code?>/<?=$key->device_id?>">
                                        <button class="btn btn-warning text-white btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>

                                    <a href="<?=base_url()?>admin/deviceresponse/delete/<?=$code?>/<?=$key->device_id?>">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div id="message"></div>
    <?=$this->session->flashdata('msg')?>

    <!-- DataTables  & Plugins -->
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
        $('#example1').DataTable( {
             "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["pdf", "excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
    </script>