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
			<a href="<?php echo base_url('Perbaikan/FormCreate') ?>"><button class="btn btn-success btn-sm fa fa-plus"> Tambah Data Baru</button></a>
		<?php } ?>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Data Perbaikan Mesin</h3>
				</div>
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead class="bg-primary">
							<tr>
								<th style="text-align: center;" width="5px;">No</th>
								<th style="text-align: center;">Kode Perbaikan</th>
								<th style="text-align: center;">Deskripsi Kerusakan</th>
								<th style="text-align: center;">Kode Mesin</th>
							    <th style="text-align: center;">Nama Sparepart</th>
								<th style="text-align: center;">Jumlah Sparepart</th>
								<th style="text-align: center;">Nama Mekanik</th>
								<th style="text-align: center;">Tanggal Kerusakan</th>
								<th style="text-align: center;">Jam Kerusakan</th>
								<th style="text-align: center;">Waktu Pengerjaan</th>
								<th style="text-align: center;">Waktu Penyelesaian</th>
								<th style="text-align: center;">Interval</th>
								<th style="text-align: center;">Shift</th>
								<th style="text-align: center;">Ket</th>
								<th style="text-align: center;">Opsi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($perbaikan as $perbaikan) { ?>
				              	<tr>
				                <td style="text-align: center;"><?php echo $no; ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->kode_perbaikan ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->deskripsi ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->kode_mesin ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->nama_part ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->jumlah ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->nama_mekanik ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->tanggal ?></td>
				                <td style="text-align: center;"><?php echo  $date1 = date('H:i:s a', strtotime($perbaikan->jam)); ?></</td>
				                <td><?php if ($perbaikan->keterangan == "Belum") {
				                	echo "-";
				                }elseif ($perbaikan->keterangan == "proses") {
				                	echo $date1 = date('d-m-Y H:i:s' , strtotime($perbaikan->waktu_pengerjaan));
				                }elseif ($perbaikan->keterangan == "selesai") {
				                	echo $date2 = date('d-m-Y H:i:s', strtotime($perbaikan->waktu_selesai));
				                } ?></td>
				                <td><?php if ($perbaikan->keterangan == "Belum") {
				                	echo "-";
				                }elseif ($perbaikan->keterangan == "proses") {
				                	echo "-";
				                }elseif ($perbaikan->keterangan == "selesai") {
				                	echo $date2 = date('d-m-Y H:i:s', strtotime($perbaikan->waktu_selesai));
				                } ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->interfal ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->shift ?></td>
				                <td style="text-align: center;"><?php echo $perbaikan->keterangan ?></td>
				          		<td style="text-align: center;">
				          			<?php if ($this->session->userdata('level') == 'Mekanik') { ?>
				          			<?php if ($perbaikan->keterangan=='selesai'){
				          				echo '';
				          			} else if ($perbaikan->keterangan=='proses') {
				          				?>
				          			<a href="<?php echo base_url('Perbaikan/Selesai/'.$perbaikan->kode_perbaikan) ?>"><button class="btn btn-success btn-sm" > SELESAI </button></a>
				          			<?php }
				          			else { ?>
				          			<a href="<?php echo base_url('Perbaikan/Proses/'.$perbaikan->kode_perbaikan) ?>"><button class="btn btn-primary btn-sm" > PROSES </button></a>
				          			<a href="<?php echo base_url('Perbaikan/Selesai/'.$perbaikan->kode_perbaikan) ?>"><button class="btn btn-success btn-sm" > SELESAI </button></a>		
				          			}
				          			<?php } ?>
				          			<a href="<?php echo base_url('Perbaikan/Cetak1/'.$perbaikan->kode_perbaikan) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
				          			<?php } ?>
 									<?php if ($this->session->userdata('level') == 'Manager') { ?>
 										<a href="<?php echo base_url('Perbaikan/FormUpdate/'.$perbaikan->kode_perbaikan) ?>">
				          			<button class="btn btn-primary btn-sm fa fa-edit"></button></a>
 									<?php include 'delete-perbaikan.php'; ?> 
 									<a href="<?php echo base_url('Perbaikan/Cetak/'.$perbaikan->kode_perbaikan) ?>" target="_blank"><button class="btn btn-success btn-sm fa fa-print"></button></a>
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