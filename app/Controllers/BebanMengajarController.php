<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DataTables;
use App\Models\BebanMengajarModel;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\PelajaranModel;

class BebanMengajarController extends BaseController
{
    protected $eskul;
    public function __construct(){
        $this->beban       = new BebanMengajarModel();
        $this->mapel       = new PelajaranModel();
        $this->guru       = new GuruModel();
        $this->kelas       = new KelasModel();
        $this->DataTables = new DataTables();
       
    }
    public function index()
    {
        $data['page'] = 'BEBAN MENGAJAR';
        return view('content/beban_mengajar/index',$data);
    }
    public function get_data_beban(){
        $query = "SELECT a.*,b.nama_guru,c.nama_pelajaran,d.kelas from tbl_jadwal a
                  LEFT JOIN data_guru b ON b.id_guru = a.id_guru
                  LEFT JOIN setup_pelajaran c ON c.id_pelajaran = a.id_pelajaran
                  LEFT JOIN kelas d ON d.id_kelas = a.id_kelas ";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  =  array('b.id_sekolah' => user()->id_sekolah); 
         $where  =  array('d.id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('nama_pelajaran','nama_guru');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        
    }
    public function create(){
        $data['mapel'] = $this->mapel->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['guru'] = $this->guru->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['kelas'] = $this->kelas->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        return $this->response->setJSON($data);
    }
    public function store(){
        $data = [
            'id_pelajaran'  => $this->request->getVar('id_pelajaran'),
            'id_guru'       => $this->request->getVar('id_guru'),
            'id_kelas'      => $this->request->getVar('id_kelas'),
            'status'        => $this->request->getVar('status'),
        ];
        $save = $this->beban->insert($data);
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
        $id             = $this->request->getVar('id');
        $data['mapel']  = $this->mapel->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['guru']   = $this->guru->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['kelas']  = $this->kelas->where('id_sekolah',user()->id_sekolah)->get()->getResult();
        $data['beban']  = $this->beban->where('id_jadwal',$id)->first();
        return $this->response->setJSON($data);
    }
    public function update(){
        $id  = $this->request->getVar('id');
        $data = [
            'id_pelajaran'  => $this->request->getVar('id_pelajaran'),
            'id_guru'       => $this->request->getVar('id_guru'),
            'id_kelas'      => $this->request->getVar('id_kelas'),
            'status_jadwal' => $this->request->getVar('status'),
        ];
        $update = $this->beban->update($id,$data);
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
        $id = $this->request->getVar('id');
        $del = $this->beban->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil didelete!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal didelete !'
            ];
        }
        return $this->response->setJSON($res);
    }
}
