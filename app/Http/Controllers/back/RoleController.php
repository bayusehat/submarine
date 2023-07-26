<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Validator;

class RoleController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Role',
            'content' => 'back.role'
        ];

        return view('back.layout.index',['data' => $data]);
    }

    public function insert(Request $request){
        $rules = [
            'role' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'error', 'errors' => $isValid->errors()],500);
        }else{
            $r = new Role;
            $r->role = $request->input('role');
            if($r->save()){
                return response(['status' => 'success', 'message' => 'New Role created!'],200);
            }else{
                return response(['status' => 'failed', 'message' => 'Role cannot be created'],400);
            }
        }
    }

    public function edit($id_role){
        $data = Role::find($id_role);
        return response(['status' => 'success', 'data' => $data]);
    }

    public function update(Request $request, $id_role){
        $rules = [
            'role' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'error', 'errors' => $isValid->errors()],500);
        }else{
            $r = Role::find($id_role);
            $r->role = $request->input('role');
            if($r->save()){
                return response(['status' => 'success', 'message' => 'Role updated!'],200);
            }else{
                return response(['status' => 'failed', 'message' => 'Failed to update Role'],400);
            }
        }
    }

    public function destroy($id_role){
        $r = Role::find($id_role);
        if($r){
            $r->delete();
            return response(['status' => 'success', 'message' => 'Role deleted!'], 200);
        }else{
            return response(['status' => 'success', 'message' => 'Failed to delete Role'], 400);
        }
    }
}
