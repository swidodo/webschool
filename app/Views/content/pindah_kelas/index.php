<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="card card-header-actions">
            <div class="card-header">
                Data Pindah Kelas
                <div>
                    <button id="TambahPindah" class="btn btn-primary me-2"><i class="fa fa-plus"></i> Tambah</button>
                    <a href="javascript:void(0);" id="ImportPindah" class="btn btn-success"><i class="fa fa-file-import"></i> Import</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm" id="TblDataPindah">
                        <thead>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Pelajaran</th>
                            <th>Status Naik</th>
                            <th>Ketarangan</th>
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
<?= $this->include('content/pindah_kelas/js/pindah_kelas_js');?>
<?= $this->include('modal/pindah_kelas/add_pindah_kelas');?>
<?= $this->include('modal/pindah_kelas/edit_pindah_kelas');?>
<?= $this->endSection();?>