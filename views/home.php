<body class="d-flex flex-column min-vh-100">

  <?php include('./views/includes/header01.php'); ?>

  <!-- Introdução -->
  <section id="about" class="about section">
    <div class="container-intro">
      <div class="row align-items-center justify-content-between">
        <!-- Texto da introdução -->
        <div class="col-lg-6">
          <span class="section-subtitle" data-aos="fade-up">Bem-Vindo</span>
          <h1 class="mb-4" data-aos="fade-up">
            Gerencie cada aspecto da sua loja e impulsione as vendas com a praticidade que você procura.
          </h1>
          <p data-aos="fade-up">
            Desenvolvido para atender lojas de qualquer porte, o Estoque Zen é gratuito e permite que você gerencie tudo
            sem desviar a atenção do principal objetivo: vender.
          </p>
        </div>
        <!-- Imagem ao lado do texto -->
        <div class="col-lg-6 text-center">
          <img src="./img/Tumb.jpg" alt="Imagem de introdução" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <!-- Frase de chamada e botão centralizados -->
  <div class="row mt-5 justify-content-center">
    <div class="col-12 col-md-8 d-flex flex-column flex-md-row align-items-center text-center text-md-start">
      <h5 class="clit">Pronto para transformar sua gestão? Seja nosso cliente hoje mesmo!</h5> <a href="./index.php?action=registrar" class="btn btn-outline-success btn-lg ms-4 w-auto">Use de Graça Agora</a>
    </div>
  </div>

  <!-- Sobre -->
  <section class="bg-light py-5 sobre-nos">
    <div class="container px-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-xxl-8">
          <div class="text-center my-5">
            <h2 class="display-5 fw-bolder">
              <span class="text-gradient d-inline">Um sistema criado para simplificar sua gestão e manter sua loja mais organizada.</span>
            </h2>
            <p class="text-muted">
              Utilize ferramentas que otimizam seu tempo e diminuem custos. Aumente suas vendas de forma eficiente com soluções adaptadas às suas necessidades e tome decisões com confiança, tendo total controle sobre o que acontece em seu negócio.
            </p>
            <div class="d-flex justify-content-center fs-2 gap-4">
              <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
              <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
              <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('./views/includes/footer.php'); ?>

</body>

</html>