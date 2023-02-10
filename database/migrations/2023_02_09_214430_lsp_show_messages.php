<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()


    {
        
        $procedure = "
        DROP PROCEDURE lsp_showMessages;
        CREATE  PROCEDURE `lsp_showMessages`(
            IN `p_user_id_send` INT,
            IN `p_user_id_receive` INT,
            IN `p_offset` INT, 
            IN `p_limit` INT
            )
           BEGIN	
               SELECT message ,m.created_at as fecha From messages m
               INNER JOIN users u ON u.id = m.user_id_receive    
               WHERE (m.user_id_send=1 OR m.user_id_send=2)
               AND (m.user_id_receive=1 OR m.user_id_receive=2)
               ORDER BY m.created_at ASC
                LIMIT p_offset, p_limit;
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
