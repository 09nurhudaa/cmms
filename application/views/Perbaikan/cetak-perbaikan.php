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
			<h3 style="color:black; text-align: center;margin-top: -10px;">Data Perbaikan</h3>
			<hr style="color: black;margin-top: -10px;">
			<table border="">
				<?php  ?> 
				<tr>
				<td>
				<td>Kode Perbaikan</td>
				</td>
				<td>:</td>
				<td><?php echo $cetak['kode_perbaikan'] ?></td>
				<td width="40"></td>
				</tr>
				<tr>
				<td>
				<td>Deskripsi Kerusakan </td>
				<td>:</td>
				</td>
				<td><?php echo $cetak['deskripsi'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Kode Mesin</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['kode_mesin'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Nama Spare Part</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['nama_part'] ?></td>
				<tr>
				<td width="40"></td>
				<td>Jumlah Spare Part</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['jumlah'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Nama Mekanik</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['nama_mekanik'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Tanggal Kerusakan</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['tanggal'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Waktu Kerusakan</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['jam'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Waktu Pengerjaan</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['waktu_pengerjaan'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Waktu Selesai</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['waktu_selesai'] ?></td>
				</tr>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Interval</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['interfal'] ?></td>
				</tr>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Shift</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['shift'] ?></td>
				</tr>
				<tr>
				<td width="40"></td>
				<td>Status Perbaikan</td>
				<td>:</td>
				</tr>
				<td><?php echo $cetak['keterangan'] ?></td>
			</table>
			<hr style="color: black; margin-top: 10px;">
		</div>
	</body>
</html>