<?php
if (!empty($result['id'])) {
    // EDITAR
    $titulo = 'Editar Produto';
    $action = 'update';
    $id = $result['id'];
    $nome = $result['nome'];
    $tipo_unidade = $result['tipo_unidade'];
    $observacoes = $result['observacoes'];
    $valor_custo = $result['valor_custo'];
    $lucro = $result['lucro'];
    $valor_venda = $result['valor_venda'];
    $estoque_disponivel = $result['estoque_disponivel'];
    $estoque_minimo = $result['estoque_minimo'];
    $estoque_maximo = $result['estoque_maximo'];

    // Usando o nome da categoria da variável data
    $categoria_nome = $result['categoria_nome'];
    $fornecedor = $result['fornecedor_nome'];
    $imagem = $result['imagem'];
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

                        <form class="user" method="post" action="<?= $editMode ? './Produto.php?action=update' : '' ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= $id ?>">

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nome">Nome do Produto</label>
                                    <input type="text" class="form-control form-control-user" name="nome" id="nome" placeholder="Nome do Produto" value="<?= $nome ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                                <div class="col-sm-6">
                                    <label for="tipo_unidade">Unidade</label>
                                    <input type="text" class="form-control form-control-user" name="tipo_unidade" id="tipo_unidade" placeholder="Unidade" value="<?= $tipo_unidade ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="observacoes">Observações</label>
                                <textarea class="form-control form-control-user" name="observacoes" id="observacoes" placeholder="Observações do Produto <?= $id ?>" rows="3" <?= $editMode ? '' : 'disabled' ?>><?= $observacoes ?></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="valor_custo">Valor de Custo (R$)</label>
                                    <input type="number" step="0.01" class="form-control form-control-user" name="valor_custo" id="valor_custo" placeholder="Valor de Custo" value="<?= $valor_custo ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <label for="lucro">Lucro (R$)</label>
                                    <input type="number" step="0.01" class="form-control form-control-user" name="lucro" id="lucro" placeholder="Lucro" value="<?= $lucro ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div> -->
                                <div class="col-sm-4">
                                    <label for="valor_venda">Valor de Venda (R$)</label>
                                    <input type="number" step="0.01" class="form-control form-control-user" name="valor_venda" id="valor_venda" placeholder="Valor de Venda" value="<?= $valor_venda ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="estoque_disponivel">Estoque Disponível</label>
                                    <input type="number" class="form-control form-control-user" name="estoque_disponivel" id="estoque_disponivel" placeholder="Estoque Disponível" value="<?= $estoque_disponivel ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                                <div class="col-sm-4">
                                    <label for="estoque_minimo">Estoque Mínimo</label>
                                    <input type="number" class="form-control form-control-user" name="estoque_minimo" id="estoque_minimo" placeholder="Estoque Mínimo" value="<?= $estoque_minimo ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                                <div class="col-sm-4">
                                    <label for="estoque_maximo">Estoque Máximo</label>
                                    <input type="number" class="form-control form-control-user" name="estoque_maximo" id="estoque_maximo" placeholder="Estoque Máximo" value="<?= $estoque_maximo ?>" required <?= $editMode ? '' : 'disabled' ?>>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="categoria_produto_id_categoria">Categoria</label>
                                <select class="form-control form-control-user"
                                    name="categoria_produto_id_categoria"
                                    id="categoria_produto_id_categoria" required <?= $editMode ? '' : 'disabled' ?>>
                                    <option value="">Selecione uma Categoria</option>

                                    <?php if ($editMode): ?>
                                        <?php foreach ($resultCat as $linha): ?>
                                            <option value="<?= $linha['id_categoria'] ?>">
                                                <?= $linha['nome'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="<?= $categoria_nome ?>" selected>
                                            <?= $categoria_nome ?>
                                        </option>
                                    <?php endif; ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="fornecedor_id_fornecedor">Fornecedor</label>
                                <select class="form-control form-control-user" name="fornecedor_id_fornecedor" id="fornecedor_id_fornecedor" required <?= $editMode ? '' : 'disabled' ?>>
                                    <option value="">Selecione um Fornecedor</option>

                                    <?php if ($editMode): ?>
                                        <?php foreach ($resultFor as $linha): ?>
                                            <option value="<?= $linha['id'] ?>">
                                                <?= $linha['nome'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="<?= $fornecedor ?>" selected>
                                            <?= $fornecedor ?>
                                        </option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="imagem">Imagem do Produto</label><br>
                                <?php if (!empty($imagem)): ?>
                                    <img src="<?= $imagem; ?>" alt="Imagem atual" width="150" data-bs-toggle="modal" data-bs-target="#modalImg"> <?php endif; ?>
                                <?php if ($editMode): ?>
                                    <input type="file" class="form-control form-control-user" name="imagem" id="imagem" accept="image/*">
                                <?php endif; ?>

                                <div class="modal fade" id="modalImg" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <img src="<?= $imagem ?>" alt="Imagem do Produto Ampla" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <?php if ($editMode): ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="save">Salvar</button>
                                <button type="button" class="btn btn-secondary btn-user btn-block" name="cancel" onclick="window.location.href='./Produto.php';">Cancelar</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary btn-user mr-2" name="edit">Editar</button>
                                <button type="button" class="btn btn-secondary btn-user btn-block" name="cancel" onclick="window.location.href='./Produto.php';">Cancelar</button>
                                <!-- <button type="button" class="btn btn-danger btn-user" name="delete" onclick="if(confirm('Tem certeza que deseja excluir este produto?')) { window.location.href='./Produto.php?action=delete&id=<?= $id ?>'; }">Excluir</button> -->
                                
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
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você realmente deseja deletar o produto?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="window.location.href='./Produto.php?action=delete&id=<?= $id ?>'">Deletar</button>
            </div>
        </div>
    </div>
</div>


<?php include './views/includes/footer.php'; ?>