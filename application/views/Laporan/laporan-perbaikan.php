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
      <form id="form1" method="get" action="<?php echo base_url('Laporan/GetLaporanPerbaikan') ?>">
        <div class="box box-primary">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Perbaikan</label>
                  <input type="date" name="startdate" class="form-control">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tanggal Perbaikan</label>
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
          <h3 class="box-title">Laporan Data Perbaikan</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
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
                <th style="text-align: center;">Waktu Kerusakan</th>
                <th style="text-align: center;">Waktu Pengerjaan</th>
                <th style="text-align: center;">Waktu Selesai</th>
                <th style="text-align: center;">Interval</th>
                <th style="text-align: center;">Shift</th>
                <th style="text-align: center;">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($laporan as $laporan) { ?>
              <tr>
              <td style="text-align: center;"><?php echo $no; ?></td>
              <td style="text-align: center;"><?php echo $laporan->kode_perbaikan ?></td>
              <td style="text-align: center;"><?php echo $laporan->deskripsi ?></td>
              <td style="text-align: center;"><?php echo $laporan->kode_mesin ?></td>
              <td style="text-align: center;"><?php echo $laporan->nama_part ?></td>
              <td style="text-align: center;"><?php echo $laporan->jumlah ?></td>
              <td style="text-align: center;"><?php echo $laporan->nama_mekanik ?></td>
              <td style="text-align: center;"><?php echo $laporan->tanggal ?></td>
              <td style="text-align: center;"><?php echo  $date1 = date('H:i:s a', strtotime($laporan->jam)); ?></</td>
              <td><?php if ($laporan->keterangan == "Belum") {
                          echo "-";
                        }elseif ($laporan->keterangan == "proses") {
                          echo $date1 = date('d-m-Y H:i:s' , strtotime($laporan->waktu_pengerjaan));
                        }elseif ($laporan->keterangan == "selesai") {
                          echo $date2 = date('d-m-Y H:i:s', strtotime($laporan->waktu_selesai));
                        } ?></td>
                        <td><?php if ($laporan->keterangan == "Belum") {
                          echo "-";
                        }elseif ($laporan->keterangan == "proses") {
                          echo "-";
                        }elseif ($laporan->keterangan == "selesai") {
                          echo $date2 = date('d-m-Y H:i:s', strtotime($laporan->waktu_selesai));
                        } ?></td>
                        <td style="text-align: center;"><?php echo $laporan->interfal ?></td>
                        <td style="text-align: center;"><?php echo $laporan->shift ?></td>
             <td style="text-align: center;"><?php echo $laporan->keterangan ?></td>
              </tr>
            <?php $no++; } ?>
            </tbody>
          </table>
        </div>
      </div>
       <a href="<?php echo base_url('Laporan/LaporanPerbaikanCetak?startdate='.$startdate.'&enddate='.$enddate) ?>" target=_blank><button class="btn btn-success btn-sm fa fa-print"> Cetak Data</button></a>
    </div>
  </div>
</section>