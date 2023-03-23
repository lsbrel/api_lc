<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class UsuarioModel extends Model
{
    use HasFactory;

    public static function listarUsuarios(){
        return DB::select("SELECT * FROM usuario_lc");
    } 

    protected static function criarUsuario($data){
        return DB::insert("INSERT INTO usuario_lc SET nome_usuario = '${data['nome']}',
                    idade_usuario = '${data['idade']}', cep = '${data['cep']}', senha = '${data['senha']}' ");
    }

    protected static function removerUsuario($id){
        return DB::delete("DELETE FROM usuario_lc WHERE id_usuario = '${id}' ");
    }

    protected static function atualizarUsuario($data){
        return DB::update("UPDATE usuario_lc SET nome_usuario = '${data['nome']}',
                    idade_usuario = '${data['idade']}', cep = '${data['cep']}', senha = '${data['senha']}'
                    WHERE id_usuario = '${data['id']}'");
    }
}
