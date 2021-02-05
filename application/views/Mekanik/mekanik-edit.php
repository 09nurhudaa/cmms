<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Mekanik</h3>
        </div>
        <?php echo form_open(base_url('Mekanik/Update/'.$mekanik->kode_mekanik)); ?>
        <div class="box-body">
          <input type="hidden" class="form-control" name="kode_mekanik" value="<?php echo $mekanik->kode_mekanik ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Mekanik</label>
            <input type="text" class="form-control"  placeholder="Kode Mekanik" name="kode_mekanik" readonly="" value="<?php echo $mekanik->kode_mekanik ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Mekanik</label>
            <input type="text" class="form-control" name="nama_mekanik" placeholder="Nama Mekanik" required="" value="<?php echo $mekanik->nama_mekanik ?>">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required="" value="<?php  echo $mekanik->alamat?>">
          </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-xs-4">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" placeholder="NO Telepon" required="" value="<?php echo $mekanik->telepon ?>">
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