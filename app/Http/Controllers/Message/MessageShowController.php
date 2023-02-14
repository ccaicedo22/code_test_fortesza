<?php

namespace App\Http\Controllers\Message;

use App\Http\Contracts\MessageRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Traits\Sp;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;

final class MessageShowController extends CustomController
{
    use Sp;

    public function __construct(
        private MessageRepositoryContract $messageRepositoryContract
    )
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $user_id_send = $request->user_id_send;
        $user_id_receive =$request->user_id_receive;
        $limit = 15;
        $offset = $limit * ($request->page - 1);
       
        $message  = $this->messageRepositoryContract->showMessage($user_id_send ,$user_id_receive,$limit,$offset);
        
        return $this->json(
            200,
            false,
            $message
        );
    }
}