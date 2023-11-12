<!-- Modal -->
<div class="modal fade" id="GuruModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Guru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="GuruFormAdd" class="form">
                                   <div class="row">
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nama" placeholder="Nama Guru" class="form-control" required>
                                                <label for="floatingInput">Nama Guru</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="id_pelajaran" id="addIdpelajaran">
                                                </select>
                                                <label>Pelajaran</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="nip" placeholder="NIP" class="form-control">
                                                <label>NIP</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label>Jenis Kelamin</label>
                                            <div class="d-flex justify-content-start">
                                                <div class="form-check me-4">
                                                    <input class="form-check-input" type="radio" name="jk" id="flexRadio1" value="L" checked>
                                                    <label class="form-check-label" for="flexRadio1">
                                                        Pria
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk" id="flexRadio2" value="P" >
                                                    <label class="form-check-label" for="flexRadio2">
                                                        Wanita
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="telpon" placeholder="Telpon" class="form-control">
                                                <label>Telpon</label>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="status" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Y">Aktif</option>
                                                    <option value="N">Non Aktif</option>
                                                </select>
                                                <label>Status</label>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="status_pegawai" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">PNS</option>
                                                    <option value="2">Non PNS</option>
                                                </select>
                                                <label>Status Pegawai</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="jabatan" placeholder="Tugas Tambahan" class="form-control" required>
                                                <label>Tugas Tambahan</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="date" name="mulai_kerja" class="form-control" required>
                                                <label>Mulai Kerja</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="duk" class="form-control" placeholder="DUK" required>
                                                <label>DUK</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-8">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" rows="5" name="alamat" name="alamat" placeholder="Alamat" required></textarea>
                                                <label>Alamat</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="email" class="form-control" placeholder="Email" required>
                                                <label>Email</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                                                <label>Username</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="hak_akses" id="addAuthGroup" required>
                                                    
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
