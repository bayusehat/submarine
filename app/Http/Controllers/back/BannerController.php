<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Validator;
use DataTables;

class BannerController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Banner Manager',
            'content' => 'back.banner'
        ];

        return view('back.index',['data' => $data]);
    }

    public function loadBanner(Request $request){
        if ($request->ajax()) {
            $data = Banner::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="javascript:void(0)" class="btn btn-success btn-sm btn-block po" data-imgsrc="'.asset('assets/img/banner/'.$row->id_banner).'"><i class="fas fa-image"></i></a>
                    <a href="'.url('/banner/edit/'.$row->id_banner).'" class="btn btn-primary btn-sm btn-block"><i class="fas fa-edit"></i></a>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-block" onclick="deleteBanner('.$row->id_banner.')"><i class="fas fa-trash"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        $data = [
            'title' => 'Add New Banner',
            'content' => 'back.banner_create'
        ];

        return view('back.index',['data' => $data]);
    }

    public function insert(Request $request){
        $rules = [
            'img_banner' => 'required',
            'tagline' => 'required',
            'sub_tagline' => 'required'
        ];
        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $photo = $request->file('img_banner');
            if($request->has('img_banner')){
                $realPhoto = $photo->getClientOriginalName();
            }else{
                $realPhoto = 'dummy.png';
            }

            $rs = new Banner;
            $rs->tagline = $request->input('tagline');
            $rs->img_banner = $realPhoto;
            $rs->sub_tagline = $request->input('sub_tagline');
            $rs->link = $request->input('link');
            $rs->status_banner = 0;
            $rs->position = 0;
            if($rs->save()){
                if($realPhoto != 'dummy.png'){
                    $photo->move(public_path('/assets/img/banner'),$realPhoto);
                    return redirect()->back()->with('success','New Banner created!');
                }else{
                    return redirect()->back()->with('failed','Failed upload Banner Photo!');
                }
            }else{
                return redirect()->back()->with('failed','Failed to create Banner!');
            }

        }
    }

    public function edit($id){
        $data = [
            'title' => 'Edit Banner',
            'content' => 'back.banner_edit',
            'banner' => Banner::find($id)
        ];
        return view('back.index',['data' => $data]);
    }

    public function update(Request $request, $id){
        $rs = Banner::find($id);
        $rules = [
            'tagline' => 'required',
            'sub_tagline' => 'required|min:10'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $realPhoto = '';
            if($rs->img_banner == 'dummy.png'){
                $rulesUpload = [
                    'img_banner' => 'required|mimes:jpeg,png|dimensions:min_width=1000,min_height=1000',
                ];
                $isValidToUpload = Validator::make($request->all(),$rulesUpload);
                if($isValidToUpload->fails()){
                    return redirect()->back()->withErrors($isValid->errors());
                }
                $photo = $request->file('img_banner');
                if($request->has('img_banner')){
                    $realPhoto .= $photo->getClientOriginalName();
                }else{
                    $realPhoto .= 'dummy.png';
                }
            }

            $rs = Banner::find($id);
            $rs->tagline = $request->input('tagline');
            if($realPhoto != ''){
                $rs->img_banner = $realPhoto;
            }
            $rs->sub_tagline = $request->input('sub_tagline');
            $rs->link = $request->input('link');
            $rs->status_banner = 0;
            $rs->position = 0;
            if($rs->save()){
                if($realPhoto != 'dummy.png'){
                    if($realPhoto != ''){
                        $photo->move(public_path('/assets/img/banner'),$realPhoto);
                    }
                    return redirect()->back()->with('success','Banner updated!');
                }else{
                    return redirect()->back()->with('failed','Failed upload Banner Photo!');
                }
            }else{
                return redirect()->back()->with('failed','Failed to update Banner!');
            }
        }
    }

    public function deleteBanner($id){
        $rs = Banner::find($id);
        if($rs->delete()){
            // unlink(public_path('/assets/img/banner').$rs->img_banner);
            return response(['status' => 'success', 'message' => 'Banner deleted'], 200);
        }else{
            return response(['status' => 'failed', 'message' => 'Failed to delete Banner'], 400);
        }
    }

    public function removePhoto($id){
        $rs = Banner::find($id);
        if($rs)
            $rs->img_banner = 'dummy.png';
            if($rs->save())
                return response(['status' => 'success', 'message' => 'Photo removed!']);

        return response(['status' => 'failed', 'message' => 'Error remove photo']);
    }
}
