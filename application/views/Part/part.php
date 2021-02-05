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
			<a href="<?php echo base_url('Part/FormCreate') ?>"><button class="btn btn-success btn-sm fa fa-plus"> Tambah Data Baru</button></a>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">SPARE PART</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								<th style="text-align: center;" width="5px;">No</th>
								<th style="text-align: center;">Kode Sparepart</th>
								<th style="text-align: center;">Nama Sparepart</th>
								<th style="text-align: center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($Part as $Part) { ?>
							<tr>
									<td style="text-align: center;"><?php echo $no; ?></td>
									<td><?php echo $Part->kode_part; ?></td>
									<td><?php echo $Part->nama_part; ?> </td>
								<td style="text-align: center;"><a href="<?php echo base_url('Part/FormUpdate/'.$Part->kode_part) ?>"><button class="btn btn-primary btn-sm fa fa-edit"></button></a>
										<?php include 'part-delete.php'; ?>
								 <a href="<?php echo base_url('Part/Cetak/'.$Part->kode_part) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
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