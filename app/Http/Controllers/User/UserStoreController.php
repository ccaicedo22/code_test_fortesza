<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;

class UserStoreController extends CustomController
{

    public function __invoke(Request $request): JsonResponse
    {
        $user = new User();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = Carbon::now()->toDateTimeString();
        $user->updated_at = Carbon::now()->toDateTimeString();

        $user->save();

        return $this->json(
            200,
            false,
            '¡Usuario registrado exitosamente!'
        );
    }
}
