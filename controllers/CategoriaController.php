<?php
//usuarioControler.php
require_once './models/Categoria.php';

class CategoriaController
{

    protected $model;

    function __construct()
    {
        $this->model = new CategoriaModel;
    }



    function selectAll()
    {
        $result = $this->model->selectAll();
        require('./views/categorias.php');

    }



    function insert($data) {
        $result = $this->model->insert($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Categoria inserido com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./Categoria.php');
    }

    function delete($id)
    {
        $result = $this->model->delete($id);
        if ($result > 0) {
            $_SESSION['message'] = 'Categoria excluída com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./Categoria.php');
    }

    function selectById($id)
    {
        $result = $this->model->selectById($id);
        require('./views/visualizar_categoria.php');
    }

    function update($data)
    {
        $result = $this->model->update($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Categoria alterada com sucesso!';
            $_SESSION['messageType'] = 'success';
        } else {
            $_SESSION['message'] = 'Erro ao inserir a categoria!';
            $_SESSION['messageType'] = 'error';
        }
        header('Location: ./Categoria.php');
    }


}
