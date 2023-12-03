<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DataTables;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\PelajaranModel;
use App\Models\SiswaModel;
class AsesmenController extends BaseController
{
    protected $mapel;
    protected $guru;
    protected $kelas;
    protected $siswa;
    protected $DataTables;
    public function __construct(){
        $this->mapel       = new PelajaranModel();
        $this->guru       = new GuruModel();
        $this->kelas       = new KelasModel();
        $this->siswa       = new SiswaModel();
        $this->DataTables = new DataTables();
       
    }
    public function index()
    {
        $data['page'] ='Asesmen';
        return view('content/asesmen/index',$data);
    }
    public function get_data(){
        if (in_groups('Guru') || in_groups('guru') || in_groups('Wali Kelas') || in_groups('Wali kelas') || in_groups('wali kelas')) :
            $idguru = $this->guru->where('user_id',user()->id)->first();
            if ($idguru !=null){
                $id_guru = $idguru['id_guru'];
            }else{
                $id_guru = null;
            }
            $query = "SELECT * FROM tbl_jadwal a 
                      LEFT JOIN data_guru b
                      ON a.id_guru = b.id_guru
                      LEFT JOIN setup_pelajaran c 
                      ON c.id_pelajaran = a.id_pelajaran
                      LEFT JOIN kelas as d
                      ON d.id_kelas = a.id_kelas";
            $where  = array('b.id_sekolah' => user()->id_sekolah,'b.id_guru' => $id_guru,'a.status_jadwal' => 'Y'); 
            $isWhere = 'b.id_guru IS NOT NULL';
            $search = array('nama_guru,nama_pelajaran,kelas');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        else:
            $query = "SELECT a.*,
                            b.nama_guru,
                            c.nama_pelajaran,
                            d.kelas 
                            FROM tbl_jadwal a 
                        LEFT JOIN data_guru b
                        ON a.id_guru = b.id_guru
                        LEFT JOIN setup_pelajaran c 
                        ON c.id_pelajaran = a.id_pelajaran
                        LEFT JOIN kelas d
                        ON d.id_kelas = a.id_kelas";
            $where  = array('b.id_sekolah' => user()->id_sekolah,'a.status_jadwal' => 'Y'); 
            $isWhere = null;
            $search = array('nama_guru','kelas','nama_pelajaran');
            echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        endif;
    }
    public function get_setNilai_sumatif(){
        $id_guru        = $this->request->getVar('idg');
        $id_pelajaran   = $this->request->getVar('idm');
        $id_kelas       = $this->request->getVar('idk');
        $type           = $this->request->getVar('type');

        $data['page']  = 'Sumatif Harian';
        $data['siswa'] = $this->siswa->get_siswaBykelas($id_kelas,$id_pelajaran,user()->id_sekolah);
        $data['guru']  = $this->guru->where('id_guru',$id_guru)->where('id_sekolah',user()->id_sekolah)->first();
        $data['mapel'] = $this->mapel->where('id_pelajaran',$id_pelajaran)->where('id_sekolah',user()->id_sekolah)->first();
        $data['kelas'] = $this->kelas->where('id_kelas',$id_kelas)->where('id_sekolah',user()->id_sekolah)->first();
        if($type == "harian") :
            return view('content/asesmen/input_nilai_sumatif',$data);
        elseif($type == "akhir") :
            return view('content/asesmen/input_nilai_sumatif_akhir',$data);
        elseif($type == "rapor") :
            return view('content/asesmen/raport',$data);
        endif;
    }
}
