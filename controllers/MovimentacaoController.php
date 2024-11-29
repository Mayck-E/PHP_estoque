<?php
//usuarioControler.php
require_once './models/Movimentacao.php';

class MovimentacaoController
{

    protected $model;

    function __construct()
    {
        $this->model = new MovimentacaoModel;
    }



    function selectAll()
    {
        $result = $this->model->selectAll();
        require('./views/movimentacoes.php');

    }



    // function insert($data) {
    //     $result = $this->model->insert($data);
    //     if ($result > 0) {
    //         $_SESSION['message'] = 'Fornecedor inserido com sucesso!';
    //         $_SESSION['messageType'] = 'success';
    //     }
    //     header('Location: ./fornecedor.php');
    // }

    // function delete($id)
    // {
    //     $result = $this->model->delete($id);
    //     if ($result > 0) {
    //         $_SESSION['message'] = 'Fornecedor excluído com sucesso!';
    //         $_SESSION['messageType'] = 'success';
    //     }
    //     header('Location: ./fornecedor.php');
    // }


}
