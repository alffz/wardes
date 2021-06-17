
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#exampleModal">
  Tambah Gang
</button>
<div class="container ml-3">
    <div class="row">
    <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= validation_errors() ?>
        <form role='form' method='post'>
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                        </div>
                            <select name='dusun' id='dusun' class="custom-select" >  
                                <option value='<?= $dusun['id_dusun'] ?>' ><?= $dusun['nama_dusun'] ?> </option>
                            </select>                    
                        </div>
                    <!-- end gang -->
                    </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Pilih Jalan</label>
                        </div>
                            <select name='jalan' id='jalan' class="custom-select" id="inputGroupSelect01">                                
                                <?php foreach($jalan as $j) : ?>
                                    <option value='<?= $j->id_jalan ?>' ><?= $j->nama_jalan ?></option>
                                <?php endforeach ?>   
                            </select> 
                        </div>
                    <!-- end gang -->
                    </div>
                <div class="form-group">
                    <label for="kepalakeluarga">Tambah Gang</label>
                    <input type="text" name='gang' class="form-control" id="gang" placeholder="Contoh : Bersama">
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type='reset' class="btn btn-danger">Reset</button>
             </div> 
            </div> <!-- card-body -->                       
        </form>
      </div>
    </div>
  </div>
</div>
    </div>
</div>

<script>
    $(document).ready(function(){

        //jalan 
        $('#dusun').change(function(){
            // get value #dusun
            var    id_dusun = $(this).val();
            // jalankan ajax
            $.ajax({
                // sumber data
                url     : "<?php base_url()?>idjalan",
                method  : 'POST',
                data    : {dusun:id_dusun},
                success : function(data){
                    $('#jalan').html(data);
                }
            })
        })

    })
</script>