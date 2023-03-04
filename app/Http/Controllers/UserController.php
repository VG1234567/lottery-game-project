<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(Request $request){

        //validation
        $this -> validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = new User();

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return response()->json($user);

    }

    public function destroy($id){
        $user = User::find($id);
        $user -> delete();
        return response()->json("User deleted successfully!");
    }

    public function index(){
        $users = UserResource::collection(User::all());
        return response()->json($users);
    }

    public function update(Request $request,$id){
        //validation
        $this -> validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user = User::find($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        return response()->json($user);
    }

}
