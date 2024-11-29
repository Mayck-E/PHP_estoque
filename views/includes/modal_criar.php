<form class="user" id="formCadastroProduto" action="./Produto.php?action=insert"
    method="post" class="user" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id" value="">
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="nome"
            id="nome" placeholder="Nome do Produto" required>
    </div>
    <div class="form-group">
        <select class="form-control form-control-user" name="tipo_unidade" id="tipo_unidade" required>
            <option value="">Selecione uma unidade</option>
            <option value="kg">Kilograma (kg)</option>
            <option value="g">Grama (g)</option>
            <option value="litro">Litro (L)</option>
            <option value="mililitro">Mililitro (mL)</option>
            <option value="unid">Unidade (unid)</option>
        </select>
    </div>
    <div class="form-group">
        <input type="file" id="input_img" onchange="fileChange()" accept="image/*"
            name="imagem" required>
        <img id="previewImg" src="#" alt="Preview da imagem"
            style="max-width: 100px; max-height: 100px; display: none;">
    </div>
    <div class="form-group">
        <textarea class="form-control form-control-user" name="observacoes"
            id="observacoes" placeholder="Observações"></textarea>
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="number" class="form-control form-control-user"
                name="valor_custo" id="valor_custo" placeholder="Valor de Custo"
                required step="1">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>
            <input type="number" class="form-control form-control-user"
                name="valor_venda" id="valor_venda" placeholder="Valor de Venda"
                required step="0.01">
        </div>
    </div>
    <div class="form-group">
        <input type="number" class="form-control form-control-user"
            name="estoque_disponivel" id="estoque_disponivel"
            placeholder="Estoque Disponível" required>
    </div>
    <div class="form-group">
        <input type="number" class="form-control form-control-user"
            name="estoque_minimo" id="estoque_minimo"
            placeholder="Estoque Mínimo" >
    </div>
    <div class="form-group">
        <input type="number" class="form-control form-control-user"
            name="estoque_maximo" id="estoque_maximo"
            placeholder="Estoque Máximo" >
    </div>
    <div class="form-group">
        <select class="form-control form-control-user"
            name="categoria_produto_id_categoria"
            id="categoria_produto_id_categoria" required>
            <option value="">Selecione uma Categoria</option>
            <?php foreach ($resultCat as $linha): ?>
                <option value="<?= $linha['id_categoria'] ?>">
                    <?= $linha['nome'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <select class="form-control form-control-user"
            name="fornecedor_id_fornecedor" id="fornecedor_id_fornecedor"
            required>
            <option value="">Selecione um fornecedor</option>
            <?php foreach ($resultFor as $linha): ?>
                <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Fechar</button>
        <button type="submit" form="formCadastroProduto" class="btn btn-primary">
            Salvar
        </button>
    </div>
</form>