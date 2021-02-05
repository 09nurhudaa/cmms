<!-- <?php
$nama_depan    = $this->session->userdata('nama_depan');
$nama_belakang = $this->session->userdata('nama_belakang');
$id_login      = $this->session->userdata('id_login');
?> -->
<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah Mesin</h3>
        </div>
        <?php echo form_open(base_url('Mesin/Create')); ?>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Mesin</label>
            <input type="text" class="form-control"  placeholder="Kode Mesin" name="kode_mesin" required="" value="<?php echo $kode ?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Mesin</label>
            <input type="text" class="form-control" name="nama_mesin" placeholder="Nama Mesin" required="">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Tahun</label>
            <input type="text" class="form-control" name="tahun" placeholder="Tahun Mesin" required="">
          </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-xs-4">
                <label>Tipe</label>
                <input type="text" name="tipe" class="form-control" placeholder="Tipe Mesin" required="">
              </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary fa fa-save"> Simpan</button>
          <a href="<?php echo base_url('Mesin') ?>"><button type="button" class="btn btn-danger fa fa-close"> Kembali</button></a>
        </div>
        <?php form_close(); ?>
      </div>
    </div>
  </div>
</section>