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
                <h1 class="h2 text-gray-900 mb-4">Fornecedores</h1>
                <button type="button" class="btn btn-primary btn-icon-split" data-bs-toggle="modal"
                  data-bs-target="#cadastroFornecedorModal">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                  <span class="text">Novo Fornecedor</span>
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
                        <th>Email</th>
                        <th>CPF/CNPJ</th>
                        <th>Telefone</th>
                        <th>Observações</th>
                        <th>Editar</th>
                        <!-- <th>Excluir</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $linha): ?>
                        <tr>
                          <!-- <td><?= $linha['id'] ?></td> -->
                          <td><?= $linha['nome'] ?></td>
                          <td><?= $linha['email'] ?></td>
                          <td><?= $linha['cpf_cnpj'] ?></td>
                          <td><?= $linha['telefone'] ?></td>
                          <td><?= $linha['observacao'] ?></td>

                          <td class="text-center">
                            <a href="./Fornecedor.php?action=editando&id=<?= $linha['id'] ?>"
                              class="btn btn-primary btn-icon-split">
                              Detalhes
                            </a>
                          </td>
                          
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer py-3">
                <h6 class="m-0 font-weight-bold text-primary">Total de Fornecedores: <?= count($result) ?></h6>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="cadastroFornecedorModal" tabindex="-1"
                aria-labelledby="cadastroFornecedorModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="cadastroFornecedorModalLabel">Cadastro de Fornecedor</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="user" id="formCadastroFornecedor" action="./fornecedor.php?action=insert" method="post"
                        class="user">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="nome" id="nome"
                            placeholder="Nome" required>
                        </div>
                        <div class="form-group">
                          <input type="email" class="form-control form-control-user" name="email" id="email"
                            placeholder="Email" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="cpf_cnpj" id="cpf_cnpj"
                            placeholder="CPF/ CNPJ" onkeyup="formatarCPF_CNPJ(this)" required>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="telefone" id="telefone"
                            placeholder="Telefone" onkeyup="formatarTelefone(this)" required>
                        </div>
                        <div class="form-group">
                          <textarea class="form-control form-control-user" name="observacao" id="observacao"
                            placeholder="Observação"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                          <button type="submit" form="formCadastroFornecedor" class="btn btn-primary">Cadastrar</button>
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
  <script>
    function formatarCPF_CNPJ(input) {
      let numero = input.value.replace(/[^0-9]/g, '');
      let tamanho = numero.length;

      if (tamanho > 11) {
        input.value = numero.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
      } else {
        input.value = numero.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      }
    }

    function formatarTelefone(input) {
      let numero = input.value.replace(/[^0-9]/g, '');
      let tamanho = numero.length;

      if (tamanho > 10) {
        input.value = numero.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
      } else if (tamanho > 5) {
        input.value = numero.replace(/(\d{2})(\d{4})(\d{0,4})/, '($1) $2-$3');
      } else {
        input.value = numero.replace(/(\d{2})(\d{0,4})/, '($1) $2');
      }
    }
  </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <?php include('./views/includes/footer.php') ?>
  <!-- Outros scripts -->
</body>

</html>