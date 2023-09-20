<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use DataTables;

class InvoiceController extends Controller
{
    public function index(){
        $data = [
            'title' => 'HL Screenprinting Invoice Generator',
            'content' => 'back.invoice'
        ];

        return view('back.index', ['data' => $data]);
    }

    public function loadInvoice(Request $request){
        if ($request->ajax()) {
            $data = Invoice::with('invoice_detail')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('invoice_date',function($row){
                    return date('d-m-Y', strtotime($row->release_date));
                })
                ->addColumn('invoice_status',function($row){
                    switch ($row->invoice_status) {
                        case 'FINISH':
                            $status = '<div class="badge bg-success">'.$row->invoice_status.'</div>';
                            break;
                        case 'CANCEL':
                            $status = '<div class="badge bg-danger">'.$row->invoice_status.'</div>';
                            break;

                        default:
                            $status = '<div class="badge bg-warning">'.$row->invoice_status.'</div>';
                            break;
                    }
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="">Edit</a> <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteGenre('.$row->ir_release.')">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(){
        $data = [
            'title' => 'Insert Invoice',
            'content' => 'back.invoice_create'
        ];

        return view('back.index',['data' => $data]);
    }
}
