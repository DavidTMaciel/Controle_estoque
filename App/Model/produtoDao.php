<?php
 namespace App\Model;


class ProdutoDao{
    public function create(Produto $p){

        $sql = "INSERT INTO estoque (nome,preco,quantidade) VALUES (?,?,?)";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getPreco());
        $stmt->bindValue(3, $p->getQuantidade());
        $stmt->execute();

    }
    public function read(){
        $sql = "SELECT * FROM estoque";

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
    public function update(Produto $p, $baixa){
        $novaQuantidade = $p->getQuantidade() - $baixa;
        $sql = 'UPDATE estoque SET quantidade =? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $novaQuantidade);
        $stmt->bindValue(2, $p->getId());
        $stmt->execute();

    }
    public function delete($id){
        
        $sql = 'DELETE FROM estoque WHERE id =?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}