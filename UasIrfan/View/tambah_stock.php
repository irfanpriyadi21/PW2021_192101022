<?php
include '../Controller/controller_tambah_stock.php'
?>

<html>
<head>
	<title>UAS</title>
	<style>
		body {
		  	font-family: Sans-Serif;
		}
	</style>
</head>
<body>
	<div class="container">	
		<div class="header" style="padding: 5px 10px;">
			<h2 align="center">DATA LOGISTIK LEMBAR KERJA SISWA (LKS)</h2>
			<div>Programmer : Irfan Priyadi Nur Fauzi</div>
			<br>
			<div>
				<span style="padding-right: 30px;">Input Stock</span>
				<a href="distribusi.php" style="padding-right: 30px;">Distibusi</a>
				<a href="stock.php">Check Stock</a>
			</div>
		</div>
		<div class="body" style="padding: 5px 10px;">
			<h3>Form Input Stock LKS</h3>
			<form method="POST">
				<table width="100%">
					<tr>
						<td width="20%">Kelas</td>
						<td>
							<select name="kelas" required>
								<?php for ($i = 1; $i <= 6; $i++) : ?>
									<?php if (@$edit): ?>
										<?php if ($edit['kelas'] == $i): ?>
											<option value="<?= $i ?>" selected><?= $i ?></option>
										<?php else: ?>
											<option value="<?= $i ?>"><?= $i ?></option>
										<?php endif ?>
									<?php else: ?>
										<option value="<?= $i ?>"><?= $i ?></option>
									<?php endif ?>
								<?php endfor ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Jumlah</td>
						<td>
							<input type="number" name="jumlah" required value="<?= @$edit['jumlah'] ?>">
						</td>
					</tr>
					<tr>
						<td>Harga</td>
						<td>
							<input type="number" name="harga" required value="<?= @$edit['harga'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							<button name="simpan" value="true">Simpan</button>
						</td>
					</tr>
				</table>
			</form>

			<h3>Data Stock LKS</h3>
			<table width="100%" border="1">
				<thead>
					<tr>
						<th width="1%">No.</th>
						<th width="5%">Kelas</th>
						<th width="5%">Jumlah</th>
						<th width="5%">Harga</th>
						<th width="5%">Nilai Persediaan</th>
						<th width="5%">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						$jumlahSeluruh = 0;
						$jumlahPersediaan = 0;
					?>
					<?php while ($row_data = mysqli_fetch_assoc($data)) : ?>
						<tr>
							<td class="text-center"><?= $no++ ?></td>
							<td class="text-center"><?= $row_data['kelas'] ?></td>
							<td class="text-right"><?= $row_data['jumlah'] ?></td>
							<td class="text-right"><?= number_format($row_data['harga']) ?></td>
							<td class="text-right"><?= number_format($row_data['jumlah'] * $row_data['harga']) ?></td>
							<td class="d-flex">
								<a href="?id=<?= $row_data['id'] ?>">Edit</a>
								&nbsp;
								<a href="?id=<?= $row_data['id'] ?>&delete=true" onclick="return confirm('Anda ingin menghapus data ini?')">Hapus</a>
							</td>
						</tr>
						<?php
							$jumlahSeluruh += $row_data['jumlah'];
							$jumlahPersediaan += $row_data['jumlah'] * $row_data['harga'];
						?>
					<?php endwhile ?>
				</tbody>
			</table>
			<table width="100%">
				<tr>
					<td width="20%">Jumlah LKS Seluruh</td>
					<td>
						<input type="text" value="<?= $jumlahSeluruh ?>" readonly>
					</td>
				</tr>
				<tr>
					<td>Total Nilai Persediaan</td>
					<td>
						<input type="text" value="<?= number_format($jumlahPersediaan) ?>" readonly>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>