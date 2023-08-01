
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?=@$headerTitle?></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Kode Suplemen</th>
                                <th>Nama Suplemen</th>
                                <th>Satuan</th>
                                <th>Jenis Suplemen</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Stok Min</th>
                                <th>Laba</th>
                                <th class="text-center" width="10%">
                                    <a href="<?=base_url()?>admin/suplemen/add">
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
                                    <?=$key->kode_obat?>
                                </td>
                                <td>
                                    <?=$key->nama_obat?>
                                </td>
                                <td>
                                    <?=$key->satuan?>
                                </td>
                                <td>
                                    <?=$key->jenis_obat?>
                                </td>
                                <td>
                                    <?=$key->harga_beli?>
                                </td>
                                <td>
                                    <?=$key->harga_jual?>
                                </td>
                                <td>
                                    <?=$key->stok?>
                                </td>
                                <td>
                                    <?=$key->stok_min?>
                                </td>
                                <td>
                                    <?=$key->laba?>
                                </td>
                                <td>
                                    <a href="<?=base_url()?>admin/suplemen/edit/<?=$key->kode_obat?>">
                                        <button class="btn btn-warning text-white btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </a>

                                    <a href="<?=base_url()?>admin/suplemen/delete/<?=$key->kode_obat?>">
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
            // "buttons": ["pdf", "excel"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
    </script>