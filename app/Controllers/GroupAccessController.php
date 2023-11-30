<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GroupAccessModel;
use App\Models\AuthGroupPermissionModel;
use App\Libraries\DataTables;
use CodeIgniter\Database\Exceptions\DatabaseException;

class GroupAccessController extends BaseController
{
    protected $groupaccess;
    protected $grouppermission;
    protected $DataTables;
    public function __construct(){
        $this->groupaccess = new GroupAccessModel();
        $this->grouppermission = new AuthGroupPermissionModel();
        $this->DataTables  = new DataTables();
        $this->db      = \Config\Database::connect();
    }
    public function index()
    {
        $data['page'] = 'GROUP ACCESS';
        return view('content/auth/auth_group',$data);
    }
    public function get_data(){
        $query = "select * from auth_groups ";
        $where =null;
        $isWhere = null;
        $search = array('name');
        echo $this->DataTables->BuildDatatables($query, $where, $isWhere, $search);
    }
    public function store(){
        try{
            $this->db->transException(true)->transStart();
            $permis = $this->request->getVar('permission');
            $data = [
                'name'        => $this->request->getVar('name'),
                'description' => $this->request->getVar('description'),
            ];
            $this->groupaccess->insert($data);
            $authPermission = [];
            foreach($permis as $permission){
                $dataPermis = [
                    'group_id'      => $this->groupaccess->getInsertID(),
                    'permission_id' => $permission
                ];
                array_push($authPermission,$dataPermis);
            }
            $this->grouppermission->insertBatch($authPermission);
            $this->db->transComplete();
           $res = [
                'status'    => 'success',
                'msg'       => 'Group Access berhasil disimpan !',
            ];
            return $this->response->setJSON($res);
        }catch(DatabaseException $e){
            $res = [
                'status'    => 'error',
                'msg'       => 'Group Access gagal disimpan !',
            ];
            return $this->response->setJSON($res);
        }
    }
    public function edit(){
        $id = $this->request->getVar('id');
        $data = $this->groupaccess->find($id);
        return $this->response->setJSON($data);
    }
    public function update(){
        $id = $this->request->getVar('id');
        $permis = $this->request->getVar('permission');
        $data = [
            'name'          => $this->request->getVar('name'),
            'description'   => $this->request->getVar('description'),
        ];

        $updateData = $this->groupaccess->update($id,$data);

        $data = $this->grouppermission->where('group_id',$id)->get()->getResult();
        $dtacheck = [];
        foreach($data as $dtPerm){
            array_push($dtacheck,$dtPerm->permission_id);
        }
       $check =[];
        foreach($permis as $permission){
            if ($permission == ''){
                return true;
            }
           if (!in_array($permission,$dtacheck)){
                $data = [
                    'group_id' => $id,
                    'permission_id' => $permission,
                ];
                $this->grouppermission->insert($data);
            }  
            array_push($check,$permission);
        }
        $perm = $this->grouppermission->where('group_id',$id)->get()->getResult();
        foreach($perm as $permit){
            if(!in_array($permit->permission_id,$check)){
                $this->grouppermission->where('permission_id',$permit->permission_id)->delete();
            }
        }

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
        try{
            $this->db->transException(true)->transStart();
            $id  = $this->request->getVar('id');
            $this->groupaccess->delete($id);
            $this->grouppermission->where('group_id',$id)->delete($id);
            $this->db->transComplete();
            $res = [
                'status' => 'success',
                'msg'    => 'Data telah di delete!'
            ];
            return $this->response->setJSON($res);
        }catch(DatabaseException $e){
             $res = [
                'status' => 'success',
                'msg'    => 'Data gagal di delete!'
            ];
            return $this->response->setJSON($res);
        }
        
    }
}
