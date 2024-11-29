<?php
if (!empty($result['id'])) {
    // EDITAR
    $id = 'id';
    $titulo = 'Editar Fornecedor';
    $action = 'update';
    $id = $result['id'];
    $nome = $result['nome'];
    $cpf_cnpj = $result['cpf_cnpj'];
    $observacoes = $result['observacao'];
    $email = $result['email'];
    $telefone = $result['telefone'];
}

$editMode = false;

if (isset($_POST['edit'])) {
    $editMode = true;
}

if (isset($_POST['save'])) {
    // Lógica para salvar as alterações no banco de dados (implementar em Produto.php)
    // ... (Seu código para atualizar o produto no banco de dados) ...

    $editMode = false;
}

if (isset($_POST['delete'])) {
    // Lógica para excluir o produto do banco de dados (implementar em Produto.php)
    // ... (Seu código para excluir o produto do banco de dados) ...
    header("Location: lista_produtos.php"); // Substitua "lista_produtos.php" pelo nome da sua página de listagem
    exit();
}
?>



<?php include './views/includes/header02.php'; ?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-2 d-none d-lg-block"></div>
                <div class="col-lg-8">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"><?= $titulo ?></h1>
                        </div>

                        <form class="user" id="formCadastroFornecedor" action="<?= $editMode ? './Fornecedor.php?action=update' : '' ?>" method="post"
                            class="user">
                            <input type="hidden" name="id" id="id" value="<?= $id ?>">

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="nome" id="nome"
                                    placeholder="Nome" value="<?= $nome ?>" required <?= $editMode ? '' : 'disabled' ?>>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="email"
                                    placeholder="Email" value="<?= $email ?>" required <?= $editMode ? '' : 'disabled' ?>>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="cpf_cnpj" id="cpf_cnpj"
                                    placeholder="CPF/ CNPJ" onkeyup="formatarCPF_CNPJ(this)" value="<?= $cpf_cnpj ?>" required <?= $editMode ? '' : 'disabled' ?>>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="telefone" id="telefone"
                                    placeholder="Telefone" onkeyup="formatarTelefone(this)" value="<?= $telefone ?>" required <?= $editMode ? '' : 'disabled' ?>>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control form-control-user" name="observacao" id="observacao" placeholder="<?= $observacoes ?>" required <?= $editMode ? '' : 'disabled' ?>><?= $observacoes ?></textarea>
                            </div>

                            <br>
                            <?php if ($editMode): ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="save">Salvar</button>
                                <button type="button" class="btn btn-secondary btn-user btn-block" name="cancel" onclick="window.location.href='./Fornecedor.php';">Cancelar</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary btn-user mr-2" name="edit">Editar</button>
                                <button type="button" class="btn btn-secondary btn-user btn-block" name="cancel" onclick="window.location.href='./Fornecedor.php';">Cancelar</button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Deletar
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2 d-none d-lg-block"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ao deletar uma categoria você pode estar <b> deletando os produtos </b> relacionados a ela. 
                Você realmente deseja deletar este fornecedor?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="  window.location.href='./Fornecedor.php?action=delete&id=<?= $id ?>';">Deletar</button>
            </div>
        </div>
    </div>
</div>


<?php include './views/includes/footer.php'; ?>