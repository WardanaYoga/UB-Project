<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = isset($_GET['id']) ? $_GET['id'] : '';
	//baca data karyawan berdasarkan id
	$cari = mysqli_query($konek, "SELECT * FROM karyawan WHERE id = '$id'");
	$hasil = mysqli_fetch_array($cari);

	//jika tombol simpan di klik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu 	= $_POST['nokartu'];
		$nama 		= $_POST['nama'];
		$alamat 	= $_POST['alamat'];

		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "INSERT INTO karyawan (nokartu, nama, alamat) VALUES ('$nokartu', '$nama', '$alamat')");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan
		// kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>alert('Tersimpan');location.replace('datakaryawan.php')</script>
			";
		}
		else
		{
			echo "
				<script>alert('Gagal Tersimpan');location.replace('datakaryawan.php')</script>
			";
		}
	}
	
	//kosongkan tabel tmprfid
	mysqli_query($konek, "DELETE FROM tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include "header.php"; ?>
	<title>Tambah Data Karyawan</title>

	<!-- pembacaan nomor kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 1000); // pembacaan file no kartu.php 1 detik = 1000
		});
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!--	isi -->
	<div class="container-fluid">
		<h3>Tambah Data Karyawan</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="text" name="nama" id="nama" placeholder="nama karyawan" class="form-control" style="width: 400px;" value="<?php echo isset($hasil['nama']) ? $hasil['nama'] : ''; ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat karyawan" style="width: 400px;"><?php echo isset($hasil['alamat']) ? $hasil['alamat'] : ''; ?></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>
	<?php include "footer.php"; ?>

</body>
</html>
