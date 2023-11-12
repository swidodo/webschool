<?php

namespace App\Controllers;
use App\Models\SekolahModel;
class Home extends BaseController
{
    protected $sekolah;
    public function __construct(){
        $this->sekolah =  new SekolahModel();
    }
    public function index(): string
    {
        $session = \Config\Services::session();
      
        $data['page'] = 'Dashboard';
        $data['sekolah'] = $this->sekolah->get_sekolah(user()->id_sekolah);
        $session->set('sekolah', $data['sekolah']->nama_sekolah);
        return view('content/dashboard/index',$data);
    }
}
