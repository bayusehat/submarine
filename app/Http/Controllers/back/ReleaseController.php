<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Release;
use App\Models\ReleaseType;
use App\Models\ReleaseImage;
use Validator;
use DataTables;
use App\Models\Roster;

class ReleaseController extends Controller
{
    #Release Type Part;
    public function index(){
        $data = [
            'title' => 'Release Type',
            'content' => 'back.release'
        ];

        return view('back.index',['data' => $data]);
    }

    public function insert(Request $request){
        $rules = [
            'release_type' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'error', 'errors' => $isValid->errors()],500);
        }else{
            $rt = new ReleaseType;
            $rt->release_type = $request->input('release_type');
            if($rt->save()){
                return response(['status' => 'success', 'message' => 'New Release Type created'], 200);
            }else{
                return response(['status' => 'success', 'message' => 'Failed to create Release Type'], 400);
            }
        }
    }

    public function edit($id_release_type){
        $data = ReleaseType::find($id_release_type);
        return response(['status' => 'success', 'data' =>  $data], 200);
    }

    public function update(Request $request, $id_release_type){
        $rules = [
            'release_type' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'error', 'errors' => $isValid->errors()],500);
        }else{
            $rt = ReleaseType::find($id_release_type);
            $rt->release_type = $request->input('release_type');
            if($rt->save()){
                return response(['status' => 'success', 'message' => 'Release Type updated!'], 200);
            }else{
                return response(['status' => 'success', 'message' => 'Failed to update Release Type'], 400);
            }
        }
    }

    public function destroy($id_release_type){
        $rt = ReleaseType::find($id_release_type);
        if($rt->delete()){
            return response(['status' => 'success', 'message' => 'Release Type deleted'], 200);
        }else{
            return response(['status' => 'success', 'message' => 'Failed to delete Release Type'], 400);
        }
    }

    #Release
    public function release_index(){
        $data = [
            'title' => 'Release Master',
            'content' => 'back.release',
        ];

        return view('back.index',['data' => $data]);
    }

    public function loadRelease(Request $request){
        if ($request->ajax()) {
            $data = Release::with('release_image')->with('release_type')->with('roster')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('release_type',function($row){
                    return $row->release_type->release_type;
                })
                ->addColumn('artist',function($row){
                    return $row->roster->name;
                })
                ->addColumn('release_date',function($row){
                    return date('d-m-Y', strtotime($row->release_date));
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="edit('.$row->id_release.')">Edit</a> <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteGenre('.$row->ir_release.')">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function createRelease(){
        $data = [
            'title' => 'Create new Release',
            'content' => 'back.release_create',
            'roster' => Roster::all()
        ];

        return view('back.index',['data' => $data]);
    }

    public function insertRelease(Request $request){
        $rules = [
            'roster' => 'required',
            'title' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'release_date' => 'required',
            'release_type' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $photo = $request->file('release_image');
            if($request->has('release_image')){
                $realPhoto = $photo->getClientOriginalName();
            }else{
                $realPhoto = 'dummy.jpg';
            }

            $rl = new Release;
            $rl->title = $request->input('title');
            $rl->description = $request->input('description');
            $rl->id_roster = $request->input('roster');
            $rl->id_release_type = $request->input('release_type');
            $rl->price = $request->input('price');
            $rl->release_date = $request->input('release_date');
            if($rl->save()){
                if($realPhoto != 'dummy.jpg'){
                    $photo->move(public_path('/assets/img/release'),$realPhoto);
                    $ri = new ReleaseImage;
                    $ri->id_release = $rl->id_release;
                    $ri->file_name = $realPhoto;
                    $ri->upload_date = date('Y-m-d H:i:s');
                    $ri->save();
                    return redirect()->back()->with('success','New Release created!');
                }else{
                    return redirect()->back()->with('failed','Failed upload Roster Photo!');
                }
                return redirect()->back()->with(['success' => 'New release created!', 'error_upload' => $error_upload]);
            }else{
                return redirect()->back()->with('failed','Failed to create new release');
            }
        }
    }

    public function editRelease($id_release){
        $rl = Release::with('release_type','release_image','roster')->find($id_release);
        $data = [
            'title' => 'Release Edit',
            'content' => 'back.release_edit',
            'release' => $rl
        ];

        return view('back.index',['data' => $data]);
    }

    public function updateRelease(Request $request, $id_release){
        $rules = [
            'roster' => 'required',
            'title' => 'required',
            'description' => 'required|min:100',
            'price' => 'required|numeric',
            'relase_date' => 'required',
            'release_type' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $rl = Release::with('release_type','release_date','roster')->find($id_release);
            $rl->title = $request->input('title');
            $rl->description = $request->input('description');
            $rl->id_roster = $request->input('roster');
            $rl->id_release_type = $request->input('release_type');
            $rl->price = $request->input('price');
            $rl->release_date = $request->input('release_date');
            if($rl->save()){
                return redirect()->back()->with('success','Release updated!');
            }else{
                return redirect()->back()->with('failed','Failed to update release');
            }
        }
    }

    public function deleteRelease($id_release){
        $rl = Release::find($id_release);
        if($rl){
           if($rl->delete())
            return response(['status' => 'success','message' => 'Release deleted']);
        }else{
            return response(['status' => 'failed','message' => 'Failed to delete release']);
        }
    }

}
