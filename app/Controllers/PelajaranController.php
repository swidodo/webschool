<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelajaranModel;
use App\Models\CapaianPembelajaranModel;
use App\Models\TujuanPembelajaranModel;
use App\Libraries\DataTables;
use App\Models\GuruModel;

class PelajaranController extends BaseController
{
    protected $guru;
    protected $mapel;
    protected $capaian;
    protected $tujuan;
    protected $DataTables;
    public function __construct(){
        $this->guru         = new GuruModel();
        $this->mapel        = new PelajaranModel();
        $this->capaian      = new CapaianPembelajaranModel();
        $this->tujuan       = new TujuanPembelajaranModel();
        $this->DataTables   = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA PELAJARAN';
        return  view('content/mapel/index',$data);
    }
    public function get_data_mapel(){
        if (in_groups('Guru') || in_groups('guru') || in_groups('Wali Kelas') || in_groups('Wali kelas') || in_groups('wali kelas')):
            $idguru = $this->guru->where('user_id',user()->id)->first();
            if ($idguru !=null){
                $id_guru = $idguru['id_guru'];
            }else{
                $id_guru = null;
            }
            $query = "SELECT * FROM setup_pelajaran a
                      LEFT JOIN tbl_jadwal b
                      ON b.id_pelajaran = a.id_pelajaran
                      LEFT JOIN data_guru c
                      ON c.id_guru = b.id_guru";
            $where  = array('a.id_sekolah'=> user()->id_sekolah,'c.id_guru'=>$id_guru); 
            $isWhere = null;
            $search = array('nama_pelajaran');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        else :
            $query = "select * from setup_pelajaran";
            $where  = array('id_sekolah'=> user()->id_sekolah); 
            $isWhere = null;
            $search = array('nama_pelajaran');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        endif;        
    }
    public function store(){
        $data = [
            'nama_pelajaran' => $this->request->getVar('pelajaran'),
            'urutan'         => $this->request->getVar('urutan'),
            'id_sekolah'     => user()->id_sekolah,
        ];
        $insert = $this->mapel->insert($data);
        if ($insert){
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
        $data = $this->mapel->find($this->request->getVar('id'));
        return $this->response->setJSON($data);
    }
    public function update(){
        $id = $this->request->getVar('id');
        $data = [
            'nama_pelajaran' => $this->request->getVar('pelajaran'),
            'urutan' => $this->request->getVar('urutan'),
        ];
        $update = $this->mapel->update($id, $data);
        if ($update){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil di update!'
            ];
        }else{
            $res = [
                'status' => 'success',
                'msg'    => 'Data gagal di update!'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function destroy(){
        $id  = $this->request->getVar('id');
        $del = $this->mapel->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil dihapus!'
            ];
        }else{
            $res = [
                'status' => 'success',
                'msg'    => 'Data gagal di hapus!'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function capaian_pembelajaran($id){
        $data['page'] = 'CAPAIAN PEMBELAJARAN';
        $data['capaian'] = $this->mapel->join('capaian_pembelajaran','capaian_pembelajaran.id_cp=setup_pelajaran.id_pelajaran','left')
                                        ->where('setup_pelajaran.id_pelajaran',$id)
                                        ->get()->getResult();
        $data['id_pelajaran'] =$id;
        return view('content/mapel/capaian_pembelajaran',$data);
    }
    public function get_capaian_pembelajaran(){
        $id = $this->request->getVar('id');
        $query = "select * from capaian_pembelajaran a 
                left join setup_pelajaran b 
                ON a.id_pelajaran= b.id_pelajaran";
        // $where  = array('nama_kategori' => 'Tutorial');
        $where  = array('a.id_pelajaran' => "$id"); 
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        $search = array('elemen','capaian_pembelajaran');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function store_capaian_pembelajaran(){
        $data = [
            'elemen'                => $this->request->getVar('elemen'),
            'capaian_pembelajaran'  => $this->request->getVar('capaian'),
            'id_pelajaran'          => $this->request->getVar('id_pelajaran'),
        ];

        $insert = $this->capaian->insert($data);
        if ($insert){
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
    public function edit_capaian_pembelajaran(){
        $id     = $this->request->getVar('id');
        $data   = $this->capaian->find($id);
        return $this->response->setJSON($data);
    }
    public function update_capaian_pembelajaran(){
        $id = $this->request->getVar('id');
        $data = [
            'elemen'                => $this->request->getVar('elemen'),
            'capaian_pembelajaran'  => $this->request->getVar('capaian'),
        ];

        $update = $this->capaian->update($id,$data);
        if ($update){
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
    public function destroy_capaian_pembelajaran(){
        $id = $this->request->getVar('id');
        $del = $this->capaian->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil dihapus!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal dihapus !'
            ];
        }
        return $this->response->setJSON($res);
    }
    public function tujuan_pembelajaran(){
        $idpel = $this->request->getVar('idpel');
        $id = $this->request->getVar('id');
        $data['page']       = "TUJUAN PEMBELAJARAN";
        $data['pelajaran']  = $this->mapel->find($idpel);
        $data['capaian']    = $this->capaian->find($id);
        return view('content/mapel/tujuan_pembelajaran',$data);
    }
    public function get_tujuan_pembelajaran(){
        $idcp = $this->request->getVar('id_cp');
        $idpel = $this->request->getVar('id_pel');
        $query = "select a.* from tujuan_pembelajaran a 
                left join capaian_pembelajaran b 
                ON a.id_cp= b.id_cp
                left join setup_pelajaran c
                ON c.id_pelajaran = a.id_pelajaran";
        // $where  = array('nama_kategori' => 'Tutorial');
        $where  = array('a.id_cp' => "$idcp"); 
        $where  = array('a.id_pelajaran' => "$idpel"); 
        // jika memakai IS NULL pada where sql
        $isWhere = null;
        // $isWhere = 'artikel.deleted_at IS NULL';
        $search = array('a.tp_ke','a.kode_tp','a.tujuan_pembelajaran','a.materi');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function store_tujuan_pembelajaran(){
        $check = $this->tujuan->where('tp_ke',$this->request->getVar('tp_ke'))
                              ->where('kode_tp',$this->request->getVar('kode_tp'))
                              ->get()->getNumRows();
        if($check > 0){
            $res = [
                'status' => 'info',
                'msg'    => 'Data TP ke dan Kode TP sudah ada!'
            ];
            return $this->response->setJSON($res);
        }
        $data = [
            'tp_ke' => $this->request->getVar('tp_ke'),
            'kode_tp' => $this->request->getVar('kode_tp'),
            'tujuan_pembelajaran' => $this->request->getVar('tujuan_pembelajaran'),
            'materi' => $this->request->getVar('materi'),
            'id_cp' => $this->request->getVar('id_cp'),
            'id_pelajaran' => $this->request->getVar('id_pelajaran'),
        ];
        $insert = $this->tujuan->insert($data);
        if ($insert){
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
    public function edit_tujuan_pembelajaran(){
        $id = $this->request->getvar('id_tp');
        $data = $this->tujuan->find($id);
        return $this->response->setJSON($data);
    }
    public function update_tujuan_pembelajaran(){
        $id = $this->request->getvar('id');
        $data = [
            'tp_ke' => $this->request->getVar('tp_ke'),
            'kode_tp' => $this->request->getVar('kode_tp'),
            'tujuan_pembelajaran' => $this->request->getVar('tujuan_pembelajaran'),
            'materi' => $this->request->getVar('materi'),
        ];
        
        $update = $this->tujuan->update($id,$data);
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
    public function delete_tujuan_pembelajaran(){
        $id = $this->request->getVar('id');
        $del = $this->tujuan->delete($id);
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
