<!-- Modal -->
<div class="modal fade" id="BebanMengajarModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="BebanMengajarFormAdd" class="form">
                                   <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="id_guru" placeholder="Nama Guru" id="addguru" required>
                                                    
                                                </select>
                                                <label for="addguru">Nama Guru</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="id_pelajaran" placeholder="Mata Pelajaran" id="addpelajaran" required>

                                                </select>
                                                <label for="addpelajaran">Mata Pelajaran</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="id_kelas" placeholder="Kelas" id="addkelas" required>

                                                </select>
                                                <label for="addkelas">Kelas</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="status" placeholder="Kelas" id="addstatus" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Y">Aktif</option>
                                                    <option value="N">Non Aktif</option>
                                                </select>
                                                <label for="addstatus">Status</label>
                                            </div>
                                        </div>
                                        
                                   </div>
                               <div class="card-footer d-flex justify-content-end">
                                   <button class="btn btn-primary me-1" type="submit">Simpan</button>
                                   <button class="btn btn-warning" data-bs-dismiss="modal">Batal</button>
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
