<?php

namespace App\Models;
use App\Libraries\DataTables;
use CodeIgniter\Model;

class NilaiEkskulModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ekskul';
    protected $primaryKey       = 'id_ekskul';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_ekskul',
                                    'id_siswa',
                                    'id_kelas',
                                    'deskripsi_ekskul',
                                    'predikat',
                                    'semester',
                                    'tahun_pelajaran'];

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
