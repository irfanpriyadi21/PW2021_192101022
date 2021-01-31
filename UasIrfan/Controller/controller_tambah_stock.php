<?php
include '../koneksi/koneksi.php';

if (isset($_POST['simpan'])) {
	if (!isset($_GET['id'])) {
		$saveData = mysqli_query(
			$con, 
			"INSERT INTO tb_stok VALUES (null, '$_POST[kelas]', '$_POST[jumlah]', '$_POST[harga]')");
	} else {
		$saveData = mysqli_query(
			$con, 
			"UPDATE tb_stok SET kelas = '$_POST[kelas]', jumlah = '$_POST[jumlah]', harga = '$_POST[harga]' WHERE id = '$_GET[id]'"
		);
	}

	if ($saveData) {
		echo "<script>alert('Data Berhasil di Simpan');window.location.href='tambah_stock.php'</script>";
	} else {
		echo "<script>alert('Gagal menyimpan data')</script>";
	}
}

if (isset($_GET['id'])) {
	if (isset($_GET['delete'])) {
		$delete = mysqli_query(
			$con, 
			"DELETE FROM tb_stok WHERE id = '$_GET[id]'"
		);
		if ($delete) {
			echo "<script>alert('Berhasil menghapus data');window.location.href='tambah_stock.php'</script>";
		} else {
			echo "<script>alert('Gagal menghapus data')</script>";
		}
	}

	$data_record = mysqli_query(
		$con, 
		"SELECT * FROM tb_stok WHERE id = '$_GET[id]'"
	);

	$edit = mysqli_fetch_assoc($data_record);
}

$data = mysqli_query($con, "SELECT * FROM tb_stok");