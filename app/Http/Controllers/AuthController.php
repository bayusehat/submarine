<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth;
use Validator;
use Hash;
use Session;

class AuthController extends Controller
{
    public function index(){
        return view('back.login');
    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $rules = [
            'email' => 'required',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $au = Auth::where('email',$email)->first();
            if($au){
                if(Hash::check($password, $au->password)){
                    $session = [
                        'id_user' => $au->id_user,
                        'name' => $au->name,
                        'isLogged' => true,
                        'id_role' => $au->id_role
                    ];
                    session($session);
                    return redirect('/dashboard')->with('success','Login success');
                }else{
                    return redirect()->back()->with('failed','Login failed, please try again');
                }
            }else{
                return redirect()->back()->with('failed','User not found');
            }

        }
    }

    public function register(){
        return view('back.register');
    }

    public function doRegister(Request $request){
        $rules = [
            'name' => 'required',
            'phone' => 'required|numeric|min:9',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirm' => 'required|same:password'
        ];

        $isValid = Validator::make($request->all(),$rules);

        if($isValid->fails()){
            return redirect()->back()->withErrors($isValid->errors());
        }else{
            $reg = new Login;
            $reg->name = $request->input('name');
            $reg->phone = $request->input('phone');
            $reg->email = $request->input('email');
            $reg->address = $request->input('address');
            $reg->role = 1;
            $reg->password = Hash::make($request->input('password'));
            if($reg->save()){
                return redirect()->back()->with('success','Register success!');
            }else{
                return redirect()->back()->with('failed','Failed to register, try again.');
            }
        }
    }

    public function logout(){
        session()->put('isLogged',false);
        session()->flush();
        return redirect('/login');
    }
}
