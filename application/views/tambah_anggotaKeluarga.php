<!-- 
    query untuk mencari dusun dari kartu anggota keluarga , dicari berdasarkan id_kk 
    
        SELECT dusun.nama_dusun FROM kartu_keluarga 
            JOIN anggota_keluarga ON anggota_keluarga.id_kk = kartu_keluarga.id_kk 
            JOIN dusun ON dusun.id_dusun = kartu_keluarga.id_dusun 
        WHERE dusun.id_dusun = $id_dusun
 -->
 
<div class="container ">
<div class="box">
 <a class="btn btn-danger" href="<?= base_url('data/anggotakeluarga/'.$this->uri->segment(3))?>" >kembali</a>
 </div>
    <div class="row justfy-content-centre ml-3 mr-3">
        <?= validation_errors() ?>
        <form role='form' method='post' >
        <div class="row justfy-content-centre">     
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="nama">Nomor Urut</label>
                <input type="text" class="form-control" name='nourut' >
            </div>
        </div>      
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name='nama' >
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="nik">Nik</label>
                <input type="number" name='nik' class="form-control"  >
            </div>
        </div>        
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
            <label for="">Jenis Kelamin</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kelamin" value="P" >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Pria
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kelamin" value="W">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Wanita
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="tmptlahir">Tempat Lahir</label>
                <input type="text" name='tmptlahir' class="form-control" >
            </div>
        </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" name='tanggal' class="form-control" >
                <small style="color:red"><b>bulan/tanggal/tahun</b></small>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="tanggal">Tanggal Pencatatan</label>
                <input type="date" name='tanggalPencatatan' id="DateField" class="form-control" >
                <small style="color:red">bulan/tanggal/tahun</small>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="tanggal">Agama</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Islam">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Islam
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Kristen">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Kristen
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Protestan">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Protestan
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Hindu">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Hindu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Budha">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Budha
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Konghucu">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Konghucu
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="">Pendidikan</label> <br>                
            <?php foreach ($pendidikan as $ped): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pendidikan" value="<?= $ped->id_pendidikan?>" >
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?= $ped->nama_pendidikan?>
                    </label>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="">Pekerjaan</label> <br>
            <?php foreach ($pekerjaan as $kerja) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pekerjaan" value="<?= $kerja->id_pekerjaan?>">
                    <label class="form-check-label" for="flexRadioDefault1">
                    <?= $kerja->nama_pekerjaan?>
                    </label>
                </div>
            <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="">Status Perkawinan</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status"  value="k">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Belum Kawin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="bk">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Kawin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="jd">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Janda/Duda
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="">Hubungan Keluarga</label> <br>
            <?php foreach($hubungan as $keluarga) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="hubungan"  value="<?= $keluarga->id_hubungan ?>">
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?= $keluarga->status_hubungan ?>
                    </label>
                </div>
            <?php endforeach ?>
            </div>
        <div>
        <div class="row">
        <div class="col-md-12 col-sm-12 col-xl-6">
            <div class="form-group">
            <label for="">Kewarganegaraan</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Kewarganegaraan" value="WNI">
                    <label class="form-check-label" for="flexRadioDefault1">
                        WNI
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Kewarganegaraan" value="WNA">
                    <label class="form-check-label" for="flexRadioDefault1">
                        WNA
                    </label>
                </div>
            </div>
        <div>
        <div class="col-md-12 col-sm-12 col-xl-6">
            <div class="form-group">
                <label for="nama">Nama Ayah</label>
                <input type="text" class="form-control" name='ayah' >
            </div>
            <div class="form-group">
                <label for="nama">Nama Ibu</label>
                <input type="text" class="form-control" name='ibu' >
            </div>
        </div>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
            </form>
    </div>
</div>

<script>
    document.getElementById('DateField').valueAsDate = new Date();
</script>