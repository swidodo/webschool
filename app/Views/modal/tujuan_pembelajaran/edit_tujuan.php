<!-- Modal -->
<div class="modal fade" id="TujuanModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Tujuan Pembelajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                            <form id="TujuanFormEdit">
                                    <div class="row">
                                        <input type="hidden" name="id" id="idtp">
                                        <div class="form-floating mb-3 col-md-6">
                                            <select class="form-select" name="tp_ke" aria-label="Floating label select example" id="tp_ke" required readonly>
                                                
                                            </select>
                                            <label for="floatingSelect">Pilih Tujuan pembelajaran ke</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-sm" id="kode_tp" name="kode_tp" placeholder="Kode Tujuan Pembelajran" required>
                                            <label for="kode_tp">Kode Tujuan Pembelajaran</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="tujuan_pembelajaran" placeholder="Tujuan Pembelajaran" id="tujuanTP" style="height: 100px" required></textarea>
                                            <label for="tujuanTP">Tujuan Pembelajaran</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="materi" placeholder="Lingkup materi" id="materi" style="height: 100px" required></textarea>
                                            <label for="materi">Lingkup Materi</label>
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
