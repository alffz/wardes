<div class="container ml-3">
    <div class="row">
        <?= validation_errors() ?>
        <form role='form' method='post'>
            <div class="card-body">
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Jalan</label>
                    </div>
                    <select name='dusun' class="custom-select" id="inputGroupSelect01">                    
                        <?php  foreach($jalan as $dusun): ?>
                            <option value='<?= $dusun['id_dusun'] ?>' ><?= $dusun['nama_dusun'] ?> </option>
                        <?php endforeach ?>
                    </select>                    
                    </div>
                    <!-- end gang -->
                </div>
                <div class="form-group">
                    <label for="kepalakeluarga">Tambah Jalan</label>
                    <input type="text" name='jalan' class="form-control" id="kepalakeluarga" placeholder="">
                </div>
            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type='reset' class="btn btn-danger">Reset</button>
                </div>            
        </form>
    </div>
</div>


<?php ?>