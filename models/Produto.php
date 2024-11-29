<?php
//Usuario.php
require_once './models/ConexaoBanco.php';

class ProdutoModel extends ConexaoBanco
{

    function __construct()
    {
        parent::__construct();
    }

    function selectAll()
    {
        $sql = $this->conBD->prepare("SELECT * FROM produto WHERE ativo = 'Y' ORDER BY id;");
        $sql->execute();
        return $sql->fetchAll();
    }

    function selectById($id)
    {
        $sql = $this->conBD->prepare("SELECT produto.*, categoria_produto.nome AS categoria_nome, fornecedor.nome AS fornecedor_nome FROM produto JOIN categoria_produto ON produto.categoria_produto_id_categoria = categoria_produto.id_categoria JOIN fornecedor ON produto.fornecedor_id_fornecedor = fornecedor.id WHERE produto.id = :id AND ativo = 'Y'");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch();
    }





    // Função para salvar a imagem no ImgBB
    private function saveImageToImgBB($image, $name = null)
    {
        $API_KEY = '4e6bfecad7ed7767274db33e2fd2e04d'; // Substitua pela sua chave API do ImgBB
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $API_KEY);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        if (isset($image['tmp_name']) && !empty($image['tmp_name'])) {
            $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
            $file_name = ($name) ? $name . '.' . $extension : $image['name'];
            $data = array('image' => base64_encode(file_get_contents($image['tmp_name'])), 'name' => $file_name);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        } else {
            return 'Error: No file uploaded.';
        }

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return 'Error:' . curl_error($ch);
        } else {
            return json_decode($result, true);
        }
        curl_close($ch);
    }

    function criarProduto($data)
    {
        // Verificar se o usuário enviou uma imagem
        if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {
            // Upload da imagem para o ImgBB
            $imgbbResponse = $this->saveImageToImgBB($_FILES['imagem'], 'produto');
            if (isset($imgbbResponse['data']['url'])) {
                $data['imagem'] = $imgbbResponse['data']['url']; // Armazena a URL da imagem no banco de dados
            } else {
                // Exibir erro caso não tenha sido possível fazer o upload
                echo 'Erro ao enviar a imagem para o ImgBB.';
                return false;
            }
        } else {
            $data['imagem'] = null; // Define a imagem como null caso não tenha sido enviada
        }
        $ativo = 'Y';
        // Insere o produto no banco de dados
        $sql = $this->conBD->prepare("INSERT INTO produto (nome, tipo_unidade, observacoes, valor_custo, valor_venda, estoque_disponivel, estoque_minimo, estoque_maximo, categoria_produto_id_categoria, fornecedor_id_fornecedor, imagem, ativo) VALUES (:nome, :tipo_unidade, :observacoes, :valor_custo, :valor_venda, :estoque_disponivel, :estoque_minimo, :estoque_maximo, :categoria_produto_id_categoria, :fornecedor_id_fornecedor, :imagem, :ativo) ");
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':tipo_unidade', $data['tipo_unidade']);
        $sql->bindParam(':observacoes', $data['observacoes']);
        $sql->bindParam(':valor_custo', $data['valor_custo']);
        $sql->bindParam(':valor_venda', $data['valor_venda']);
        $sql->bindParam(':estoque_disponivel', $data['estoque_disponivel']);
        $sql->bindParam(':estoque_minimo', $data['estoque_minimo']);
        $sql->bindParam(':estoque_maximo', $data['estoque_maximo']);
        $sql->bindParam(':categoria_produto_id_categoria', $data['categoria_produto_id_categoria']);
        $sql->bindParam(':fornecedor_id_fornecedor', $data['fornecedor_id_fornecedor']);
        $sql->bindParam(':imagem', $data['imagem']);
        $sql->bindParam(':ativo', $ativo);
        $sql->execute();

        $dataResult = array(
            "rowCount" => $sql->rowCount(),
            "idProduto" => $this->conBD->lastInsertId()
        );

        return $dataResult;
    }

    function delete($id)
    {
        $sql = $this->conBD->prepare("UPDATE produto SET ativo = 'N' WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->rowCount();
    }

    function update($data)
    {
        // Verifica se uma nova imagem foi enviada
        if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {
            // Upload da imagem para o ImgBB
            $imgbbResponse = $this->saveImageToImgBB($_FILES['imagem'], 'produto');
            if (isset($imgbbResponse['data']['url'])) {
                $data['imagem'] = $imgbbResponse['data']['url']; // Armazena a URL da imagem no banco de dados
            } else {
                // Exibir erro caso não tenha sido possível fazer o upload
                echo 'Erro ao enviar a imagem para o ImgBB.';
                return false;
            }
        } else {
            // Mantém a imagem atual se uma nova imagem não for enviada
            $sql = $this->conBD->prepare("SELECT imagem FROM produto WHERE id = :id");
            $sql->bindParam(':id', $data['id']);
            $sql->execute();
            $result = $sql->fetch();
            $data['imagem'] = $result['imagem'];
        }

        // Atualiza o produto no banco de dados
        $sql = $this->conBD->prepare("UPDATE produto SET nome = :nome, tipo_unidade = :tipo_unidade, observacoes = :observacoes, valor_custo = :valor_custo, valor_venda = :valor_venda, estoque_disponivel = :estoque_disponivel, estoque_minimo = :estoque_minimo, estoque_maximo = :estoque_maximo, categoria_produto_id_categoria = :categoria_produto_id_categoria, fornecedor_id_fornecedor = :fornecedor_id_fornecedor, imagem = :imagem WHERE id = :id");
        $sql->bindParam(':id', $data['id']);
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':tipo_unidade', $data['tipo_unidade']);
        $sql->bindParam(':observacoes', $data['observacoes']);
        $sql->bindParam(':valor_custo', $data['valor_custo']);
        $sql->bindParam(':valor_venda', $data['valor_venda']);
        $sql->bindParam(':estoque_disponivel', $data['estoque_disponivel']);
        $sql->bindParam(':estoque_minimo', $data['estoque_minimo']);
        $sql->bindParam(':estoque_maximo', $data['estoque_maximo']);
        $sql->bindParam(':categoria_produto_id_categoria', $data['categoria_produto_id_categoria']);
        $sql->bindParam(':fornecedor_id_fornecedor', $data['fornecedor_id_fornecedor']);
        $sql->bindParam(':imagem', $data['imagem']);
        $sql->execute();
        return $sql->rowCount();
    }
}
