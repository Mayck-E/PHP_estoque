<?php
if (!empty($result['id_categoria'])) {
    // EDITAR
    $titulo = 'Editar Categoria';
    $action = 'update';
    $nome_categoria = $result['nome'];
    $descricao = $result['descricao'];
    $id = $result['id_categoria'];

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


?>

<body>

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

                            <form class="user" id="formCadastroCategoria" action="<?= $editMode ? './Categoria.php?action=update&id=' . $id : '' ?>" method="post"
                                class="user">
                                <input type="hidden" name="id" id="id" value="<?= $id ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="nome" id="nome"
                                        placeholder="Nome" required <?= $editMode ? '' : 'disabled' ?> value="<?= $nome_categoria ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="descricao" id="descricao"
                                        placeholder="Descrição" required <?= $editMode ? '' : 'disabled' ?> value="<?= $descricao ?>">
                                </div>

                                <div class="modal-footer">
                                <br>
                                <?php if ($editMode): ?>
                                    <button type="submit" class="btn btn-primary btn-user btn-block" name="save">Salvar</button>
                                    <button type="button" class="btn btn-secondary btn-user btn-block" name="cancel" onclick="window.location.href='./Categoria.php';">Cancelar</button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-primary btn-user mr-2" name="edit">Editar</button>
                                    <button type="button" class="btn btn-secondary btn-user btn-block" name="cancel" onclick="window.location.href='./Categoria.php';">Cancelar</button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Deletar
                                </button>
                                <?php endif; ?>

                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 d-none d-lg-block"></div>
                </div>
            </div>
        </div>
    </div>

    <?php include './views/includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Ao deletar uma categoria você pode estar <b>DELETANDO PRODUTOS</b> que estejam relacionados a ela. <br><br>
                Você realmente deseja deletar esta categoria?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='./Categoria.php?action=delete&id=<?= $id ?>';">Deletar</button>
            </div>
        </div>
    </div>
</div>

</body>

</html>