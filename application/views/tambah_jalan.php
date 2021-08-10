<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/datatable.min.css') ?>">
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
                    <?= validation_errors() ?>
                    <form role='form' method='post'>
                        <div class="card-body">
                        <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Dusun</label>
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
            </div>
        </div>
    </div>
</div>

<!-- tampilkan nama-nama jalan yang ada di database berdasarkan id user , dimana user berelasi dengan id_dusun -->
<!-- SELECT * FROM jalan WHERE id_user = 'user_dengan_id_dusun_1 -->

<table id="kartukeluarga" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th>No</th>        
        <th>Nama Jalan</th>
        <th>--</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      </tr>
    </tbody>
  </table>
</div>
  <!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
 <script>
    $(document).ready(function() {
        $('#kartukeluarga').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
              "url"  : "<?= base_url('tambah/get_ajax')?>",
              "type" : "POST",
              "data" : {
                id_dusun:"<?=$user['id_dusun'] ?>"
              }
            },
            "columnDefs":[
              {
                "targets":[0,1],
                "orderable":true
              }
            ],
            "order": []
        } );
    } );
</script>