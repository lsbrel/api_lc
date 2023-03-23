<?php

namespace App\Http\Controllers;

use App\Models\ArenaModel;
use Illuminate\Http\Request;

class ArenaController extends Controller
{
    // Funcoes Auxiliares
    private function reponseForRequest($tipo, $conteudo){
        return response()->json([
            $tipo => $conteudo
        ]);
    }
    public function arenas(){
        return ArenaModel::listarArenas();
    }

    public function criarArena(Request $req){
        // Validação de dados/
        if(!$req->lat || !$req->lng || !$req->endereco || !$req->nome ||
            !$req->tipo || !$req->tamanho)
                return $this->reponseForRequest("Error", "Argumentos Faltando");
        
        if(ArenaModel::criarArena($req))
            return $this->reponseForRequest("Success", "Dados criados");
        else 
            return $this->reponseForRequest("Error", "Dados não criados");
    }

    public function removerArena(Request $req){
        // Validar dados
        if(!$req->id)
            return $this->reponseForRequest("Error", "Argumentos Faltando");

        if(ArenaModel::removerArena($req->id))
            return $this->reponseForRequest("Success", "Dados removidos");
        else 
            return $this->reponseForRequest("Error", "Dados não removidos");
    }

    public function atualizarArena(Request $req){
        // Validação de dados/
        if(!$req->lat || !$req->lng || !$req->endereco || !$req->nome ||
            !$req->tipo || !$req->tamanho || !$req->id)
                return $this->reponseForRequest("Error", "Argumentos Faltando");
        
        if(ArenaModel::atualizarArena($req))
            return $this->reponseForRequest("Success", "Dados atualizados");
        else 
            return $this->reponseForRequest("Error", "Dados não atualizados");
    }
}
