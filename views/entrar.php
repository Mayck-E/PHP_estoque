<?php
if (isset($_SESSION) == false) {
    session_start();
}

// require_once './utils/auth.php';
// checkLogin();

?>

<?php include('./views/includes/header01.php') ?>

<body class="d-flex flex-column min-vh-100">
  
  
  <!-- Formulário -->
  <br><br>
  
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card-e o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h2 text-gray-900 mb-4">Acesse sua Conta</h1>
              </div>
              <form class="user" action="./index.php?action=login" method="post" class="user">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="senha" id="password" placeholder="Senha">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Lembrar da senha</label>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-user btn-lg btn-block btn-salvar">Entrar</button>
                </div>
                <?php if (isset($_SESSION['login_error'])): ?>

                  <p class="text-danger text-center"><?= $_SESSION['login_error'] ?></p>
                <?php endif; ?>
                <div class="n-po">
                  Não possui Conta? <a class="cd-entrar" href="./index.php?action=registrar">Registre-se</a>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include('./views/includes/footer.php') ?>

</body>

</html>