<?php

namespace App\Http\Controllers\Message;

use App\Http\Contracts\MessageRepositoryContract;
use Illuminate\Http\Request;
use App\Http\Controllers\CustomController;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

final class MessageSendFileController extends CustomController
{
    private $messageRepositoryContract;

    public function __construct(
        MessageRepositoryContract $messageRepositoryContract
    )
    {
        $this->messageRepositoryContract = $messageRepositoryContract;
    }

    public function __invoke(Request  $request, int $idMessage)
    {
        
        $save  = $this->messageRepositoryContract->sendFile($request ,$idMessage);           
            
     }
}