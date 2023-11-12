<!-- Modal -->
<div class="modal fade" id="GuruModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Guru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="GuruFormEdit" class="form">
                                <div class="row">
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nama" class="form-control" id="nama">
                                                <label>Nama Guru</label>
                                            </div>
                                            <input type="hidden" name="id_guru" id="id_guru">
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="id_pelajaran" id="id_pelajaran">
                                                    
                                                </select>
                                                <label>Pelajaran</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nip" class="form-control" id="nip">
                                                <label>NIP</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label>Jenis Kelamin</label>
                                            <div class="d-flex justify-content-start">
                                                <div class="form-check me-4">
                                                    <input class="form-check-input" type="radio" name="jk" id="jk_L" value="L">
                                                    <label class="form-check-label" for="jk_L">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk" id="jk_P" value="P" >
                                                    <label class="form-check-label" for="jk_P">
                                                        Wanita
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="telpon" class="form-control" id="telpon">
                                                <label>Telpon</label>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control from-select" name="status" id="status" required>
                                                </select>
                                                <label>Status</label>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control from-select" name="status_pegawai" id="status_pegawai" required>
                                                </select>
                                                <label>Status Pegawai</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="jabatan" class="form-control" id="jabatan">
                                                <label>Tugas Tambahan</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="date" name="mulai_kerja" class="form-control" id="mulai_kerja">
                                                <label>Mulai Kerja</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="duk" class="form-control" placeholder="DUK" id="duk">
                                                <label>DUK</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-8">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" name="alamat" name="alamat" id="alamat" rows="5"></textarea>
                                                <label>Alamat</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="email" class="form-control" placeholder="Email" id="email">
                                                <label>Email</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="hidden" name="user_id" id="user_id">
                                                <input type="text" name="username" class="form-control" id="usernameID" placeholder="Username">
                                                <label>Username</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="hak_akses"  id="hakAkses" required>
                                                    
                                                </select>
                                                <label>Hak Akses</label>
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