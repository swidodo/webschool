<!-- Modal -->
<div class="modal fade" id="CapaianModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Capaian Pembelajaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="CapaianFormEdit">
                                   <div class="row">
                                        <input type="hidden" name="id" id="id">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control form-control-sm" placeholder="Elemen" name="elemen" id="elemen" required>
                                            <label for="elemen">Elemen</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Capaian Pembelajaran" id="capaian" name="capaian" style="height: 100px"></textarea>
                                            <label for="capaian">Capaian Pembelajaran</label>
                                        </div>
                                   </div>
                               <div class="card-footer d-flex justify-content-end">
                                   <button class="btn btn-primary me-1" type="submit">Update</button>
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
