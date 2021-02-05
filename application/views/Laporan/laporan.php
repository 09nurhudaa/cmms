<section class="content">
  <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
      <a href="<?php echo base_url('Laporan/LaporanKerusakan') ?>">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Data Kerusakan </span>
            <span class="info-box-number"><?php echo $kerusakan." Kerusakan" ?></span>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <a href="<?php echo base_url('Laporan/LaporanPerbaikan') ?>">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Data Perbaikan</span>
            <span class="info-box-number"><?php echo $perbaikan." Perbaikan" ?></span>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <a href="<?php echo base_url('Laporan/LaporanPerawatan') ?>">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-cog"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Data Perawatan</span>
            <span class="info-box-number"><?php echo $perawatan." Perawatan" ?></span>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>