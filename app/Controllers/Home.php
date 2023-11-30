<?php

namespace App\Controllers;
use App\Models\SekolahModel;
class Home extends BaseController
{
    protected $sekolah;
    public function __construct(){
        $this->sekolah =  new SekolahModel();
    }
    public function index()
    {
        $session = \Config\Services::session();
        
        $data['page'] = 'Dashboard';
        $data['sekolah'] = $this->sekolah->where('id',user()->id_sekolah)->first();
        if($data['sekolah'] == null){
            $session->set('error', 'Sekolah tidak terdaftar!');
            return redirect('logout');
        }else{
            dd();
            if($data['sekolah']['aktif'] == 'N'){
                return redirect('logout');
            }else{
                $session->set('sekolah', $data['sekolah']['nama_sekolah']);
                return view('content/dashboard/index',$data);
            }
        }
    }
}
