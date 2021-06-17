<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= validation_errors() ?>
        <form role='form' method='post'>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="hidden" name='desa' value='3'>
                    <div class="form-group">
                        <label for="kepalakeluarga">Tambah Dusun</label>
                        <input type="text" name='dusun' class="form-control" id="kepalakeluarga" placeholder="">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <button type='reset' class="btn btn-danger">Reset</button>
            </div>            
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah Dusun
</button>
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
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($dusun as $d) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $d->nama_dusun ?></td>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td> 
                        <td>
                        <a href="<?= base_url('hapus/dusun/'.$d->id_dusun)?>" data-toggle="tooltip" data-placement="top" title="Anggota Keluarga"  class="btn btn-success btn-xs"><i class="fas fa-user-friends" aria-hidden="true">Hapus</i></a>
                        </td>                             
                    </tr>
                <?php endforeach ?>            
            </tbody>
        </table>
    </div>
</div>



        
 



<?php ?>