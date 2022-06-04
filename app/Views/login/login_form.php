<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <!-- favIcon -->
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/polri/POLDANTB.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- Css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login/style.css" />
    <title>Sistem Pengamanan Polres Sumbawa</title>
</head>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="<?php echo base_url('Login/auth'); ?>" method="POST" id="form-login" name="form-login" class="sign-in-form" autocomplete="off">
                <img style="display: block; width: 100px; margin-left: auto; margin-right: auto; margin-bottom: 9;" src="<?= base_url() ?>/assets/img/polri/POLDANTB.png">
                <h2 class="title">Login</h2>
                <div class="input-field">
                    <i class="fas fa-address-card"></i>
                    <input type="text" maxlength="8" placeholder="NRP" id="NRP_login" name="NRP_login" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="pass_signin" name="pass_signin" placeholder="Password" required />
                </div>
                <div class="input">
                    <input type="checkbox" onclick="signin_show()"> Show Password
                </div>
                <input type="submit" value="Login" class="btn solid" />
            </form>
            <form action="<?php echo base_url('Login/registrasi'); ?>" method="POST" id="form-registrasi" name="form-registrasi" class="sign-up-form">
                <h2 class="title">Form Registrasi</h2>
                <div class="input-field">
                    <i class="fas fa-address-card"></i>
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' oninput="if( this.value.length > 8 )  this.value = this.value.slice(0,8)" autocomplete="off" id="NRP" name="NRP" placeholder="NRP" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" id="email" name="email" placeholder="E-Mail" autocomplete="off" required />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="pass_signup" min="5" name="pass_signup" placeholder="Password" required />
                </div>
                <div class="input">
                    <input type="checkbox" onclick="signup_show()"> Show Password
                </div>
                <input type="submit" class="btn" value="Sign up" />
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Anda Belum Registrasi ?</h3>
                <p>
                    Silahkan Klik Tombol Registrasi di Bawah Ini...
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Registrasi
                </button>
            </div>
            <img src="<?= base_url() ?>/assets/img/polri/login.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Anda Sudah Mendaftar ?</h3>
                <p>
                    Klik tombol di bawah ini untuk login...
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Login
                </button>
            </div>
            <img src="<?= base_url() ?>/assets/img/polri/pol.png" class="image" alt="" />
        </div>
    </div>
</div>
<div class="footer">
    <p>Copyrights © 2022 Polres Sumbawa. All rights reserved.</p>
</div>

<!-- JS -->
<script src="<?= base_url() ?>/assets/login/app.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>

<script>
    <?php if (session()->getFlashdata('status')) { ?>
        Swal.fire(
            'Selamat',
            '<?php echo $session->status ?>',
            'success'
        )
    <?php } ?>

    <?php if (session()->getFlashdata('login_error')) { ?>
        Swal.fire(
            'Terjadi Kesalahan',
            '<?php echo $session->login_error ?>',
            'error'
        )
    <?php } ?>

    <?php $error = $validation->getErrors();
    if ($error != null) { ?>
        Swal.fire(
            'Terjadi Kesalahan',
            '<?php foreach ($error as $pesan_error) {
                    echo "<strong>" . $pesan_error . "</strong> <br>";
                }; ?>' + "Silahkan Registrasi Ulang",
            'error'
        )
    <?php } ?>

    function signup_show() {
        var x = document.getElementById("pass_signup");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function signin_show() {
        var x = document.getElementById("pass_signin");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>