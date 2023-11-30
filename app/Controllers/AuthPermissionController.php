<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthPermissionModel;
use App\Libraries\DataTables;

class AuthPermissionController extends BaseController
{
    protected $permission;
    protected $DataTables;
    public function __construct(){
        $this->permission  = new AuthPermissionModel();
        $this->DataTables  = new DataTables();
    }
    public function index()
    {
        $data['page']       = 'PERMISSION';
        return view('content/auth/auth_permission',$data);
    }
    public function get_data(){
        $query = "select * from auth_permissions";
        $where =null;
        $isWhere = null;
        $search = array('name');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function store(){
        $data = [
            'name'          => $this->request->getVar('name'),
            'description'   => $this->request->getVar('description'),
        ];
        $save = $this->permission->insert($data);
        if ($save){
            $res = [
                'status'    => 'success',
                'msg'       => 'Permission berhasil disimpan !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Permission gagal disimpan !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $id = $this->request->getVar('id');
        $data = $this->permission->find($id);
        return $this->response->setJSON($data);
    }
    public function update(){
        $id = $this->request->getVar('id');
        $data = [
            'name'          => $this->request->getVar('name'),
            'description'   => $this->request->getVar('description'),
        ];

        $updateData = $this->permission->update($id,$data);
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
        $del = $this->permission->delete($id);
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
    public function get_group_permission(){
        $id = $this->request->getVar('id');
        $query = "select a.*,b.* from auth_permissions a 
                  left join auth_groups_permissions b
                  ON a.id = b.permission_id";
        $where =null;
        $isWhere = null;
        $search = array('a.name');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
}
