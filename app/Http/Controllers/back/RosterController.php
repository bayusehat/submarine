<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;
use Validator;
use DataTables;

class RosterController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Artists',
            'content' => 'back.roster'
        ];

        return view('back.index',['data' => $data]);
    }

    public function loadRoster(Request $request){
        if ($request->ajax()) {
            $data = Roster::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="javascript:void(0)" class="btn btn-success btn-sm btn-block"><i class="fas fa-image"></i></a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block"><i class="fas fa-edit"></i></a> <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-block" onclick="deleteRoster('.$row->id_roster.')"><i class="fas fa-trash"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        $data = [
            'title' => 'Create new Roster',
            'content' => 'back.roster_create'
        ];

        return view('back.index',['data' => $data]);
    }

    public function insertRoster(Request $request){
        $rules = [
            'name' => 'required',
            'roster_photo' => 'required|mimes:jpeg,png|size:10000',
            'description' => 'required|min:100'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($request->has('roster_photo')){
                $photo = $request->file('roster_photo');
                $realPhoto = $photo->getClientOriginalName();
            }else{
                $realPhoto = 'dummy.jpg';
            }

            $rs = new Roster;
            $rs->name = $request->input('name');
            $rs->roster_photo = $realPhoto;
            $rs->description = $request->input('description');
            if($rs->save()){
                if($realPhoto != 'dummy.jpg'){
                    $file->move(public_path().'/assets/img/roster',$file->getClientOriginalName());
                    return redirect()->back()->with('success','New Roster created!');
                }else{
                    return redirect()->back()->with('failed','Failed upload Roster Photo!');
                }
            }else{
                return redirect()->back()->with('failed','Failed to create Roster!');
            }
        }
    }

    public function editRoster($id_roster){
        $data = [
            'title' => 'Edit Roster',
            'content' => 'back.roster_edit',
            'roster' => Roster::find($id_roster)
        ];

        return view('back.index',['data' => $data]);
    }

    public function updateRoster(Request $request, $id_roster){
        $rs = Roster::find($id_roster);
        if($request->has('roster_photo')){
            $photo = $request->file('roster_photo');
            $photo = $photo->getClientOriginalName();
            $valid_photo = 'required|mimes:jpeg,png|size:1000';
        }else{
            $photo = $rs->roster_photo;
            $valid_photo = '';
        }
        $rules = [
            'name' => 'required',
            'roster_photo' => $valid_photo,
            'description' => 'required|min:100'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $rs->name = $request->input('name');
            $rs->roster_photo = $photo;
            $rs->description = $request->input('description');
            if($rs->save()){
                return redirect()->back()->with('success','New Roster created!');
            }else{
                return redirect()->back()->with('failed','Failed to create Roster!');
            }
        }
    }

    public function deleteRoster($id_roster){
        $rs = Roster::find($id_roster);
        if($rs->delete()){
            return response(['status' => 'success', 'message' => 'Roster deleted'], 200);
        }else{
            return response(['status' => 'failed', 'message' => 'Failed to delete Roster'], 400);
        }
    }
}
