<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=@$headerTitle?></title>
    </head>

    <body>
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
        <center>
            <table border="0" width="100%" style="border-bottom: 1px solid #000">
                <tr>
                    <td>
                        <center>
                            <img src="<?=base_url()?>assets/img/AdminLTELogo.png" style="width: 100px">
                        </center>
                    </td>
                    <td>
                        <center><span style="font-size: 2em">Abad Dua Satu Makmur</span></br><small>Komplek PU Progasi
                                Jl. A. Yani Kav 1 No 8 By Pass
                                Harjamukti-Cirebon<br/>Telp: 02318805251; Fax: 02318805052</small></center>
                    </td>
                </tr>
            </table>

            <?php
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
            <table border="1" width="100%" style="margin-top: 50px; border-collapse: collapse">
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
            <?php } ?>
        </center>

        <table border="0" width="100%" style="margin-top: 50px">
            <tr align="right">
                <td width="70%"></td>
                <td align="center">...., <?=date('d M Y')?></td>
            </tr>
            <tr>
                <td width="70%"></td>
                <td align="center">&nbsp;</br>&nbsp;</br>&nbsp;</br>&nbsp;</br>&nbsp;</br>&nbsp;</br></td>
            </tr>
            <tr>
                <td width="70%"></td>
                <td align="center">(......................................)</td>
            </tr>
        </table>

        <script>
            window.print();
            window.onfocus=function(){ window.close();}
        </script>
    </body>

</html>