<!-- <!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<style>
	.box{
	width: 610px;
	height: 250px;
	padding: 15px;
	border: 1px solid #000000;
	margin: 20px;
	color: white;
	background-color: #ffffff;
	text-align: left;
	}
	</style>
	<body>
		
		<div class="box">
			<br><br>
			<h2 style="color:black; text-align: center;margin-top: -20px;">PT. Kurabo Manunggal Textile</h2>
			<h5 style="color:black; text-align: center;">Jl. M.H. Thamrin No.1 Tangerang, Banten</h5>
			<hr style="color: black;margin-top: -10px;">
			<h3 style="color:black; text-align: center;margin-top: -10px;">DATA KERUSAKAN</h3>
			<hr style="color: black;margin-top: -10px;">
			<table border="">
				<?php  ?>
				<tr>
					<th rowspan="3" width="100"><!-- <img src="<?php echo base_url('assets/admin//dist/img/Logo.png') ?>" width="100px" height="100px"> --></th>
<!-- 				</tr>
				<td>Kode Mekanik</td>
				<td>:</td>
				<td><?php echo $cetak->kode_mekanik ?></td>
				<td width="40"></td>
				<tr>
				<td>Nama Mekanik</td>
			</tr>
				<td>:</td>
				<td><?php echo $cetak->nama_mekanik ?></td>
				<tr>
					<td>Telepon</td>
					<td>:</td>
					<td><?php echo $cetak->telepon ?></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<hr style="color: white;margin-top: 10px;">
		</div>
	</body>
</html>  -->

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<style>
	.box{
	width: 610px;
	height: 250px;
	padding: 15px;
	border: 1px solid #000000;
	margin: 20px;
	color: white;
	background-color: #ffffff;
	text-align: left;
	}
	</style>
	<body>
		
		<div class="box">
			<br><br>
			<h2 style="color:black; text-align: center;margin-top: -20px;">PT. Kurabo Manunggal Textile</h2>
			<h5 style="color:black; text-align: center;">Jl. M.H. Thamrin No.1 Tangerang, Banten</h5>
			<hr style="color: black;margin-top: -10px;">
			<h3 style="color:black; text-align: center;margin-top: -10px;">DATA MEKANIK</h3>
			<hr style="color: black;margin-top: -10px;">
			<table border="">
				<?php  ?>
				<tr>
				<td>Kode Mekanik</td>
				<td>:</td>
				<td><?php echo $cetak->kode_mekanik ?></td>
				<td width="40"></td>
				</tr>
				<tr>
				<td>Nama Mekanik</td>
				<td>:</td>
				<td><?php echo $cetak->nama_mekanik ?></td>
				<tr>
				</tr>
				<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $cetak->alamat ?></td>
				<td></td>
				<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><?php echo $cetak->telepon ?></td>
				<td></td>
				</tr>
			</table>
			<hr style="color: black; margin-top: 10px;">
		</div>
	</body>
</html>