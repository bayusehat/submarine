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

    public function insert(Request $request){
        $rules = [
            'invoice_to' => 'required',
            'invoice_cp' => 'required',
            'invoice_date' => 'required',
            'invoice_email' => 'required'
        ];

        $message = [
            'invoice_to.required' => 'Nama penerima invoice harus diisi',
            'invoice_cp.required' => 'Nomor Handphone penerima invoice harus diisi',
            'invoice_date.required' => 'Tanggal invoice harus diisi',
            'invoice_email.required' => 'E-mail penerima invoice harus diisi'
        ];

        $isValid = Validator::make($request->all(), $rules, $message);

        if($isValid->fails()){
             return redirect()->back()->withErrors($isValid->errors());
        }else{
            $in = new Invoice;
            $in->invoice_to = $request->input('invoice_to');
            $in->invoice_cp = $request->input('invoice_cp');
            $in->invoice_date = $request->input('invoice_date');
            $in->invoice_description = $request->input('invoice_description');
            $in->invoice_address = $request->input('invoice_address');
            $in->invoice_email = $request->input('invoice_email');
            $in->invoice_amount = $request->input('invoice_amount');
            $in->invoice_total = $request->input('invoice_total');
            $in->invoice_status = 'PENDING';
            $in->id_user = session('id_user');

            return $request->all();

            // if($in->save()) {
            //     if($request->has('item')){
            //         foreach ($request->input('item') as $i => $v) {
            //             $ind = new InvoiceDetail;
            //             $ind->item = $v->item;
            //             $ind->price = $request->input('price')[$i];
            //             $ind->quantity = $request->input('quantity')[$i];
            //             $ind->subtotal = $request->input('subtotal')[$i];
            //             $ind->save();
            //         }
            //         return redirect()->back()->with('success','Invoice berhasil dibuat');
            //     }else{
            //         return redirect()->back()->with('error','Invoice dibuat tanpa item');
            //     }
            // }else{
            //     return redirect()->back()->with('error','Invoice tidak dapat dibuat, ada kesalahan');
            // }
        }
    }
}
