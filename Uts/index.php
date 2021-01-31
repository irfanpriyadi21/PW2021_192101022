<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="border: 2px solid blue;">
		<form method="post">
		<h1 align="center">Nusantara Computer Center</h1>
		<table>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<input type="text", name="nama">
				</td>
			</tr>
			<tr>
				<td>Kode Pendaftaran</td>
				<td>:</td>
				<td>
					<select name="Kode">
					    <option value="VBSK00108">VBSK00108</option>
					    <option value="DPSJ00210">DPSJ00210</option>
					    <option value="LXSM10105">LXSM10105</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<select name="kelas">
					    <option value="Reguler">Reguler</option>
					    <option value="Private">Private</option>
					</select>
				</td>
				<td>Jumlah Pertemuan</td>
				<td>:</td>
				<td><input type="text" name="jumlahPertemuan" style="width: 50px;"></td>
				<td>Kali</td>
			</tr>
			<tr>
				<td>Jumlah Peserta</td>
				<td>:</td>
				<td><input type="text" name="jumlahPeserta" style="width: 50px;"> Orang</td>
			
			</tr>
			<tr>
				<td>Hasil Test Awal</td>
				<td>:</td>
				<td>
					<select name="grade">
					    <option value="Grade A">Grade A</option>
					    <option value="Grade B">Grade B</option>
					     <option value="Grade B">Grade B</option>
					</select>
				</td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan="3">
					<button type="submit" name="simpan" value="simpan">Proses</button>
					<button type="cancel">Ulang</button>
				</td>
			</tr>
		</table>			
		</form>
	</div>

	<?php if(isset($_POST['simpan'])):?>
		<?php 
			$datas = generateData($_POST);
		?>
			<br>
			<div style="border: 2px solid blue;">
				<h1 align="center">Nusantara Computer Center</h1>
				<br>
				<h2 align="center">Kode Pendaftaran: <?= $_POST['Kode']?></h2>
				<table width="50%">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?= $_POST['nama']?></td>
						<td>Jenis Kursus</td>
						<td>:</td>
						<td><?= $datas['jenisKursus']?></td>
					</tr>
					<tr>
						<td>Kelas</td>
						<td>:</td>
						<td><?= $_POST['kelas']?></td>
						<td>No Urut</td>
						<td>:</td>
						<td><?= $datas['nomorUrut']?></td>
					</tr>
					<tr>
						<td>Hasil Test Awal</td>
						<td>:</td>
						<td><?= $_POST['grade']?></td>
						<td>Hari</td>
						<td>:</td>
						<td><?= $datas['hari']?></td>
					</tr>
					<tr>
						<td>Jumlah Peserta</td>
						<td>:</td>
						<td><?= $_POST['jumlahPeserta']?> Orang</td>
						<td>Jumlah Pertemuan</td>
						<td>:</td>
						<td><?= $datas['lamaPertemuan']?></td>
						<td>Kali</td>
					</tr>
					<tr>
						<td>Biaya Kursus</td>
						<td>:</td> 
						<td><?= $datas['biayaKursus']?></td>
						<td>Biaya Tambahan</td>
						<td>:</td>
						<td><?= $datas['biayaTambahan']?></td>
					</tr>
					<tr>
						<td>Biaya Subsidi</td>
						<td>:</td>
						<td><?= $datas['biayaSubsidi']?></td>
						<td>Biaya Yang Di Bayar</td>
						<td>:</td>
						<td><?= $datas['biayaBayar']?></td>
					</tr>
				</table>
				
			</div>
		<?php endif?>
</body>
</html>
<?php 

function generateData($datas){
	$posisiKursus = substr($datas['Kode'], 0, 2);	
	$posisiHari = substr($datas['Kode'], 3, 1);
	$nomorUrut = substr($datas['Kode'], 4, 3);
	$lamaPertemuan = substr($datas['Kode'], -1,2);

	$kelas = [
		'VB' => [
			'kelas' => 'Visual Basic',
			'biayaKursus' => 750000,
			'jenisKursus' => 'Pemrograman'
		],
		'DP' => [
			'kelas' => 'Delphi',
			'biayaKursus' => 650000,
			'jenisKursus' => 'Pemrograman'
		],
		'LX' => [
			'kelas' => 'Linux',
			'biayaKursus' => 800000,
			'jenisKursus' => 'Sistem Operasi'
		],
	];
	$grade = $datas['grade'];
	$biayaSubsidi = 0;
	$biayaKursus = $kelas[$posisiKursus]['biayaKursus'];
	$jenisKursus =$kelas[$posisiKursus]['jenisKursus'];
	$hari = "";

	if ($grade == 'Grade A') {
		$biayaSubsidi= (5 / 100) * $biayaKursus;
	}elseif ($grade == 'Grade B') {
		$biayaSubsidi= (2 / 100) * $biayaKursus;
	}else{
		$biayaSubsidi = 0;
	}

	if ($posisiHari == 'K') {
		$hari = "Kamis";
	}else if($posisiHari == "J"){
		$hari = "Jum'at";
	}elseif($posisiHari == "M"){
		$hari = "Minggu";
	}

	$biayaTambahan = 0;
	$jenisKelas = $datas['kelas'];
	$jumlahPeserta = $datas['jumlahPeserta'];

	if ($jenisKelas == "Private") {
		if($jumlahPeserta > 5){
			$biayaTambahan = 75000;
		}else{
			$biayaTambahan = 50000;
		}
	}else if($jenisKelas == "Reguler"){
		if ($jumlahPeserta < 10) {
			$biayaTambahan = 50000;
		}else{
			$biayaTambahan = 0;
		}

	}else{

	}

	$biayaBayar = ($biayaKursus - $biayaSubsidi) + $biayaTambahan;

	return [
		'biayaKursus' => $biayaKursus,
		'biayaSubsidi' => $biayaSubsidi,
		'hari' => $hari,
		'nomorUrut' => $nomorUrut,
		'lamaPertemuan' => $lamaPertemuan,
		'jenisKursus' => $jenisKursus,
		'biayaTambahan' => $biayaTambahan,
		'biayaBayar' => $biayaBayar
	];

}

?>