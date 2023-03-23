<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JogoModel;

class JogoController extends Controller
{   

    // Funcoes Auxiliares
    private function reponseForRequest($tipo, $conteudo){
        return response()->json([
            $tipo => $conteudo
        ]);
    }

    // Listagems
    public function jogos(){
        return JogoModel::listarJogosDisponiveis();
    }
    public function todosJogos(){
        return JogoModel::listarJogos();
    }


    // CRUD 
    public function criarJogo(Request $req){
        // Validadar caso dados estejam faltando
        if(!$req->nome || !$req->arena || !$req->id || !$req->esporte || !$req->dia)
            return $this->reponseForRequest("Error", "Argumentos faltando");

        // Executa a insercao no banco
        if(JogoModel::criarJogo($req)) 
            return $this->reponseForRequest("Success", "Dados inseridos");
        else 
            return $this->reponseForRequest("Error", "Dados não inseridos");
    }

    public function removerJogo(Request $req){
        // Validar Dados
        if(!$req->id) 
            return $this->reponseForRequest("Error", "Argumentos Faltando");
        
        if(JogoModel::removerJogo($req->id))
            return $this->reponseForRequest("Success", "Dados Removidos");
        else
            return $this->reponseForRequest("Error", "Dados não removidos");
    }

    public function atualizarJogo(Request $req){
        if(!$req->id || !$req->nome || !$req->arena || !$req->criador || !$req->esporte || !$req->dia)
            return $this->reponseForRequest("Error", "Argumentos faltando");
        
        if(JogoModel::atualizarJogo($req))
            return $this->reponseForRequest("Success", "Dados Atualizados");
        else 
            return $this->reponseForRequest("Error", "Dados não atualizados");

    }
}
