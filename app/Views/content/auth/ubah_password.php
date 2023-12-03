<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
    <div class="sbp-preview mb-4">
        <div class="sbp-preview-content bg-light d-flex justify-content-center">
            <div class="card card-header-actions col-md-6">
                <div class="card-header">
                    <?= $page;?>
                </div>
                <div class="card-body">
                    <form id="formUbahPassword">
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" value="<?= user()->email;?>" placeholder="Email" class="form-control" readOnly required>
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="password" name="pass_lama" placeholder="Password Lama" class="form-control" required>
                                <label>Password Lama</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="password" id="pass_baru" name="pass_baru" placeholder="Password Baru" class="form-control" required>
                                <label>Password Baru</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="password" id="pass_confirm" name="pass_confirm" placeholder="Konfirmasi Password" class="form-control" required>
                                <label>Konfirmasi Password</label>
                            </div>
                            <div class="text-danger" id="errorpass"></div>
                        </div>
                        <button class="btn btn-primary">Ubah Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->include('content/auth/js/ubahPass_js');?>
<?= $this->endSection();?>