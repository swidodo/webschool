<!-- Modal -->
<div class="modal fade" id="editSekolahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Sekolah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="formEditSekolah">
                <div class="row">
                    <input type="hidden" name="id" id="id">
                    <div class="form-floating mb-3 col-md-6">
                        <input type="text" id="edit_nama_sekolah" name="nama_sekolah" placeholder="Nama Sekolah" class="form-control" required>
                        <label class="form-label">Nama Sekolah</label>
                     </div>
                    <div class="form-floating mb-3 col-md-6">
                        <textarea type="text" id="edit_alamat" name="alamat_sekolah" placeholder="Alamat Sekolah" class="form-control" required></textarea>
                        <label class="form-label">Alamat Sekolah</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="edit_kepala_sekolah" name="kepala_sekolah" placeholder="Kepala Sekolah" class="form-control" required>
                        <label class="form-label">Kepala Sekolah</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                       <input type="text" id="edit_nip_kepsek" name="nip" placeholder="Nip Kepala Sekolah" class="form-control"  onkeypress="return hanyaAngka(event)" required>
                       <label class="form-label">Nip Kepala Sekolah</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <select id="edit_tahun_pelajaran" class="form-control form-select" name="tahun_pelajaran" required>
                        </select>
                        <label class="form-label">Tahun Pelajaran</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <select id="edit_semester" class="form-control form-select" name="semester" required>
                        </select>
                        <label class="form-label">Semester</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                       <input type="date" id="edit_tgl_biodata" name="tgl_cetak_biodata" placeholder="Tanggal Cetak Biodata" class="form-control" required>
                       <label class="form-label">Tanggal Cetak Biodata</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <select id="edit_entri_nilai" class="form-control form-select" name="entri_nilai" required>
                            <option>-- Pilih --</option>
                            <option value="Y">Active</option>
                            <option value="N">Non Active</option>
                        </select>
                        <label class="form-label">Entri Nilai</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="edit_telpon" name="telpon" placeholder="Telpon" class="form-control"  onkeypress="return hanyaAngka(event)" required>
                        <label class="form-label">Telpon</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="edit_fax" name="fax" placeholder="fax" class="form-control" required>
                        <label class="form-label">Fax</label>
                    </div>
                    <div class="form-floating mb-3 col-md-4">
                        <input type="text" id="edit_kode_pos" name="kode_pos" placeholder="Kode pos" class="form-control" required>
                        <label class="form-label">Kode Pos</label>
                    </div>
                    <div class="mb-3 col-md-4">
                            <label class="form-label">Logo</label>
                            <input type="file" name="logo" class="form-control" id="edit_logo">
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
