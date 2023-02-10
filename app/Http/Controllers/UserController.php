<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();
        return response()->json([
            'message' => '¡La lista de usuarios se consulto correctamente!',
            'users' => $users
        ], 201);
    }

    public function store(Request  $request)
    {
        $user = new User();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;        
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();

        $user->save();

        return response()->json([
            'message' => '¡Usuario registrado exitosamente!',
            'user' => $user
        ], 201);
    }

    public function update(Request $request ,$id)
    {
        
        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->updated_at  = Carbon::now()->toDateTimeString();
        $user->save();

        return response()->json([
            'message' => '¡Usuario actualizado exitosamente!',
            'user' => $user
        ], 201);
    }

    
    public function destroy(Request $request)
    {
        $user = User::destroy($request->id);
        return response()->json([
            'message' => '¡Usuario eliminado exitosamente!',
            'user' => $user
        ], 201);
    }
}
