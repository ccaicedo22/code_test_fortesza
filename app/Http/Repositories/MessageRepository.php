<?php

namespace App\Http\Repositories;

use App\Http\Contracts\MessageRepositoryContract;
use App\Http\Traits\Sp;
use App\Models\Message;
use Carbon\Carbon;

final class MessageRepository implements MessageRepositoryContract
{
    use Sp;

    public function __construct(private Message $message)
    {
    }

    public function showMessage(
        int $userIdSend,
        int $userIdReceive,
        int $limit,
        int $offset
    ): array {

        return $this->executeSP("CALL lsp_showMessages(
            :p_user_id_send,
            :p_user_id_receive,
            :p_offset,
            :p_limit
        )", [
            'p_user_id_send' => $userIdSend,
            'p_user_id_receive' => $userIdReceive,
            'p_offset' => $offset,
            'p_limit' => $limit
        ]);
    }

    public function sendFile(
        object $request,
        int $idMessage
    ): array {
        if($request->hasFile('file')){
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_name = pathinfo($file_name, PATHINFO_FILENAME);
        $name_file = str_replace(" ", "_", $file_name);
        $extension = $file->getClientOriginalExtension();

        $picture = date('His') . '-' . $name_file . '.' . $extension;
        $file->move(public_path('files/'), $picture);

        $save = $this->executeSP("CALL lsp_upload_file(:p_user_id_send,:p_user_id_receive,:p_file_name,:p_now,:p_id_message)", [
            "p_user_id_send" => $request->user_id_send,
            "p_user_id_receive" => $request->user_id_receive,
            "p_file_name" => $picture,
            "p_now" => Carbon::now()->toDateTimeString(),
            "p_id_message" => $idMessage
        ]);
        return $save;
    }else{
        return [];
   }
    }

    public function saveMessage(
        object $request
    ): int {
        $this->message->user_id_send = $request->user_id_send;
        $this->message->message = $request->message;
        $this->message->user_id_receive = $request->user_id_receive;
        $this->message->created_at = Carbon::now()->toDateTimeString();
        $this->message->updated_at = Carbon::now()->toDateTimeString();

        $this->message->save();

        return $this->message->id;
    }
}
