<?php

namespace App\Model;

class Usuario{

    private $id, $nome,$senha, $email;

    public function getId(){
        return $this->id;
    }
    public function setID($id){
        return $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        return $this->nome = $nome;
    }

    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        return $this->senha = $senha;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        return $this->email = $email;
    }
}