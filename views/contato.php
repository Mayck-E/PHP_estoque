

<body class="d-flex flex-column min-vh-100">
  
<?php include ('./views/includes/header01.php') ?>
<br><br><br>

<!-- Contact Section -->
<section id="contact" class="contact section mt-5">

<div class="container" data-aos="fade">

  <div class="row gy-5 gx-lg-5">

    <div class="col-lg-4">

      <div class="info">
        <h3>Contate-nos</h3>
        <p>Entre em contato com o Estoque Zen para otimizar a gestão do seu estoque. Nossa equipe está pronta para ajudar com soluções de ERP sob medida para o seu negócio!</p>

        <div class="info-item d-flex">
          <i class="bi bi-geo-alt flex-shrink-0"></i>
          <div>
            <h4>Localização:</h4>
            <p>Rua Olga Loti Camargo 3500, Votuporanga, SP, 15501-280</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex">
          <i class="bi bi-envelope flex-shrink-0"></i>
          <div>
            <h4>Email:</h4>
            <p>estoquezen.erp@gmail.com</p>
          </div>
        </div><!-- End Info Item -->

        <div class="info-item d-flex">
          <i class="bi bi-phone flex-shrink-0"></i>
          <div>
            <h4>Telefone:</h4>
            <p>+55 (17) 3333-7788 </p>
          </div>
        </div><!-- End Info Item -->

      </div>

    </div>

    <div class="col-lg-8">
      <form action="forms/contact.php" method="post" role="form" class="php-contact-form">
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nome" required="">
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="">
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Assunto  " required="">
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" placeholder="Mensagem" required=""></textarea>
        </div>
        <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-user btn-lg btn-block btn-salvar">Mandar</button>
        </div>
      </form>
    </div><!-- End Contact Form -->

  </div>

</div>

</section><!-- /Contact Section -->

<?php include ('./views/includes/footer.php') ?>


</body>
</html>