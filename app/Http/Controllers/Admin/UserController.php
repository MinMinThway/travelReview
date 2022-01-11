<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RoleUser;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use VARIANT;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::OrderBy("id", "DESC")->get();
        return view('admin.users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v)->withInput($request->all());
        }

        try{
            $user = new User();
            $user->id = $request->id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->has("role")?"1" : "0";
            $user->save();

            $role_user = new RoleUser();
            $role_user->user_id = $user->id;
            $role_user->role_id = $user->role;
            $role_user->save();

            return redirect()->route("admin.user.index")->with(["msg" => "Created User"])->withInput($request->all());
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("admin.users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        if($v->fails()){
            return redirect()->back()->withErrors($v);
        }

        try{
            $user = User::findOrFail($id);
            $user->id = $id;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->has("role")?"1" : "0";
            $user->save();

            $role_user = RoleUser::findOrFail($id);
            if($role_user->user_id == $user->id){
                $role_user->save();
            }


            return redirect()->route("admin.user.index")->with(["msg" => "Updated Success"]);

        }catch(Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $role_user = RoleUser::findOrFail($id);
        try{
            if($user){
                if($role_user->user_id == $user->id){
                    $role_user->delete();
                }

                $user->delete();
                return redirect()->route("admin.user.index")->with(["msg" => "Delete Success!"]);
            }
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}
