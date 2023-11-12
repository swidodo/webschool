<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="mb-3 d-flex justify-content-end">
            <button id="TambahSiswa" class="btn btn-primary me-2"><i class="fa fa-plus"></i> Tambah</button>
            <a href="javascript:void(0);" id="ImportSiswa" class="btn btn-success"><i class="fa fa-file-import"></i> Import</a>
        </div>
        <div class="card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="TblDataSiswa">
                        <thead>
                            <th>No</th>
                            <th>NIS</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Fase</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('content/siswa/js/siswa_js');?>
<?= $this->include('modal/siswa/add_siswa');?>
<?= $this->include('modal/siswa/edit_siswa');?>
<?= $this->endSection();?>