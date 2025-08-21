<?php 
	include "koneksi.php";
	//baca tabel status untuk mode absensi
	$sql = mysqli_query($konek, "SELECT * FROM status");
	$data = mysqli_fetch_array($sql);
	$mode_absen = $data['mode'];

	// uji mode absen
	$mode = "";
	if ($mode_absen == 1) {
		$mode = "Masuk";
	} else if ($mode_absen == 2) {
		$mode = "Istirahat";
	} else if ($mode_absen == 3) {
		$mode = "Kembali";
	} else if ($mode_absen == 4) {
		$mode = "Pulang";
	}

	//baca tabel tmprfid
	$baca_kartu = mysqli_query($konek, "SELECT * FROM tmprfid");
	if (mysqli_num_rows($baca_kartu) > 0) {
		$data_kartu = mysqli_fetch_array($baca_kartu);
		$nokartu = $data_kartu['nokartu'];
	} else {
		$nokartu = "";
	}
?>

<div class="container-fluid" style="text-align: center;">
	<?php if ($nokartu == "") { ?>

	<h3>Absen: <?php echo $mode; ?></h3>
	<h3>Silahkan Tempelkan Kartu RFID ANDA!</h3>
	<img src="images/rfid.png" style="width: 200px;">
	<br>
	<img src="images/animasi2.gif">
	<?php } else {
		//cek nomer kartu rfid tersebut apakah terdaftar di tabel karyawan
		$cari_karyawan = mysqli_query($konek, "SELECT * FROM karyawan WHERE nokartu = '$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_karyawan);
		if ($jumlah_data == 0) {
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		} else {
			// ambil data karyawan
			$data_karyawan = mysqli_fetch_array($cari_karyawan);
			$nama = $data_karyawan['nama'];
			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d');
			$jam = date('H:i:s');

			//cek di tabel absensi apakah nomor di kartu tersebut sudah ada sesuai dengan tanggal saat ini. Apabila belum ada maka dianggap absen masuk, tapi jika sudah ada maka update data sesuai model absensinya
			$cari_absen = mysqli_query($konek, "SELECT * FROM absensi WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if ($jumlah_absen == 0) {
				echo "<h1>Selamat Datang <br> $nama</h1>";
				mysqli_query($konek, "INSERT INTO absensi(nokartu, tanggal, jam_masuk) VALUES ('$nokartu', '$tanggal', '$jam')");
			} else {
				// update sesuai pilihan mode absen
				if ($mode_absen == 2) {
					echo "<h1>Selamat Istirahat <br> $nama</h1>";
					mysqli_query($konek, "UPDATE absensi SET jam_istirahat = '$jam' WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
				} else if ($mode_absen == 3) {
					echo "<h1>Selamat Datang Kembali <br> $nama</h1>";
					mysqli_query($konek, "UPDATE absensi SET jam_kembali = '$jam' WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
				} else if ($mode_absen == 4) {
					echo "<h1>Selamat Jalan <br> $nama</h1>";
					mysqli_query($konek, "UPDATE absensi SET jam_pulang = '$jam' WHERE nokartu = '$nokartu' AND tanggal = '$tanggal'");
				}
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "DELETE FROM tmprfid");
	} ?>
</div>
