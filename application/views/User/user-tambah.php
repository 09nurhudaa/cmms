<!-- <?php
$nama_depan    = $this->session->userdata('nama_depan');
$nama_belakang = $this->session->userdata('nama_belakang');
$id_login      = $this->session->userdata('id_login');
?> -->
<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah User</h3>
        </div>
        <?php echo form_open(base_url('User/Create')); ?>
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode User</label>
            <input type="text" class="form-control"  placeholder="Kode User" name="kode_user" required="" value="<?php echo $kode ?>" readonly>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required="">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" name="password" placeholder="Password" required="">
          </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-xs-4">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required="">
              </div>
                <div class="col-xs-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Level</label>
                  <select name="level" class="form-control">
                    <option value="0"> --- </option>
                    <option value="Manager">Manager</option>
                    <option value="Mekanik">Mekanik</option>
                  </select>
                </div>
        </div>
      </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary fa fa-save"> Simpan</button>
          <a href="<?php echo base_url('User') ?>"><button type="button" class="btn btn-danger fa fa-close"> Kembali</button></a>
        </div>
        <?php form_close(); ?>
      </div>
    </div>
  </div>
</section>