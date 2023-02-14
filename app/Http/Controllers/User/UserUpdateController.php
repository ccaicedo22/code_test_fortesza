<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;


class UserUpdateController extends CustomController
{

    public function __invoke(Request $request, $id): JsonResponse
    {
        $user = User::find($id);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->updated_at  = Carbon::now()->toDateTimeString();
        $user->save();

        return $this->json(
            200,
            false,
            '¡Usuario actualizado exitosamente!'
        );
    }
}
