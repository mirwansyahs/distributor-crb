
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title"><?=@$headerTitle?></h3>
                </div>
                <div class="col-md-6 text-right">
                    <?php if (@$_GET){ ?>
                    <a href="<?=base_url()?>admin/laporan/exportpdf?kode_obat=<?=$_GET['kode_obat']?>&tahun=<?=$_GET['tahun']?>" target="_BLANK">
                        <button class="btn btn-primary">Export PDF</button>
                    </a>
                    <?php } ?>
                </div>
            </div>  
        </div>
        <?php
        $arr = array(
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'
        );
        $GR = [];
        $POH = [];
        $NR = [];
        $POR = [];
        $totalGR = 0;
        $totalPOH = 0;
        $totalNR = 0;
        $totalPOR = 0;
        ?>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="<?=base_url()?>admin/laporan" method="GET">
            <div class="row">
                    <div class="col-md-4 form-group">
                        <select name="kode_obat" class="form-control">
                            <option value="">PILIH SUPLEMEN</option>
                            <?php foreach ($this->M_obat->select()->result() as $key) { ?>
                                <option value="<?=$key->kode_obat?>" <?=($key->kode_obat == @$_GET['kode_obat'])?'selected':''?>><?=$key->nama_obat?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <select name="tahun" class="form-control">
                            <option value="">PILIH TAHUN</option>
                            <?php foreach ($this->M_transaction->select('', '', '', 'year(transaksi_penjualan.tgl_penjualan)')->result() as $key) { ?>
                                <option value="<?=date_format(date_create($key->tgl_penjualan), "Y")?>" <?=(date_format(date_create($key->tgl_penjualan), "Y") == @$_GET['tahun'])?'selected':''?>><?=date_format(date_create($key->tgl_penjualan), "Y")?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <button class="btn btn-info col-md-12" type="submit">Cari</button>
                    </div>
            </div>
            </form>

            <?php 
                if (!@$_GET['kode_obat'] && !@$_GET['tahun']){
                ?>
            <div class="row">
                <div class="col-md-12">
                    <p>Silahkan pilih suplemen dan tahun dahulu.</p>
                </div>
            </div>
                <?php
                }else{
                foreach ($pelangganOrder as $key) { 
                    
                    for($i = 0; $i < 12; $i++){ 

                        array_push($GR, $obat->stok_min);
                        $totalGR = $totalGR + @$GR[$i];
            
                        $dataTrx = $this->M_transaction->get_transaction(['obat.kode_obat' => $obat->kode_obat, 'transaksi_penjualan.id_pelanggan' => $key->id_pelanggan, 'month(transaksi_penjualan.tgl_penjualan)' => ($i+1), 'year(transaksi_penjualan.tgl_penjualan)' => $_GET['tahun']], 'month(transaksi_penjualan.tgl_penjualan)')->row();
                                    
                        $dataTrxCalc = $this->M_transaction->get_transaction(['obat.kode_obat' => $obat->kode_obat, 'transaksi_penjualan.id_pelanggan' => $key->id_pelanggan, 'month(transaksi_penjualan.tgl_penjualan)' => ($i), 'year(transaksi_penjualan.tgl_penjualan)' => $_GET['tahun']], 'month(transaksi_penjualan.tgl_penjualan)')->row();  
            
                        // var_dump(@$dataTrx->jumlah_beli);  
                        
                        // Perhitungan POH
                        $pohCalc = 0;
                        if ($dataTrx == NULL){
                            echo ($pohCalc == 0)?'':$pohCalc;
                            array_push($POH, $pohCalc);
                        }else{
                            if ($dataTrxCalc == NULL){
                                $pohCalc = 0;
                            }else{
                                $onHand = $obat->stok;
                                $pohCalc = ($onHand - $obat->stok_min) + $dataTrxCalc->jumlah_beli;
                            }
                                        
                            array_push($POH, $pohCalc);
                            $totalPOH = $totalPOH + $pohCalc;
                        }

                        // Perhitungan NR
                        $nrCalc = 0;
                        if ($dataTrx == NULL){
                            echo ($nrCalc == 0)?'':$nrCalc;
                            array_push($NR, $nrCalc);
                        }else{
                            $nrCalc = ((@$obat->stok_min-$dataTrx->jumlah_beli) - $POH[$i]) * -1;

                            array_push($NR, $nrCalc);
                            $totalNR = $totalNR + $nrCalc;
                        }

                        // Perhitungan POR
                        $porCalc = 0;
                        if($dataTrx == NULL){
                            echo ($porCalc == 0)?'':$porCalc;
                            array_push($POR, $porCalc);
                        }else{
                            $porCalc = @$dataTrxCalc->jumlah_beli;
                            array_push($POR, $porCalc);

                            $totalPOR = $totalPOR + $porCalc;

                            $GR[$i+1] = ($totalPOR > 0) ? $POR[$i] : $GR[$i];
                        }
                    }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center" style="background-color: lightblue">
                                <th></th>
                                <th colspan="12">Teleorder : <?=$key->nama_pelanggan?></th>
                                <th></th>
                            </tr>
                            <tr align="center">
                                <th></th>
                                <th colspan="12">Periode</th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>Tipe</th>
                                <?php for($i = 0; $i < 12; $i++){ ?>
                                <th><?=$arr[$i]?></th>
                                <?php } ?>
                                <th>Jml</th>
                            </tr>
                            <tr>
                                <th>GR</th>
                                <?php 
                                for($i = 0; $i < 12; $i++){ 
                                ?>
                                <td><?=($GR[$i] == 0)?'':number_format($GR[$i], 0, ',', '.')?></td>

                                <?php } ?>
                                <td><?=number_format($totalGR, 0, ',', '.')?></td>
                            </tr>
                            <tr>
                                <th>POH</th>
                                <?php 
                                for($i = 0; $i < 12; $i++){ 
                                ?>
                                <td>
                                    <?=($POH[$i] == 0)?'':number_format($POH[$i], 0, ',', '.')?>
                                </td>
                                <?php } ?>
                                <td><?=number_format($totalPOH, 0, ',', '.')?></td>
                            </tr>
                            <tr>
                                <th>NR</th>
                                <?php 
                                for($i = 0; $i < 12; $i++){    
                                ?>
                                <td>
                                    <?=($NR[$i] == 0)?'':number_format($NR[$i], 0, ',', '.')?>
                                </td>
                                <?php } ?>
                                <td><?=number_format($totalNR, 0, ',', '.')?></td>
                            </tr>
                            <tr>
                                <th>POR</th>
                                <?php 
                                for($i = 0; $i < 12; $i++){  
                                ?>
                                <td>
                                    <?=($POR[$i] == 0)?'':number_format($POR[$i], 0, ',', '.')?>
                                </td>
                                <?php } ?>
                                <td><?=number_format($totalPOR, 0, ',', '.')?></td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
            <?php } }?>
            
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
      
        // $('#example1').DataTable( {
        //      "responsive": true, "lengthChange": false, "autoWidth": false,
        //     "buttons": ["pdf", "excel"]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      
    </script>