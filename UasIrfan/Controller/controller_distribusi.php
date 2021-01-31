<?php
include '../koneksi/koneksi.php';

if (isset($_POST['simpan'])) {
	if (!isset($_GET['id'])) {
		$saveData = mysqli_query(
			$con, 
			"INSERT INTO tb_distribusi VALUES (null, '$_POST[sekolah]', '$_POST[kelas]', '$_POST[jumlah]')"
		);
	} else {
		$saveData = mysqli_query(
			$con,
			"UPDATE tb_distribusi SET kelas = '$_POST[kelas]', jumlah = '$_POST[jumlah]', sekolah = '$_POST[sekolah]' WHERE id = '$_GET[id]'"
		);
	}

	if ($saveData) {
		echo "<script>alert('Berhasil menyimpan data');window.location.href='?menu=distribusi'</script>";
	} else {
		echo "<script>alert('Gagal menyimpan data')</script>";
	}
}

if (isset($_GET['id'])) {
	if (isset($_GET['delete'])) {
		$delete = mysqli_query(
			$con, 
			"DELETE FROM tb_distribusi WHERE id = '$_GET[id]'"
		);
		if ($delete) {
			echo "<script>alert('Berhasil menghapus data');window.location.href='?menu=distribusi'</script>";
		} else {
			echo "<script>alert('Gagal menghapus data')</script>";
		}
	}

	$record_data = mysqli_query($con, "SELECT * FROM tb_distribusi WHERE id = '$_GET[id]'");
	$edit = mysqli_fetch_assoc($record_data);
}

$data = mysqli_query(
	$con, 
	"SELECT * FROM tb_distribusi"
);


?>