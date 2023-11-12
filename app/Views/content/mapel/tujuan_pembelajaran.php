<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">
                        Mata Pelajaran
                    </div>
                    <div class="card-body">
                        <h5><?= Ucwords($pelajaran['nama_pelajaran']);?></h5>
                        <input type="hidden" value="<?= $pelajaran['id_pelajaran'];?>" id="id_pelajaran">
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-header">
                        Capaian Pembelajaran
                    </div>
                    <div class="card-body">
                        <h5><?= ucwords($capaian['elemen']);?></h5>
                        <h7><?= $capaian['capaian_pembelajaran'];?></h7>
                        <input type="hidden" value="<?= $capaian['id_cp'];?>" id="id_cp">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-3 d-flex justify-content-end">
            <button id="TambahTujuan" class="btn btn-primary me-2"><i class="fa fa-plus"></i>Tambah</button> 
        </div>
        <div class="card card-header-actions">
            <div class="card-header">
               <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm w-100" id="TblDataTujuan">
                        <thead>
                            <th>No</th>
                            <th>TP Ke</th>
                            <th>Kode TP</th>
                            <th>Tujuan Pembelajaran</th>
                            <th>Lingkup Materi</th>
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
<?= $this->include('content/mapel/js/tujuan_js');?>
<?= $this->include('modal/tujuan_pembelajaran/add_tujuan');?>
<?= $this->include('modal/tujuan_pembelajaran/edit_tujuan');?>
<?= $this->endSection();?>