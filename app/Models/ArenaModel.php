<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArenaModel extends Model
{
    use HasFactory;

    protected static function listarArenas(){
        return DB::select("SELECT * FROM arena_lc");
    }

    protected static function criarArena($data){
        return DB::insert("INSERT INTO arena_lc SET nome_arena = '${data['nome']}', endereco_arena = '${data['endereco']}',
                    tipo_arena = '${data['tipo']}', cobertura_arena = '${data['cobertura']}', tamanho_arena = '${data['tamanho']}',
                    lat = '${data['lat']}', lng = '${data['lng']}'");
    }

    protected static function removerArena($id){
        return DB::delete("DELETE FROM arena_lc WHERE id_arena = '${id}' ");
    }

    protected static function atualizarArena($data){
        return DB::update("UPDATE arena_lc SET nome_arena = '${data['nome']}', endereco_arena = '${data['endereco']}',
                    tipo_arena = '${data['tipo']}', cobertura_arena = '${data['cobertura']}', tamanho_arena = '${data['tamanho']}',
                    lat = '${data['lat']}', lng = '${data['lng']}' WHERE id_arena = '${data['id']}'");
    }
}
