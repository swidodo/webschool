<!-- Modal -->
<div class="modal fade" id="TambahSekolahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Sekolah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="formTambahSekolah">
                    <div class="row">
                        <div class="form-floating mb-3 col-md-6">
                            <input type="text" id="nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" class="form-control" required>
                            <label class="form-label">Nama Sekolah</label>
                        </div>
                        <div class="form-floating mb-3 col-md-6">
                            <textarea type="text" id="alamat" name="alamat_sekolah" placeholder="Alamat Sekolah" class="form-control" required></textarea>
                            <label class="form-label">Alamat Sekolah</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                            <input type="text" id="kepala_sekolah" name="kepala_sekolah" placeholder="Kepala Sekolah" class="form-control" required>
                            <label class="form-label">Kepala Sekolah</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="nip_kepsek" name="nip" placeholder="Nip Kepala Sekolah" class="form-control"  onkeypress="return hanyaAngka(event)" required>
                        <label class="form-label">Nip Kepala Sekolah</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                            <select id="tahun_pelajaran" class="form-control form-select" name="tahun_pelajaran" required>
                            </select>
                            <label class="form-label">Tahun Pelajaran</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                            <select id="semester" class="form-control form-select" name="semester" required>
                                <option value=""> -- pilih --</option>
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                            </select>
                            <label class="form-label">Semester</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                        <input type="date" id="tgl_biodata" name="tgl_cetak_biodata" placeholder="Tanggal Cetak Biodata" class="form-control" required>
                        <label class="form-label">Tanggal Cetak Biodata</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                            <select id="entri_nilai" class="form-control form-select" name="entri_nilai" required>
                                <option>-- Pilih --</option>
                                <option value="Y">Active</option>
                                <option value="N">Non Active</option>
                            </select>
                            <label class="form-label">Entri Nilai</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="telpon" name="telpon" placeholder="Telpon" class="form-control" onkeypress="return hanyaAngka(event)" required>
                        <label class="form-label">Telpon</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="fax" name="fax" placeholder="fax" class="form-control"  onkeypress="return hanyaAngka(event)" required>
                        <label class="form-label">Fax</label>
                        </div>
                        <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="kode_pos" name="kode_pos" placeholder="Kode pos" class="form-control"  onkeypress="return hanyaAngka(event)" required>
                        <label class="form-label">Kode Pos</label>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" id="logo">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Simpan</button>
                            <a class="btn btn-secondary" data-bs-dismiss="modal">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
