<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Edit Perbaikan</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <?php echo form_open(base_url('Perbaikan/Update')); ?>
            <div class="form-group">
            <label>Kode Perbaikan</label>
            <input type="text" name="kode_perbaikan" class="form-control" placeholder="Kode Perbaikan" value="<?php echo $perbaikan->kode_perbaikan ?>" readonly>
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Kode Kerusakan</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
             <input type="text" name="kode_kerusakan" class="form-control" placeholder="Kode Kerusakan" value="<?php echo $perbaikan->kode_kerusakan ?>" readonly>
              <?php foreach ($kerusakan as $kerusakan) { ?>

              <?php
              $jsArray .= "prdName['" . $kerusakan->kode_kerusakan . "'] = {
              km:'".addslashes($kerusakan->kode_mesin). "',
              nm:'".addslashes($kerusakan->nama_mesin). "',
              jam:'".addslashes($kerusakan->jam). "',
              ds:'".addslashes($kerusakan->deskripsi)."',
              tgl:'".addslashes($kerusakan->tanggal)."'};\n";
              ?>
              <?php } ?>
          </div>
          <div class="form-group">
            <label>Kode Mesin</label>
            <input type="text" name="kode_mesin" id="kode_mesin" class="form-control" readonly="" value="<?php echo $perbaikan->kode_mesin ?>">
          </div>
          <div class="form-group">
            <label>Nama Mesin</label>
            <input type="text" name="nama_mesin" id="nama_mesin" class="form-control" readonly="" value="<?php echo $perbaikan->nama_mesin ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Deskripsi Kerusakan</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" readonly="" value="<?php echo $perbaikan->deskripsi ?>">
          </div>
          <div class="form-group">
            <label>Tanggal Kerusakan</label>
            <input type="text" name="" id="tanggal" class="form-control" readonly="" value="<?php echo $perbaikan->tanggal ?>">
          </div>
          <div class="form-group">
            <label>Jam Kerusakan</label>
            <input type="time" name="" id="jam"  class="form-control"  readonly="" value="<?php echo $perbaikan->jam ?>">
          </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
            <label>Spare Part</label>
            <input type="text" name="nama_part" class="form-control" placeholder="Nama Sparepart" value="<?php echo $perbaikan->nama_part ?>" >
          </div>
          <div class="form-group">
          <label>Jumlah Sparepart</label>
          <input type="number" name="jumlah" class="form-control" placeholder="JUMLAH" value="<?php echo $perbaikan->jumlah ?>" >
          </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
          <label>Mekanik</label>
          <input type="text" name="nama_mekanik" class="form-control" placeholder="Nama Mekanik" value="<?php echo $perbaikan->nama_mekanik ?>" readonly>
        </div>
        <div>
           <div class="form-group">
          <label>Interval</label>
          <input type="text" name="interfal" class="form-control" placeholder="Interval" value="<?php echo $perbaikan->interfal ?>" >
        </div>
        <div>
           <div class="form-group">
          <label>Shift</label>
          <input type="number" name="shift" class="form-control" placeholder="Shift" value="<?php echo $perbaikan->shift ?>" >
          </div>
         <div class="col-md-16">
          <div class="form-group">
            <label for="exampleInputPassword1">Keterangan</label>
            <select name="keterangan" class="form-control" >
            <option value="0"> --- <?php if ( $perbaikan->keterangan== "kosong"){ echo "kosong";} ?> </option>
            <option value="belum"<?php if ( $perbaikan->keterangan== "belum"){ echo "selected";} ?>>Belum</option>
            <option value="proses"<?php if ( $perbaikan->keterangan== "proses"){ echo "selected";} ?>>Proses</option>
            <option value="selesai"  <?php if ( $perbaikan->keterangan== "selesai"){ echo "selected";} ?>>Selesai</option>
            </select>
          </div>
          </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-sm fa fa-save"> Simpan</button>
          <a href="<?php echo base_url('Perbaikan') ?>"><button class="btn btn-danger btn-sm btn fa fa-close" type="button"> Kembali</button></a>
        </div>
<!-- </form> -->
  <?php echo form_close(); ?>
</div>
</section>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">
<?php echo $jsArray; ?>
function changeValue(kode_kerusakan){
document.getElementById('kode_mesin').value = prdName[kode_kerusakan].km;
document.getElementById('nama_mesin').value = prdName[kode_kerusakan].nm;
document.getElementById('deskripsi').value = prdName[kode_kerusakan].ds;
document.getElementById('tanggal').value = prdName[kode_kerusakan].tgl;
document.getElementById('jam').value = prdName[kode_kerusakan].jam;
};
</script>