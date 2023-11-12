<!-- Modal -->
<div class="modal fade" id="SiswaModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="SiswaFormAdd">
                                    <div class="row">
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama Siswa" name="nama_siswa">
                                            <label for="floatingInput">Nama Siswa</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="NIS" name="nis">
                                            <label for="floatingInput">NIS</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="NISN" name="nisn">
                                            <label for="floatingInput">NISN</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Tempat Lahir" name="tempat_lahir">
                                            <label for="floatingInput">Tempat Lahir</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="date" class="form-control form-control-sm" placeholder="Tanggal Lahir" name="tgl_lahir">
                                            <label for="floatingInput">Tanggal Lahir</label>
                                        </div>
                                        <div class="ms-1 mb-3 col-md-3 row">
                                            <label>Jenis Kelamin</label>
                                            <div class="form-check col-md-6">
                                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="L">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                   Laki-Laki
                                                </label>
                                            </div>
                                            <div class="form-check col-md-6">
                                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="P">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Perempuan
                                                </label>
                                            </div>

                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Agama" name="agama">
                                            <label for="floatingInput">Agama</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Anak ke" name="anak_ke">
                                            <label for="floatingInput">Anak Ke</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Status Dalam Keluarga" name="status_dlm_kel">
                                            <label for="floatingInput">Status Dalam Keluarga</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control form-control-sm" placeholder="Alamat Peserta Didik" name="alamat_siswa"></textarea>
                                            <label for="floatingInput">Alamat Peserta Didik</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="No Hp Peserta Didik" name="no_hp_siswa">
                                            <label for="floatingInput">No Hp Peserta Didik</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <select class="form-control form-control-sm" name="id_kelas" id="kelasId" placeholder="Kelas">
                                                <option value=""></option>
                                            </select>
                                            <label for="floatingInput">Kelas</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="date" class="form-control form-control-sm" placeholder="Tanggal Diterima" name="tanggal_diterima">
                                            <label for="floatingInput">Tanggal Diterima</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Sekolah Asal" name="sekolah_asal">
                                            <label for="floatingInput">Sekolah Asal</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama Ayah" name="nama_ayah">
                                            <label for="floatingInput">Nama Ayah</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama Ibu" name="nama_ibu">
                                            <label for="floatingInput">Nama Ibu</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control form-control-sm" placeholder="Alamat Orang Tua" name="alamat_orang_tua"></textarea>
                                            <label for="floatingInput">Alamat Orang Tua</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="No Hp Orang Tua" name="no_hp_orang_tua">
                                            <label for="floatingInput">No Hp Orang Tua</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Kerja Ayah" name="kerja_ayah">
                                            <label for="floatingInput">Kerja Ayah</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Kerja ibu" name="kerja_ibu">
                                            <label for="floatingInput">Kerja Ibu</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Nama Wali" name="nama_wali">
                                            <label for="floatingInput">Nama Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control form-control-sm" placeholder="Alamat Wali" name="alamat_wali"></textarea>
                                            <label for="floatingInput">Alamat Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="No Hp Wali" name="no_hp_wali">
                                            <label for="floatingInput">No Hp Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Kerja wali" name="kerja_wali">
                                            <label for="floatingInput">Kerja Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <select class="form-control form-control-sm" name="status" placeholder="Status">
                                                <option value="1">Aktif</option>
                                                <option value="2">Keluar</option>
                                                <option value="3">Alumni</option>
                                            </select>
                                            <label for="floatingInput">Status</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <select class="form-control form-control-sm" name="tingkat_diterima" placeholder="Tingkat Diterima">
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <label for="floatingInput">Tingkat Diterima</label>
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
