<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Sparepart</h3>
        </div>
        <?php echo form_open(base_url('Part/Update/'.$part->kode_part)); ?>
        <div class="box-body">
          <input type="hidden" class="form-control" name="kode_part" value="<?php echo $part->kode_part ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Sparepart</label>
            <input type="text" class="form-control"  placeholder="Kode Sparepart" name="kode_part" readonly="" value="<?php echo $part->kode_part ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Nama Sparepart</label>
            <input type="text" class="form-control" name="nama_part" placeholder="Nama Sparepart" required="" value="<?php echo $part->nama_part ?>">
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