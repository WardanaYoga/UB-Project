<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include "header.php"; ?>
	<title>Data Karyawan</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Data Karyawan</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: steelblue; color : white">
					<th style="text-align: center">No.</th> 
					<th style="text-align: center">ID Card</th>
					<th style="text-align: center">Nama</th>
					<th style="text-align: center">Email</th>
					<th style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					//koneksi ke database
					include "koneksi.php";

					//baca daata karyawan
					$sql = mysqli_query($konek, "select * from karyawan");
					$no = 0; 
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				 ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nokartu']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td>
						<a href="edit.php?id=<?php echo $data['id'];?>">
						Edit</a> | <a href="hapus.php?id=<?php echo $data['id'];?>">
						Hapus</a>  

						
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<!-- tombol tambah data karyawan -->
		<a href="tambah.php"><button class = "btn btn-primary">Tambah Data Karyawan</button></a>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>