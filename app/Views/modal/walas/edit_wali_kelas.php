<!-- Modal -->
<div class="modal fade" id="WalasModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Wali Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="WalasFormEdit">
                                    <div class="row">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-floating mb-3">
                                            <select class="form-control form-select" name="kelas" id="editKelas" required>
                                            </select>
                                            <label>Kelas</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-control form-select" name="nama_guru" id="editGuru" required>
                                            </select>
                                            <label>Nama Guru</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-control form-select" name="tahun_pelajaran" id="editTahunMapel" required>
                                            </select>
                                            <label>Tahun Pelajaran</label>
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
