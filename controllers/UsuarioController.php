<?php
//usuarioControler.php
require_once './models/Usuario.php';

class UsuarioController
{

    protected $model;

    function __construct()
    {
        $this->model = new UsuarioModel;
    }

    function logout()
    {
        session_destroy();
        header('Location: ./index.php?action=entrar');
    }

    function login($data)
    {
        $result = $this->model->login($data);

        if ($result == false) {
            $_SESSION['login_error'] = 'Usuário ou senha inválidos';
            header('Location: ./index.php?action=entrar');
        } else {
            unset($_SESSION['login_error']);
            header('Location: ./dashboard.php'); // Redireciona para a página inicial
        }
    }

    function signin($data) {
        $result = $this->model->signin($data);
        header('Location: ./index.php?action=entrar');
    }

    function selectById($id)
    {
        $result = $this->model->selectById($id);

        require('./views/perfil.php');
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
        header('Location: ./Perfil.php');
    }

}
