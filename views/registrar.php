<!doctype html>
<html lang="pt-br">

<body class="d-flex flex-column min-vh-100">

  <?php include_once('./views/includes/header01.php') ?>
  <br><br>
  <br><br>
  <br><br>
  <!-- Formulário -->
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card-r o-hidden border-0 shadow-lg">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h2 text-gray-900 mb-4">Crie sua Conta</h1>
              </div>
              <form class="user" action="./index.php?action=signin" method="post" onsubmit="return validarFormulario()">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nome" id="nome" placeholder="Nome">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="senha" id="senha" placeholder="Senha">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="cpf" id="cpf" placeholder="CPF" onkeyup="formatarCPF_CNPJ(this)">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="idade" id="idade" placeholder="Idade">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="telefone" id="telefone" placeholder="Telefone" onkeyup="formatarTelefone(this)" maxlength="15">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="endereco" id="endereco" placeholder="Endereço">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="observacao" id="observacao" placeholder="Observação">
                </div>
                <!-- Mensagem de erro -->
                <div id="error-message" class="text-danger text-center" style="display: none;">
                  Por favor, preencha todos os campos obrigatórios.
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-user btn-lg btn-block btn-salvar">Registrar</button>
                </div>
                <div class="po">
                  Possui Conta? <a class="cd-entrar" href="./index.php?action=entrar">Entre</a>
                </div>
              </form> 
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once ('./views/includes/footer.php') ?>

  <script>
    function validarFormulario() {
      // Pegando os campos do formulário
      const nome = document.getElementById("nome").value;
      const email = document.getElementById("email").value;
      const senha = document.getElementById("senha").value;
      const cpf = document.getElementById("cpf").value;
      const idade = document.getElementById("idade").value;
      const telefone = document.getElementById("telefone").value;
      const endereco = document.getElementById("endereco").value;
      const observacao = document.getElementById("observacao").value;

      // Verificando se algum campo está vazio
      if (!nome || !email || !senha || !cpf || !idade || !telefone || !endereco || !observacao) {
        // Exibe a mensagem de erro
        document.getElementById("error-message").style.display = "block";
        return false; // Impede o envio do formulário
      }
      
      // Se todos os campos estiverem preenchidos, oculta a mensagem de erro
      document.getElementById("error-message").style.display = "none";
      return true; // Permite o envio do formulário
    }

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

</body>

</html>
