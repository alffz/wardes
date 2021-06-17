
<table class="table">    
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Nomor Hp</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kadus</th>
      <th>aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach($kadus as $k) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td>
        <img class="img-thumbnail" width="100px" src="<?= base_url('assets/gambar/') .$user['gambar'] ?>" alt="">
      </td>
      <td><?= $k['nama']?></td>
      <td><?= $k['no_hp']?></td>
      <td><?= $k['alamat']?></td>      
      <td>
        <select class="dusun" data-id="<?= $k['id_user']?>" name="dusun" >
          <option> Pilih Dusun </option>    
          <?php if($dusun !== null) {} ?>       
          <?php foreach($dusun as $d) : ?>         
            <option class="id"value="<?= $d['id_dusun']?>" ><?= $d['nama_dusun']?></option>   
          <?php endforeach ?> 
        </select><br>
        <small> Kepala Dusun : <?= $k['nama_dusun'] ?> </small>
      </td>
      <td><a class="btn btn-danger" href="<?= base_url('sekdes/hapususer/').$k['id_user'] ?>" role="button" onclick="return confirm('Yakin hapus data?')">Hapus</a></td>
      <!-- 
        tugas rupb
            menjelaskan ke 4 bentuk proses itu apa dan beri contoh
              integrasi proses
              menyederhanakan proses 
       -->
      <td>
      </td>
    </tr>      
    <?php endforeach ?>
  </tbody>  
  <?php foreach($dusun as $ds){
      // if(end($ds) == null){
      //   echo 'user baru';
      // }
      // else{
      //   echo "lama"
      // }
      // var_dump(end($dusun));

  } ?>
</table>
<!-- Note 
            $key pada foreach sebaiknya jangan data itu sendiri 
            contoh 
            false ->  foreach($data as $data) ini kurang tepat karena jika nested foreach akan erorr setelah index ke 0
            true  ->  foreach($data as $d) ini bagus membedakan antara $data dgn $d 
 -->

 <script>
    $(document).ready(function(){

      // cari <select class="dusun" >
      $("select.dusun").change(function(){
          const Dusun = $(this).val();
          const id    = $(this).attr('data-id');
          // console.log(id);
          $.ajax({
                // alamat data di proses
                url : "<?= base_url('sekdes/UbahDusun')?>",
                type:"POST",
                data:{
                    ubahdusun :Dusun,
                    id_user   :id,
                },
                // jika ajax sukses maka
                success: function(data){
                  document.location.href="<?= base_url('sekdes/kadus')?>" ;
                },
            });
      });

    })
    var user = document.getElementById('')
</script>
