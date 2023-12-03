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
                <button class="btn btn-primary"><i class="fa fa-download me-1 float-end "></i> Download Nilai Rapor</button>
            </div>
        </div>
        <div class="row card card-header-actions">
            <div class="card-header">
                <?= $page;?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm w-100" id="inputSumatif">
                        <thead style="background-color:#F2F2F2;">
                            <tr>
                                <th rowspan="2" class="align-middle text-center">No</th>
                                <th rowspan="2" class="align-middle text-center">NIS</th>
                                <th rowspan="2" class="align-middle text-center">Nama</th>
                                <th rowspan="2" class="align-middle text-center">Jenis Kelamin</th>
                                <th colspan="5" class="text-center">Sumatif Lingkup Materi</th>
                                <th rowspan="2" class="text-center">SAS</th>
                                <th rowspan="2" class="text-center">Rapor (NA Sumatif 60% + SAS 40%)</th>
                            </tr>
                            <tr>
                                <th class="text-center">1</th>
                                <th class="text-center">2</th>
                                <th class="text-center">3</th>
                                <th class="text-center">4</th>
                                <th class="text-center">NA Sumatif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($siswa as $student): ?>
                                <tr>
                                    <td class="text-center"><?= $i;?></td>
                                    <td><?= $student->nis;?></td>
                                    <td><?= $student->nama;?></td>
                                    <td><?= ($student->jk == 'P') ? 'Perempuan' : 'Laki-laki';?></td>
                                    <td><?= $student->nilai_harian1;?></td>
                                    <td><?= $student->nilai_harian2;?></td>
                                    <td><?= $student->nilai_harian3;?></td>
                                    <td><?= $student->nilai_harian4;?></td>
                                    <td class="text-center"><?= '0';?></td>
                                    <td class="text-center"><?= '0';?></td>
                                    <td class="text-center"><?= $student->rapor;?></td>
                                    
                                </tr>
                            <?php $i++;  endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('content/asesmen/js/asesmen_js');?>
<?= $this->endSection();?>