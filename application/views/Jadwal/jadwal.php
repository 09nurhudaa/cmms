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
			<a href="<?php echo base_url('Jadwal/FormCreate') ?>"><button class="btn btn-success btn-sm fa fa-plus"> Tambah Data Baru</button></a>
		<?php } ?>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Jadwal Perawatan Mesin</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								<th style="text-align: center;" width="5px;">No</th>
								<th style="text-align: center;">Kode Jadwal</th>
								<th style="text-align: center;">Kode Mesin</th>
								<th style="text-align: center;">Nama Mesin</th>
								<th style="text-align: center;">Jenis Perawatan</th>
								<th style="text-align: center;">Interval</th>
								<th style="text-align: center;">Shift</th>
								<th style="text-align: center;">Tanggal Perawatan</th>
								<th style="text-align: center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
								<?php $no=1; foreach ($jadwal as $jadwal) { ?>
				              	<tr>
				                <td style="text-align: center;"><?php echo $no; ?></td>
				                <td style="text-align: center;"><?php echo $jadwal->kode_jadwal ?></td>
				                <td style="text-align: center;"><?php echo $jadwal->kode_mesin ?></td>
				                <td style="text-align: center;"><?php echo $jadwal->nama_mesin ?></td>
				                <td style="text-align: center;"><?php echo $jadwal->jenis_perawatan ?></td>
				                <td style="text-align: center;"><?php echo $jadwal->interfal ?></td>
				                <td style="text-align: center;"><?php echo $jadwal->shift ?></td>
				                <td style="text-align: center;"><?php echo  $date1 = date('d-m-Y', strtotime($jadwal->tanggal)); ?></td>
				                <td style="text-align: center;">
				          			<?php if ($this->session->userdata('level') == 'Manager') { ?>
								  	<a href="<?php echo base_url('Jadwal/FormUpdate/'.$jadwal->kode_jadwal) ?>"><button class="btn btn-primary btn-sm fa fa-edit"></button></a>
								  		<?php include 'delete-jadwal.php'; ?>
								  		<a href="<?php echo base_url('Jadwal/Cetak/'.$jadwal->kode_jadwal) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
								  		<?php } ?>
								  		<?php if ($this->session->userdata('level') == 'Mekanik') { ?>
								  	<a href="<?php echo base_url('Jadwal/Cetak1/'.$jadwal->kode_jadwal) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
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