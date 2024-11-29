<?php
//Usuario.php
require_once './utils/auth.php';
require_once './models/ConexaoBanco.php';

class UsuarioModel extends ConexaoBanco
{

    function __construct()
    {
        parent::__construct();
    }

    function login($data)
    {
        $sql = $this->conBD->prepare("SELECT * FROM usuario WHERE email=:email AND senha=:senha");
        $sql->bindParam(':email', $data['email']);
        $sql->bindParam(':senha', $data['senha']);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $result = $sql->fetch();

            $_SESSION['usuario_id'] = $result['id_usuario'];
            $_SESSION['usuario_nome'] = $result['nome'];

            return true;
        } else {
            return false;
        }
    }

    function signin($data)
    {
        $sql = $this->conBD->prepare("INSERT INTO usuario (nome, email, senha, cpf, idade, telefone, endereco, observacao) VALUES (:nome, :email, :senha, :cpf, :idade, :telefone, :endereco, :observacao)");
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':email', $data['email']);
        $sql->bindParam(':senha', $data['senha']);
        $sql->bindParam(':cpf', $data['cpf']);
        $sql->bindParam(':idade', $data['idade']);
        $sql->bindParam(':telefone', $data['telefone']);
        $sql->bindParam(':endereco', $data['endereco']);
        $sql->bindParam(':observacao', $data['observacao']);
        $sql->execute();
        return $sql->rowCount();
    }

    function selectById($id)
    {
        $sql = $this->conBD->prepare("SELECT id_usuario, nome, email, senha, cpf, idade, telefone, endereco, observacao, img FROM usuario WHERE id_usuario=:id");
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch();
    }

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

    function update($data)
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

        // $data['id'] = $_SESSION['usuario_id'];

        // Atualiza o produto no banco de dados
        $sql = $this->conBD->prepare("UPDATE usuario SET nome = :nome, email = :email, cpf = :cpf, idade = :idade, telefone = :telefone, endereco = :endereco, observacao = :observacao, img = :img WHERE id_usuario = :id");
        $sql->bindParam(':id', $data['id']);
        $sql->bindParam(':nome', $data['nome']);
        $sql->bindParam(':email', $data['email']);
        $sql->bindParam(':cpf', $data['cpf']);
        $sql->bindParam(':idade', $data['idade']);
        $sql->bindParam(':telefone', $data['telefone']);
        $sql->bindParam(':endereco', $data['endereco']);
        $sql->bindParam(':observacao', $data['observacao']);
        $sql->bindParam(':img', $data['image']);
        $sql->execute();
        return $sql->rowCount();
    }
}
