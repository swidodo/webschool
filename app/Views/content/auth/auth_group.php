<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="mb-3 d-flex justify-content-end">
            <button id="TambahGroup" class="btn btn-primary me-2"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm w-100" id="TblDataGroupAccess">
                        <thead>
                            <th>No</th>
                            <th>Nama Group</th>
                            <th>Deskripsi</th>
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
<?= $this->include('content/auth/js/auth_group_js');?>
<?= $this->include('modal/auth/auth_group/add_auth_group.php');?>
<?= $this->include('modal/auth/auth_group/edit_auth_group.php');?>
<?= $this->endSection();?>