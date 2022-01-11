<?php

namespace App\Http\Controllers;

use App\RoleUser;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function index()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ' required',
            'password' => 'required|min:6',
            'checkbox' => 'required',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput($request->all());
        }

        try {
            $reg = new User();
            $reg->id =$request->id;
            $reg->name = $request->name;
            $reg->email = $request->email;
            $reg->role = $request->has("role") ? "1" : "0";
            $reg->password = Hash::make($request->password);
            $reg->save();

            $role_user = new RoleUser();
            $role_user->user_id = $reg->id;
            $role_user->role_id = $reg->role;
            $role_user->save();


            return redirect()->route('login')->withInput($request->all());
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    function loginValidate(Request $request)
    {
        $v = Validator::make($request->all(), [
            "email" => 'required',
            'password' => 'required|min:6',
        ]);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput($request->all());
        }
        $cret = $request->only('email', 'password');
        if (Auth::attempt($cret)) {
            $roles = auth()->user()->role;
            if($roles == "1"){
                return redirect()->route("admin.user.index");
            }else{
                return redirect()->route("client");
            }
        }else{
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
