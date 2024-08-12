
    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="<?= base_url('assets/colorlib/'); ?>images/signup-img.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" action="<?= base_url('auth/registration'); ?>" class="register-form" id="register-form">
                        <h2>Form Pendaftaran Calon Mahasiswa</h2>
                        <?= form_error('kip', '<p class="text-danger pl-3">', '</p>'); ?>
                        <?= form_error('password1', '<p class="text-danger pl-3">', '</p>'); ?>
                        <?= form_error('name', '<p class="text-danger pl-3">', '</p>'); ?>
                        <?= form_error('email', '<p class="text-danger pl-3">', '</p>'); ?>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Lengkap :</label>
                                <input type="text" name="name" id="name" value="<?= set_value('name'); ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="email">No. Handphone (WA) :</label>
                                <input type="text" name="email" id="email" value="<?= set_value('email'); ?>" required/>
                            </div>
                        </div>
                        <div class="form-radio">
                            <label for="j_kelamin" class="radio-label">Jenis Kelamin :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="j_kelamin" id="male" value="1" checked>
                                <label for="male">Laki-laki</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="j_kelamin" id="female" value="0">
                                <label for="female">Perempuan</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="provinsi">Provinsi :</label>
                                <div class="form-select">
                                    <select name="provinsi" id="provinsi">
                                        <option value="">--Pilih Provinsi--</option>
                                        <?php foreach ($wilayah as $wil) : ?>
                                          <option value="<?= $wil['id_wil']; ?>"><?= $wil['nm_wil']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten/Kota :</label>
                                <div class="form-select">
                                    <select name="kabupaten" id="kabupaten"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan :</label>
                                <div class="form-select">
                                    <select name="kecamatan" id="kecamatan"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa :</label>
                                <input type="text" name="desa" id="desa" value="<?= set_value('desa'); ?>" placeholder="Masukkan nama desa" required>
                                <!-- <div class="form-select">
                                    <select name="desa" id="desa"></select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div> -->
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="asal_sekolah">Asal Sekolah :</label>
                            <input type="text" name="asal_sekolah" id="asal_sekolah" value="<?= set_value('asal_sekolah'); ?>" placeholder="Misal : SMAN 1 Kuningan" required/>
                        </div>
                        <div class="form-radio">
                            <label for="j_kelamin" class="radio-label">Daftar Jalur Beasiswa KIP ?</label>
                            <div class="form-radio-item">
                                <input type="radio" name="kip" id="yes" value="1">
                                <label for="yes">Ya</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="kip" id="no" value="0">
                                <label for="no">Tidak</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Program Studi Pilihan:</label>
                            <div class="form-select">
                                <select name="kelas" id="course">
                                    <option value="">--Pilih Program Studi</option>
                                    <?php foreach ($kelas as $kelas) : ?>
                                      <option value="<?= $kelas['kelas_id']; ?>"><?= $kelas['nama_program']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reff">Dari mana anda mendapat info pendaftaran?</label>
                            <input type="text" name="reff" id="reff" value="<?= set_value('reff'); ?>" placeholder="Misal : Dari teman (Ahmad)">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password1">Kata Sandi :</label>
                                <input type="password" name="password1" id="password1" placeholder="Masukkan kata sandi baru" required/>
                            </div>
                            <div class="form-group">
                                <label for="password2">Ulangi Kata Sandi :</label>
                                <input type="password" name="password2" id="password2" placeholder="Ulangi kata sandi baru" required/>
                            </div>
                        </div>
                        <div class="form-row">
                        <div align="left" class="form-group">
                            <label><a href="<?= base_url('auth/login'); ?>">Klik di sini jika sudah punya akun!</a></label>
                        </div>
                        <div align="right" class="form-group">
                            <input type="submit" value="Daftar" class="submit" name="submit" id="submit" />
                        </div>
                            
                        </div><!-- 
                        <div class="form-group">
                            <label>Sudah daftar? <a href="<?= base_url('auth/login'); ?>">Klik di sini!</a></label>
                        </div> -->
                        <!-- <div class="form-submit">
                            <input type="submit" value="Submit Form" class="submit" name="submit" id="submit" />
                        </div> -->
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
    $("#provinsi").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_provinsi = $("#provinsi").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_kab",
            method : "POST",
            data : {id_provinsi:id_provinsi},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Kabupaten--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_wil+'>'+data[i].nm_wil+'</option>';
                }
                $('#kabupaten').html(html);

            }
        });
    });

    $("#kabupaten").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_kabupaten = $("#kabupaten").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_kec",
            method : "POST",
            data : {id_kabupaten:id_kabupaten},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Kecamatan--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_wil+'>'+data[i].nm_wil+'</option>';
                }
                $('#kecamatan').html(html);

            }
        });
    });
    $("#kecamatan").change(function(){

        // variabel dari nilai combo box kendaraan
        var id_kecamatan = $("#kecamatan").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_desa",
            method : "POST",
            data : {id_kecamatan:id_kecamatan},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Desa--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_wil+'>'+data[i].nm_wil+'</option>';
                }
                $('#desa').html(html);

            }
        });
    });
    $("#j_kelamin").change(function(){

        // variabel dari nilai combo box kendaraan
        var jenis_kelamin = $("#j_kelamin").val();

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            url : "<?php echo base_url();?>/auth/get_pengajar",
            method : "POST",
            data : {jenis_kelamin:jenis_kelamin},
            async : false,
            dataType : 'json',
            success: function(data){
                var html = "<option value=''>--Pilih Program--</option>";
                var i;

                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].kelas_id+'>'+data[i].nama_program+'</option>';
                }
                $('#pengajar').html(html);

            }
        });
    });

    $('#reset').on('click', function(){
        $('#register-form').reset();
    });
    
</script>



