<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Account)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <div class="sidenav-menu-heading d-sm-none">Account</div>
                <!-- Sidenav Link (Alerts)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="bell"></i></div>
                    Alerts
                    <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
                </a>
                <!-- Sidenav Link (Messages)-->
                <!-- * * Note: * * Visible only on and above the sm breakpoint-->
                <a class="nav-link d-sm-none" href="#!">
                    <div class="nav-link-icon"><i data-feather="mail"></i></div>
                    Messages
                    <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
                </a>
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading"></div>
                <!-- Sidenav Accordion (Dashboard)-->
                <a class="nav-link" href="javascript:void(0);">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboards
                </a>
                <div class="sidenav-menu-heading">Admin</div>
                <a class="nav-link" href="<?= base_url('pelajaran');?>">
                    <div class="nav-link-icon"><i data-feather="book-open"></i></div>
                    Pelajaran
                </a>
                <a class="nav-link" href="<?= base_url('kelas');?>">
                    <div class="nav-link-icon"><i data-feather="book"></i></div>
                    Kelas
                </a>
                <a class="nav-link" href="<?= base_url('guru');?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Guru
                </a>
                <a class="nav-link" href="<?= base_url('siswa');?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Siswa
                </a>
                <a class="nav-link" href="<?= base_url('pindah-kelas');?>">
                    <div class="nav-link-icon"><i data-feather="rotate-cw"></i></div>
                    Pindah Kelas
                </a>
                <a class="nav-link" href="<?= base_url('titi-mangsa');?>">
                    <div class="nav-link-icon"><i data-feather="pie-chart"></i></div>
                    Titi Mangsa
                </a>
                <a class="nav-link" href="<?= base_url('wali-kelas');?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Wali Kelas
                </a>
                <a class="nav-link" href="<?= url_to('get-beban-mengajar')?>">
                    <div class="nav-link-icon"><i data-feather="trello"></i></div>
                    Beban Mengajar
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="printer"></i></div>
                    Rapor
                </a>
                <div class="sidenav-menu-heading text-small">Extrakulikuler</div>
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="<?= url_to('get-ekskul')?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Ekstrakurikuler
                </a>
                <a class="nav-link" href="<?= url_to('get-nilai-ekskul')?>">
                    <div class="nav-link-icon"><i data-feather="send"></i></div>
                    Nilai Ekstrakurikuler
                </a>
                <div class="sidenav-menu-heading text-small">Profile P5</div>
                <a class="nav-link" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="send"></i></div>
                    Dimensi
                </a>
                <a class="nav-link" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Tema
                </a>
                <a class="nav-link" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="send"></i></div>
                    Projek
                </a>
                <a class="nav-link" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Input Capaian
                </a>
                <div class="sidenav-menu-heading text-small">Guru</div>
                <a class="nav-link" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="edit"></i></div>
                    Asesmen
                </a>
                <div class="sidenav-menu-heading text-small">Setting</div>
                <a class="nav-link" href="<?= url_to('reset-password')?>">
                    <div class="nav-link-icon"><i data-feather="settings"></i></div>
                    Aplikasi
                </a>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title"><?= user()->username;?></div>
            </div>
        </div>
    </nav>
</div>