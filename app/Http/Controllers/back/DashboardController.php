<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        if(!session('is_logged')) {
            return redirect('/');
        }
    }

    public function index(){
        $data = [
            'title' => 'Dashboard',
            'content' => 'back.dashboard'
        ];

        return view('back.index',['data' => $data]);
    }
}
