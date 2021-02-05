<br>
<?php 

  if ($this->session->flashdata('sukses')) {
    
    echo '<div class="alert alert-success"><i class="fa fa-check"> </i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';
  }

 ?>
<style type="text/css">
th{
font-size: 11.5px;
}
td{
font-size: 11.5px;
}
</style>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<?php if ($this->session->userdata('level') == 'Manager') { ?>
			<a href="<?php echo base_url('Perawatan/FormCreate') ?>"><button class="btn btn-success btn-sm fa fa-plus"> Tambah Data Baru</button></a>
		<?php } ?>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Perawatan Mesin</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								<th style="text-align: center;" width="5px;">No</th>
								<th style="text-align: center;">Kode Perawatan</th>
								<th style="text-align: center;">Nama Perawatan</th>
								<th style="text-align: center;">Kode Mesin</th>
								<th style="text-align: center;">Nama Mesin</th>
								<th style="text-align: center;">Nama Sparepart</th>
								<th style="text-align: center;">Jumlah Sparepart</th>
								<th style="text-align: center;">Nama Mekanik</th>
								<th style="text-align: center;">Tanggal Perawatan</th>
								<th style="text-align: center;">Tanggal Pengerjaan</th>
								<th style="text-align: center;">Tanggal Selesai</th>
								<th style="text-align: center;">Interval</th>
								<th style="text-align: center;">Shift</th>
								<th style="text-align: center;">Status</th>
								<th style="text-align: center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($perawatan as $perawatan) { ?>
				              	<tr>
				                <td style="text-align: center;"><?php echo $no; ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->kode_perawatan ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->jenis_perawatan ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->kode_mesin ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->nama_mesin ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->nama_part ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->jumlah ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->nama_mekanik ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->tanggal ?></td>
				                <td>
				                	<?php if ($perawatan->keterangan == "Belum") {
				                	echo "-";
				                }elseif ($perawatan->keterangan == "proses") {
				                	echo $date1 = date('d-m-Y H:i:s' , strtotime($perawatan->waktu_perawatan));
				                }elseif ($perawatan->keterangan == "selesai") {
				                	echo $date2 = date('d-m-Y H:i:s', strtotime($perawatan->waktu_perawatan));
				                } ?>
				             	</td>
				                <td>
				                	<?php if ($perawatan->keterangan == "Belum") {
				                	echo "-";
				                }elseif ($perawatan->keterangan == "proses") {
				                	echo "-";
				                }elseif ($perawatan->keterangan == "selesai") {
				                	echo $date2 = date('d-m-Y H:i:s', strtotime($perawatan->waktu_selesai));
				                } ?>
				                	
				                </td>
				                <td style="text-align: center;"><?php echo $perawatan->interfal ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->shift ?></td>
				                <td style="text-align: center;"><?php echo $perawatan->keterangan ?></td>
				                <td style="text-align: center;">
				                <?php if ($this->session->userdata('level') == 'Mekanik') { ?>
				          			<?php if ($perawatan->keterangan=='selesai'){
				          				echo '';
				          			} else if ($perawatan->keterangan=='proses') {
				          				?>
				          			<a href="<?php echo base_url('Perawatan/Selesai/'.$perawatan->kode_perawatan) ?>"><button class="btn btn-success btn-sm" > SELESAI </button></a>
				          			<?php }
				          			else { ?>
				          			<a href="<?php echo base_url('Perawatan/Proses/'.$perawatan->kode_perawatan) ?>"><button class="btn btn-primary btn-sm" > PROSES </button></a>
				          			<a href="<?php echo base_url('Perawatan/Selesai/'.$perawatan->kode_perawatan) ?>"><button class="btn btn-success btn-sm" > SELESAI </button></a>		
				          			<?php } ?>
				          			<a href="<?php echo base_url('Perawatan/Cetak1/'.$perawatan->kode_perawatan) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
				          			<?php } ?>
 									<?php if ($this->session->userdata('level') == 'Manager') { ?>
 									<a href="<?php echo base_url('Perawatan/FormUpdate/'.$perawatan->kode_perawatan) ?>">
				          			<button class="btn btn-primary btn-sm fa fa-edit"></button></a>
 									<?php include 'delete-perawatan.php'; ?> 
 									<a href="<?php echo base_url('Perawatan/Cetak/'.$perawatan->kode_perawatan) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
 								<?php } ?>
									
								</td>
							</tr>
						<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>