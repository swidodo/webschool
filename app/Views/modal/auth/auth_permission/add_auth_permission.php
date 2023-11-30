<!-- Modal -->
<div class="modal fade" id="PermissionModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Permission</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="PermissionFormAdd">
                                   <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama permission" required>
                                                <label>Nama Permission</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="description" class="form-control form-control-sm" placeholder="Deskripsi" required>
                                                <label>Deskripsi</label>
                                            </div>
                                        </div>
                                   </div>
                               <div class="card-footer d-flex justify-content-end">
                                   <button class="btn btn-primary me-1" type="submit">Simpan</button>
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
