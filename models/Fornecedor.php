<?php
//Usuario.php
require_once './models/ConexaoBanco.php';

class FornecedorModel extends ConexaoBanco
{

    function __construct()
    {
        parent::__construct();
    }

    function selectAll()
    {
        $sql = $this->conBD->prepare("SELECT * FROM fornecedor ORDER BY id");
        $sql->execute();
        return $sql->fetchAll();
    }

    function selectById($id)
    {
        $sql = $this->conBD->prepare("SELECT * FROM fornecedor WHERE id=:id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch();
    }

    function insert($data) {
        $sql = $this->conBD->prepare("INSERT INTO fornecedor (nome, email, observacao, cpf_cnpj, telefone) VALUES (:nome, :email, :observacao, :cpf_cnpj, :telefone)");
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':email', $data['email']);
        $sql->bindParam(':observacao', $data['observacao']);
        $sql->bindParam(':cpf_cnpj', $data['cpf_cnpj']);
        $sql->bindParam(':telefone', $data['telefone']);
        $sql->execute();
        return $sql->rowCount();
    }

    function delete($id) {
        $sql = $this->conBD->prepare("DELETE FROM fornecedor WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->rowCount();
    }

    function update($data)
    {    
        // Atualiza o produto no banco de dados
        $sql = $this->conBD->prepare("UPDATE fornecedor SET nome = :nome, email = :email, observacao = :observacao, cpf_cnpj = :cpf_cnpj, telefone = :telefone WHERE id = :id");
        $sql->bindParam(':id', $data['id']);
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':email', $data['email']);
        $sql->bindParam(':observacao', $data['observacao']);
        $sql->bindParam(':cpf_cnpj', $data['cpf_cnpj']);
        $sql->bindParam(':telefone', $data['telefone']);
        $sql->execute();
        return $sql->rowCount();
    }
}
