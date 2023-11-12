<!-- Modal -->
<div class="modal fade" id="SiswaModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="SiswaFormUpdate">
                                    <input id="id" value="" type="hidden">
                                    <div class="row">
                                        <div class="form-floating mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="nama_siswa" id="nama_siswa">
                                            <label for="floatingInput">Nama Siswa</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="nis" id="nis">
                                            <label for="floatingInput">NIS</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="nisn" id="nisn">
                                            <label for="floatingInput">NISN</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="tempat_lahir" id="tmpt_lahir">
                                            <label for="floatingInput">Tempat Lahir</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="date" class="form-control form-control-sm" placeholder="" name="tgl_lahir" id="tgl_lahir">
                                            <label for="floatingInput">Tanggal lahir</label>
                                        </div>
                                        <div class="ms-1 mb-3 col-md-3 row">
                                            <label>Jenis kelamin</label>
                                            <div class="form-check col-md-6">
                                                <input class="form-check-input jkl" type="radio" name="jk" id="flexRadioDefault1" value="L">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                   Laki-Laki
                                                </label>
                                            </div>
                                            <div class="form-check col-md-6">
                                                <input class="form-check-input jkp" type="radio" name="jk" id="flexRadioDefault1" value="P">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Perempuan
                                                </label>
                                            </div>

                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="agama" id="agama">
                                            <label for="floatingInput">Agama</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="anak_ke" id="anak_ke">
                                            <label for="floatingInput">Anak Ke</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="status_dlm_kel" id="status_dlm_kel">
                                            <label for="floatingInput">Status dalam keluarga</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control form-control-sm" placeholder="" name="alamat_siswa" id="alamat_siswa"></textarea>
                                            <label for="floatingInput">Alamat peserta didik</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="no_hp_siswa" id="no_hp_siswa">
                                            <label for="floatingInput">No hp peserta didik</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <select class="form-control form-control-sm" name="id_kelas" placeholder="" id="kelas">
                                                <option value=""></option>
                                            </select>
                                            <label for="floatingInput">Kelas</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="date" class="form-control form-control-sm" placeholder="" name="tanggal_diterima" id="tgl_diterima">
                                            <label for="floatingInput">Tanggal diterima</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="sekolah_asal" id="sekolah_asal">
                                            <label for="floatingInput">Sekolah asal</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="nama_ayah" id="nama_ayah">
                                            <label for="floatingInput">Nama Ayah</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="nama_ibu" id="nama_ibu">
                                            <label for="floatingInput">Nama Ibu</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control form-control-sm" placeholder="" name="alamat_orang_tua" id="alamat_orang_tua"></textarea>
                                            <label for="floatingInput">Alamat Orang Tua</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="No Hp Orang Tua" name="no_hp_orang_tua" id="no_hp_orang_tua">
                                            <label for="floatingInput">No hp orang tua</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="kerja_ayah" id="kerja_ayah">
                                            <label for="floatingInput">Kerja Ayah</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="kerja_ibu" id="kerja_ibu">
                                            <label for="floatingInput">Kerja Ibu</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="nama_wali" id="nama_wali">
                                            <label for="floatingInput">Nama Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-6">
                                            <textarea class="form-control form-control-sm" placeholder="" name="alamat_wali" id="alamat_wali"></textarea>
                                            <label for="floatingInput">Alamat Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="no_hp_wali" id="no_hp_wali">
                                            <label for="floatingInput">No hp Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="" name="kerja_wali" id="kerja_wali">
                                            <label for="floatingInput">Kerja Wali</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <select class="form-control form-control-sm" name="status" placeholder="" id="status">
                                            </select>
                                            <label for="floatingInput">Status</label>
                                        </div>
                                        <div class="form-floating mb-3 col-md-3">
                                            <select class="form-control form-control-sm" name="tingkat_diterima" placeholder="Tingkat Diterima" id="tingkat_diterima">
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <label for="floatingInput">Tingkat Diterima</label>
                                        </div>
                                    </div>
                               <div class="card-footer d-flex justify-content-end">
                                   <button class="btn btn-primary me-1" type="submit" id="btn_update">Update</button>
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
