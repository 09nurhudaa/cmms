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
			<h3 style="color:black; text-align: center;margin-top: -10px;">Data Jadwal</h3>
			<hr style="color: black;margin-top: -10px;">
			<table border="">
				<tr>
					<td>
				<td>Kode Jadwal</td>
				</td>
				<td>:</td>
				<td><?php echo $cetak->kode_jadwal ?></td>
				<td width="40"></td>
				</tr>
				<tr>
					<td>
				<td>Kode Mesin</td>
				</td>
				<td>:</td>
				<td><?php echo $cetak->kode_mesin ?></td>
				<td width="40"></td>
				<tr>
				<td>
				<td>Nama Mesin</td>
				</td>
				<td>:</td>
				<td><?php echo $cetak->nama_mesin ?></td>
				</tr>
				<tr>
				<td><td>Tipe</td></td>
				<td>:</td>
				<td><?php echo $cetak->tipe ?></td>
				<td></td>
				<tr>
				<td>
				<td>Tahun</td>
				</td>
				<td>:</td>
				<td><?php echo $cetak->tahun ?></td>
				<td></td>
				</tr>
				<tr>
				<td><td>Jenis Perawatan</td></td>
				<td>:</td>
				<td><?php echo $cetak->jenis_perawatan ?></td>
				<td></td>
				</tr>
				<tr>
				<td><td>Interval</td></td>
				<td>:</td>
				<td><?php echo $cetak->interfal ?></td>
				<td></td>
				<tr>
					<td>
				<td>Shift</td>
			</td>
				<td>:</td>
				<td><?php echo $cetak->shift ?></td>
				</tr>
				<tr>
			 	<td><td>Tanggal Perawatan</td></td>
				<td>:</td>
				<td><?php echo $cetak->tanggal ?></td>
				<td></td>
				</tr>
			</table>
			<hr style="color: black; margin-top: 10px;">
		</div>
	</body>
</html>