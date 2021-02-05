<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Input Perbaikan</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <?php echo form_open(base_url('Perbaikan/Create')); ?>
            <div class="form-group">
            <label>Kode Perbaikan</label>
            <input type="text" name="kode_perbaikan" class="form-control" placeholder="Kode Perbaikan" value="<?php echo $kode ?>" readonly>
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>Kode Kerusakan</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
            <select class="form-control select2" style="width: 100%;" onchange="changeValue(this.value)" name="kode_kerusakan">
              <option selected="selected">--Pilih Kode Kerusakan--</option>
              <?php foreach ($kerusakan as $kerusakan) { ?>
              <option value="<?php echo $kerusakan->kode_kerusakan ?>"><?php echo $kerusakan->kode_kerusakan." - ".$kerusakan->deskripsi ?></option>
              <?php
              $jsArray .= "prdName['" . $kerusakan->kode_kerusakan . "'] = {
              km:'".addslashes($kerusakan->kode_mesin). "',
              jam:'".addslashes($kerusakan->jam). "',
              nm:'".addslashes($kerusakan->nama_mesin). "',
              ds:'".addslashes($kerusakan->deskripsi)."',
              tgl:'".addslashes($kerusakan->tanggal)."'};\n";
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
            <input type="text" name="" id="nama_mesin" class="form-control" readonly="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Deskripsi Kerusakan</label>
            <input type="text" name="" id="deskripsi" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label>Tanggal Kerusakan</label>
            <input type="text" name="" id="tanggal" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label>Jam Kerusakan</label>
            <input type="time" name="" id="jam"  class="form-control"  readonly="">
          </div>
<!--           <div class="form-group">
          <label>Tanggal Perbaikan</label>
          <input type="date" name="tanggal_perbaikan" class="form-control" placeholder="Tanggal Perbaikan">
          </div> -->
        </div>
          <div class="col-md-12">
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
            <label for="exampleInputPassword1">keterangan</label>
            <select name="keterangan" class="form-control">
            <option value="0"> --- </option>
            <option value="belum">Belum</option>
            <option value="proses">Proses</option>
            <option value="selesai">Selesai</option>
            </select>
        </div>
        </div>
          <div class="col-md-12">
          <div class="form-group">
            <label>Interval</label>
            <input type="text" name="interfal" class="form-control" placeholder="Interval">
            <label for="exampleInputPassword1">Shift</label>
            <select name="shift" class="form-control">
            <option value="0"> --- </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select>
        </div>
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
function changeValue(kode_kerusakan){
document.getElementById('kode_mesin').value = prdName[kode_kerusakan].km;
document.getElementById('nama_mesin').value = prdName[kode_kerusakan].nm;
document.getElementById('deskripsi').value = prdName[kode_kerusakan].ds;
document.getElementById('tanggal').value = prdName[kode_kerusakan].tgl;
document.getElementById('jam').value = prdName[kode_kerusakan].jam;
};
</script>