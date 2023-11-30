<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthGroupPermmisionController extends BaseController
{
    protected $group;
    protected $DataTables;
    public function __construct(){
        $this->group  = new GroupPermissionModel();
        $this->DataTables  = new DataTables();
    }
    public function store(){
        $data = [
            'group_id'          => $this->request->getVar('group_id'),
            'permission_id'     => $this->request->getVar('permission_id'),
        ];
        $save = $this->group->insert($data);
        if ($save){
            $res = [
                'status'    => 'success',
                'msg'       => 'Group Permission berhasil disimpan !',
            ];
               
        } else{
            $res = [
                'status'    => 'error',
                'msg'       => 'Group Permission gagal disimpan !',
            ];
        }
        return $this->response->setJSON($res);
    }
    public function edit(){
        $id = $this->request->getVar('id');
        $data = $this->group->find($id);
        return $this->response->setJSON($data);
    }
    public function update(){
        $id = $this->request->getVar('id');
        $data = [
            'group_id'          => $this->request->getVar('group_id'),
            'permission_id'   => $this->request->getVar('permission_id'),
        ];

        $updateData = $this->group->update($id,$data);
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
        $del = $this->group->delete($id);
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