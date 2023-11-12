<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NilaiEkskulModel;
use App\Libraries\DataTables;

class NilaiEkskulController extends BaseController
{
    protected $DataTables;
    public function __construct(){
        $this->nilaiekskul = new NilaiEkskulModel();
        $this->DataTables = new DataTables();
        
    }
    
    public function index()
    {
        $data['page'] = 'NILAI EKSTRAKULIKULER';
        return view('content/ekskul/nilai_ekskul',$data);
    }
    public function get_data_nilai_ekskul(){
        $query = "SELECT a.*,b.nis,b.nama,c.kelas,d.nama_ekskul FROM  ekskul a
                 LEFT JOIN siswa b ON b.id_siswa = a.id_siswa
                 LEFT JOIN kelas c ON c. id_kelas = a.id_kelas
                 LEFT JOIN setup_ekskul d ON d.id_ekskul = a.id_ekskul";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  =  array('d.id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('nama_ekskul','nama','kelas');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
}
