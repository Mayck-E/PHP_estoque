<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <?php include('./views/includes/header02.php') ?>

    <br><br><br>
    <!-- Formulário -->
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="card shadow-lg bg-body-tertiary">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="">
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
                                                <!-- <th>Id</th> -->
                                                <th>Nome</th>
                                                <th>Tipo(un)</th>
                                                <th>Categoria</th>
                                                <th>Estoque</th>
                                                <th>Imagem</th>
                                                <th>Visualizar</th>
                                                <!-- <th>Editar</th>
                                                <th>Excluir</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($result as $linha): ?>

                                                <tr>
                                                    <!-- <td><?= $linha['id'] ?></td> -->
                                                    <td><?= $linha['nome'] ?></td>
                                                    <td><?= $linha['tipo_unidade'] ?></td>
                                                    <td><?= $linha['categoria_produto_id_categoria'] ?></td>
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

                                                        <?php $user_id = $linha['id']; endif; ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-icon-split" href='./Produto.php?action=editando&id=<?= $user_id?>'>Detalhes</a>
                                                    </td>




                                                    <!-- <td class="text-center">
                <a href="./pessoa.php?action=editar&id=<?= $linha['id'] ?>" class="btn btn-warning btn-circle">
                    <i class="fas fa-list"></i>
                </a>
            </td>
            <td class="text-center">
                <a href="./Produto.php?action=delete&id=<?= $linha['id'] ?>" class="btn btn-danger btn-circle">
                    <i class="fas fa-trash"></i>
                </a>
            </td> -->
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <br><br><br>
                            </div>
                            <div class="card-footer py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Total de Fornecedores: <?= count($result) ?></h6>
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
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <?php include('./views/includes/footer.php') ?>
    <!-- Outros scripts -->
</body>

</html>