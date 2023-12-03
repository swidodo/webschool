<?php $authorize = service('authorization');?>
<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu h-100">
            <div class="nav accordion bg-dark" id="accordionSidenav">
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link text-light fw-bold" href="<?= url_to('/');?>">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboards
                </a>
                <?php if(has_permission('pelajaran')): ?>
                <a class="nav-link text-light fw-bold" href="<?= base_url('pelajaran');?>">
                    <div class="nav-link-icon"><i data-feather="book-open"></i></div>
                    Pelajaran
                </a>
                <?php endif;?>
                <?php if(has_permission('kelas')): ?>
                <a class="nav-link text-light fw-bold" href="<?= base_url('kelas');?>">
                    <div class="nav-link-icon"><i data-feather="book"></i></div>
                    Kelas
                </a>
                <?php endif;?>
                <?php if(has_permission('guru')): ?>
                <a class="nav-link text-light fw-bold" href="<?= base_url('guru');?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Guru
                </a>
                <?php endif;?>
                <?php if(has_permission('siswa')): ?>
                <a class="nav-link text-light fw-bold" href="<?= base_url('siswa');?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Siswa
                </a>
                <?php endif;?>
                <?php if(has_permission('pindah kelas')): ?>
                <!-- <a class="nav-link text-light fw-bold" href="<?= base_url('pindah-kelas');?>"> -->
                <a class="nav-link text-light fw-bold" href="#">
                    <div class="nav-link-icon"><i data-feather="rotate-cw"></i></div>
                    Pindah Kelas
                </a>
                <?php endif;?>
                <?php if(has_permission('titi mangsa')): ?>
                <a class="nav-link text-light fw-bold" href="<?= base_url('titi-mangsa');?>">
                    <div class="nav-link-icon"><i data-feather="pie-chart"></i></div>
                    Titi Mangsa
                </a>
                <?php endif;?>
                <?php if(has_permission('wali kelas')): ?>
                <a class="nav-link text-light fw-bold" href="<?= base_url('wali-kelas');?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Wali Kelas
                </a>
                <?php endif;?>
                <?php if(has_permission('beban mengajar')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('get-beban-mengajar')?>">
                    <div class="nav-link-icon"><i data-feather="trello"></i></div>
                    Beban Mengajar
                </a>
                <?php endif;?>
                <?php if(has_permission('rapor')): ?>
                <a class="nav-link  text-light fw-bold" href="<?= url_to('rapor');?>">
                    <div class="nav-link-icon"><i data-feather="printer"></i></div>
                    Rapor
                </a>
                <?php endif;?>
                <div class="sidenav-menu-heading text-small">Extrakulikuler</div>
                <!-- Sidenav Link (Charts)-->
                <?php if(has_permission('ekstrakurikuler')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('get-ekskul')?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Ekstrakurikuler
                </a>
                <?php endif;?>
                <?php if(has_permission('nilai ekstrakurikuler')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('get-nilai-ekskul')?>">
                    <div class="nav-link-icon"><i data-feather="send"></i></div>
                    Nilai Ekstrakurikuler
                </a>
                <?php endif;?>
                <?php if(has_permission('dimensi')): ?>
                <div class="sidenav-menu-heading text-small">Profile P5</div>
                <a class="nav-link text-light fw-bold" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="send"></i></div>
                    Dimensi
                </a>
                <?php endif;?>
                <?php if(has_permission('tema')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Tema
                </a>
                <?php endif;?>
                <?php if(has_permission('projek')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="send"></i></div>
                    Projek
                </a>
                <?php endif;?>
                <?php if(has_permission('input capaian')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Input Capaian
                </a>
                <?php endif;?>
                <?php if(has_permission('asesmen')): ?>
                <div class="sidenav-menu-heading text-small">Guru</div>
                <a class="nav-link text-light fw-bold" href="<?= url_to('asesmen')?>">
                    <div class="nav-link-icon"><i data-feather="edit"></i></div>
                    Asesmen
                </a>
                <?php endif;?>
                <div class="sidenav-menu-heading text-small">Setting</div>
                <?php if(has_permission('sekolah')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('sekolah')?>">
                    <div class="nav-link-icon"><i data-feather="settings"></i></div>
                    Aplikasi
                </a>
                <?php endif;?>
                <?php if(has_permission('group access')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('group-access')?>">
                    <div class="nav-link-icon"><i data-feather="lock"></i></div>
                    Group Access
                </a>
                <?php endif;?>
                <?php if(has_permission('permission')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('permission')?>">
                    <div class="nav-link-icon"><i data-feather="key"></i></div>
                    Permission
                </a>
                <?php endif;?>
                <?php if(has_permission('user group')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('group-user')?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    User Group
                </a>
                <?php endif;?>
                <?php if(has_permission('users')): ?>
                <a class="nav-link text-light fw-bold" href="<?= url_to('user')?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    User
                </a>
                <?php endif;?>
            </div>
        </div>
    </nav>
</div>