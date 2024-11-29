<?php

//Usuario.php
require_once './models/ConexaoBanco.php';

class MovimentacaoModel extends ConexaoBanco
{

    function __construct()
    {
        parent::__construct();
    }

    function selectAll()
    {
        $sql = $this->conBD->prepare("SELECT m.data, m.hora, m.id_movimentacao, u.nome AS nome_usuario, m.tipo, p.nome AS nome_produto, m.quantidade FROM movimentacao m JOIN usuario u ON m.fk_usuario_id_usuario = u.id_usuario JOIN produto p ON m.id_produto = p.id;");
        $sql->execute();
        return $sql->fetchAll();
    }

    function criarMovimentacao($data)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date("Y/m/d");
        $hora_atual = date("H:i:s");
        $usuario = $_SESSION['usuario_id'];

        $sql = $this->conBD->prepare("INSERT INTO movimentacao (data, hora, fk_usuario_id_usuario, tipo, id_produto, quantidade) VALUES (:data, :hora, :fk_usuario_id_usuario, :tipo, :id_produto, :quantidade)");
        $sql->bindParam(':data', $data_atual);
        $sql->bindParam(':hora', $hora_atual);
        $sql->bindParam(':fk_usuario_id_usuario', $usuario);
        $sql->bindParam(':tipo', $data['tipo']);
        $sql->bindParam(':id_produto', $data['id_produto']);
        $sql->bindParam(':quantidade', $data['quantidade']);
        $sql->execute();
        echo $sql->rowCount();
        return $sql->rowCount();
    }



    // function insert($data) {
    //     $sql = $this->conBD->prepare("INSERT INTO fornecedor (nome, email, observacao, cpf_cnpj, telefone) VALUES (:nome, :email, :observacao, :cpf_cnpj, :telefone)");
    //     $sql->bindParam(':nome', $data['nome']);
    //     $sql->bindParam(':email', $data['email']);
    //     $sql->bindParam(':observacao', $data['observacao']);
    //     $sql->bindParam(':cpf_cnpj', $data['cpf_cnpj']);
    //     $sql->bindParam(':telefone', $data['telefone']);
    //     $sql->execute();
    //     return $sql->rowCount();
    // }

    // function delete($id) {
    //     $sql = $this->conBD->prepare("DELETE FROM fornecedor WHERE id = :id");
    //     $sql->bindParam(':id', $id);
    //     $sql->execute();
    //     return $sql->rowCount();
    // }
}
