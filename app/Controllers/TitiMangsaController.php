<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SetupWaktuModel;
use App\Models\TahunModel;
use App\Libraries\DataTables;
use CodeIgniter\Database\Exceptions\DatabaseException;

class TitiMangsaController extends BaseController
{
    protected $guru;
    public function __construct(){
        $this->titimangsa  = new SetupWaktuModel();
        $this->tahun       = new TahunModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA TITI MANGSA';
        return view('content/titi_mangsa/index',$data);
    }
    public function get_data_titi_mangsa(){
        $query = "select * from setup_waktu ";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  =  array('id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('tahun_pelajaran');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function create(){
        $data['tahun'] = $this->tahun->findAll();
        return $this->response->setJSON($data);
    }
    public function store(){
        $data = [
            'tahun_pelajaran'       => $this->request->getVar('tahun_pelajaran'),
            'tgl_raport_uts_ganjil' => $this->request->getVar('tm_uts_ganjil'),
            'tgl_raport_uas_ganjil' => $this->request->getVar('tm_pas_ganjil'),
            'tgl_raport_uts_genap'  => $this->request->getVar('tm_uts_genap'),
            'tgl_raport_uas_genap'  => $this->request->getVar('tm_pas_genap'),
            'id_sekolah'            => user()->id_sekolah,
        ];
        $save = $this->titimangsa->insert($data);
        if ($save){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data berhasil disimpan !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data gagal disimpan !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $id = $this->request->getVar('id');
        $data['tm']     = $this->titimangsa->find($id);
        $data['tahun']  = $this->tahun->findAll();

        return $this->response->setJSON($data);
    }
    public function update(){
        $id = $this->request->getVar('id');
        $data = [
            'tgl_raport_uts_ganjil' => $this->request->getVar('tm_uts_ganjil'),
            'tgl_raport_uas_ganjil' => $this->request->getVar('tm_pas_ganjil'),
            'tgl_raport_uts_genap'  => $this->request->getVar('tm_uts_genap'),
            'tgl_raport_uas_genap'  => $this->request->getVar('tm_pas_genap'),
        ];

        $updateData = $this->titimangsa->update($id,$data);
        if ($updateData){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data berhasil diupdate !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data gagal diupdate !',
            ];
        }
        return $this->response->setJSON($res);

    }
    public function destroy(){
        $id  = $this->request->getVar('id');
        $del = $this->titimangsa->delete($id);
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
