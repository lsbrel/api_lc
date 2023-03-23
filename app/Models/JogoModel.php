<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JogoModel extends Model
{
    use HasFactory;

    
    protected static function listarJogos(){
        return DB::select("SELECT * FROM jogo_lc ORDER BY data_jogo");
    }
    protected static function listarJogosDisponiveis(){
        return DB::select("SELECT * FROM jogo_lc 
                    LEFT JOIN arena_lc ON arena_jogo = id_arena 
                    WHERE data_jogo > NOW() ORDER BY data_jogo");
    }

    protected static function criarJogo($data){
        return DB::insert("INSERT INTO jogo_lc SET nome_jogo = '${data['nome']}', fk_criador = '${data['criador']}',
                    arena_jogo = '${data['arena']}', esporte_jogo = '${data['esporte']}', 
                    data_jogo = '${data['dia']}', comunicado_jogo = '${data['comunicado']}'");
    }

    protected static function removerJogo($id){
        return DB::delete("DELETE FROM jogo_lc WHERE id_jogo = '$id' ");
    }

    protected static function atualizarJogo($data){
        return DB::update("UPDATE jogo_lc SET nome_jogo = '${data['nome']}', fk_criador = '${data['criador']}',
                    arena_jogo = '${data['arena']}', esporte_jogo = '${data['esporte']}', 
                    data_jogo = '${data['dia']}', comunicado_jogo = '${data['comunicado']}'
                    WHERE id_jogo = '${data['id']}'");
    }

}
