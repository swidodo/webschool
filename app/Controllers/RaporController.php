<?php

namespace App\Controllers;
use App\Libraries\DataTables;
use App\Models\KelasModel;
use App\Controllers\BaseController;

class RaporController extends BaseController
{
    protected $DataTables;
    protected $kelas;
    public function __construct(){
        $this->kelas = new KelasModel();
       $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'Data Raport';
        return view('content/rapor/index',$data);
    }
    public function get_data_rapor(){
        $query = "SELECT DISTINCT a.id_kelas,
                        a.kelas,
                        b.id,
                        b.tahun_pelajaran,
                        b.semester
                        FROM kelas a LEFT JOIN sekolah b ON a.id_sekolah = b.id 
                        LEFT JOIN siswa c ON c.kelas_aktif = a.id_kelas ";
        $where  =  array('a.id_sekolah' => user()->id_sekolah); 
        // jika memakai IS NULL pada where sql
         $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        $search = array('kelas');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function get_data_kelas(){
        $type = $this->request->getVar('type');
        $idkelas = $this->request->getVar('kelas');
        $tahun = $this->request->getVar('tahun');
        $semester = $this->request->getVar('smt');
        $data['data'] = $this->kelas->select('kelas.kelas,siswa.*, sekolah.*')
                    ->join('sekolah','sekolah.id = kelas.id_sekolah','left')
                    ->join('siswa','siswa.kelas_aktif = kelas.id_kelas','left')
                    ->where('kelas.id_sekolah',user()->id_sekolah)
                    ->where('kelas.id_kelas',$idkelas)
                    ->where('sekolah.tahun_pelajaran',$tahun)
                    ->where('sekolah.semester',$semester)
                    ->get()->getResult();
        if($type == 'cover'){
            return view('content/rapor/cover_rapor',$data);
        }else if($type == 'identitas'){
            return view('content/rapor/identitas_sekolah',$data);
        }else if($type == 'siswa'){
            return view('content/rapor/cetak_biodata_all',$data);
        }
        
    }
}
