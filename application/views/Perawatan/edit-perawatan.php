<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Edit Perawatan</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <?php echo form_open(base_url('Perawatan/Update')); ?>
            <div class="form-group">
            <label>Kode Perawatan</label>
            <input type="text" name="kode_perawatan" class="form-control" placeholder="Kode Perawatan" value="<?php echo $perawatan->kode_perawatan ?>" readonly>
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Kode Jadwal</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
             <input type="text" name="kode_jadwal" class="form-control" placeholder="Kode Jadwal" value="<?php echo $perawatan->kode_jadwal ?>" readonly>
              <?php foreach ($jadwal as $jadwal) { ?>
              <?php
              $jsArray .= "prdName['" . $jadwal->kode_jadwal . "'] = {
              km:'".addslashes($jadwal->kode_mesin). "',
              nm:'".addslashes($jadwal->nama_mesin). "',
              jp:'".addslashes($jadwal->jenis_perawatan)."',
              if:'".addslashes($jadwal->interfal)."',
              sf:'".addslashes($jadwal->shift)."',
              tgl:'".addslashes($jadwal->tanggal)."'};\n";
              ?>
              <?php } ?>
          </div>
          <div class="form-group">
            <label>Kode Mesin</label>
            <input type="text" name="kode_mesin" id="kode_mesin" class="form-control" readonly="" value="<?php echo $perawatan->kode_mesin ?>">
          </div>
          <div class="form-group">
            <label>Nama Mesin</label>
            <input type="text" name="nama_mesin" id="nama_mesin" class="form-control" readonly="" value="<?php echo $perawatan->nama_mesin ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nama Perawatan</label>
            <input type="text" name="" id="jenis_perawatan" class="form-control" readonly="" value="<?php echo $perawatan->jenis_perawatan ?>">
          </div>
          <div class="form-group">
            <label>Tanggal Perawatan</label>
            <input type="text" name="" id="tanggal" class="form-control" value="<?php echo $perawatan->tanggal ?>">
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Spare Part</label>
            <input type="text" name="nama_part" class="form-control" placeholder="Nama Sparepart" value="<?php echo $perawatan->nama_part ?>" readonly>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
          <label>Jumlah Sparepart</label>
          <input type="number" name="jumlah" class="form-control" placeholder="JUMLAH" value="<?php echo $perawatan->jumlah ?>" readonly>
          </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
          <label>Mekanik</label>
          <input type="text" name="nama_mekanik" class="form-control" placeholder="Nama Mekanik" value="<?php echo $perawatan->nama_mekanik ?>" readonly>
          </div>
          </div>
          <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputPassword1">Keterangan</label>
            <select name="keterangan" class="form-control" >
            <option value="0"> --- <?php if ( $perawatan->keterangan== "kosong"){ echo "kosong";} ?> </option>
            <option value="Belum"<?php if ( $perawatan->keterangan== "Belum"){ echo "selected";} ?>>Belum</option>
            <option value="Proses"<?php if ( $perawatan->keterangan== "Proses"){ echo "selected";} ?>>Proses</option>
            <option value="Selesai"  <?php if ( $perawatan->keterangan== "Selesai"){ echo "selected";} ?>>Selesai</option>
            </select>
          </div>
        </div>
      </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary btn-sm fa fa-save"> Simpan</button>
          <a href="<?php echo base_url('Perawatan') ?>"><button class="btn btn-danger btn-sm btn fa fa-close" type="button"> Kembali</button></a>
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
function changeValue(kode_jadwal){
document.getElementById('kode_mesin').value = prdName[kode_jadwal].km;
document.getElementById('nama_mesin').value = prdName[kode_jadwal].nm;
document.getElementById('jenis_perawatan').value = prdName[kode_jadwal].jp;
document.getElementById('interfal').value = prdName[kode_jadwal].if;
document.getElementById('shift').value = prdName[kode_jadwal].sf;
document.getElementById('tanggal').value = prdName[kode_jadwal].tgl;
};
</script>