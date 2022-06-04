<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="<?= base_url() ?>/assets/img/polri/home.png" alt="Sispam MXGP" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
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
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->