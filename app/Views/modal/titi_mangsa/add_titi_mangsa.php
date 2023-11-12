<!-- Modal -->
<div class="modal fade" id="TitiMangsaModalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pelajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="TitiMangsaFormAdd">
                                    <div class="row">
                                        <div class="mb-2 col-md-6">
                                            <div class="form-floating mb-3">
                                                <select class="form-control form-select" name="tahun_pelajaran" id="tahun_pelajaran">

                                                </select>
                                                <label>Tahun Pelajaran</label>
                                            </div>
                                        </div>
                                        <div></div>
                                        <div class="mb-2 col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" name="tm_uts_ganjil" placeholder="Titi Mangsa UTS Ganjil" class="form-control">
                                                <label>Titi Mangsa PTS Ganjil</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" name="tm_pas_ganjil" placeholder="Titi Mangsa UTS Ganjil" class="form-control">
                                                <label>Titi Mangsa PAS Ganjil</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" name="tm_uts_genap" placeholder="Titi Mangsa UTS Genap" class="form-control">
                                                <label>Titi Mangsa PTS Genap</label>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="date" name="tm_pas_genap" placeholder="Titi Mangsa PAS Genap" class="form-control">
                                                <label>Titi Mangsa PAS Genap</label>
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
