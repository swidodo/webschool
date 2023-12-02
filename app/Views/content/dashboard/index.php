<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
    <main>
        <header class="py-4 mb-2 bg-gradient-primary-to-secondary">
            <div class="container-xl px-4">
                <div class="text-center">
                    <h4 class="text-white">DASHBOARD <?= strtoupper($sekolah['nama_sekolah']);?></h4>
                    <p class="lead mb-0 text-white-50"><?= $sekolah['alamat_sekolah'];?></p>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4">
            <div class="row">
                <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
                    <div id="myChart" class="chart--container">
                    </div>
                </div>
            </div>
        </div>
    </main>  
<?= $this->endSection();?>
