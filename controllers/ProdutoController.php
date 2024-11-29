<?php
//usuarioControler.php
require_once './models/Produto.php';
require_once './models/Categoria.php';
require_once './models/Fornecedor.php';
require_once './models/Movimentacao.php';

class ProdutoController
{

    protected $modelProduto;
    protected $modelCategoria;
    protected $modelFornecedor;
    protected $modelMovimentacao;

    function __construct()
    {
        $this->modelProduto = new ProdutoModel;
        $this->modelCategoria = new CategoriaModel;
        $this->modelFornecedor = new FornecedorModel;
        $this->modelMovimentacao = new MovimentacaoModel;
    }



    function selectAll()
    {
        $result = $this->modelProduto->selectAll();
        $resultCat = $this->modelCategoria->selectAll();
        $resultFor = $this->modelFornecedor->selectAll();
        require('./views/produtos.php');
    }

    function selectById($id)
    {
        $result = $this->modelProduto->selectById($id);
        $resultCat = $this->modelCategoria->selectAll();
        $resultFor = $this->modelFornecedor->selectAll();

        require('./views/visualizar_produto.php');
    }

    function insert($data)
    {
        // Verifique se o formulário foi enviado


            // Insira o produto no banco de dados
            $result = $this->modelProduto->criarProduto($data);

            if ($result['rowCount'] > 0) {

                // Insere na tabela MOVIMENTACAO
                $dataMovimentacao = array(
                    'tipo' => 'E',
                    'id_produto' => $result['idProduto'],
                    'quantidade' => $data['estoque_disponivel']
                );
                $this->modelMovimentacao->criarMovimentacao($dataMovimentacao);

                $_SESSION['message'] = 'Produto inserido com sucesso!';
                $_SESSION['messageType'] = 'success';
            } else {
                $_SESSION['message'] = 'Erro ao inserir o produto!';
                $_SESSION['messageType'] = 'error';
            }

            // Redirecione para a página de produtos
            header('Location: ./Produto.php');
    }

    function delete($id)
    {
        $result = $this->modelProduto->delete($id);
        if ($result > 0) {
            $_SESSION['message'] = 'Pessoa excluída com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./Produto.php');
    }

    function editar($id)
    {
        $result = $this->modelProduto->selectById($id);
        require('./views/produtos.php');


        header('Location: ./Produto.php');
    }


    function update($data)
    {
        $result = $this->modelProduto->update($data);
        if ($result > 0) {
            $_SESSION['message'] = 'Produto alterada com sucesso!';
            $_SESSION['messageType'] = 'success';
        }
        header('Location: ./Produto.php');
    }
}


