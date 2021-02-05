 <a type="button" data-toggle="modal" data-target="#myModal1" class="btn btn-info btn-lg fa fa-eye"> </a>
   <div id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title">Detail Kerusakan :: <?php echo $kerusakan->kode_mesin ?></h4>
              </div>
            <div class="modal-body">
                <table class="table">
                <tr>
                    <td width="100">Kode Mesin</td>
                    <td width="0">:</td>
                    <td><?php echo $kerusakan->kode_mesin ?></td>
                </tr>
                <tr>
                    <td>Dekripsi</td>
                    <td>:</td>
                    <td><?php echo $kerusakan->deskripsi ?></td>
                </tr>
                <tr>
                    <td>Data Mesin</td>
                    <td>:</td>
                    <td><?php
                      $a = $this->M_detailkerusakan->Read1();
                      foreach ($a as $key){
                        if($kerusakan->kode_kerusakan == $key->kode_kerusakan);
                     }
                     ?></td>
                </tr>
            </table>            

             
            </div>
          </div>
        </div>
      </div>
   