
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
                <h1 class="h2 text-gray-900 mb-4">Histórico de Movimentações</h1>

              </div>
              <br>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <!-- <th>Id</th> -->
                        <th>Data</th>
                        <th>User</th>
                        <th>Ação</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        

                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $linha): ?>
                        <tr>
                          <!-- <td><?= $linha['id_movimentacao'] ?></td> -->
                          <td><?= $linha['hora'], ' - ', $linha['data'] ?></td>
                          <td><?= $linha['nome_usuario'] ?></td>
                          <td><?php
                              switch ($linha['tipo']) {
                                case 'E':
                                  echo 'Editar';
                                  break;
                                case 'A':
                                  echo 'Adicionar';
                                  break;
                                case 'D':
                                  echo 'Deletar';
                                  break;
                                default:
                                  // Opcional: Adicionar um caso default para lidar com valores inesperados de $linha['tipo']
                                  echo '??';
                                  break;
                              }
                              ?></td>
                          <td><?= $linha['nome_produto'] ?></td>
                          <td><?= $linha['quantidade'] ?></td>
                          <!-- <td><?= $linha['id_produto'] ?></td> -->



                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <br><br><br>
              <div class="card-footer py-3">
                <h6 class="m-0 font-weight-bold text-primary">Movimentações feitas: <?= count($result) ?></h6>
              </div>

              <!-- Modal -->

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