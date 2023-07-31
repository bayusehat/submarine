<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Banner Manager',
            'content' => 'back.banner'
        ];

        return view('back.index',['data' => $data]);
    }

    public function loadBanner(){
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
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-block" onclick="deleteBAnner('.$row->id_banner.')"><i class="fas fa-trash"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
