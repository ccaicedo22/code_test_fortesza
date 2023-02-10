<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\Sp;

class MessageController extends Controller
{
    use Sp;
    public function sendMessage(Request  $request)
    {
        $message = new Message();
        $message->user_id_send = $request->user_id_send;
        $message->message = $request->message;
        $message->user_id_receive = $request->user_id_receive;      
        $message->created_at = Carbon::now()->toDateTimeString();
        $message->updated_at = Carbon::now()->toDateTimeString();

        $message->save();

        $id_message = $message->id;

        $sendFile=$this->sendFile($request,$request->user_id_send,$request->user_id_receive,$id_message);


        return response()->json([
            'message' => 'Mensaje enviado exitosamente!',
            'user' => $message
        ], 201);
    }


    public function showMessages(Request  $request)
    {
        
        $user_id_send = $request->user_id_send;
        $user_id_receive =$request->user_id_receive;
        $limit = 15;
        $offset = $limit * ($request->page - 1);
       
        $message  = $this->executeSP("CALL lsp_showMessages(
            :p_user_id_send,
            :p_user_id_receive,
            :p_offset,
            :p_limit
        )",[
            'p_user_id_send' => $user_id_send,
            'p_user_id_receive' => $user_id_receive,
            'p_offset'=> $offset ,
            'p_limit'=> $limit
        ]);
        
        return response()->json([
            'message' => '¡Historial del chat consultado exitosamente!',
            'save' => $message
        ], 201);
    }

    public function sendFile(Request  $request,$user_id_send,$user_id_receive,$id_message ){
        
        
       if($request->hasFile('file')){
           $file = $request->file('file');
           $file_name = $file->getClientOriginalName();
           $file_name = pathinfo($file_name, PATHINFO_FILENAME);
           $name_file = str_replace(" ","_",$file_name);
           $extension = $file->getClientOriginalExtension(); 

           $picture = date('His').'-'.$name_file.'.'.$extension;       
           $file->move(public_path('files/'),$picture) ;
           
           $save = $this->executeSP("CALL lsp_upload_file(:p_user_id_send,:p_user_id_receive,:p_file_name,:p_now,:p_id_message)", [
            "p_user_id_send" => $user_id_send,
            "p_user_id_receive" => $user_id_receive,
            "p_file_name" => $picture,
            "p_now" => Carbon::now()->toDateTimeString(),
            "p_id_message"=>$id_message
        ]);

        return response()->json([
            'message' => '¡Archivo cargado exitosamente!',
            'save' => $save
        ], 201);

           
       }else{
            return response()->json(["mensaje" => "Error x"]);
       }

    }
}
