<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;width: 630px;
		}
		table td {
			word-wrap:break-word;
			width: 30%;
		}
	</style>
</head>
<body>
    <b>Laporan Invoice Tanggal transaksi: <?php echo longdate_indo($transaksi->tanggal); ?></b>
    
	<table border="1" cellpadding="8">
	<tr>
		<th>Nama Masakan</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>Total Harga</th>
	</tr>

    <?php
    if( ! empty($tcetaklaporan)){
    	$no = 1;
    	foreach($tcetaklaporan as $data){
           
           $sub=$data->harga * $data->keterangan;

    		echo "<tr>";
    		echo "<td>".$data->nama_masakan."</td>";
    		echo "<td> Rp. ".number_format($data->harga)."</td>";
    		echo "<td>".$data->keterangan."</td>";
    		echo "<td> Rp. ".number_format($sub)."</td>";
    		echo "</tr>";
    		$no++;
        }
    }
    echo "<tr><td colspan=3><b>Total</b></td><td>Rp. ".number_format($transaksi->total_bayar)."</td></tr>";
    ?>
	</table>
</body>
</html>
