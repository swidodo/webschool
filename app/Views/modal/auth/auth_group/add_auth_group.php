<!-- Modal -->
<div class="modal fade" id="GroupAccessModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Group Access</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="GroupAccessFormAdd">
                                   <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="name" class="form-control form-control-sm" placeholder="Nama Group Access" required>
                                                <label>Nama Group Access</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="description" class="form-control form-control-sm" placeholder="Deskripsi" required>
                                                <label>Deskripsi</label>
                                            </div>
                                        </div>
                                   </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr />
                                           <h5>PERMISSION</h5>
                                           <hr />
                                            <table class="table table-striped table-bordered w-100" id="tblPermission">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Access</th>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                               <div class="card-footer d-flex justify-content-start">
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
