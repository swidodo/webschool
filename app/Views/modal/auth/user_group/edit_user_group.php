<!-- Modal -->
<div class="modal fade" id="UserGroupModalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User Group</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="default">
                    <div class="card mb-4">
                        <!-- Component Preview-->
                        <div class="sbp-preview">
                            <div class="sbp-preview-content">
                                <form id="UserGroupFormEdit">
                                   <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select id="sekolah_id_edit" class="form-control form-select" name="sekolah_id" required>
                                                   
                                                </select>
                                                <label>Sekolah</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input id="id" type="hidden" name="id">
                                            <div class="form-floating mb-3">
                                                <select id="user_id_edit" class="form-control form-select" name="user_id" required>
                                                    <option value="">-- pilih --</option>
                                                </select>
                                                <label>User</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-floating mb-3">
                                                <select id="group_id_edit" class="form-control form-select" name="group_id" required>
                                                    <option value="">-- pilih --</option>
                                                </select>
                                                <label>Role</label>
                                            </div>
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
