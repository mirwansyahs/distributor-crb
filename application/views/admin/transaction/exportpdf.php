<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=@$headerTitle?></title>
    </head>

    <body>
        <center>
        <table border="0" width="100%" style="border-bottom: 1px solid #000">
            <tr>
                <td>
                    <center>
                        <img src="<?=base_url()?>assets/img/AdminLTELogo.png" style="width: 100px">
                    </center>
                </td>
                <td>
                    <center><span style="font-size: 2em">Abad Dua Satu Makmur</span></br><small>Komplek PU Progasi Jl. A. Yani Kav 1 No 8 By Pass
                            Harjamukti-Cirebon</small></center>
                </td>
            </tr>
        </table>

        <table border="1" width="100%" style="margin-top: 50px; border-collapse: collapse">
            <thead>
                <tr>
                    <th>No Faktur</th>
                    <th>Pelanggan</th>
                    <th>Obat</th>
                    <th>Tanggal Order</th>
                    <th>Total</th>
                    <th>Total Harga</th>
                    <th>Tunai</th>
                    <th>Kembalian</th>
                    <th>Pegawai</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                                foreach ($data as $key) {
                                    
                            ?>
                <tr>
                    <td>
                        <?=$key->no_faktur?>
                    </td>
                    <td>
                        <?=$key->nama_pelanggan?>
                    </td>
                    <td>
                        <?=$key->nama_obat?>
                    </td>
                    <td>
                        <?=$key->tgl_penjualan?>
                    </td>
                    <td>
                        <?=number_format($key->total, 0, ',', '.')?>
                    </td>
                    <td>
                        <?=number_format($key->total_harga, 0, ',', '.')?>
                    </td>
                    <td>
                        <?=number_format($key->tunai, 0, ',', '.')?>
                    </td>
                    <td>
                        <?=number_format($key->kembalian, 0, ',', '.')?>
                    </td>
                    <td>
                        <?=$key->pegawai?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        </center>

        <script>
            window.print();
            window.onfocus=function(){ window.close();}
        </script>
    </body>

</html>
