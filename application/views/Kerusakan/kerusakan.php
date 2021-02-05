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
					<a href="<?php echo base_url('Kerusakan/FormCreate') ?>"><button class="btn btn-success btn-sm fa fa-plus"> Tambah Data Baru</button></a>
			<?php } ?>
		
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Kerusakan Mesin</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								<th style="text-align: center;" width="5px;">No</th>
								<th style="text-align: center;">Kode Kerusakan</th>
								<th style="text-align: center;">Kode Mesin</th>
								<th style="text-align: center;">Nama Mesin</th>
								<th style="text-align: center;">Tahun</th>
								<th style="text-align: center;">Tipe</th>
								<th style="text-align: center;">Deskripsi Kerusakan</th>
								<th style="text-align: center;">Tanggal Kerusakan</th>
								<th style="text-align: center;">Jam Kerusakan</th>
								<th style="text-align: center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($kerusakan as $kerusakan) { ?>
				              	<tr>
				                <td style="text-align: center;"><?php echo $no; ?></td>
				                <td style="text-align: center;"><?php echo $kerusakan->kode_kerusakan ?></td>
				                <td style="text-align: center;"><?php echo $kerusakan->kode_mesin ?></td>
				                 <td style="text-align: center;"><?php echo $kerusakan->nama_mesin ?></td>
				                 <td style="text-align: center;"><?php echo $kerusakan->tahun ?></td>
				                 <td style="text-align: center;"><?php echo $kerusakan->tipe ?></td>
				                <td style="text-align: center;"><?php echo 	$kerusakan->deskripsi ?></td>
				                <td style="text-align: center;"><?php echo  $date1 = date('d-m-Y', strtotime($kerusakan->tanggal)); ?></td>
				                <td style="text-align: center;"><?php echo  $date1 = date('H:i:s a', strtotime($kerusakan->jam)); ?></td>
				          		<td style="text-align: center;">
				          			<!-- <?php if ($this->session->userdata('level') == 'Mekanik') { ?>
				          			<a href="<?php echo base_url('Kerusakan/FormUpdate/'.$kerusakan->kode_kerusakan) ?>"><button class="btn btn-primary btn-sm" > PROSES </button></a>
				          			<a href="<?php echo base_url('Kerusakan/FormUpdate/'.$kerusakan->kode_kerusakan) ?>"><button class="btn btn-success btn-sm" > SELESAI </button></a>
				          			<?php } ?> -->
				          			<?php if ($this->session->userdata('level') == 'Manager') { ?>
				          			<a href="<?php echo base_url('Kerusakan/FormUpdate/'.$kerusakan->kode_kerusakan) ?>"><button class="btn btn-primary btn-sm fa fa-edit"></button></a>
				          			 <a href="<?php echo base_url('Kerusakan/Cetak/'.$kerusakan->kode_kerusakan) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
								  	<?php include 'kerusakan-delete.php'; ?>
								  <?php } ?>
								  <?php if ($this->session->userdata('level') == 'Mekanik') { ?>
								<a href="<?php echo base_url('Kerusakan/Cetak1/'.$kerusakan->kode_kerusakan) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
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