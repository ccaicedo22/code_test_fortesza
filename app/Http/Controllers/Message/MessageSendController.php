<?php

namespace App\Http\Controllers\Message;


use App\Models\Message;
use App\Http\Contracts\MessageRepositoryContract;
use App\Http\Controllers\Message\MessageSendFileController;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

final class MessageSendController extends CustomController
{
    public function __construct(
        private MessageRepositoryContract $messageRepositoryContract,
        private MessageSendFileController $messageSendFileController
    )
    {
    }

    public function __invoke(Request  $request): JsonResponse
    {
        $idMessage = $this->messageRepositoryContract->saveMessage(
            $request
        );

        $sendFile = $this->messageSendFileController->__invoke(
            $request,
            $idMessage
        );
        //dd($sendFile);
        //$this->sendFile($request,$request->user_id_send,$request->user_id_receive,$id_message);

        return $this->json(
            201,
            false,
            'mensaje enviado correctamente'
        );
    }
}