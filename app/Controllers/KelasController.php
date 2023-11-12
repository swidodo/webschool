<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Libraries\DataTables;
class KelasController extends BaseController
{
    protected $kelas;
    public function __construct(){
        $this->kelas = new KelasModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA KELAS';
        return  view('content/kelas/index',$data);
    }
    public function get_data_kelas(){
        $query = "select * from kelas ";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  = array('id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('kelas');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        
    }
    public function store(){
        $check =$this->kelas->where('kelas',$this->request->getVar('kelas'))->first();
        if ($check != null){
            $res = [
                'status'    => 'info',
                'msg'       => 'Nama kelas sudah ada !',
            ];
            return $this->response->setJSON($res);
        }
        $data = [
            'kelas'         => $this->request->getVar('kelas'),
            'fase'          => $this->request->getVar('fase'),
            'id_sekolah'    => user()->id_sekolah,
        
        ];
        $save = $this->kelas->insert($data);
        if ($save){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data kelas berhasil disimpan !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data kelas gagal disimpan !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $data =$this->kelas->where('id_kelas',$this->request->getVar('id'))->first();
        return $this->response->setJSON($data);
    }
    public function update(){
        $id  = $this->request->getVar('id_kelas');
        $data = [
            'kelas'         => $this->request->getVar('kelas'),
            'fase'          => $this->request->getVar('fase'),
        ];
        $update = $this->kelas->update($id, $data);
        if ($update){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data kelas berhasil diupdate !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data kelas gagal diupdate !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function destroy(){
        $id  = $this->request->getVar('id');
        $del = $this->kelas->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data kelas telah di delete!'
            ];
        }else{
            $res = [
                'status' => 'success',
                'msg'    => 'Data kelas gagal di delete!'
            ];
        }
        return $this->response->setJSON($res);
    }
}
