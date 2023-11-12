<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Libraries\DataTables;

class SekolahController extends BaseController
{
    protected $sekolah;
    public function __construct(){
        $this->sekolah = new SekolahModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'Data Sekolah';
        return view('content/sekolah/index',$data);
    }
    public function get_data_sekolah(){
        
        // $data['sekolah']    = $this->sekolah->get_sekolah();
        $query = "SELECT * from sekolah";
        // $where  = array('nama_kategori' => 'Tutorial');
        $where  = null; 
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        $search = array('nama_sekolah');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function save_data(){

       $data =[
        'nama_sekolah'  => $this->request->getPost('nama_sekolah'),
        'alamat'        => $this->request->getPost('alamat'),
        'status'        => $this->request->getPost('status'),
        'is_active'     => $this->request->getPost('is_active')
       ];
      if($this->sekolah->save_data($data)){
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
        $data = $this->sekolah->edit_data($id);
        return $this->response->setJSON($data);
    }
}
