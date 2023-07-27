<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roster;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Home',
            'content' => 'front.home'
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

    public function artist_detail($id_roster){
        $rs = Roster::with('release')->find($id_roster);
        $data = [
            'title' => 'About '.$rs->name,
            'content' => 'front.artists',
            'roster' => $rs
        ];

        return view('front.index',['data' => $data]);
    }
}
