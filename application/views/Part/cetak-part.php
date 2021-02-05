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
			<h2 style="color:black; text-align: center;margin-top: -20px;">Perusahaan</h2>
			<h5 style="color:black; text-align: center;">ALAMAT</h5>
			<hr style="color: black;margin-top: -10px;">
			<h3 style="color:black; text-align: center;margin-top: -10px;">DATA Sparepart</h3>
			<hr style="color: black;margin-top: -10px;">
			<table border="">
				<?php  ?>
				 <tr>
					<th rowspan="3" width="100"><!-- <img src="<?php echo base_url('assets/admin//dist/img/Logo.png') ?>" width="100px" height="100px"> --></th> 
				</tr>
				
				<td>Kode Part</td>
				<td>:</td>
				<td><?php echo $cetak->kode_part ?></td>
				<td width="40"></td>
				<td>Nama Part</td>
				<td>:</td>
				<td><?php echo $cetak->nama_part ?></td>
				<tr>
<!-- 					<td>Kode Mesin</td>
					<td>:</td>
					<td><?php echo $cetak->kode_mesin ?></td>
					<td></td>
					<td>Nama Mesin</td>
					<td>:</td>
					<td><?php echo $cetak->nama_mesin ?></td>
					<td></td> -->
				</tr>
				<tr>
<!-- 					<td>Tipe</td>
					<td>:</td>
					<td><?php echo $cetak->tipe ?></td>
					<td></td>
					<td>Tahun</td>
					<td>:</td>
					<td><?php echo $cetak->tahun ?></td>
					<td></td> -->
				</tr>
			</table>
			<hr style="color: black; margin-top: 10px;">
		</div>
	</body>
</html>