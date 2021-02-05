<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah Sparepart</h3>
        </div>
        <?php echo form_open(base_url('Part/Create')); ?>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Part</label>
            <input type="text" class="form-control"  placeholder="Kode Part" name="kode_part" required="" value="<?php echo $kode ?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Part</label>
            <input type="text" class="form-control" name="nama_part" placeholder="Nama Part" required="">
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary fa fa-save"> Simpan</button>
          <a href="<?php echo base_url('Part') ?>"><button type="button" class="btn btn-danger fa fa-close"> Kembali</button></a>
        </div>
        <?php form_close(); ?>
      </div>
    </div>
  </div>
</section>