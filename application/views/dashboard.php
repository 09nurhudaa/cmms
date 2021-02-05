<?php
$nama          = $this->session->userdata('nama');
$kode_user     = $this->session->userdata('kode_user');
$level         = $this->session->userdata('level');
?>
<section class="content">
   <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $kerusakan ?></h3>
              <p>Kerusakan Mesin</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo base_url('Kerusakan') ?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $this->session->userdata('nama');  ?></h3>
              <p>Perbaikan Mesin</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo base_url('Perbaikan') ?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jadwal ?></h3>
              <p>Jadwal Perawatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo base_url('Jadwal') ?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $this->session->userdata('nama');  //print_r($perawatan[0]->nama_mekanik); ?></h3>
              <p>Perawatan Mesin</p>
            </div>
            <div class="icon">
              <i class="fa fa-cog"></i>
            </div>
            <a href="<?php echo base_url('Perawatan') ?>" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>

          </div>
        </div>
      </div>
      </div>
</section>