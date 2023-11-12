<?php

namespace App\Controllers;
use App\Models\EkskulModel;
use App\Libraries\DataTables;

use App\Controllers\BaseController;

class EkskulController extends BaseController
{
    protected $eskul;
    public function __construct(){
        $this->ekskul       = new EkskulModel();
        $this->DataTables = new DataTables();
       
    }
    public function index()
    {
        $data['page'] =' EKSTRAKULIKULER';
        return view('content/ekskul/index',$data);
    }
    public function get_data_ekskul(){
        $query = "select * from setup_ekskul";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  =  array('id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('nama_ekskul');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        
    }
    public function store(){
        $data = [
            'nama_ekskul' => $this->request->getVar('ekskul'),
            'id_sekolah'       => user()->id_sekolah,
        ];
        $save = $this->ekskul->insert($data);
        if ($save){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil disimpan!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal disimpan !'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $id =$this->request->getVar('id');
        $data = $this->ekskul->find($id);
        return $this->response->setJSON($data);
    }
    public function update(){
        $id =$this->request->getVar('id');
        $data = [
            'nama_ekskul' => $this->request->getVar('ekskul'),
        ];
        $update = $this->ekskul->update($id,$data);
        if ($update){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil diupdate!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal diupdate !'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function destroy(){
        $id  = $this->request->getVar('id');
        $del = $this->ekskul->delete($id);
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
