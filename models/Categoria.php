<?php
//Usuario.php
require_once './models/ConexaoBanco.php';

class CategoriaModel extends ConexaoBanco
{

    function __construct()
    {
        parent::__construct();
    }

    function selectAll()
    {
        $sql = $this->conBD->prepare("SELECT * FROM categoria_produto ORDER BY nome");
        $sql->execute();
        return $sql->fetchAll();
    }

    function selectById($id)
    {
        $sql = $this->conBD->prepare("SELECT * FROM categoria_produto WHERE id_categoria=:id ");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch();
    }

    function insert($data)
    {
        $sql = $this->conBD->prepare("INSERT INTO categoria_produto (nome, descricao) VALUES (:nome, :descricao)");
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':descricao', $data['descricao']);
        $sql->execute();
        return $sql->rowCount();
    }

    function delete($id_categoria) {
        $sql = $this->conBD->prepare("DELETE FROM categoria_produto WHERE id_categoria = :id_categoria");
        $sql->bindParam(':id_categoria', $id_categoria);
        $sql->execute();
        return $sql->rowCount();
    }

    function update($data){

        // Atualiza o produto no banco de dados
        $sql = $this->conBD->prepare("UPDATE categoria_produto SET nome = :nome, descricao = :descricao WHERE id_categoria = :id");
        $sql->bindParam(':id', $data['id']);
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':descricao', $data['descricao']);
        
        $sql->execute();
        return $sql->rowCount();
    }
}
    