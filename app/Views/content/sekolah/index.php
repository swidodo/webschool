<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
    <?php if(has_permission('tambah sekolah')): ?>
        <div class="mb-3 d-flex justify-content-end">
            <a href="javascript:void(0);" class="btn btn-info" id="TambahSekolah">Tambah</a>
        </div>
    <?php endif;?>
        <div class="card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0 table-striped table-hover w-100" id="sekolahTbl">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tahun Pelajaran</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Semester</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Sekolah</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kepala Sekolah</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Tanggal Cetak biodata</th>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Entri Nilai</th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('modal/sekolah/tambah_sekolah');?>
<?= $this->include('modal/sekolah/edit_sekolah');?>
<?= $this->include('content/sekolah/js/sekolah_js');?>
<?= $this->endSection();?>