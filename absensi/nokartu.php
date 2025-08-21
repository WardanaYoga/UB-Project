<?php 
	include "koneksi.php";

	//baca isi tabel tmprfid
	$sql		= mysqli_query($konek, "SELECT * FROM tmprfid");
	$data 		= mysqli_fetch_array($sql);
	$nokartu	= isset($data['nokartu']) ? $data['nokartu'] : '';
?>

<div class="form-group">
	<label>No Kartu</label>
	<input type="text" name="nokartu" id="nokartu" placeholder="tempelkan kartu rfid anda " class="form-control" style="width : 200 px" value="<?php echo isset($nokartu) ? $nokartu : '';?>">
</div>