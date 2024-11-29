<?php include('./views/includes/header02.php') ?>

<body>
  <?php
  if (!empty($result['id'])) {
    // EDITAR
    $nome = $result['nome'];
    $email = $result['email'];
    $cpf = $result['cpf'];
    $idade = $result['idade'];
    $telefone = $result['telefone'];
    $endereco = $result['endereco'];
    $observacao = $result['observacao'];
    $imagem = $result['img'];
  } else {
    // INSERIR
    $action = 'insert';
    $nome = '';
    $descricao = '';
    $id = '';
  }

  $editMode = false;

  if (isset($_POST['edit'])) {
    $editMode = true;
  }

  if (isset($_POST['save'])) {
    // Lógica para salvar as alterações no banco de dados (implementar em Produto.php)
    // ... (Seu código para atualizar o produto no banco de dados) ...

    $editMode = false;
  }
  ?>


  <form method="post" action="./Perfil.php?action=update">
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-3 text-center border-right">
          <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img id="profile-pic" class="rounded-circle mt-3" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            <button id="edit-image-button" class="btn btn-outline-primary mt-3">Editar Imagem</button>
            <span class="font-weight-bold mt-3"><?= $nome ?></span>
            <span class="text-black-50"><?= $result['nome'] ?></span>
          </div>
        </div>
        <div class="col-md-7">
          <div class="p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h2 class="text-center">Configurações de Perfil</h2>
              <button id="edit-button" class="btn btn-secondary">Editar</button>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $id ?>">
            <div class="row mt-3">
              <div class="col-md-12"><label class="labels">Nome</label><input id='nome' type="text" class="form-control view-only" placeholder="Name" name="nome" value="<?= $result['nome'] ?>" readonly></div>
              <div class="col-md-12">
                <label class="labels">Email ID</label>
                <input type="text" class="form-control view-only" placeholder="Enter email ID" value="<?= $result['email'] ?>" readonly>
              </div>
              <div class="col-md-12">
                <label class="labels">Número de telefone</label>
                <input type="text" class="form-control view-only" placeholder="Enter phone number" value="<?= $result['telefone'] ?>" readonly>
              </div>
              <div class="col-md-12">
                <label class="labels">CPF</label>
                <input type="text" class="form-control view-only" placeholder="CPF" value="<?= $result['cpf'] ?>" readonly>
              </div>
              <div class="col-md-12">
                <label class="labels">Idade</label>
                <input type="text" class="form-control view-only" placeholder="Idade" value="<?= $result['idade'] ?>" readonly>
              </div>
              <div class="col-md-12">
                <label class="labels">Endereço</label>
                <input type="text" class="form-control view-only" placeholder="Endereço" value="<?= $result['endereco'] ?>" readonly>
              </div>
              <div class="col-md-12">
                <label class="labels">Observação</label>
                <input type="text" class="form-control view-only" placeholder="Observação" value="<?= $result['observacao'] ?>" readonly>
              </div>
            </div>
            <!-- <div class="row mt-3">
              <div class="col-md-6">
                <label class="labels">País</label>
                <input type="text" class="form-control view-only" placeholder="Enter country" value="Brasil" readonly>
              </div>
              <div class="col-md-6">
                <label class="labels">Estado/Região</label>
                <input type="text" class="form-control view-only" placeholder="Enter state/region" value="SP" readonly>
              </div>
            </div> -->
            <div class="mt-5 text-center">
              <button id="save-button" class="btn btn-primary profile-button" type="submit" name="save" disabled>Salvar Perfil</button>
            </div>

           <!-- Botão de Deletar Conta --> <div class="mt-4 text-center"> <button id="delete-account-button" class="btn btn-danger" type="button" onclick="showDeleteModal()">Deletar Conta</button> </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza de que deseja excluir sua conta? Esta ação é irreversível.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="./index.php?action=deleteAccount" class="btn btn-danger">Deletar Conta</a>
      </div>
    </div>
  </div>
</div>

<script>
  // Função para exibir o modal de exclusão
  function showDeleteModal() {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
  }
</script>



  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const editButton = document.getElementById("edit-button");
      const saveButton = document.getElementById("save-button");
      const inputs = document.querySelectorAll(".form-control");
      const editImageButton = document.getElementById("edit-image-button");

      // Alternar entre modo de edição e visualização
      editButton.addEventListener("click", () => {
        const isReadonly = inputs[0].hasAttribute("readonly");
        if (isReadonly) {
          // Mudar para modo de edição
          inputs.forEach(input => input.removeAttribute("readonly"));
          inputs.forEach(input => input.classList.remove("view-only"));
          saveButton.disabled = false;
          editButton.textContent = "Cancelar";
        } else {
          // Voltar para modo de visualização
          inputs.forEach(input => input.setAttribute("readonly", true));
          inputs.forEach(input => input.classList.add("view-only"));
          saveButton.disabled = true;
          editButton.textContent = "Editar";
        }
      });

      // Função para editar a imagem do perfil
      editImageButton.addEventListener("click", () => {
        const newImageUrl = prompt("Insira a URL da nova imagem de perfil:");
        if (newImageUrl) {
          document.getElementById("profile-pic").src = newImageUrl;
          // Habilitar o botão de salvar após alteração de imagem
          saveButton.disabled = false;
        }
      });
    });


  </script>

  <style>
    .view-only {
      background-color: #f8f9fa;
      /* Fundo claro para indicar modo de visualização */
      border: none;
    }

    .container {
      max-width: 900px;
      /* Limita a largura da página */
    }

    .border {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .modal-content {
      border-radius: 10px;
    }

    .modal-header {
      background-color: #f8f9fa;
    }
  </style>

  <?php include('./views/includes/footer.php') ?>
</body>