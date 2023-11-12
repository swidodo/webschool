<!-- Modal -->
<div class="modal fade" id="WalasModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Wali Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="WalasFormAdd">
                                   <div class="row">
                                        <div class="form-floating mb-3">
                                            <select class="form-control form-select" name="kelas" id="addKelas" required>
                                            </select>
                                            <label>Kelas</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-control form-select" name="nama_guru" id="addGuru" required>
                                            </select>
                                            <label>Nama Guru</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-control form-select" name="tahun_pelajaran" id="addTahunMapel" required>
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
