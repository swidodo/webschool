<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\GuruModel;
use App\Libraries\DataTables;
class KelasController extends BaseController
{
    protected $kelas;
    protected $guru;
    protected $DataTables;
    public function __construct(){
        $this->kelas = new KelasModel();
        $this->guru       = new GuruModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA KELAS';
        return  view('content/kelas/index',$data);
    }
    public function get_data_kelas(){
        if (in_groups('Guru') || in_groups('guru') || in_groups('Wali Kelas') || in_groups('Wali kelas') || in_groups('wali kelas')) :
            $idguru = $this->guru->where('user_id',user()->id)->first();
            if ($idguru !=null){
                $id_guru = $idguru['id_guru'];
            }else{
                $id_guru = null;
            }
            $query = "SELECT * FROM kelas a 
                      LEFT JOIN tbl_jadwal b
                      ON a.id_kelas=b.id_kelas
                      LEFT JOIN data_guru c 
                      ON c.id_guru=b.id_guru";
            $where  = array('a.id_sekolah' => user()->id_sekolah,'c.id_guru' => $id_guru); 
            $isWhere = 'c.id_guru IS NOT NULL';
            $search = array('kelas');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        else:
            $query = "select * from kelas ";
            $where  = array('id_sekolah' => user()->id_sekolah); 
            $isWhere = null;
            $search = array('kelas');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        endif;
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
