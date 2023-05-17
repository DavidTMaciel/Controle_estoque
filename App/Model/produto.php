<?php
 namespace App\Model;

class Produto{
    private $id,$nome, $preco, $quantidade, $devolucao;

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        return $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

}

