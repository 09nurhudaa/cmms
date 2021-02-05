 <button type="button" data-toggle="modal" data-target="#myModal<?php echo $Part->kode_part ?>" class="fa fa-trash-o btn btn-danger btn-sm"> </button>
   <div id="myModal<?php echo $Part->kode_part ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title" >Hapus Data :: <?php echo $Part->kode_part ?></h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <p class="alert alert-danger"><i class="fa fa-warning"></i>Apakah Anda Yakin Ingin Menghapus Data Ini !!!</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('Part/Delete/'.$Part->kode_part) ?>"><button type="button" class="btn btn-danger fa fa-trash-o"> Hapus</button></a>
            </div>
          </div>
        </div>
      </div>
   