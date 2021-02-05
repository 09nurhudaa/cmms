<section class="content">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Form Input Jadwal</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <?php echo form_open(base_url('Jadwal/Create')); ?>
          <div class="form-group">
            <label>Kode Mesin</label>
            <?php $jsArray = "var prdName = new Array();\n"; ?>
            <select class="form-control select2" style="width: 100%;" onchange="changeValue(this.value)" name="kode_mesin">
              <option selected="selected">--Pilih Kode Mesin--</option>
              <?php foreach ($Mesin as $Mesin) { ?>
              <option value="<?php echo $Mesin->kode_mesin ?>"><?php echo $Mesin->kode_mesin." - ".$Mesin->nama_mesin ?></option>
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
            <input type="text" name="nama_mesin" id="nama_mesin" class="form-control" readonly="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tahun</label>
            <input type="text" name="" id="tahun" class="form-control" readonly="">
          </div>
          <div class="form-group">
            <label>Tipe</label>
            <input type="text" name="" id="tipe" class="form-control" readonly="">
          </div>
          
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Kode Jadwal</label>
            <input type="text" name="kode_jadwal" class="form-control" placeholder="Kode Kerusakan" value="<?php echo $kode ?>" readonly>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Jenis Perawatan</label>
            <input type="text" name="jenis_perawatan" class="form-control" placeholder="Jenis Perawatan">
          </div>
        </div>
          <div>
            <div class="col-md-12">
            <div class="form-group">
            <label>Interval</label>
            <input type="text" name="interfal" class="form-control" placeholder="Interval">
          </div>
        </div>
          <div>
            <div class="col-md-12">
            <div class="form-group">
            <label for="exampleInputPassword1">Shift</label>
            <select name="shift" class="form-control">
            <option value="0"> --- </option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select>
          </div>
        </div>
            <div class="col-md-12">
            <div class="form-group">
            <label>Tanggal Perawatan</label>
            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Kerusakan">
        </div>
      </div>
  <div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-sm fa fa-save"> Simpan</button>
    <a href="<?php echo base_url('Jadwal') ?>"><button class="btn btn-danger btn-sm btn fa fa-close" type="button"> Kembali</button></a>
  </div>
</div>
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
function changeValue(kode_mesin){
document.getElementById('nama_mesin').value = prdName[kode_mesin].nm;
document.getElementById('tahun').value = prdName[kode_mesin].th;
document.getElementById('tipe').value = prdName[kode_mesin].tp;
};
</script>