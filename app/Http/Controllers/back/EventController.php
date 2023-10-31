<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use App\Models\Event;

class EventController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Event List',
            'content' => 'back.event'
        ];
        return view('back.index',['data' => $data]);
    }

    public function loadDataEvent(Request $request){
        if ($request->ajax()) {
            $data = Event::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block" onclick="edit('.$row->id_event.')"><i class="fas fa-edit"></i></a> <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-block" onclick="delEvent('.$row->id_event.')"><i class="fas fa-trash"></i></a>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function insert(Request $request){
        $rules = [
            'event_name' => 'required',
            'event_date' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response(['status'=>'error','errors' => $isValid->errors()]);
        }

        $event = new Event;
        $event->event_name = $request->input('event_name');
        $event->event_date = $request->input('event_date');
        if($event->save()){
            return response(['status' => 'success','message' => 'Event added']);
        }else{
            return response(['status' => 'failed','message' => 'Cannot add Event']);
        }
    }

    public function edit($id_event){
        $event = Event::find($id_event);
        if($event){
            return response(['status' => 'success','data' => $event]);
        }else{
            return response(['status' => 'failed', 'message' => 'Data not found!']);
        }
    }

    public function update(Request $request,$id_event){
        $event = Event::find($id_event);
        if(!$event){
            return response(['status' => 'failed', 'message' => 'Event not found!']);
        }

        $rules = [
            'event_name' => 'required',
            'event_date' => 'required'
        ];

        $isValid = Validator::make($request->all(), $rules);

        if($isValid->fails()){
            return response(['status'=>'error','errors' => $isValid->errors()]);
        }

        $event->event_name = $request->input('event_name');
        $event->event_date = $request->input('event_date');
        if($event->save()){
            return response(['status' => 'success','message' => 'Event added']);
        }else{
            return response(['status' => 'failed','message' => 'Cannot add Event']);
        }
    }

    public function destroy($id_event){
        $event = Event::find($id_event);
        if(!$event){
            return response(['status' => 'failed', 'message' => 'Event not found!']);
        }

        if($event->delete()){
            return response(['status' => 'success','message' => 'Event deleted']);
        }

        return response(['status' => 'failed', 'message' => 'Cannot delete this event']);
    }
}
