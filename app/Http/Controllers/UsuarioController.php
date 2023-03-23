<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Funcoes Auxiliares
    private function reponseForRequest($tipo, $conteudo){
        return response()->json([
            $tipo => $conteudo
        ]);
    }
    public function usuarios(){
        return UsuarioModel::listarUsuarios();
    }

    public function criarUsuario(Request $req){
        // Validação de dados/
        if(!$req->nome || !$req->senha || !$req->idade || !$req->cep)
            return $this->reponseForRequest("Error", "Argumentos Faltando");
        
        if(UsuarioModel::criarUsuario($req))
            return $this->reponseForRequest("Success", "Dados criados");
        else 
            return $this->reponseForRequest("Error", "Dados não criados");
    }

    public function removerUsuario(Request $req){
        // Validar dados
        if(!$req->id)
            return $this->reponseForRequest("Error", "Argumentos Faltando");

        if(UsuarioModel::removerUsuario($req->id))
            return $this->reponseForRequest("Success", "Dados removidos");
        else 
            return $this->reponseForRequest("Error", "Dados não removidos");
    }

    public function atualizarUsuario(Request $req){
        // Validação de dados/
        if(!$req->senha || !$req->nome || !$req->idade || !$req->cep || !$req->id)
                return $this->reponseForRequest("Error", "Argumentos Faltando");
        
        if(UsuarioModel::atualizarUsuario($req))
            return $this->reponseForRequest("Success", "Dados atualizados");
        else 
            return $this->reponseForRequest("Error", "Dados não atualizados");
    }
}
