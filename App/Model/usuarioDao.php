<?php

namespace App\Model;

class usuarioDao{

    public function create (Usuario $u){

        $sql = "INSERT INTO usuario (nome,senha,email) VALUES (?,?,?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $u->getNome());
        $stmt->bindValue(2, $u->getSenha());
        $stmt->bindValue(3, $u->getEmail());
        $stmt->execute();


    }
    public function read(){

        $sql = "SELECT * FROM usuario";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function update(Usuario $u){

        $novaSenha = $u->getSenha();
        $sql = "UPDATE usuario SET senha = ? WHERE id = ?";

        $stmt= Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1,$novaSenha);
        $stmt->execute();
    }
    public function delete(Usuario $id){

        $sql='DELETE FROM usuario WHERE id =?';

        $stmt= Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1,$id);
        $stmt->execute();
    }
    public function getUsuarioByEmailAndPassword($email, $senha) {
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}