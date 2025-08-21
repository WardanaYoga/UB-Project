<?php 
	include "koneksi.php";

	//baca id data yang akan dihapus
	$id = $_GET['id'];

	//hapus data 
	$hapus	= mysqli_query($konek, "DELETE FROM karyawan WHERE id = '$id'");

	//jika berhasil terhapus tampilkan pesan terhapus
	// kemudian kembali ke data karyawan
	if($hapus)
	{
		echo"
			<script>alert('Data berhasil dihapus');location.replace('datakaryawan.php');</script>
		";
	}else
	{
		echo"
			<script>alert('Gagal dihapus');location.replace('datakaryawan.php');</script>
		";
	}

	
?>