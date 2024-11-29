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
                <h1 class="h2 text-gray-900 mb-4">Categoria</h1>
                <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal"
                  data-bs-target="#cadastroCategoriaModal">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Nova Categoria</span>
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
                        <th>Descrição</th>
                        <th>Visualizar</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $linha): ?>
                        <tr>
                          <!-- <td><?= $linha['id_categoria'] ?></td> -->
                          <td><?= $linha['nome'] ?></td>
                          <td><?= $linha['descricao'] ?></td>


                          
                          <td class="text-center">
                            <a href="./Categoria.php?action=editando&id=<?= $linha['id_categoria'] ?>"
                              class="btn btn-primary btn-icon-split">
                              Detalhes
                            </a>
                         
                          </td>
                          <!-- <td class="text-center">
                            <a href="./Categoria.php?action=delete&id_categoria=<?= $linha['id_categoria'] ?>"
                              class="btn btn-danger btn-circle">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td> -->
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <br><br><br>
              <div class="card-footer py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total de Categorias: <?= count($result) ?></h6>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="cadastroCategoriaModal" tabindex="-1"
                aria-labelledby="cadastroCategoriaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="cadastroCategoriaModalLabel">Cadastro de Categoria</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="user" id="formCadastroCategoria" action="./Categoria.php?action=insert" method="post"
                        class="user">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="nome" id="nome"
                            placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="descricao" id="descricao"
                            placeholder="Descrição" required>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" form="formCadastroCategoria" class="btn btn-primary">Cadastrar</button>
                        </div>
                      </form>
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

  <?php include('./views/includes/footer.php') ?>
  <!-- Outros scripts -->
</body>

</html>