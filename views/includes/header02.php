<?php 
    require_once './utils/auth.php';
    $page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estoque Zen - <?php $page ?> </title>
    <link rel="icon" href="/img/LogoG_UZ.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link href="./css/style.css" rel="stylesheet"> -->
    <link href="./css/style_dashboard.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/Logo_2.png" type="image/png">
</head>
<!-- NAV-BAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" id="dash_nav">

  <div class="container-fluid">
    <a class="navbar-brand" href="./dashboard.php">
      <img src="./img/Logo_2.png" alt="Logo" width="140" height="45" class="d-inline-block align-text-top">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <!-- Links da navbar -->
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ms-auto">
          <!-- <li class="nav-item">
            <a class="nav-link <?php if($page == 'index.php'){ echo 'active';}?> " aria-current="page" href="index.php">
              <h5>Início</h5>
            </a>
          </li> -->
          <li class="nav-item ms-3">
            <a class="nav-link <?php if ($action == 'produtos') {echo 'active';} ?> " href="./Produto.php"> 
              <h5>Produtos</h5>
            </a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link <?php if($action == 'fornecedores'){ echo 'active';}?> " href="./fornecedor.php">
              <h5>Fornecedores</h5>
            </a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link <?php if($action == 'categorias'){ echo 'active';}?> " href="./Categoria.php">
              <h5>Categorias</h5>
            </a>
          </li>
          <li class="nav-item ms-3">
          <a class="nav-link" href="./index.php?action=logout">
              <h5>Logout</h5>
            </a>
          </li>
          <li class="nav-item ms-3">
            <a class="nav-link" href="./perfil.php" >
              
              <h5><?php echo $_SESSION['usuario_nome'] ?></h5>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <br><br>
  <br>

  <br>