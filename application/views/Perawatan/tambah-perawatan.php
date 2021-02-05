<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Input Perawatan</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <?php echo form_open(base_url('Perawatan/Create')); ?>
            <div class="form-group">
            <label>Kode Perawatan</label>
            <input type="text" name="kode_perawatan" class="form-control" placeholder="Kode Perawatan" value="<?php echo $kode ?>" readonly>
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Kode Jadwal</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
            <select class="form-control select2" style="width: 100%;" onchange="changeValue(this.value)" name="kode_jadwal">
              <option selected="selected">--Pilih Kode Jadwal--</option>
              <?php foreach ($jadwal as $jadwal) { ?>
              <option value="<?php echo $jadwal->kode_jadwal ?>"><?php echo $jadwal->kode_jadwal." - ".$jadwal->jenis_perawatan ?></option>
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
            </select>
          </div>
          <div class="form-group">
            <label>Kode Mesin</label>
            <input type="text" name="" id="kode_mesin" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label>Nama Mesin</label>
            <input type="text" name="nama_mesin" id="nama_mesin" class="form-control" readonly="">
          </div>
          </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Jenis Perawatan</label>
            <input type="text" name="" id="jenis_perawatan" class="form-control" readonly="">
          </div>
           <div class="form-group">
            <label>Interval</label>
            <input type="text" name="" id="interfal" class="form-control" readonly="">
          </div>
           <div class="form-group">
            <label>Shift</label>
            <input type="text" name="" id="shift" class="form-control" readonly="">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Tanggal Perawatan</label>
            <input type="text" name="" id="tanggal" class="form-control" readonly="">
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Spare Part</label>
            <select name="nama_part" class="form-control">
              <option value="0">-- Pilih SparePart --</option>
              <?php foreach ($part as $part) { ?>
              <option value="<?php echo $part->nama_part ?>"><?php echo $part->nama_part ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
          <label>Jumlah Sparepart</label>
          <input type="number" name="jumlah" class="form-control" placeholder="JUMLAH">
          </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
            <label>Mekanik</label>
            <select name="nama_mekanik" class="form-control">
              <option value="0">-- Pilih Mekanik --</option>
              <?php foreach ($mekanik as $mekanik) { ?>
              <option value="<?php echo $mekanik->nama_mekanik ?>"><?php echo $mekanik->nama_mekanik ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
            <label for="exampleInputPassword1">Keterangan</label>
            <select name="keterangan" class="form-control">
            <option value="0"> --- </option>
            <option value="Belum">Belum</option>
            <option value="Proses">Proses</option>
            <option value="Selesai">Selesai</option>
            </select>
          </div>
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
function changeValue(kode_jadwal){
document.getElementById('kode_mesin').value = prdName[kode_jadwal].km;
document.getElementById('nama_mesin').value = prdName[kode_jadwal].nm;
document.getElementById('jenis_perawatan').value = prdName[kode_jadwal].jp;
document.getElementById('interfal').value = prdName[kode_jadwal].if;
document.getElementById('shift').value = prdName[kode_jadwal].sf;
document.getElementById('tanggal').value = prdName[kode_jadwal].tgl;
};
</script>