
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/datatable.min.css') ?>">
<div class="container">
<h3>Data Kartu Keluarga</h3>
<div class="row">
  <div class="col-md-11 col-sm-12 mt-3">  
    <table id="kartukeluarga" class="table table-striped table-bordered" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th>No</th>        
          <th>Action</th>
          <th>NIK</th>
          <th>Nama Kepala Keluarga</th>
          <th>Dusun</th>
          <th>Jalan</th>
          <th>Gang</th>
        </tr>
      </thead>
      <tbody>
        <!-- datatble rendered here -->
      </tbody>
    </table>
  </div>
</div>
  <!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
 <script>
    $(document).ready(function() {
        $('#kartukeluarga').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
              "url"  : "<?= base_url('data/get_ajax')?>",
              "type" : "POST",
              "data" : {
                iddusun:"<?=$user['id_dusun'] ?>"
              }
            },
            "columnDefs":[
              {
                "targets":[0,1,6],
                "orderable":false
              }
            ],
            "order": []
        } );
    } );
</script>
