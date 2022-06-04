    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="#">
                        <img src="<?= base_url() ?>/assets/img/polri/mobile_logo.png" alt="Sispam MXGP" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a class="js-arrow" href="<?= base_url('Home') ?>">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <?php if ($session->akses == "admin") {
                        $hidden_fitur = "";
                    } else {
                        $hidden_fitur = "hidden";
                    }
                    ?>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Pam') ?>">
                            <i class="fas fa-map-pin"></i>Lokasi Pengamanan</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="<?= base_url('Home/peta') ?>">
                            <i class="fas fa-map"></i>Peta Lokasi</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->