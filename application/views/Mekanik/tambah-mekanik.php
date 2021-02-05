<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah Mekanik</h3>
        </div>
        <?php echo form_open(base_url('Mekanik/Create')); ?>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Mekanik</label>
            <input type="text" class="form-control"  placeholder="Kode Mekanik" name="kode_mekanik" required="" value="<?php echo $kode ?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Mekanik</label>
            <input type="text" class="form-control" name="nama_mekanik" placeholder="Nama Mekanik" required="">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="">
          </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-xs-4">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" placeholder="Telepon" required="">
              </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary fa fa-save"> Simpan</button>
          <a href="<?php echo base_url('Mekanik') ?>"><button type="button" class="btn btn-danger fa fa-close"> Kembali</button></a>
        </div>
        <?php form_close(); ?>
      </div>
    </div>
  </div>
</section>