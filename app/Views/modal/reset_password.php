<!-- Modal -->
<div class="modal fade" id="resetPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="ubahPassword">
                                    <div class="row">
                                        <div class="mb-2 col-md-12">
                                            <label>Password Lama</label>
                                            <input type="hidden" name="user_id" id="userId">
                                            <input type="password" name="pass_old" class="form-control">
                                        </div>
                                        <div class="mb-2 col-md-12">
                                            <label>Password Baru</label>
                                            <input type="password" name="pass_new" id="pass_new" class="form-control">
                                        </div>
                                        <div class="mb-2 col-md-12">
                                            <label>Confirmasi Password</label>
                                            <input type="password" name="confirm_pass" id="pass_confirm" class="form-control">
                                            <small><div class="text-danger" id="error"></div></small>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button class="btn btn-primary me-1" type="submit" id="btnsend">Simpan</button>
                                        <a class="btn btn-warning" data-bs-dismiss="modal">Batal</a>
                                    </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
