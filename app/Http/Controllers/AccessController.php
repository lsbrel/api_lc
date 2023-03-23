<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccessController extends Controller
{
    protected function requestToken(Request $req){
        $token = hash('sha256', uniqid());
        if(DB::insert("INSERT INTO access_token_lc SET created_at=now(), expired_at=date_add(now(), interval 1 day), token_access='${token}'")){
            return response()->json([
                "Token"=>$token
            ]);
        }
    }

    protected function erroPage(){
        return response()->json([
            "Error" => "No Valid Token"
        ]);
    }
    
}
