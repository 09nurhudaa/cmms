<section class="content">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Edit Kerusakan</h3>
    </div>
      <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <?php echo form_open(base_url('Kerusakan/Update')); ?>
          <div class="form-group">
            <label>Kode Mesin</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
            <input type="text" name="kode_mesin" class="form-control" placeholder="Kode Mesin" value="<?php echo $kerusakan->kode_mesin ?>" readonly>
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
            <input type="text" name="nama_mesin" id="nama_mesin" class="form-control" value="<?php echo $kerusakan->nama_mesin ?> " readonly>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="tahun" id="tahun" class="form-control" value="<?php echo $kerusakan->tahun ?>" readonly>
          </div>
          <div class="form-group">
            <label>Tipe</label>
            <input type="text" name="tipe" id="tipe" class="form-control"  value="<?php echo $kerusakan->tipe ?>" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Kode Kerusakan</label>
            <input type="text" name="kode_kerusakan" class="form-control" placeholder="Kode Kerusakan" value="<?php echo $kerusakan->kode_kerusakan ?>" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Deskripsi Kerusakan</label>
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" value="<?php echo $kerusakan->deskripsi ?>">
          </div>
          <div>
            <label>Tanggal Kerusakan</label>
            <input type="date" name="tanggal" class="form-control" readonly="" placeholder="Tanggal Kerusakan" value="<?php echo $kerusakan->tanggal ?>" >
        </div>
      </div>
        <div>
          <div class="col-md-12">
          <div class="form-group">
            <label>Waktu Kerusakan</label>
            <input type="time" name="jam" class="form-control" readonly="" placeholder="Tanggal Kerusakan" value="<?php echo $kerusakan->jam ?>" >
        </div>
      </div>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary btn-sm fa fa-save"> Simpan</button>
      <a href="<?php echo base_url('Kerusakan') ?>"><button class="btn btn-danger btn-sm btn fa fa-close" type="button"> Kembali</button></a>
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