<div class="container ">
<div class="box">
 <a class="btn btn-danger" href="<?= base_url('data/anggotakeluarga/'.$this->uri->segment(4))?>" >kembali</a>
 </div>
    <?= validation_errors() ?>
    <form role='form' method='post' >
        <?php foreach($anggotaKeluarga as $ak) : ?>
        <div class="row justfy-content-centre ml-3 mr-3"> 
        <input type="hidden" name="idak" value="<?= $ak->id_ak?>">
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="nama">Nomor Urut</label>
                <input type="text" class="form-control" name='nourut' value="<?= $ak->nomor_urut?>">
            </div>
        </div>      
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name='nama' value="<?= $ak->nama?>">
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="nik">Nik</label>
                <input type="number" name='nik' class="form-control" value="<?= $ak->nik?>" >
            </div>
        </div>        
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
            <label for="">Jenis Kelamin</label> <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kelamin" value="P" <?php if($ak->kelamin=="P") {echo"checked";} ?> >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Pria
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="kelamin" value="W" <?php if($ak->kelamin=="W") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Wanita
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="tmptlahir">Tempat Lahir</label>
                <input type="text" name='tmptlahir' class="form-control" value="<?= $ak->tmpt_lahir?>" >
            </div>
        </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="tanggal">Tanggal Lahir</label>
                <input type="date" name='tanggal' class="form-control" value="<?= $ak->tanggal_lahir?>">
                <small style="color:red"><b>bulan/tanggal/tahun</b></small>
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="form-group">
                <label for="tanggalPencatatan">Tanggal Pencatatan</label>
                <input type="date" name='tanggalPencatatan' id="DateField" class="form-control" value="<?= $ak->tanggal_pencatatan?>" >
                <small style="color:red">bulan/tanggal/tahun</small>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="tanggal">Agama</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Islam" <?php if($ak->agama=="Islam") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Islam
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Kristen" <?php if($ak->agama=="Kristen") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Kristen
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Protestan" <?php if($ak->agama=="Protestan") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Protestan
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Hindu" <?php if($ak->agama=="Hindu") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Hindu
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Budha" <?php if($ak->agama=="Budha") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Budha
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="agama" value="Konghucu" <?php if($ak->agama=="Konghucu") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Konghucu
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-12">
            <div class="form-group">
            <label for="">Pendidikan</label> <br>                
            <?php foreach ($pendidikan as $pen): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pendidikan" value="<?= $pen->id_pendidikan?>" <?php if($pen->id_pendidikan==$ak->id_pendidikan){echo"checked";}?> >
                    <label class="form-check-label" for="flexRadioDefault1">
                        <?= $pen->nama_pendidikan?>
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
                    <input class="form-check-input" type="radio" name="pekerjaan" value="<?= $kerja->id_pekerjaan?>" <?php if($kerja->id_pekerjaan==$ak->id_pekerjaan){echo "checked";} ?>>
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
                    <input class="form-check-input" type="radio" name="status"  value="k" <?php if($ak->status_perkawinan=="k") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Belum Kawin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="bk" <?php if($ak->status_perkawinan=="bk") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Kawin
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="jd" <?php if($ak->status_perkawinan=="jd") {echo"checked";} ?>>
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
                    <input class="form-check-input" type="radio" name="hubungan"  value="<?= $keluarga->id_hubungan ?>" <?php if($keluarga->id_hubungan == $ak->id_hub_keluarga) {echo"checked";}?>>
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
                    <input class="form-check-input" type="radio" name="Kewarganegaraan" value="WNI" <?php if($ak->kewarganegaraan=="WNI") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        WNI
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Kewarganegaraan" value="WNA" <?php if($ak->kewarganegaraan=="WNA") {echo"checked";} ?>>
                    <label class="form-check-label" for="flexRadioDefault1">
                        WNA
                    </label>
                </div>
            </div>
        <div>
        <div class="col-md-12 col-sm-12 col-xl-6">
            <div class="form-group">
                <label for="nama">Nama Ayah</label>
                <input type="text" class="form-control" name='ayah' value="<?= $ak->NamaAyah?>">
            </div>
            <div class="form-group">
                <label for="nama">Nama Ibu</label>
                <input type="text" class="form-control" name='ibu' value="<?= $ak->NamaIbu?>">
            </div>
        </div>
        <?php endforeach ?>
            <div class="col-auto my-1">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
            </form>
    </div>
</div>

<script>
    document.getElementById('DateFeld').valueAsDate = new Date();
</script>