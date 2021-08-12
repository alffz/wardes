
<link rel="stylesheet" href="<?= base_url('assets/plugins/datatables/datatable.min.css') ?>">
<div class="container">
<p class="id" data-cek="<?= $this->uri->segment(3);?>">
<div class="box m-3">
  <a class="btn btn-primary mt-3" href="<?= base_url('tambah/anggotakeluarga/'). $this->uri->segment(3);?>">Tambah Anggota Keluarga</a>
  <a class="btn btn-danger mt-3" href="<?= base_url('data/penduduk/')?>">Kembali</a>
</div>
<div class="row">
  <div class="col-md-12 col-sm-12">  
    <table id="kartukeluarga" class="table table-responsive table-striped table-bordered " style="width:100%">
      <thead class="thead-dark">
        <tr class="">
          <th>No</th>        
          <th>Action</th>
          <th>NIK</th>
          <th>Nama Lengkap</th>
          <th>Jenis Kelamin</th>
          <th>Hubungan Keluarga</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Tanggal Pencatatan</th>
          <th>Agama</th>
          <th>Kewarganegaraan</th>
        </tr>
      </thead>
      <tbody>
        <!-- datatable hender here -->
      </tbody>
    </table>
  </div>
</div>
<?php //var_dump($this->ModelAnggotaKeluarga->_get_datatables_query()); ?>
 
  <!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
 <script>
    $(document).ready(function() {
        var dataId = $('p.id').attr("data-cek");
        $('#kartukeluarga').DataTable( {
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ajax":{
              "url"  : "<?= base_url('data/get_ajax_ak')?>",
              "type" : "POST",
              "data" : {
                    // kirim ke data/get_ajax_ak
                    idkk:dataId
              },

              "target" : 2,
              "render": function(data,type){
                console.log('data ='+data);
                      if(data=="w"){
                        date  = "Wanita";
                      }else{
                        data = "Pria";
                      }
              }
            },
            "order": [],

        } );
    } );
</script>
