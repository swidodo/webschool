<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Models\TahunModel;
use App\Libraries\DataTables;

class SekolahController extends BaseController
{
    protected $sekolah;
    public function __construct(){
        $this->sekolah      = new SekolahModel();
        $this->tahun        = new TahunModel();
        $this->DataTables   = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'Data Sekolah';
        return view('content/sekolah/index',$data);
    }
    public function get_data_sekolah(){
        if (user()->initial == 'superadmin'){
            $query = "SELECT * from sekolah";
            $where  = null; 
        }else{
            $query = "SELECT * from sekolah";
            $where  = array('id'=>user()->id_sekolah); 
        }
        $isWhere = null;
        $search = array('nama_sekolah');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function save_data(){
        
        $file = $this->request->getFile('logo');
        $ext  = $file->getClientExtension();
        $newName = $file->getRandomName();
        if($ext != "") :
            if($ext =="png" || $ext =="jpg" || $ext =="jpeg" || $ext =="webp" || $ext =="svg") :
                if ($file->isValid() && ! $file->hasMoved()) :
                    $file->move(WRITEPATH . 'uploads/logo', $newName);
                endif;
            endif;
        endif;
        $urlFile = 'uploads/logo/'.$newName;
        $data =[
            'nama_sekolah'      => $this->request->getVar('nama_sekolah'),
            'alamat_sekolah'    => $this->request->getVar('alamat_sekolah'),
            'kepala_sekolah'    => $this->request->getVar('kepala_sekolah'),
            'nip_kepsek'        => $this->request->getVar('nip'),
            'tahun_pelajaran'   => $this->request->getVar('tahun_pelajaran'),
            'semester'          => $this->request->getVar('semester'),
            'tgl_biodata'       => $this->request->getVar('tgl_cetak_biodata'),
            'entri_nilai'       => $this->request->getVar('entri_nilai'),
            'telpon'            => $this->request->getVar('telpon'),
            'fax'               => $this->request->getVar('fax'),
            'kode_pos'          => $this->request->getVar('kode_pos'),
            'logo'              => $urlFile,
            'aktif'             => 'Y',
        ];
      if($this->sekolah->insert($data)){
           $res = [
            'status'    => 'success',
            'msg'       => 'Data sekolah berhasil dibuat !',
           ];
           
      } else{
        $res = [
            'status'    => 'error',
            'msg'       => 'Data sekolah gagal dibuat !',
           ];
      }
      return $this->response->setJSON($res);
    }
    public function edit(){
        $id = $this->request->getpost('id');
        $data['sekolah']         = $this->sekolah->find($id);
        $data['tahun_pelajaran'] = $this->tahun->findAll();
        return $this->response->setJSON($data);
    }
    public function update(){
        $file = $this->request->getFile('logo');
        $ext  = $file->getClientExtension();
        $newName = $file->getRandomName();
        if($ext != "") :
            if($ext =="png" || $ext =="jpg" || $ext =="jpeg" || $ext =="webp" || $ext =="svg") :
                if ($file->isValid() && ! $file->hasMoved()) :
                    $file->move(WRITEPATH . 'uploads/logo', $newName);
                endif;
            endif;
        endif;
        $urlFile = 'uploads/logo/'.$newName;
        $data = [
            'tahun_pelajaran'   => $this->request->getVar('tahun_pelajaran'),
            'semester'          => $this->request->getVar('semester'),
            'nama_sekolah'      => $this->request->getvar('nama_sekolah'),
            'alamat_sekolah'    => $this->request->getvar('alamat_sekolah'),
            'kepala_sekolah'    => $this->request->getVar('kepala_sekolah'),
            'nip_kepsek'        => $this->request->getVar('nip'),
            'tgl_biodata'       => $this->request->getVar('tgl_cetak_biodata'),
            'entri_nilai'       => $this->request->getVar('entri_nilai'),
            'telpon'            => $this->request->getVar('telpon'),
            'fax'               => $this->request->getVar('fax'),
            'kode_pos'          => $this->request->getVar('kode_pos'),
            'logo'              => $urlFile,
        ];
        $id = $this->request->getVar('id');
        $update = $this->sekolah->update($id,$data);
        if ($update){
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
    public function get_tahun(){
        $data = $this->tahun->findAll();
        return $this->response->setJSON($data);
    }
}
