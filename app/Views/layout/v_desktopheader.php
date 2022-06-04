<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">

                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <?php
                                    $foto = $session->foto;
                                    if ($foto != null) {
                                        $foto_profil = $session->foto;
                                    } else {
                                        $foto_profil = "user_image.png";
                                    }
                                    ?>
                                    <img src="<?= base_url() ?>/assets/img/foto_profil/<?= $foto_profil; ?>" alt="Foto Profil" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?= $session->nama_lengkap; ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="<?= base_url() ?>/assets/img/foto_profil/<?= $foto_profil; ?>" alt="Foto Profil" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?= $session->nama_lengkap; ?></a>
                                            </h5>
                                            <span class="email"><?= $session->email; ?></span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="<?= base_url('Home/edit_biodata') ?>">
                                                <i class="zmdi zmdi-settings"></i>Pengaturan</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= base_url('Login/logout') ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER DESKTOP-->