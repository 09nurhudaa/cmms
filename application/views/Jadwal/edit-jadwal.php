<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Edit Jadwal</h3>
    </div>
      <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <?php echo form_open(base_url('Jadwal/Update')); ?>
          <div class="form-group">
            <label>Kode Mesin</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
             <input type="text" name="kode_mesin" class="form-control" placeholder="Kode Mesin" value="<?php echo $jadwal->kode_mesin ?>" readonly>
              <?php foreach ($Mesin as $Mesin) { ?>
              <?php
              $jsArray .= "prdName['" . $Mesin->kode_mesin . "'] = {
              nm:'".addslashes($Mesin->nama_mesin). "',
              th:'".addslashes($Mesin->tahun)."',
              tp:'".addslashes($Mesin->tipe)."'};\n";
              ?>
              <?php } ?>
            </select>
          </div>
         <div class="form-group">
            <label>Nama Mesin</label>
            <input type="text" name="" id="nama_mesin" class="form-control" readonly="" value="<?php echo $jadwal->nama_mesin ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="" id="tahun" class="form-control" readonly="" value="<?php echo $jadwal->tahun ?>">
          </div>
          <div class="form-group">
            <label>Tipe</label>
            <input type="text" name="" id="tipe" class="form-control" readonly="" value="<?php echo $jadwal->tipe ?>">
          </div>       
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Kode Jadwal</label>
            <input type="text" name="kode_jadwal" class="form-control" placeholder="Kode Jadwal" value="<?php echo $jadwal->kode_jadwal ?>" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Jenis Perawatan</label>
            <input type="text" name="jenis_perawatan" class="form-control" placeholder="Jenis Perawatan" value="<?php echo $jadwal->jenis_perawatan?>">
          </div>
        </div>
          <div class="col-md-3">
          <div class="form-group">
            <label>Interval</label>
            <input type="text" name="interfal" class="form-control" placeholder="Interval" readonly="" value="<?php echo $jadwal->interfal ?>">
          </div>
          </div>
           <div class="col-md-2">
            <label for="exampleInputPassword1">Shift</label>
            <input type="text" name="shift" class="form-control" placeholder="Shift" readonly="" value="<?php echo $jadwal->shift ?>">
          </div>
          <div>
          </div>
        <div>
            <div class="col-md-7">
            <div class="form-group">
            <label>Tanggal Perawatan</label>
            <input type="date" name="tanggal" class="form-control" readonly="" placeholder="Tanggal Kerusakan" value="<?php echo $jadwal->tanggal ?>">
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-sm fa fa-save"> Simpan</button>
      <a href="<?php echo base_url('Jadwal') ?>"><button class="btn btn-danger btn-sm btn fa fa-close" type="button"> Kembali</button></a>
    </div>
  </div>
    <?php echo form_close(); ?>
  </div>
</section>
<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(kode_mesin){
document.getElementById('nama_mesin').value = prdName[kode_mesin].nm;
document.getElementById('tahun').value = prdName[kode_mesin].th;
document.getElementById('tipe').value = prdName[kode_mesin].tp;
};
</script>