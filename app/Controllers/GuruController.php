<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\DataTables;
use App\Models\GuruModel;
use App\Models\PelajaranModel;
use App\Models\AuthGroupModel;
use App\Models\UserModel;
use App\Models\AuthGroupUsers;
use CodeIgniter\Database\Exceptions\DatabaseException;

class GuruController extends BaseController
{
    protected $guru;
    public function __construct(){
        $this->guru       = new GuruModel();
        $this->pelajaran  = new PelajaranModel();
        $this->authgroup  = new AuthGroupModel();
        $this->user       = new UserModel();
        $this->groupuser  = new AuthGroupUsers();
        $this->DataTables = new DataTables();
        $this->db      = \Config\Database::connect();
    }
    public function index()
    {
        $data['page'] = 'DATA GURU';
        return  view('content/guru/index',$data);
    }
    public function get_data_guru(){
        $query = "SELECT a.*,d.name as group_name,b.username as userlog,b.email as emailuser from data_guru a left join users b ON a.user_id = b.id 
        LEFT JOIN auth_groups_users c ON b.id = c.user_id 
        LEFT JOIN auth_groups d ON c.group_id = d.id ";
         // $where  = array('nama_kategori' => 'Tutorial');
         $where  =  array('a.id_sekolah' => user()->id_sekolah); 
         // jika memakai IS NULL pada where sql
         $isWhere = null;
         // $isWhere = 'artikel.deleted_at IS NULL';
         $search = array('nama_guru');
         echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
        
    }
    public function get_pelajaran(){
        $data['mapel']      = $this->pelajaran->orderBy('nama_pelajaran','ASC')->findAll();
        $data['auth_group'] = $this->authgroup->orderBy('name','ASC')->findAll();
        return $this->response->setJSON($data);
    }
    public function store(){
        if(!logged_in()){
            $res = [
                'status' => 'error',
                'msg'    => 'Tidak ada akses!. Sessi Akses berakhir, refresh dan login kembali.'
            ];
            return $this->response->setJSON($res);
        }
        $check = $this->guru->where('nama_guru',$this->request->getVar('nama'))->where('nip',$this->request->getVar('nip'))->get()->getNumRows();
        if ($check > 0 ){
            $res = [
                'status' => 'info',
                'msg'    => 'Data Nama Guru dan NIP sudah ada!'
            ];
            return $this->response->setJSON($res);
        }
        $checkemail = $this->user->where('email',$this->request->getVar('email'))->get()->getNumRows();
        if ($checkemail > 0 ){
            $res = [
                'status' => 'info',
                'msg'    => 'Email sudah ada!'
            ];
            return $this->response->setJSON($res);
        }
        $checkusername = $this->user->where('username',$this->request->getVar('username'))->get()->getNumRows();
        if ($checkusername > 0 ){
            $res = [
                'status' => 'info',
                'msg'    => 'Username sudah ada!'
            ];
            return $this->response->setJSON($res);
        }
        try {
            $this->db->transException(true)->transStart();
                $password = 'userSystem135!';
                $user = [
                    'email'          => $this->request->getVar('email'),
                    'username'       => $this->request->getVar('username'),
                    'password_hash'  => password_hash(base64_encode(hash('sha384',$password, true)), PASSWORD_BCRYPT),
                    'active'         => 1,
                ];
                $userInsert = $this->user->insert($user);

                $groupUser = [
                    'group_id'  => $this->request->getVar('hak_akses'),
                    'user_id'   => $this->user->getInsertID(),
                ];
                $groupInsert = $this->groupuser->insert($groupUser);
                
                $data = ['nama_guru'    => $this->request->getVar('nama'),
                        'id_pelajaran'  => $this->request->getVar('id_pelajaran'),
                        'nip'           => $this->request->getVar('nip'),
                        'jk'            => $this->request->getVar('jk'),
                        'alamat_guru'   => $this->request->getVar('alamat'),
                        'telpon_guru'   => $this->request->getVar('telpon'),
                        'email'         => $this->request->getVar('email'),
                        'status'        => $this->request->getVar('status'),
                        'status_pegawai'=> $this->request->getVar('status_pegawai'),
                        'jabatan'       => $this->request->getVar('jabatan'),
                        'mulai_kerja'   => $this->request->getVar('mulai_kerja'),
                        'id_sekolah'    => user()->id_sekolah,
                        'user_id'       => $this->user->getInsertID(),
                    ];
                $guru = $this->guru->insert($data);
            $this->db->transComplete();
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil di simpan!'
            ];
            return $this->response->setJSON($res);
        }catch (DatabaseException $e) {
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal di simpan!'
            ];
            return $this->response->setJSON($res);
        }        
    }
    public function edit(){
        $id                 = $this->request->getVar('id');
        $data['guru']       = $this->guru->find($id);
        $data['mapel']      = $this->pelajaran->orderBy('nama_pelajaran','ASC')->findAll();
        $data['auth_group'] = $this->authgroup->orderBy('name','ASC')->findAll();
        $data['user']     = $this->user->join('auth_groups_users','auth_groups_users.user_id = users.id','left')->join('auth_groups','auth_groups.id = auth_groups_users.group_id','left')->where('users.id',$data['guru']['user_id'])->first();
        return $this->response->setJSON($data);
    }
    public function update(){
        $checkData = $this->user->find($this->request->getVar('user_id'));
        $dataUsername = $this->user->where("id <>", $checkData['id'])->where('username',$this->request->getVar('username'))->get()->getNumRows();
        $dataEmail = $this->user->where('id <>',$checkData['id'])->where('email',$this->request->getVar('email'))->get()->getNumRows();
        if ($dataUsername > 0){
            $res = [
                'status' => 'info',
                'msg'    => 'Username sudah ada!'
            ];
            return $this->response->setJSON($res);
        }
        if ($dataEmail > 0){
            $res = [
                'status' => 'info',
                'msg'    => 'Email sudah ada!'
            ];
            return $this->response->setJSON($res);
        }
        try {
            $this->db->transException(true)->transStart();
                $id = $this->request->getVar('id_guru');
                $data = ['nama_guru'    => $this->request->getVar('nama'),
                        'id_pelajaran'  => $this->request->getVar('id_pelajaran'),
                        'nip'           => $this->request->getVar('nip'),
                        'jk'            => $this->request->getVar('jk'),
                        'alamat_guru'   => $this->request->getVar('alamat'),
                        'telpon_guru'   => $this->request->getVar('telpon'),
                        'email'         => $this->request->getVar('email'),
                        'status'        => $this->request->getVar('status'),
                        'status_pegawai'=> $this->request->getVar('status_pegawai'),
                        'jabatan'       => $this->request->getVar('jabatan'),
                        'mulai_kerja'   => $this->request->getVar('mulai_kerja'),
                    ];
                
                $this->guru->update($id,$data);
                // if($checkData['email'])
                $dtuser = [
                        'email'     => $this->request->getVar('email'),
                        'username'  => $this->request->getVar('username'),
                ];
                $this->user->update($this->request->getVar('user_id'),$dtuser);

                $dtgroup = [
                    'group_id' => $this->request->getVar('hak_akses'),
                ];
                $this->groupuser->update($this->request->getVar('user_id'),$dtgroup);
            
       
                $this->db->transComplete();
                $res = [
                    'status' => 'success',
                    'msg'    => 'Data berhasil di update!'
                ];
                return $this->response->setJSON($res);
            }catch (DatabaseException $e) {
                $res = [
                    'status' => 'error',
                    'msg'    => 'Data gagal di update!'
                ];
                return $this->response->setJSON($res);
            }        
    }
    public function get_userId(){
        $id = $this->request->getVar('id');
        $data = $this->guru->find($id);
        return $this->response->setJSON($data);
    }
    public function destroy(){
        $id  = $this->request->getVar('id');
        $del = $this->guru->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data telah di delete!'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Data gagal di delete!'
            ];
        }
        return $this->response->setJSON($res);
    }
}
