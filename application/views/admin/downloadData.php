<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Penjualan Tanggal ".date('d-m-Y').".xls");
	?>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Waktu</th>
			<th>Produk</th>
			<th>Jumlah</th>
			<th>Harga Satuan</th>
			<th>Total Harga</th>
		</tr>
		
		<?php $i=1;?>
		<?php foreach ($download as $dl) :?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $dl['waktu']; ?></td>
			<?php foreach($produk as $pr):
				if($pr['id_produk']==$dl['id_produk']):
			?>
			<td><?php echo $pr['nama']; ?></td>
			<?php endif;
			endforeach;?>
			<td><?php echo $dl['jumlah']; ?></td>
			<td><?php echo $dl['harga']; ?></td>
			<?php $total = $dl['jumlah']*$dl['harga'];?>
			<td><?php echo $total; ?></td>
		</tr>
		<?php $i++;?>
		<?php endforeach;?>
	</table>
</body>
</html>