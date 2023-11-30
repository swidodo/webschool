<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserGroupModel;
use App\Models\SekolahModel;
use App\Models\GuruModel;
use App\Models\GroupAccessModel;
use App\Libraries\DataTables;

class UserGroupController extends BaseController
{
    protected $usergroup;
    protected $DataTables;
    public function __construct(){
        $this->usergroup = new UserGroupModel();
        $this->sekolah   = new SekolahModel();
        $this->guru      = new GuruModel();
        $this->group      = new GroupAccessModel();
        $this->DataTables  = new DataTables();
    }
    public function index()
    {
        $data['page']       = 'USER GROUP';
        $data['sekolah']    = $this->sekolah->findAll();
        return view('content/auth/user_group',$data);
    }
    public function get_data(){
        $query = "select a.*, c.name as role, d.nama_guru as nama
                FROM auth_groups_users a 
                LEFT JOIN users b 
                ON b.id = a.user_id
                LEFT JOIN auth_groups c
                ON c.id = a.group_id
                LEFT JOIN data_guru d
                ON d.user_id = b.id";
        $where =null;
        $isWhere = null;
        $search = array('name','nama_guru');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function get_data_guru(){
       $sekolah_id = $this->request->getVar('sekolah_id');
       $data['user'] = $this->guru->join('users','users.id=data_guru.user_id','left')
                                ->where('data_guru.id_sekolah',$sekolah_id)
                                ->get()
                                ->getResult();
       $data['group'] = $this->group->findAll();
       return $this->response->setJSON($data);
    }
    public function store(){
        $data = [
            'user_id'  => $this->request->getVar('user_id'),
            'group_id' => $this->request->getVar('group_id'),
        ];
        $save = $this->usergroup->insert($data);
        if ($save){
            $res = [
                'status'    => 'success',
                'msg'       => 'User Group berhasil disimpan !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'User Group gagal disimpan !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $id = $this->request->getVar('id');
        $data = $this->usergroup->join('data_guru','data_guru.user_id=auth_groups_users.user_id','left')
                                ->join('sekolah','sekolah.id=data_guru.id_sekolah','left')
                                ->where('auth_groups_users.user_id',$id)
                                ->first();
        $data['group'] = $this->group->findAll();
        return $this->response->setJSON($data);
    }
    public function update(){
        $id = $this->request->getVar('user_id');
       $data = [
            'group_id'   => $this->request->getVar('group_id'),
        ];

        $updateData = $this->usergroup->update($id,$data);
        if ($updateData){
            $res = [
                'status'    => 'success',
                'msg'       => 'Data berhasil diupdate !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Data gagal diupdate !',
            ];
        }
        return $this->response->setJSON($res);

    }
    public function destroy(){
        $id  = $this->request->getVar('id');
        $del = $this->usergroup->delete($id);
        if ($del){
            $res = [
                'status' => 'success',
                'msg'    => 'Data telah di delete!'
            ];
        }else{
            $res = [
                'status' => 'success',
                'msg'    => 'Data gagal di delete!'
            ];
        }
        return $this->response->setJSON($res);
    }
}
