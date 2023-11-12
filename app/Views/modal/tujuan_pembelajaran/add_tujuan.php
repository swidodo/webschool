<!-- Modal -->
<div class="modal fade" id="TujuanModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Tujuan Pembelajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="TujuanFormAdd">
                                    <div class="row">
                                        <input type="hidden" name="id_pelajaran" id="idpel">
                                        <input type="hidden" name="id_cp" id="idcp">
                                        <div class="form-floating mb-3 col-md-6">
                                            <select class="form-select" id="floatingSelect" name="tp_ke" aria-label="Floating label select example" required>
                                                <option value="" disabled selected></option>
                                                <option value="TP 1">TP 1</option>
                                                <option value="TP 2">TP 2</option>
                                                <option value="TP 3">TP 3</option>
                                                <option value="TP 4">TP 4</option>
                                                <option value="TP 5">TP 5</option>
                                                <option value="TP 6">TP 6</option>
                                                <option value="TP 7">TP 7</option>
                                                <option value="TP 8">TP 8</option>
                                                <option value="TP 9">TP 9</option>
                                                <option value="TP 10">TP 10</option>
                                               
                                            </select>
                                            <label for="floatingSelect">Pilih Tujuan pembelajaran ke</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-sm" id="addkode" name="kode_tp" placeholder="Kode Tujuan Pembelajran" required>
                                            <label for="addkode">Kode Tujuan Pembelajaran</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="tujuan_pembelajaran" placeholder="Tujuan Pembelajaran" id="addtujuan" style="height: 100px" required></textarea>
                                            <label for="addtujuan">Tujuan Pembelajaran</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="materi" placeholder="Lingkup materi" id="addmateri" style="height: 100px" required></textarea>
                                            <label for="addmateri">Lingkup Materi</label>
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
