<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use Validator;
use DataTables;
use Str;

class GenreController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Genre Master',
            'content' => 'back.genre'
        ];

        return view('back.index',['data' => $data]);
    }

    public function loadDataGenre(Request $request){
        if ($request->ajax()) {
            $data = Genre::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="edit('.$row->id_genre.')">Edit</a> <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="deleteGenre('.$row->id_genre.')">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create(Request $request){
        $rules = [
            'genre' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['status' => 'errors', 'errors' => $isValid->errors()]);
        }else{
            $g = new Genre;
            $g->genre = $request->input('genre');
            $g->alias = Str::slug($request->input('genre'));
            if($g->save()){
                return response(['status' => 'success','message' => 'New Genre created!']);
            }else{
                return response(['status' => 'failed','message' => 'Genre cannot be create']);
            }
        }
    }

    public function edit($id_genre){
        $data = Genre::find($id_genre);
        return response(['status' => 'success','data' => $data]);
    }

    public function update(Request $request,$id_genre){
        $rules = [
            'genre' => 'required'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return response(['errors' => $isValid->errors()]);
        }else{
            $g = Genre::find($id_genre);
            $g->genre = $request->input('genre');
            if($g->save()){
                return response(['status' => 'success','message' => 'Genre updated!']);
            }else{
                return response(['status' => 'failed','message' => 'Failed to update Genre']);
            }
        }
    }

    public function destroy($id_genre){
        $g = Genre::find($id_genre);
        if($g){
            $g->delete();
            return response(['status' => 'success','message' => 'Genre deleted!']);
        }else{
            return response(['status' => 'failed','message' => 'Failed to delete Genre!']);
        }
    }
}
