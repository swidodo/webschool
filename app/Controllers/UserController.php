<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\DataTables;
class UserController extends BaseController
{
    public function __construct(){
        $this->user  = new UserModel();
        $this->DataTables   = new DataTables();
    }
    public function index()
    {
        $data['page'] = 'DATA USER';
        return view('content/auth/user',$data);
    }
    public function get_user(){
        if (user()->initial == 'superadmin'){
            $query = "SELECT a.*, b.nama_guru as nama_lengkap,c.nama_sekolah from users a 
                      LEFT JOIN data_guru b
                      ON b.user_id = a.id
                      LEFT JOIN sekolah c 
                      ON c.id = a.id_sekolah";
            $where  = null; 
        }else{
            $query = "SELECT a.*, b.nama_guru as nama_lengkap,c.nama_sekolah from users a 
                        LEFT JOIN data_guru b
                        ON b.user_id = a.id
                        LEFT JOIN sekolah c 
                        ON c.id = a.id_sekolah";
            $where  = array('c.id_sekolah'=>user()->id_sekolah); 
        }
        $isWhere = null;
        $search = array('b.nama_guru','a.username','c.nama_sekolah');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function change_password(){
        $user_id  = $this->request->getVar('user_id');
        $pass_old = $this->request->getVar('pass_old');
        $pass_new = $this->request->getVar('pass_new');

        $user = $this->user->find($user_id);
        $pwd_verify = password_verify(base64_encode(hash('sha384',$pass_old, true)), $user['password_hash']);
        if (! $pwd_verify) {
            $res = [
                'status' => 'error',
                'msg'    => 'Password Lama Salah!'
            ];
            return $this->response->setJSON($res);
        }
        $data = [
            'password_hash'  => password_hash(base64_encode(hash('sha384',$pass_new, true)), PASSWORD_BCRYPT),          
        ];
        $update = $this->user->update($user['id'],$data);
        if ($update){
            $res = [
                'status' => 'success',
                'msg'    => 'Password berhasil diubah !'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'Password gagal diubah !'
            ];
        }
        return $this->response->setJSON($res);  
    }
    public function destroy(){
        $id = $this->request->getVar('id');
        $del = $this->user->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data berhasil didelete !'
            ];
        }else{
            $res = [
                'status' => 'error',
                'msg'    => 'data gagal didelete !'
            ];
        }
        return $this->response->setJSON($res);
    }
}
