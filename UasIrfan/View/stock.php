<?php
include '../Controller/controller_stock.php'
?>

<div class="header" style="padding: 5px 10px;">
	<h2 align="center">DATA LOGISTIK LEMBAR KERJA SISWA (LKS)</h2>
	<div>Programmer : Irfan Priyadi Nur Fauzi</div>
	<br>
	<div>
		<a href="tambah_stock.php" style="padding-right: 30px;">Input Stock</a>
		<a href="distribusi.php" style="padding-right: 30px;">Distibusi</a>
		<span>Check Stock</span>
	
	</div>
</div>
<h3>Cek Stock</h3>
<table width="100%" border="1" cellpadding="1" cellspacing="1">
	<thead>
		<tr>
			<th width="1%">No.</th>
			<th width="25%">Kelas</th>
			<th width="25%">Jumlah</th>
			<th width="25%">Harga</th>
			<th width="25%">Nilai Persediaan</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
		?>
		<?php while ($row = mysqli_fetch_assoc($data)) : ?>
			<tr>
				<td class="text-center"><?= $no++ ?></td>
				<td class="text-center"><?= $row['kelas'] ?></td>
				<td class="text-right"><?= $row['jumlah'] ?></td>
				<td class="text-right"><?= number_format($row['harga']) ?></td>
				<td class="text-right"><?= number_format($row['jumlah'] * $row['harga']) ?></td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>