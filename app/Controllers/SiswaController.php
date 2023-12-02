<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Libraries\DataTables;

class SiswaController extends BaseController
{
    protected $siswa;
    protected $guru;
    protected $DataTables;
    public function __construct(){
        $this->siswa = new SiswaModel();
        $this->guru       = new GuruModel();
        $this->DataTables = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA SISWA';
        return  view('content/siswa/index', $data);
    }
    public function get_data_siswa(){
        if (in_groups('Guru') || in_groups('guru') || in_groups('Wali Kelas') || in_groups('Wali kelas') || in_groups('wali kelas')):
            $idguru = $this->guru->where('user_id',user()->id)->first();
            if ($idguru !=null){
                $id_guru = $idguru['id_guru'];
            }else{
                $id_guru = null;
            }
            // dd(user()->id_sekolah);
            $query = "SELECT DISTINCT a.*,b.kelas,b.fase from siswa a 
                      left join kelas b on b.id_kelas=a.kelas_aktif
                      LEFT JOIN tbl_jadwal c
                      ON c.id_kelas=b.id_kelas
                      LEFT JOIN data_guru d 
                      ON d.id_guru=c.id_guru";
            $where  = array('a.id_sekolah' => user()->id_sekolah,'d.id_guru' => $id_guru);
            $isWhere = null;
            $search = array('a.nama');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        else :
            $query = "SELECT a.*,b.kelas,b.fase from siswa a 
                        left join kelas b on b.id_kelas=a.id_kelas";
            $where  = array('a.id_sekolah' => user()->id_sekolah);
            $isWhere = null;
            $search = array('a.nama');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        endif;
    }
    public function create_siswa(){
        $id_sekolah     = user()->id_sekolah;
        $data['kelas']  = $this->siswa->get_kelas_bySekolah($id_sekolah);
        return $this->response->setJSON($data);
    }
    public function save_data_siswa(){
         $data = [
            'nama'              => $this->request->getPost('nama_siswa'),
            'nis'               => $this->request->getPost('nis'),
            'nisn'              => $this->request->getPost('nisn'),
            'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'         => $this->request->getPost('tgl_lahir'),
            'jk'                => $this->request->getPost('jk'),
            'agama'             => $this->request->getPost('agama'),
            'anak_ke'           => $this->request->getPost('anak_ke'),
            'status_dlm_kel'    => $this->request->getPost('status_dlm_kel'),
            'alamat'            => $this->request->getPost('alamat_siswa'),
            'hp'                => $this->request->getPost('no_hp_siswa'),
            'id_kelas'          => $this->request->getPost('id_kelas'),
            'tanggal_diterima'  => $this->request->getPost('tanggal_diterima'),
            'nama_sekolah'      => $this->request->getPost('sekolah_asal'),
            'nama_ayah'         => $this->request->getPost('nama_ayah'),
            'nama_ibu'          => $this->request->getPost('nama_ibu'),
            'hp_ortu'           => $this->request->getPost('no_hp_orang_tua'),
            'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
            'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
            'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
            'alamat_ortu'       => $this->request->getPost('alamat_orang_tua'),
            'nama_wali'         => $this->request->getPost('nama_wali'),
            'alamat_wali'       => $this->request->getPost('alamat_wali'),
            'hp_wali'           => $this->request->getPost('no_hp_wali'),
            'kerja_wali'        => $this->request->getPost('kerja_wali'),
            'status'            => $this->request->getPost('status'),
            'tingkat_diterima'  => $this->request->getPost('tingkat_diterima'),
            'id_sekolah'        => user()->id_sekolah,
        ];
        $save = $this->siswa->insert_siswa($data);
        if ($save){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data siwa berhasil disimpan !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data siswa gagal disimpan !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit_data_siswa(){
        $id             = $this->request->getPost('id');
        $id_sekolah     = user()->id_sekolah;
        $data['data']   = $this->siswa->get_byId($id);
        $data['kelas']  = $this->siswa->get_kelas_bySekolah($id_sekolah);
        return $this->response->setJSON($data);
    }
    public function update_data_siswa(){
        $id = $this->request->getPost('id_kelas');
        $input = $this->request->getPost();
        
        $update = $this->siswa->update_siswa($id,$input);
        if ($update){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data siwa berhasil diupdate !',
               ];
               
          } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data siswa gagal diupdate !',
               ];
          }
          return $this->response->setJSON($res);
        
    }
    public function delete_siswa(){
        $id = $this->request->getPost('id');
        $del = $this->siswa->delete_siswa($id);
        if ($del){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data siwa berhasil didelete !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data siswa gagal didelete !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function cetak_siswa(){
        $id = $this->request->getVar('id');
        $data['siswa'] = $this->siswa->cetak($id);
        // dd($data['siswa']);
        return view('content/siswa/cetak_siswa',$data);
    }
}
