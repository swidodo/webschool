<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-3 pb-2">
                            <h6 class="text-white text-capitalize ps-3"><?= $page;?></h6>
                        </div>
                    </div>
                    <div class="card-body pb-2">
                        <a href="javascript:void(0);" class="btn btn-info" id="TambahSekolah">Tambah</a>
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0 table-striped table-hover" id="sekolahTbl">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Sekolah</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Alamat</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Logo</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Foto</th>
                                        <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Active</th>
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
    </div>
<?= $this->include('modal/sekolah/tambah_sekolah');?>
<?= $this->include('modal/sekolah/edit_sekolah');?>
<?= $this->include('content/sekolah/js/sekolah_js');?>
<?= $this->endSection();?>