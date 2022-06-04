<div class="container-fluid">
    <form id="form-insert" method='post' enctype="multipart/form-data" action="<?php echo base_url('Pam/insert_data_lokasi'); ?>">
        <div class="form-group">
            <label for="nrp">NAMA LOKASI</label>
            <input type="text" style="text-transform:uppercase" class="form-control <?= ($validation->hasError('nama_lokasi')) ? 'is-invalid' : '' ?>" id="nama_lokasi" name="nama_lokasi" autofocus value="<?= old('nama_lokasi') ?>" placeholder="NAMA LOKASI">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('nama_lokasi'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="Latitude">LATITUDE</label>
            <input type="text" class="form-control <?= ($validation->hasError('latitude')) ? 'is-invalid' : '' ?>" id="latitude" name="latitude" value="<?= old('latitude') ?>" placeholder="LATITUDE">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('latitude'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="longitude">LONGITUDE</label>
            <input type="text" class="form-control <?= ($validation->hasError('longitude')) ? 'is-invalid' : '' ?>" id="longitude" name="longitude" value="<?= old('longitude') ?>" placeholder="LONGITUDE">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('longitude'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="icon_lokasi">ICON LOKASI</label>
            <input type="text" class="form-control <?= ($validation->hasError('icon_lokasi')) ? 'is-invalid' : '' ?>" id="icon_lokasi" name="icon_lokasi" value="<?= old('icon_lokasi') ?>" placeholder="ICON LOKASI">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('icon_lokasi'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">ALAMAT</label>
            <textarea name="alamat" id="alamat" rows="3" placeholder="ALAMAT" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>"><?= old('alamat') ?></textarea>
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('alamat'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="ket">KETERANGAN</label>
            <textarea name="ket" id="ket" rows="3" placeholder="KETERANGAN" class="form-control <?= ($validation->hasError('ket')) ? 'is-invalid' : '' ?>"><?= old('ket') ?></textarea>
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('ket'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="foto">FOTO</label>
            <input type="file" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : '' ?>" id="foto" name="foto">
            <div id="validationServer03Feedback" class="invalid-feedback">
                <p style="font-size: large;"><?= $validation->getError('foto'); ?></p>
            </div>
        </div>
        <div class="form-group">
            <img style="width:80px" id="preview" src="<?= base_url() ?>/assets/img/foto_profil/kamera.png" />
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="location.reload();"><i class="fa fa-arrow-circle-left"></i>&nbsp;Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;Save Data</button>
        </div>
    </form>
</div>

<!-- VALIDASI -->
<script>
    <?php if (session()->getFlashdata('sukses')) { ?> Swal.fire(
            'Selamat',
            '<?php echo $session->sukses ?>',
            'success'
        ) <?php } ?>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#foto").change(function() {
            readURL(this);
        });

        function hanyaangka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
</script>