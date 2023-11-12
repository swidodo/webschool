<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="card mb-3">
            <div class="card-header">
                Mata Pelajaran
            </div>
            <div class="card-body">
                <h3><?= ucwords($capaian[0]->nama_pelajaran);?></h3>
                <input type="hidden" value="<?= $id_pelajaran;?>" id="id_pelajaran">
            </div>
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <button id="TambahCapaian" class="btn btn-primary me-2"><i class="fa fa-plus"></i> Tambah</button> 
        </div>
        <div class="card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm w-100" id="TblDataCapaian">
                        <thead>
                            <th>No</th>
                            <th>Elemen</th>
                            <th>Capaian Pembelajaran</th>
                            <th>Fase</th>
                            <th>Kelas</th>
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
<?= $this->include('content/mapel/js/capaian_js');?>
<?= $this->include('modal/capaian_pembelajaran/add_capaian');?>
<?= $this->include('modal/capaian_pembelajaran/edit_capaian');?>
<?= $this->endSection();?>