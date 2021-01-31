<?php
 include '../Controller/controller_distribusi.php'
?>

<div class="header" style="padding: 5px 10px;">
	<h2 align="center">DATA LOGISTIK LEMBAR KERJA SISWA (LKS)</h2>
	<div>Programmer : Irfan Priyadi Nur Fauzi</div>
	<br>
	<div>
		<a href="tambah_stock.php" style="padding-right: 30px;">Input Stock</a>
		<span style="padding-right: 30px;">Distribusi</span>
		<a href="stock.php">Check Stock</a>
	</div>
</div>
<h3>Distribusi LKS</h3>
<form method="POST">
	<table width="100%">
		<tr>
			<td width="20%">Nama Sekolah</td>
			<td>
				<input type="text" name="sekolah" required value="<?= @$edit['sekolah'] ?>">
			</td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>
				<?php for ($i = 1; $i <= 6; $i++) : ?>
					<?php if (@$edit): ?>
						<?php if ($edit['kelas'] == $i): ?>
							<label for="kelas-<?= $i ?>"><?= $i ?></label><input type="radio" name="kelas" value="<?= $i ?>" required id="kelas<?= $i ?>" checked>
						<?php else: ?>
							<label for="kelas-<?= $i ?>"><?= $i ?></label><input type="radio" name="kelas" value="<?= $i ?>" required id="kelas<?= $i ?>">
						<?php endif ?>
					<?php else: ?>
						<label for="kelas-<?= $i ?>"><?= $i ?></label><input type="radio" name="kelas" value="<?= $i ?>" required id="kelas-<?= $i ?>">
					<?php endif ?>
				<?php endfor ?>
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>
				<input type="number" name="jumlah" required value="<?= @$edit['jumlah'] ? abs(@$edit['jumlah']) : '' ?>">
			</td>
		</tr>
		<tr>
			<td>
				<button name="simpan" value="true">Simpan</button>
			</td>
		</tr>
	</table>
</form>
<!-- Data -->
<h3>Data Distribusi</h3>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<thead>
		<tr>
			<th width="1%">No.</th>
			<th width="25%">Nama Sekolah</th>
			<th width="25%">Kelas</th>
			<th width="25%">Jumlah</th>
			<th width="1%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
		?>
		<?php while ($row_data = mysqli_fetch_assoc($data)) : ?>
			<tr>
				<td class="text-center"><?= $no++ ?></td>
				<td><?= $row_data['sekolah'] ?></td>
				<td class="text-center"><?= $row_data['kelas'] ?></td>
				<td class="text-right"><?= abs($row_data['jumlah']) ?></td>
				<td class="d-flex">
					<a href="?menu=distribusi&id=<?= $row_data['id'] ?>">Edit</a>
					&nbsp;
					<a href="?menu=distribusi&id=<?= $row_data['id'] ?>&delete=true" onclick="return confirm('Yakin ingin menghapus data No. <?= $no - 1 ?>?')">Hapus</a>
				</td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>