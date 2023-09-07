<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Home',
            'content' => 'front.home',
            'banner' => Banner::all()
        ];

        return view('front.index',['data' => $data]);
    }

    public function artists(){
        $data = [
            'title' => 'Artists',
            'content' => 'front.artists',
            'roster' => Roster::all()
        ];

        return view('front.index',['data' => $data]);
    }

    public function artist_detail($name){
        $rs = Roster::with('release.release_type','release.release_image')->where('name',$name)->first();
        $data = [
            'title' => 'About '.$rs->name,
            'content' => 'front.artist_detail',
            'roster' => $rs
        ];

        return view('front.index',['data' => $data]);
    }
}
