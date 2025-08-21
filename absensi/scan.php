<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scan Kartu</title>
	<!-- scan membaca kartu rfid -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#cekkartu").load('bacakartu.php')
			}, 2000);
		});
	</script>
</head>
<body>

	<?php include "menu.php";?>

	<!-- isi -->
	<div class="container-fluid" style="padding-top: 10%">
		<div id = "cekkartu"></div>
	</div>

	<br>


	<?php include "footer.php"; ?>

</body>
</html>