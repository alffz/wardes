<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
        <?= validation_errors() ?>
            <?php foreach($kk as $kaka) : ?>
            <form role='form' method='post' >
                <input type="hidden" name="idkk" value="<?= $kaka->id_kk?>">                
                <input type="hidden" name="user" value="<?= $user['id_user']?>">
                <div class="form-group">
                    <label for="nik">Nomor KK</label>
                    <input type="number" class="form-control" name='nik' value="<?= $kaka->nik?>" id="nik" placeholder="masukkan nomor KK">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kepala Keluarga</label>
                    <input type="text" name='nama' class="form-control" value="<?= $kaka->nama_kk?>" id="nama" placeholder="masukkan nama kepala keluarga">
                </div>
                <label for="">Alamat</label>
                <div class="form-row">                
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Desa</label>
                            <select class="form-control" name='desa' id="desas">
                                <option selected value="3">Bandar Khalipah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dusun</label>
                            <select class="form-control" name='dusun' id="dusun">
                                <option selected value="<?= $kaka->id_dusun?>"> <?= $kaka->nama_dusun?></option>                       
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jalan</label>
                            <select class="form-control" name='jalan' id="jalan">
                                <option value="<?= $kaka->id_jalan?>" ><?= $kaka->nama_jalan?></option>
                                <?php foreach($jalan as $j) : ?>
                                    <option value="<?= $j->id_jalan?>"><?= $j->nama_jalan?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gang</label>
                            <select class="form-control" name='gang' id="gang">
                                <option value="<?= $kaka->id_gang?>"><?= $kaka->nama_gang?></option>  
                                <?php foreach($gang as $g) : ?>
                                    <option value="<?= $g->id_gang?>"><?= $g->nama_gang?></option>
                                <?php endforeach ?>                              
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label> Keterangan </label>
                    <textarea class="form-control" name="keterangan" id="" cols="10" rows="5"><?= $kaka->keterangan?></textarea>
                </div>
                <div class="form-group">
                    <label for="nama">Latitude</label>
                    <input type="text" name='latitude' value="<?= $kaka->Latitude?>" class="form-control" id="latitude" placeholder="masukkan latitude">
                </div>
                <div class="form-group">
                    <label for="nama">Longitude</label>
                    <input type="text" name='longitude' value="<?= $kaka->Longitude?>" class="form-control" id="longitude" placeholder="masukkan longitude">
                </div>
                <?php endforeach ?>
                    <!--Google map -->

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
        // gang
        $('#jalan').change(function(){
            // tankap value jalan
            var id_jalan    = $(this).val();
            // jalankan ajax
            $.ajax({
                //sumber data
                url     : "<?php echo base_url('data/')?>"+'ubahGang',
                method  : 'POST',
                data    : {jalan:id_jalan},
                success : function(data){
                    $('#gang').html(data);
                }
            })
        })
    })
</script>