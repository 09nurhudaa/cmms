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
    <div class="col-md-12">
      <form id="form1" method="get" action="<?php echo base_url('Laporan/GetLaporanKerusakan') ?>">
        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Kerusakan</label>
                  <input type="date" name="startdate" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Kerusakan</label>
                  <input type="date" name="enddate" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info btn-sm fa fa-search"> Cari Data</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Laporan Data Kerusakan</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <thead class="bg-primary">
              <tr>
                <th style="text-align: center;" width="5px;">No</th>
                <th style="text-align: center;">Kode Kerusakan</th>
                <th style="text-align: center;">Kode Mesin</th>
                <th style="text-align: center;">Nama Mesin</th>
                <th style="text-align: center;">Deskripsi Kerusakan</th>
                <th style="text-align: center;">Tanggal Kerusakan</th>
                <th style="text-align: center;">Waktu Kerusakan</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($laporan as $laporan) { ?>
              <tr>
                <td style="text-align: center;"><?php echo $no; ?></td>
                <td style="text-align: center;"><?php echo $laporan->kode_kerusakan ?></td>
                <td style="text-align: center;"><?php echo $laporan->kode_mesin ?></td>
                <td style="text-align: center;"><?php echo $laporan->nama_mesin ?></td>
                <td style="text-align: center;"><?php echo $laporan->deskripsi ?></td>
                <td style="text-align: center;"><?php echo $date1 = date('d-m-Y', strtotime($laporan->tanggal)); ?></td>
                <td style="text-align: center;"><?php echo  $date1 = date('H:i:s a', strtotime($laporan->jam)); ?></td>
              </tr>
            <?php $no++; } ?>
            </tbody>
          </table>
        </div>
      </div>
       <a href="<?php echo base_url('Laporan/LaporanKerusakanCetak?startdate='.$startdate.'&enddate='.$enddate) ?>" target=_blank><button class="btn btn-success btn-sm fa fa-print"> Cetak Data</button></a>
    </div>
  </div>
</section>