
<div class="container ml-3">
    <div class="row">
        <div class="col-md-12 mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahjalan">
                Tambah Jalan
            </button>
        </div>  
            <!-- Modal -->
        <div class="modal fade" id="tambahjalan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                
                    <p>Pilih Dusun Kemudian tambahkan nama jalannya, nama jalan akan disimpan berdasarkan dusunnya </p>
                    <?= validation_errors() ?>
                    <form role='form' method='post'>
                        <div class="card-body">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                                </div>
                                <select name='dusun' class="custom-select" id="inputGroupSelect01"> 
                                    <option value='<?= $dusun['id_dusun'] ?>' ><?= $dusun['nama_dusun'] ?> </option>
                                </select>                    
                                </div>
                                <!-- end gang -->
                            </div>
                            <div class="form-group">
                                <label for="kepalakeluarga">Tambah Jalan</label>
                                <input type="text" name='jalan' class="form-control" id="kepalakeluarga" placeholder="Contoh : Jl. Kenangan">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type='reset' class="btn btn-danger">Reset</button>
                        </div>            
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tampilkan nama-nama jalan yang ada di database berdasarkan id user , dimana user berelasi dengan id_dusun -->
<!-- SELECT * FROM jalan WHERE id_user = 'user_dengan_id_dusun_1 -->

<div class="container">
    <div class="col-lg-12 col-md-6">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Dusun</th>
                    <th scope="col">Kepala Dusun</th>
                    <th scope="col">Jumlah KK</th>
                    <th scope="col">Jumlah Penduduk</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($dusun as $dusun) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dusun->nama_dusun ?></td>
                        <td>--</td>
                        <td>--</td>
                        <td>
                            
                        </td>                              
                    </tr>
                <?php endforeach ?>            
            </tbody>
        </table>
        <?php var_dump($pagination) ?>
    </div>
</div>