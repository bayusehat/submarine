<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TicketOrder;
use Validator;
use DataTables;
use QrCode;

class TicketController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Ticket Order',
            'content' => 'back.ticket'
        ];

        return view('back.index',['data' => $data]);
    }

    public function loadDataTicket(Request $request){
        if ($request->ajax()) {
            $data = TicketOrder::with('user')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('order_date',function($row){
                    $date = date('d-m-Y',strtotime($row->order_date));
                    return $date;
                })
                ->addColumn('ticket_status',function($row){
                    if($row->ticket_status == 'CHECKED'){
                        $badge = '<span class="badge bg-success"><i class="fas fa-check"></i> '.$row->ticket_status.'</span><span class="badge bg-secondary">Updated at : '.date('d-m-y H:i',strtotime($row->updated_at)).'</span>';
                    }else{
                        $badge = '<span class="badge bg-danger"><i class="fas fa-times"></i> '.$row->ticket_status.'</span>';
                    }

                    return $badge;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="'.url('/generate/'.$row->id_ticket).'" class="btn btn-success btn-sm btn-block"><i class="fas fa-file"></i></a>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block" onclick="edit('.$row->id_ticket.')"><i class="fas fa-edit"></i></a> <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-block" onclick="delTicket('.$row->id_ticket.')"><i class="fas fa-trash"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action','ticket_status'])
                ->make(true);
        }
    }

    public function createTicket(Request $request){
        $rules = [
            'customer_name' => 'required',
            'no_hp' => 'required',
            'ticket_type' => 'required',
            'quantity' => 'required',
            'order_date' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'errors', 'errors' => $isValid->errors()]);
        }else{
            $to = new TicketOrder;
            $to->no_ticket = date('ymdhi-s').'/'.rand(0,4);
            $to->customer_name = $request->input('customer_name');
            $to->no_hp = $request->input('no_hp');
            $to->ticket_type = $request->input('ticket_type');
            $to->quantity = $request->input('quantity');
            $to->order_date = $request->input('order_date');
            $to->id_user = session('id_user');
            if($to->save()){
                return response(['status' => 'success','message' => 'New ticket created']);
            }else{
                return response(['status' => 'failed','message' => 'Failed to create ticket']);
            }
        }
    }

    public function editTicket($id_ticket){
        $data = TicketOrder::with('user')->get();
        if($data){
            return response(['status' => 'success', 'data' => $data]);
        }

        return response(['status' => 'failed' , 'data' => [], 'message' => 'Data not found']);
    }

    public function updateTicket(Request $request, $id_ticket){
        $rules = [
            'customer_name' => 'required',
            'no_hp' => 'required',
            'ticket_type' => 'required',
            'quantity' => 'required',
            'order_date' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'error', 'errors' => $isValid->errors()]);
        }else{
            $to = TicketOrder::with('user')->find($id_ticket);
            $to->customer_name = $request->input('customer_name');
            $to->no_hp = $request->input('no_hp');
            $to->ticket_type = $request->input('ticket_type');
            $to->quantity = $request->input('quantity');
            $to->order_date = $request->input('order_date');
            $to->id_user = session('id_user');
            if($to->save()){
                return response(['status' => 'success','message' => 'New ticket created']);
            }else{
                return response(['status' => 'failed','message' => 'Failed to create ticket']);
            }
        }
    }

    public function deleteTicket($id_ticket){
        $to = TicketOrder::with('user')->find($id_ticket);
        if($to){
            if($to->delete())
                return response(['status' => 'success', 'message' => 'Ticket deleted']);
        }else{
            return response(['status' => 'failed', 'message' => 'Failed to delete ticket']);
        }
    }

    public function generate($id_ticket){
        $data = TicketOrder::with('user')->find($id_ticket);
        return view('back.ticket_generate')->with('data', $data);
    }

    public function verify($id_ticket,$ticket_status){
        $to = TicketOrder::where(['id_ticket' => $id_ticket, 'ticket_status' =>  $ticket_status])->first();
        if($to){
            $tou = TicketOrder::where('id_ticket',$id_ticket)->update(['ticket_status' => 'CHECKED']);
                if($tou)
                    return response(['status' => 'success', 'message' => 'Ticket verified!', 'data' => TicketOrder::find($id_ticket)]);

                return response(['status' => 'failed', 'message' => 'Data found, but failed to update statuse']);
        }

        return response(['status' => 'failed', 'message' => 'Error!']);
    }

    public function scanner_page(){
        return view('back.ticket_scanner');
    }

    public function scan_ticket($id_ticket){
        $to = TicketOrder::where(['id_ticket' => $id_ticket])->first();
        if($to){
            if($to->ticket_status == 'NOT CHECKED'){
                $tou = TicketOrder::where('id_ticket',$id_ticket)->update(['ticket_status' => 'CHECKED']);
                    if($tou)
                        return response(['status' => 'success', 'message' => 'Ticket ID:'.$to->id_ticket.' NO: '.$to->no_ticket.' verified!', 'data' => TicketOrder::find($id_ticket)]);
            }else{
                return response(['status' => 'failed', 'message' => 'Data found, already checked at '.$to->updated_at]);
            }
        }else{
            return response(['status' => 'failed', 'message' => 'Error! data not found']);
        }
    }
}
