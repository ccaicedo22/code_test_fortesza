<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;

class UserDestroyController extends CustomController
{

    public function __invoke(Request $request): JsonResponse
    {
        $user = User::destroy($request->id);

        return $this->json(
            200,
            false,
            '¡Usuario eliminado exitosamente!'
        );
    }
}
