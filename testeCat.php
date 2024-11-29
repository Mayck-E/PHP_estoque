
                <!-- Somente um teste das categorias -->
                <form action="./testeCat.php" method="post">
                    <select class="form-select" name="categoria" aria-label="Default select example">
                        <option selected>Categoria</option>
                        <?php foreach ($resultCat as $linha): ?>
                            <option value="<?= $linha['id_categoria'] ?>"><?= $linha['nome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">Testar</button>
                </form>