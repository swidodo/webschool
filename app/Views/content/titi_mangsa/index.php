<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="mb-3 d-flex justify-content-end">
            <button id="TambahTitiMangsa" class="btn btn-primary me-2"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm w-100" id="TblDataTitiMangsa">
                        <thead>
                            <th>No</th>
                            <th>Tahun Pelajaran</th>
                            <th>PTS Ganjil</th>
                            <th>PAS Ganjil</th>
                            <th>PTS GENAP</th>
                            <th>PAS GENAP</th>
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
<?= $this->include('content/titi_mangsa/js/titimangsa_js');?>
<?= $this->include('modal/titi_mangsa/add_titi_mangsa');?>
<?= $this->include('modal/titi_mangsa/edit_titi_mangsa');?>
<?= $this->endSection();?>