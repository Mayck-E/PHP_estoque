<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <?php include('./views/includes/header02.php') ?>

    <br><br><br>
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="card shadow-lg bg-body-tertiary">
            <div class="card-body p-5">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div>
                            <div class="text-center">
                                <h1 class="h2 text-gray-900 mb-4">Produtos</h1>
                                <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal"
                                    data-bs-target="#cadastroProdutoModal" onclick="limparFormularioCadastro()">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Novo Produto</span>
                                </button>
                            </div>
                            <br>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Nome</th>
                                                <th>Tipo(un)</th>
                                                <th>Categoria</th>
                                                <th>Estoque</th>
                                                <th>Imagem</th>
                                                <th>Visualizar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result as $linha): ?>
                                                <tr>
                                                    <td><?= $linha['nome'] ?></td>
                                                    <td><?= $linha['tipo_unidade'] ?></td>
                                                    <td><?= $linha['categoria_produto_id_categoria'] ?></td> <!-- Exibir nome da categoria -->
                                                    <td><?= $linha['estoque_disponivel'] ?></td>
                                                    <td>
                                                        <?php if (!empty($linha['imagem'])): ?>
                                                            <img src="<?= $linha['imagem']; ?>" alt="Imagem do Produto" width="50" data-bs-toggle="modal" data-bs-target="#modal-<?= $linha['id'] ?>">
                                                            <div class="modal fade" id="modal-<?= $linha['id'] ?>" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <img src="<?= $linha['imagem'] ?>" alt="Imagem do Produto Ampla" class="img-fluid">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal"
                                                            data-bs-target="#visualizarProdutoModal"
                                                            data-produto-id="<?= $linha['id'] ?>"
                                                            data-produto-nome="<?= $linha['nome'] ?>"
                                                            data-produto-tipo-unidade="<?= $linha['tipo_unidade'] ?>"
                                                            data-produto-imagem="<?= $linha['imagem'] ?>"
                                                            data-produto-observacoes="<?= htmlspecialchars($linha['observacoes']) ?>"
                                                            data-produto-valor-custo="<?= $linha['valor_custo'] ?>"
                                                            data-produto-valor-venda="<?= $linha['valor_venda'] ?>"
                                                            data-produto-estoque-disponivel="<?= $linha['estoque_disponivel'] ?>"
                                                            data-produto-estoque-minimo="<?= $linha['estoque_minimo'] ?>"
                                                            data-produto-estoque-maximo="<?= $linha['estoque_maximo'] ?>"
                                                            data-produto-categoria-id="<?= $linha['categoria_produto_id_categoria'] ?>"
                                                            data-produto-fornecedor-id="<?= $linha['fornecedor_id_fornecedor'] ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br><br><br>
                            </div>
                            <div class="card-footer py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Total de Produtos: <?= count($result) ?></h6>
                            </div>

                            <!-- Modal Cadastro -->
                            <div class="modal fade" id="cadastroProdutoModal" tabindex="-1" aria-labelledby="cadastroProdutoModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="cadastroProdutoModalLabel">
                                                <span id="modalTitle">Novo Produto</span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php include_once 'includes/modal_criar.php' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal Visualização -->
                            <div class="modal fade" id="visualizarProdutoModal" tabindex="-1" aria-labelledby="visualizarProdutoModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="visualizarProdutoModalLabel">
                                                <span id="modalTitle">Visualizar Produto</span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="formEditarProduto" action="./Produto.php?action=update" method="post">
                                                <input type="hidden" name="id" id="idProduto" value="">
                                                <div class="form-group">
                                                    <label for="nomeProduto">Nome:</label>
                                                    <input type="text" class="form-control" id="nomeProduto" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tipoUnidade">Tipo de Unidade:</label>
                                                    <input type="text" class="form-control" id="tipoUnidade" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="imagemProduto">Imagem:</label>
                                                    <img id="imagemProduto" src="#" alt="Imagem do Produto" style="max-width: 100px; max-height: 100px;">
                                                    <input type="file" class="form-control-file" id="novaImagem" accept="image/*" style="display: none;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="observacoes">Observações:</label>
                                                    <textarea class="form-control" id="observacoes" disabled></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="valorCusto">Valor de Custo:</label>
                                                    <input type="number" class="form-control" id="valorCusto" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="valorVenda">Valor de Venda:</label>
                                                    <input type="number" class="form-control" id="valorVenda" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="estoqueDisponivel">Estoque Disponível:</label>
                                                    <input type="number" class="form-control" id="estoqueDisponivel" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="estoqueMinimo">Estoque Mínimo:</label>
                                                    <input type="number" class="form-control" id="estoqueMinimo" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="estoqueMaximo">Estoque Máximo:</label>
                                                    <input type="number" class="form-control" id="estoqueMaximo" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="categoriaProduto">Categoria:</label>
                                                    <select class="form-control" id="categoriaProduto" disabled>
                                                        <option value="">Selecione uma Categoria</option>
                                                        <?php foreach ($resultCat as $linha): ?>
                                                            <option value="<?= $linha['id_categoria'] ?>">
                                                                <?= $linha['nome'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="fornecedorProduto">Fornecedor:</label>
                                                    <select class="form-control" id="fornecedorProduto" disabled>
                                                        <option value="">Selecione um Fornecedor</option>
                                                        <?php foreach ($resultFor as $linha): ?>
                                                            <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="button" class="btn btn-primary" id="btnEditarProduto">Editar</button>
                                            <button type="button" class="btn btn-secondary" id="btnCancelarEdicao">Cancelar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script>
            // ... (seu código JavaScript aqui - conforme as respostas anteriores) ...
            function limparFormularioCadastro() {
                document.getElementById("formCadastroProduto").reset();
                document.getElementById('previewImg').src = '#';
                document.getElementById('previewImg').style.display = 'none';
            }
        </script>


        <?php include('./views/includes/footer.php') ?>
</body>

</html>