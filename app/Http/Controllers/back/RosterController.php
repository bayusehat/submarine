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
                    <a href="javascript:void(0)" class="btn btn-success btn-sm btn-block po" data-imgsrc="'.asset('assets/img/roster/'.$row->roster_photo).'"><i class="fas fa-image"></i></a>
                    <a href="'.url('/roster/edit/'.$row->id_roster).'" class="btn btn-primary btn-sm btn-block"><i class="fas fa-edit"></i></a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-block" onclick="deleteRoster('.$row->id_roster.')"><i class="fas fa-trash"></i></a>
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
            'roster_name' => 'required',
            'roster_photo' => 'required|mimes:jpeg,png|dimensions:min_width=1000,min_height=1000',
            'description' => 'required|min:10'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $photo = $request->file('roster_photo');
            if($request->has('roster_photo')){
                $realPhoto = $photo->getClientOriginalName();
            }else{
                $realPhoto = 'dummy.jpg';
            }

            $rs = new Roster;
            $rs->name = $request->input('roster_name');
            $rs->roster_photo = $realPhoto;
            $rs->description = $request->input('description');
            if($rs->save()){
                if($realPhoto != 'dummy.jpg'){
                    $photo->move(public_path('/assets/img/roster'),$realPhoto);
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

    public function removePhoto($id){
        $rs = Roster::find($id);
        if($rs)
            $rs->roster_photo = 'dummy.jpg';
            if($rs->save())
                return response(['status' => 'success', 'message' => 'Photo removed!']);

        return response(['status' => 'failed', 'message' => 'Error remove photo']);
    }

    public function updateRoster(Request $request, $id_roster){
        $rs = Roster::find($id_roster);
        $rules = [
            'roster_name' => 'required',
            'description' => 'required|min:10'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($rs->roster_photo == 'dummy.jpg'){
                $rulesUpload = [
                    'roster_photo' => 'required|mimes:jpeg,png|dimensions:min_width=1000,min_height=1000',
                ];
                $isValidToUpload = Validator::make($request->all(),$rulesUpload);
                if($isValidToUpload->fails()){
                    return redirect()->back()->withErrors($isValid->errors());
                }
                $photo = $request->file('roster_photo');
                if($request->has('roster_photo')){
                    $realPhoto = $photo->getClientOriginalName();
                }else{
                    $realPhoto = 'dummy.jpg';
                }
            }

            $rs->name = $request->input('roster_name');
            $rs->roster_photo = $realPhoto;
            $rs->description = $request->input('description');
            if($rs->save()){
                if($realPhoto != 'dummy.jpg'){
                    $photo->move(public_path('/assets/img/roster'),$realPhoto);
                    return redirect()->back()->with('success','Roster updated!');
                }else{
                    return redirect()->back()->with('failed','Failed upload Roster Photo!');
                }
            }else{
                return redirect()->back()->with('failed','Failed to update Roster!');
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

    //Front
}
