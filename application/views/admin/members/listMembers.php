<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Akses</th>
            <th class="text-center">
                <a href="<?=base_url()?>admin/members/add">
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
            <td><?=$key->nama?></td>
            <td><?=$key->username?></td>
            <td><?=$key->role?></td>
            
            <td>
                <a href="<?=base_url()?>admin/members/update/<?=$key->id_user?>">
                    <button class="btn btn-warning text-white btn-sm">
                        <i class="far fa-edit"></i>
                    </button>
                </a>

                <a href="<?=base_url()?>admin/members/delete/<?=$key->id_user?>">
                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
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
        
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "bSort": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>