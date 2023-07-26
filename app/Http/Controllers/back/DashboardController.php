<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'content' => 'back.dashboard',
            'ticket_orders' => DB::select(
                "select count(*) form ticket_orders"
            )
        ];

        return view('back.index',['data' => $data]);
    }
}
