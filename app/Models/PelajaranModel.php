<?php

namespace App\Models;

use CodeIgniter\Model;

class PelajaranModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'setup_pelajaran';
    protected $primaryKey       = 'id_pelajaran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_pelajaran',
                                    'alias_pelajaran',
                                    'jenis_pelajaran',
                                    'singat',
                                    'kelompok',
                                    'jurusan',
                                    'urutan',
                                    'beban',
                                    'kkm',
                                    'status',
                                    'pai',
                                    'kurukulum',
                                    'semester',
                                    'id_sekolah' ];

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
