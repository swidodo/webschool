<?= $this->extend('layouts/main');?>
<?= $this->section('page-content');?>
<div class="sbp-preview mb-4">
    <div class="sbp-preview-content bg-light">
        <div class="row mb-3">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Mata Pelajaran
                    </div>
                    <div class="card-body">
                        <?php
                        if($mapel != null):
                            echo '<h4>'.$mapel['nama_pelajaran'].'</h4>';
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Kelas
                    </div>
                    <div class="card-body">
                        <?php
                        if($kelas): 
                            echo '<h4>'.$kelas['kelas'].'</h4>';
                        endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card">
                    <div class="card-header">
                        Guru
                    </div>
                    <div class="card-body">
                        <?php
                            if($guru): 
                                echo '<h4>'.$guru['nama_guru'].'</h4>';
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div clas="row">
            <div class="mb-2 text-end">
                <button class="btn btn-danger fs-6"><i class="fa fa-search me-1"></i> Deskripsi Capaian Kompetensi</button>
                <button class="btn btn-primary "><i class="fa fa-download me-1"></i> Download Nilai</button>
                <button class="btn btn-success fs-6"><i class="fa fa-upload me-1"></i> Upload Nilai</button>
            </div>
        </div>
        <div class="card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form>
                        <table class="table table-bordered table-striped table-hover table-sm w-100" id="inputSumatif">
                            <thead style="background-color:#F2F2F2;">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($siswa as $student): ?>
                                    <tr>
                                        <td class="text-center"><?= $i;?></td>
                                        <td><?= $student->nis;?></td>
                                        <td><?= $student->nama;?></td>
                                        <td><?= ($student->jk == 'P') ? 'Perempuan' : 'Laki-laki';?></td>
                                        <td><input type="number" name="uas[]" value="<?= $student->uas;?>" class="form-control"></td>
                                    </tr>
                                <?php $i++;  endforeach;?>
                            </tbody>
                        </table>
                        <a href="<?= url_to('asesmen');?>" class="btn btn-warning float-end mb-4">Batal</a>
                        <botton class="btn btn-primary float-end mb-4 me-1">Simpan</botton>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('content/asesmen/js/asesmen_js');?>
<?= $this->endSection();?>