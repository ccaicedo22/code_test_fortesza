<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;

class UserShowController extends CustomController
{

    public function __invoke(Request $request): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'message' => '¡La lista de usuarios se consulto correctamente!',
            'users' => $users
        ], 201);
    }
}
