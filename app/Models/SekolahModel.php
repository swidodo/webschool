<?php

namespace App\Models;

use CodeIgniter\Model;

class SekolahModel extends Model
{
    public function __construct()
	{
		parent::__construct();
		$this->db      = \Config\Database::connect();
	    $this->sekolah    = $this->db->table('sekolah');
	}
    public function get_sekolah($id){
        return $this->sekolah->select('sekolah.*')->join('users','users.id_sekolah=sekolah.id','left')->where('sekolah.id',$id)->get()->getRow();
    }
    public function save_data($data){
        return $this->sekolah->insert($data);
    }
    public function edit_data($id){
        return $this->sekolah->Select('*')->where('id',$id)->get()->getRow();
    }
}
