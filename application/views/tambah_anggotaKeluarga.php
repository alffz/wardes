<!-- 
    query untuk mencari dusun dari kartu anggota keluarga , dicari berdasarkan id_kk 
    
        SELECT dusun.nama_dusun FROM kartu_keluarga 
            JOIN anggota_keluarga ON anggota_keluarga.id_kk = kartu_keluarga.id_kk 
            JOIN dusun ON dusun.id_dusun = kartu_keluarga.id_dusun 
        WHERE dusun.id_dusun = $id_dusun
 -->
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
        <?= validation_errors() ?>
            <form role='form' method='post' >
                <input type="hidden" name="time" value="<?= date('d').date('m').date('y') ?>">
                <input type="hidden" name="user" value="<?= $user['id_user']?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name='nama' >
                </div>
                <div class="form-group">
                    <label for="nik">Nik</label>
                    <input type="number" name='nik' class="form-control"  >
                </div>
                <div class="form-group">
                <label for="">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="P" >
                        <label class="form-check-label" for="flexRadioDefault1">
                            Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="W">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Wanita
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tmptlahir">Tempat Lahir</label>
                    <input type="text" name='tmptlahir' class="form-control" >
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Lahir</label>
                    <input type="date" name='tanggal' class="form-control" >
                </div>
                <div class="form-group">
                <label for="tanggal">Agama</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="agama" value="Is">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Islam
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="agama" value="Kr">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Kristen
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="agama" value="Pro">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Protestan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="agama" value="Hi">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Hindu
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="agama" value="Bu">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Budha
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="agama" value="Ko">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Konghucu
                        </label>
                    </div>
                </div>
                <div class="form-group">
                <label for="">Pendidikan</label>                
                <?php foreach ($pendidikan as $ped): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pendidikan" value="<?= $ped->id_pendidikan?>" >
                        <label class="form-check-label" for="flexRadioDefault1">
                            <?= $ped->nama_pendidikan?>
                        </label>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="form-group">
                <label for="">Pekerjaan</label>
                <?php foreach ($pekerjaan as $kerja) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kelamin" value="<?= $kerja->id_pekerjaan?>">
                        <label class="form-check-label" for="flexRadioDefault1">
                        <?= $kerja->nama_pekerjaan?>
                        </label>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="form-group">
                <label for="">Status Perkawinan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status"  value="k">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Belum Kawin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="bk">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Kawin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" value="jd">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Janda/Duda
                        </label>
                    </div>
                </div>
                <div class="form-group">
                <label for="">Hubungan Keluarga</label>
                <?php foreach($hubungan as $keluarga) : ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status"  value="<?= $keluarga->id_hubungan ?>">
                        <label class="form-check-label" for="flexRadioDefault1">
                            <?= $keluarga->status_hubungan ?>
                        </label>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="form-group">
                <label for="">Kewarganegaraan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Kewarganegaraan" value="WNI">
                        <label class="form-check-label" for="flexRadioDefault1">
                            WNI
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Kewarganegaraan" value="WNA">
                        <label class="form-check-label" for="flexRadioDefault1">
                            WNA
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Ayah</label>
                    <input type="text" class="form-control" name='ayah' >
                </div>
                <div class="form-group">
                    <label for="nama">Nama Ibu</label>
                    <input type="text" class="form-control" name='ibu' >
                </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // dusun
        $('#desa').change(function(){
            // tangkap value dari desa
            var id_desa    = $(this).val();
            // jalankan ajax
            $.ajax({
                // sumber data
                url    : "<?php base_url()?>"+'dusun1',
                method : 'POST',
                data   : {desa:id_desa},// dikirim ke controoler sebagain input->post('desa')
                success:function(data){
                    console.log(id_desa);
                    console.log(data);
                    $('#dusun').html(data);
                }
            })
        });

        // jalan
        $('#dusun').change(function(){
            // tangkap value dusun
            var id_dusun    = $(this).val();
            // jalankan ajax
            $.ajax({
                // sumber data
                url     : "<?php base_url()?>"+'jalan1',
                method  :'POST',
                data    : {dusun:id_dusun},
                success : function(data){
                    console.log(id_dusun);
                    $('#jalan').html(data);
                }
            })
        })
        // gang
        $('#jalan').change(function(){
            // tankap value jalan
            var id_jalan    = $(this).val();
            // jalankan ajax
            $.ajax({
                //sumber data
                url     : "<?php base_url()?>"+'gang1',
                method  : 'POST',
                data    : {jalan:id_jalan},
                success : function(data){
                    console.log(id_jalan);
                    $('#gang').html(data);
                }
            })
        })
    })
</script>