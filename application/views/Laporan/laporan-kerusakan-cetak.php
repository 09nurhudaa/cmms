<!DOCTYPE html>
<html>
<head>
	<title>Cetak Hasil</title>
</head>
<style type="text/css">
	table.table-style-three {
	font-family: verdana, arial, sans-serif;
	font-size: 11px;
	color: #333333;
	border-width: 1px;
	border-color: #3A3A3A;
	border-collapse: collapse;
	}
	table.table-style-three th {
	border-width: 1px;
	padding: 10px;
	border-style: solid;
	border-color: #c0c0c0;
	background-color: #008080;
	color: #ffffff;
	}
	table.table-style-three tr:hover td {
	cursor: pointer;
	}
	table.table-style-three tr:nth-child(even) td{
	background-color: ;
	}
	table.table-style-three td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #c0c0c0;
	background-color: #ffffff;
	}
	</style>
<body>
	<table border="">
			<tr>
				<td><img src="<?php echo base_url('assets/admin/dist/img/logo-bekasi.png') ?>" width="140" style="margin-right: -0.1%"></td>
				<td style="text-align: center;" width="450"><h2>PT. Kurabo Manunggal Textile </h2>Jl. M.H. Thamrin No.1<br>Tangerang, Banten</td>
				<td><img src="<?php echo base_url('assets/admin/dist/img/Logo.png') ?>" width="100" style="margin-right: 2%;"></td>
			</tr>
		</table>
	<hr>
	<table class="table-style-three" border="1">
		<thead>
			<tr>
				<td style="background-color: white;">No</td>
				<td style="text-align: center;background-color: white; width:100px ">Kode Kerusakan</td>
				<td style="text-align: center;background-color: white; width:100px ">Kode Mesin</td>
				<td style="text-align: center;background-color: white; width:100px ">Nama Mesin</td>
				<td style="text-align: center;background-color: white; width:150px ">Deskripsi Kerusakan</td>
				<td style="text-align: center;background-color: white; width:150px ">Tanggal Kerusakan</td>
				<td style="text-align: center;background-color: white; width:150px ">Waktu Kerusakan</td>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($cetak as $cetak1 ) { ?>
			<tr>
				<td style="text-align: center;"><?php echo $no; ?></td>
				<td style="text-align: center;"><?php echo $cetak1->kode_kerusakan ?></td>
              	<td style="text-align: center;"><?php echo $cetak1->kode_mesin ?></td>
              	<td style="text-align: center;"><?php echo $cetak1->nama_mesin ?></td>
              	<td style="text-align: center;"><?php echo $cetak1->deskripsi ?></td>
              	<td style="text-align: center;"><?php echo $cetak1->tanggal ?></td>	
              	<td style="text-align: center;"><?php echo $cetak1->jam ?></td>	
			</tr>
			<?php $no++; } ?>
		</tbody>
	</table>
</body>
</html>