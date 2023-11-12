<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WalikelasModel;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\TahunModel;
use App\Libraries\DataTables;

class WalikelasController extends BaseController
{
    protected $walas;
    public function __construct(){
        $this->walas = new WalikelasModel();
        $this->kelas = new KelasModel();
        $this->guru  = new GuruModel();
        $this->tahun  = new TahunModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA WALI KELAS';
        return  view('content/wali_kelas/index',$data);
    }
    public function get_data_walas(){
        $query = "select a.*, b.id_sekolah,b.nama_guru,c.kelas
                from walas a 
                left join data_guru b 
                on a.id_guru = b.id_guru 
                left join kelas c 
                on c.id_kelas = a.id_kelas";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  = array('b.id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('b.nama_guru');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function create(){
        $data['kelas']  = $this->kelas->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['guru']   = $this->guru->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['tahun'] = $this->tahun->findAll();
        return $this->response->setJSON($data);
    }
    public function store(){
        $check = $this->walas->where('id_kelas',$this->request->getVar('kelas'))->get()->getNumRows();
        if($check > 0 ){
            $res = [
                'status' => 'info',
                'msg'    => 'Kelas sudah ada!, Silahkan update data wali kelas.'
            ];
            return $this->response->setJSON($res);
        }
        $data =[
            'id_kelas'          => $this->request->getVar('kelas'),
            'id_guru'           => $this->request->getVar('nama_guru'),
            'tahun_pelajaran'   => $this->request->getVar('tahun_pelajaran'),
        ];
        $insert = $this->walas->insert($data);
        if($insert){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil di simpan!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal di simpan!'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $id = $this->request->getVar('id');
        $data['walas']  = $this->walas->find($id);
        $data['kelas']  = $this->kelas->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['guru']   = $this->guru->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['tahun'] = $this->tahun->findAll();
        return $this->response->setJSON($data);
    }
    public function update(){
        $id  = $this->request->getVar('id');
        $data =[
            'id_guru'           => $this->request->getVar('nama_guru'),
            'tahun_pelajaran'   => $this->request->getVar('tahun_pelajaran'),
        ];
        $update = $this->walas->update($id,$data);
        if($update){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil di update!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal di update!'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function destroy(){
        $del =$this->walas->delete($this->request->getVar('id'));
        if($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil di delete!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal di delete!'
            ];
        }
        return $this->response->setJSON($res);

    }
}
