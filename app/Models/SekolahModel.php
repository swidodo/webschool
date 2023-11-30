<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sekolah';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tahun_pelajaran',
                                    'semester',
                                    'nama_sekolah',
                                    'alamat_sekolah',
                                    'kepala_sekolah',
                                    'nip_kepsek',
                                    'tgl_biodata',
                                    'logo',
                                    'aktif',
                                    'entri_nilai',
                                    'kelurahan',
                                    'kecamatan',
                                    'kabkota',
                                    'provinsi',
                                    'npsn',
                                    'tgl_un',
                                    'telpon',
                                    'fax',
                                    'kode_pos'
                                ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
