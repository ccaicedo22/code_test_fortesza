<?php
namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait Sp
{

    public function executeSP(String $sp,Array $params = [], String $first = null): Array{
        $resp = [];
        $status = false;
        $this->sp_error = false;
        $this->sp_msg_error =  "";
        try {
           
            $db = DB::getPdo();
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true); 
            $queryResult = $db->prepare($sp);
            $queryResult->execute($params);
            $data = $queryResult->fetchAll(\PDO::FETCH_OBJ);
            $status = true;
            $queryResult->closeCursor();
        } catch (\Throwable $th) {
            $data = $th->getMessage();            
        }
        if(!$status){
            $this->sp_error = true;
            $this->sp_msg_error =  $data;

            try {
                $this->logSpFails($sp, $th->getMessage(), $params);
            } catch (\Throwable $th) {
            }
        }
        if ($status && $first === '1') {
            return (isset($data[0])) ? $data[0] : $data;
        } else {
            return [
                'status' => $status,
                'data' => $data
            ];
        }
    }

    public function executeReadSp(String $sp, Array $params = []):Array{
        $resp = [];
        $status = false;
        $this->sp_error = false;
        $this->sp_msg_error =  "";
        try {
            $data = DB::select($sp, $params);
            $status = true;
        } catch (\Throwable $th) {
            $data = $th->getMessage();
            try {
                $this->logSpFails($sp, $th->getMessage(), $params);
            } catch (\Throwable $th) {              
            }            
        }
        if(!$status){
            $this->sp_error = true;
            $this->sp_msg_error =  $data;
        }

        return [
            'status' => $status,
            'data' => $data
        ];
    }  

}