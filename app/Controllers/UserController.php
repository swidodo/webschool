<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct(){
        $this->user  = new UserModel();
    }
    public function index()
    {
    
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
}
