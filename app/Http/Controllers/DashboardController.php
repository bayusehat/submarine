<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'content' => 'back.dashboard'
        ];

        return view('back.index',['data' => $data]);
    }
}
