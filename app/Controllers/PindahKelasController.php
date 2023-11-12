<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PindahKelasModel;
use App\Libraries\DataTables;

class PindahKelasController extends BaseController
{
    protected $pindah;
    public function __construct(){
        $this->pindah = new PindahKelasModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'Pindah Kelas';
        return  view('content/pindah_kelas/index',$data);
    }
    public function get_data_pindah_kelas(){
        $query = "select * from naik_kelas a 
                  LEFT JOIN siswa b 
                  ON b.id_siswa = a.id_siswa
                  LEFT JOIN kelas c
                  ON c.id_kelas = a.id_kelas";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  = null; 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('c.kelas');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        
    }
    public function destroy(){
        $id  = $this->request->getVar('id_naik_kelas');
        $del = $this->pindah->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data telah di delete!'
            ];
        }else{
            $res = [
                'status' => 'success',
                'msg'    => 'Data gagal di delete!'
            ];
        }
        return $this->response->setJSON($res);
    }
}
