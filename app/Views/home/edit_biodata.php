<div class="card">
    <div class="card-header">
        <strong>ISI BIODATA ANDA DENGAN BENAR</strong>
    </div>
    <div class="card-body card-block">
        <form action="<?= base_url('Home/biodata') ?>" id="form_biodata" name="form_biodata" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Nomor Register Pegawai (NRP)</label>
                    <input hidden type="text" id="NRP" name="NRP" value="<?= $session->NRP; ?>">
                </div>
                <div class="col-12 col-md-9">
                    <p class="form-control-static"><b><?= $session->NRP; ?></b></p>
                </div>
            </div>
            <?php if ($session->akses != "admin") {
                $hidden = "hidden";
            } else {
                $hidden = "";
            } ?>
            <div <?= $hidden; ?> class="row form-group">
                <div class="col col-md-3">
                    <label for="akses" class=" form-control-label">Akses</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="akses" id="akses" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($session->akses) ? '' : 'hidden' ?>>
                            <option <?= ($session->akses) ? 'selected' : 'hidden' ?> value="<?= $session->akses; ?>"><?= $session->akses; ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $session->nama_lengkap; ?>" class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>" required>
                    <small id="error_nama_lengkap" style="font-style : normal; color:red;" name="error_nama_lengkap"><?= $validation->getError('nama_lengkap'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="pangkat" class=" form-control-label">Pangkat</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="pangkat" id="pangkat" class="form-control">
                        <OPTION VALUE="JENDRAL POLISI">JENDRAL POLISI</OPTION>
                        <OPTION VALUE="KOMJEN POL">KOMJEN POL</OPTION>
                        <OPTION VALUE="IRJEN POL">IRJEN POL</OPTION>
                        <OPTION VALUE="BRIGJEN POL">BRIGJEN POL</OPTION>
                        <OPTION VALUE="KOMBES POL">KOMBES POL</OPTION>
                        <OPTION VALUE="AKBP">AKBP</OPTION>
                        <OPTION VALUE="KOMPOL">KOMPOL</OPTION>
                        <OPTION VALUE="IPTU">IPTU</OPTION>
                        <OPTION VALUE="IPDA">IPDA</OPTION>
                        <OPTION VALUE="AIPTU">AIPTU</OPTION>
                        <OPTION VALUE="AIPDA">AIPDA</OPTION>
                        <OPTION VALUE="BRIPKA">BRIPKA</OPTION>
                        <OPTION VALUE="BRIGADIR">BRIGADIR</OPTION>
                        <OPTION VALUE="BRIPTU">BRIPTU</OPTION>
                        <OPTION VALUE="BRIPDA">BRIPDA</OPTION>
                        <OPTION VALUE="AJUN BRIGADIR POLISI">AJUN BRIGADIR POLISI</OPTION>
                        <OPTION VALUE="AJUN BRIGADIR POLISI DUA">AJUN BRIGADIR POLISI DUA</OPTION>
                        <OPTION VALUE="BHAYANGKARA KEPALA">BHAYANGKARA KEPALA</OPTION>
                        <OPTION VALUE="BHAYANGKARA SATU">BHAYANGKARA SATU</OPTION>
                        <OPTION VALUE="BHAYANGKARA DUA">BHAYANGKARA DUA</OPTION>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($session->pangkat) ? '' : 'hidden' ?>>
                            <option <?= ($session->pangkat) ? 'selected' : 'hidden' ?> value="<?= $session->pangkat; ?>"><?= $session->pangkat; ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Jenis Kelamin</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="radio">
                            <label for="radio1" class="form-check-label ">
                                <input type="radio" id="jk" name="jk" value="Laki-Laki" <?= ($session->jk != "Laki-Laki") ? '' : 'checked' ?> class="form-check-input">Laki - Laki
                            </label>
                        </div>
                        <div class="radio">
                            <label for="radio2" class="form-check-label ">
                                <input type="radio" id="jk" name="jk" value="Perempuan" <?= ($session->jk != "Perempuan") ? '' : 'checked' ?> class="form-check-input">Perempuan
                            </label>
                        </div>
                    </div>
                    <small id="error_jk" style="font-style : normal; color:red;" name="error_jk"><?= $validation->getError('jk'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tempat Lahir</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" value="<?= $session->tempat_lahir; ?>" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : '' ?>" required>
                    <small id="error_tempat_lahir" style="font-style : normal; color:red;" name="error_tempat_lahir"><?= $validation->getError('tempat_lahir'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="date" value="<?= $session->tgl_lahir; ?>" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : '' ?>" required>
                    <small id="error_tgl_lahir" style="font-style : normal; color:red;" name="error_tgl_lahir"><?= $validation->getError('tgl_lahir'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="agama" class=" form-control-label">Agama</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="agama" id="agama" class="form-control">
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($session->agama) ? '' : 'hidden' ?>>
                            <option <?= ($session->agama) ? 'selected' : 'hidden' ?> value="<?= $session->agama; ?>"><?= $session->agama; ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Alamat</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea required name="alamat" id="alamat" rows="3" placeholder="Alamat Lengkap" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>"><?= $session->alamat; ?></textarea>
                    <small id="error_alamat" style="font-style : normal; color:red;" name="error_alamat"><?= $validation->getError('alamat'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="email" class=" form-control-label">Email</label>
                </div>
                <div class="col-12 col-md-9">
                    <input required type="email" id="email" name="email" placeholder="Masukan E-Mail" value="<?= $session->email; ?>" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>">
                    <small id="error_email" style="font-style : normal; color:red;" name="error_email"><?= $validation->getError('email'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">No HP</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="hp" name="hp" placeholder="Nomor Handphone" value="<?= $session->hp; ?>" class="form-control <?= ($validation->hasError('hp')) ? 'is-invalid' : '' ?>">
                    <small id="error_hp" style="font-style : normal; color:red;" name="error_hp"><?= $validation->getError('hp'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" minlength="6" id="password" name="password" placeholder="Password" class="form-control" required>
                    <small id="error_password" style="font-style : normal; color:red;" name="error_password"><?= $validation->getError('password'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Confirm Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" minlength="6" id="confirm_password" name="confirm_password" placeholder="Password" class="form-control" required>
                    <small id="confirm_error_password" style="font-style : normal; color:red;" name="confirm_error_password"><?= $validation->getError('confirm_password'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="checkbox" onclick="tampilkan_pass()"> Show Password
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label">Foto Profil</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="hidden" id="nama_foto_profil" name="nama_foto_profil" value="<?= $session->foto; ?>" class="form-control-file">
                    <input type="file" id="foto" name="foto" class="form-control-file">
                    <small id="error_foto" style="font-style : normal; color:red;" name="error_foto"><?= $validation->getError('foto'); ?></small>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="file-input" class=" form-control-label"></label>
                </div>
                <div class="col-12 col-md-9">
                    <?php if ($session->foto != "") {
                        $foto_profil = $session->foto;
                    } else {
                        $foto_profil = "kamera.png";
                    }
                    ?>
                    <img style="width:80px" id="preview_foto" src="<?= base_url() ?>/assets/img/foto_profil/<?= $foto_profil; ?>" />
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="lokasi_pam" class=" form-control-label">Lokasi Ploting Pengamanan MX GP 2022</label>
                </div>
                <div class="col-12 col-md-9">
                    <select class="select2" style="width: 100%" name="lokasi_pam" id="lokasi_pam" class="form-control">
                        <?php
                        $no = 1;
                        foreach ($data_lokasi as $row) {
                            $nama_lokasi = $row['nama_lokasi'];
                        ?>
                            <option value="<?= $nama_lokasi ?>"><?= $nama_lokasi ?></option>
                        <?php } ?>
                        <optgroup label="TERPILIH SEBELUMNYA" <?= ($validation->hasError('nama_lengkap') or $validation->hasError('jk') or $validation->hasError('tempat_lahir') or $validation->hasError('tgl_lahir') or $validation->hasError('alamat') or $validation->hasError('email') or $validation->hasError('password') or $validation->hasError('foto') or $validation->hasError('foto_ktp')) ? '' : 'hidden disabled' ?>>
                            <option <?= ($validation->hasError('nama_lengkap') or $validation->hasError('akses') or $validation->hasError('pangkat') or $validation->hasError('hp') or $validation->hasError('jk') or $validation->hasError('tempat_lahir') or $validation->hasError('tgl_lahir') or $validation->hasError('alamat') or $validation->hasError('email') or $validation->hasError('password') or $validation->hasError('foto') or $validation->hasError('foto_ktp')) ? 'selected' : 'hidden disabled' ?> value="<?= old('lokasi_pam') ?>"><?= old('lokasi_pam') ?></option>
                        </optgroup>
                    </select>
                </div>
            </div>
    </div>
    <div class="card-footer">
        <button id="btn_simpan" name="btn_simpan" type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Simpan
        </button>
    </div>
    </form>
    <div class="progress mb-3 ml-3 mr-3">
        <div id="progres" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

<script>
    $('.select2').select2({
        theme: "bootstrap",
        width: 'resolve' // need to override the changed default
    });
    $("#form_biodata").submit(function(event) {
        event.preventDefault();
        $('#btn_simpan').prop('disabled', true);
        $('#btn_simpan').html('<i class="fa fa-spin fa-spinner"></i>');
        $('#progres').addClass('progress-bar bg-info progress-bar-striped progress-bar-animated');
        document.getElementById("form_biodata").submit();
    });

    function tampil_foto(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview_foto').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#foto").change(function() {
        tampil_foto(this);
    });

    function tampilkan_pass() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        var y = document.getElementById("confirm_password");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>