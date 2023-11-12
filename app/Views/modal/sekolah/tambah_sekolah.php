<!-- Modal -->
<div class="modal fade" id="tambahSekolahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Sekolah</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form id="formtambahsekolah">
               <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" id="nama_sekolah" name="nama_sekolah" class="form-control" required>
                </div>
                <div class="input-group input-group-outline form-floating mb-3">
                    <textarea class="form-control" id="alamat_sekolah" name="nama_sekolah" placeholder="Alamat" required></textarea>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">status Akreditasi</label>
                    <input type="text" id="status" name="status" class="form-control" required>
                </div>
                <div class="input-group input-group-static mb-3">
                    <select id="is_active" class="form-control form-select" name="is_active" required>
                        <option>--Pilih status ---</option>
                        <option value="1">Active</option>
                        <option value="0">Non Active</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
