<?= validation_errors() ?>
<div class="col-sm-4">
    <form role='form' method='post'>
        <div class="card-body">
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01"> Dusun</label>
                </div>
                <select name='dusun' class="custom-select" id="inputGroupSelect01"> 
                    <option value='<?= $dusun['id_dusun'] ?>' ><?= $dusun['nama_dusun'] ?> </option>
                </select>                    
                </div>
                <!-- end gang -->
            </div>
            <div class="form-group">
                <label for="kepalakeluarga">Ubah Nama Jalan</label>
                <input type="text" name='jalan' value="<?= $jalan->nama_jalan?>" class="form-control" id="kepalakeluarga" placeholder="Contoh : Jl. Kenangan">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type='reset' class="btn btn-danger">Reset</button>
        </div>            
    </form></div>