<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function destroy($id)
    {
        $user = User::find($id);
        $user -> delete();
        return response()->json("User deleted successfully!");
    }

    public function index()
    {
        $users = UserResource::collection(User::all());
        return response()->json($users);

    }

    public function update(Request $request,$id)
    {
        //validation
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
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
