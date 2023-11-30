<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
	protected $siswa, $kelas;
    public function __construct()
	{
		parent::__construct();
		$this->db      = \Config\Database::connect();
	    $this->siswa    = $this->db->table('siswa');
	    $this->kelas    = $this->db->table('kelas');
	}
	public function get_kelas_bySekolah($id_sekolah){
		return $this->kelas->select('id_kelas,kelas')->where('id_sekolah',$id_sekolah)->get()->getResult();
	}
	public function insert_siswa($data){
		return $this->siswa->insert($data);
	}
	public function get_byId($id){
		return $this->siswa->where('id_siswa',$id)->get()->getRow();
	}
	public function delete_siswa($id){
		return $this->siswa->where('id_siswa',$id)->delete();
	}
	public function update_siswa($id,$input){
		$data = [
            'nama'              => $input['nama_siswa'],
            'nis'               => $input['nis'],
            'nisn'              => $input['nisn'],
            'tempat_lahir'      => $input['tempat_lahir'],
            'tgl_lahir'         => $input['tgl_lahir'],
            'jk'                => $input['jk'],
            'agama'             => $input['agama'],
            'anak_ke'           => $input['anak_ke'],
            'status_dlm_kel'    => $input['status_dlm_kel'],
            'alamat'            => $input['alamat_siswa'],
            'hp'                => $input['no_hp_siswa'],
            'id_kelas'          => $input['id_kelas'],
            'tanggal_diterima'  => $input['tanggal_diterima'],
            'nama_sekolah'      => $input['sekolah_asal'],
            'nama_ayah'         => $input['nama_ayah'],
            'nama_ibu'          => $input['nama_ibu'],
            'hp_ortu'           => $input['no_hp_orang_tua'],
            'kerja_ayah'        => $input['kerja_ayah'],
            'kerja_ibu'         => $input['kerja_ibu'],
            'kerja_ibu'         => $input['kerja_ibu'],
            'alamat_ortu'       => $input['alamat_orang_tua'],
            'nama_wali'         => $input['nama_wali'],
            'alamat_wali'       => $input['alamat_wali'],
            'hp_wali'           => $input['no_hp_wali'],
            'kerja_wali'        => $input['kerja_wali'],
            'status'            => $input['status'],
            'tingkat_diterima'  => $input['tingkat_diterima'],
        ];
		$this->siswa->where('id_siswa',$id);
		return $this->siswa->update($data);
	}
    public function cetak($id){
        return $this->siswa->select('siswa.*,sekolah.*, kelas.kelas')
                            ->join('sekolah','sekolah.id=siswa.id_sekolah','left')
                            ->join('kelas','kelas.id_kelas=siswa.kelas_aktif','left')
                            ->where('siswa.id_siswa',$id)
                            ->get()->getRow();
    }

}
