<!-- Modal -->
<div class="modal fade" id="BebanMengajarModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form id="BebanMengajarFormEdit" class="form">
                                   <div class="row">
                                       <input type="hidden" name="id" id="id">
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="id_guru" placeholder="Nama Guru" id="editguru" required>
                                                    
                                                </select>
                                                <label for="editguru">Nama Guru</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="id_pelajaran" placeholder="Mata Pelajaran" id="editpelajaran" required>

                                                </select>
                                                <label for="editpelajaran">Mata Pelajaran</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="id_kelas" placeholder="Kelas" id="editkelas" required>

                                                </select>
                                                <label for="editkelas">Kelas</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-select form-control" name="status" placeholder="Kelas" id="editstatus" required>

                                                </select>
                                                <label for="editstatus">Status</label>
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
