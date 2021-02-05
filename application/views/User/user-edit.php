<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit USER</h3>
        </div>
        <?php echo form_open(base_url('User/Update/'.$user->kode_user)); ?>
        <div class="box-body">
          <input type="hidden" class="form-control" name="kode_user" value="<?php echo $user->kode_user ?>">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode User</label>
            <input type="text" class="form-control"  placeholder="Kode User" name="kode_user" readonly="" value="<?php echo $user->kode_user ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required="" value="<?php echo $user->username ?>">
          </div>
          
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="text" class="form-control" name="password" placeholder="Password" required="" value="<?php  echo $user->password?>">
          </div>
          
          <div class="row">
            <div class="form-group">
              <div class="col-xs-4">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" required="" value="<?php echo $user->nama ?>">
              </div> 
               <div class="col-xs-4">
                <div class="form-group">
                  <label for="exampleInputPassword1">Level</label>
                  <select name="level" class="form-control">
                    <option value="0"> --- </option>
                    <option value="Manager" <?php if ($user->level == "Manager") {
                      echo "selected";
                    } ?>>Manager</option>
                    <option value="Mekanik" <?php if ($user->level== "Mekanik") {
                      echo "selected";
                    } ?>>Mekanik</option>
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