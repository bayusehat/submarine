<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RosterController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Artists',
            'content' => 'back.roster'
        ];

        return view('back.index',['data' => $data]);
    }

    public function insertRoster(Request $request){
        $rules = [
            'name' => 'required',
            'roster_photo' => 'required|mimes:jpeg,png|size:1000',
            'description' => 'required|min:100'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            if($request->has('roster_photo')){
                $photo = $request->file('roster_photo');
                $rs = new Roster;
                $rs->name = $request->input('name');
                $rs->roster_photo = $photo->getClientOriginalName();
                $rs->description = $request->input('description');
                if($rs->save()){
                    return redirect()->back()->with('success','New Roster created!');
                }else{
                    return redirect()->back()->with('failed','Failed to create Roster!');
                }
            }else{
                return redirect()->back()->with('failed','Photo not valid');
            }
        }
    }

    public function editRoster($id_roster){
        $data = [
            'title' => 'Edit Roster',
            'content' => 'back.roster_edit',
            'roster' => Roster::with('release')->find($id_roster)
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
