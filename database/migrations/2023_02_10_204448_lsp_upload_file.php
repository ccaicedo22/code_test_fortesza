<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $procedure ="
            DROP PROCEDURE lsp_upload_file;
            CREATE PROCEDURE `lsp_upload_file`(
            p_user_id_send INT,
            p_user_id_receive INT,  
            p_file_name TEXT,
            p_now VARCHAR(20), 
            p_id_message INT)
            BEGIN
              INSERT INTO `upload_file` (`user_id_send`, `user_id_receive`,`file_name`, `id_message`, `created_at`, `updated_at`) 
              VALUES (p_user_id_send,p_user_id_receive,p_file_name,p_id_message, p_now, p_now);
                
            END";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $procedure ="";
        DB::unprepared($procedure);
    }
};
