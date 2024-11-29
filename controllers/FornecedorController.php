<?php
//usuarioControler.php
require_once './models/Fornecedor.php';

class FornecedorController
{

    protected $model;

    function __construct()
    {
        $this->model = new FornecedorModel;
    }



    function selectAll()
    {
        $result = $this->model->selectAll();
        require('./views/fornecedores.php');

    }

    function selectById($id)
    {
        $result = $this->model->selectById($id);

        require('./views/visualizar_fornecedor.php');
    }



    function insert($data) {
        $result = $this->model->insert($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Fornecedor inserido com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./fornecedor.php');
    }

    function delete($id)
    {
        $result = $this->model->delete($id);
        if ($result > 0) {
            $_SESSION['message'] = 'Fornecedor excluído com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./fornecedor.php');
    }

    function editar($id)
    {
        $result = $this->model->selectById($id);
        require('./views/fornecedor.php');


        header('Location: ./Produto.php');
    }

    function update($data)
    {
        $result = $this->model->update($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Fornecedor alterado com sucesso!';
            $_SESSION['messageType'] = 'success';
        }else{
            echo('erro')
;        }
        header('Location: ./Fornecedor.php');
    }


}
