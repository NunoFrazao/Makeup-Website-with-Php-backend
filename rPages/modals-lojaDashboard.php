<!-- Modal adicionar produto -->

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProduct" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content pt-3">
      <div class="modal-header border-0">
        <h5 class="modal-title text-uppercase px-4" id="addProductTitle">Adicionar Produto</h5>
      </div>
      <div class="modal-body pb-0">
          <form action="?pagina=rPages/addProduct.php" class="needs-validation"  method="post" enctype="multipart/form-data" novalidate>
            <div class="container-fluid pt-3 px-4">
              <div class="row">
                      <div class="col">
                          <div class="form-group row">
                              <label for="marcaProduto" class="col-2 col-form-label">Marca <span class="text-danger">&#42;</span></label>
                              <div class="col-10">
                                  <input type="text" name="marcaProduto" class="form-control" id="marcaProduto" required>
                                    <div class="invalid-feedback">
                                        Por favor indique a marca do produto
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="nomeProduto" class="col-2 col-form-label">Nome <span class="text-danger">&#42;</span></label>
                              <div class="col-10">
                                  <input type="text" name="nomeProduto" class="form-control" id="nomeProduto" required>
                                    <div class="invalid-feedback">
                                        Por favor introduza o nome do produto
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="precoProduto" class="col-2 col-form-label">Pre&ccedil;o &#40;&euro;&#41; <span class="text-danger">&#42;</span></label>
                              <div class="col-10">
                                  <input type="text" name="precoProduto" class="form-control" id="precoProduto" min="0" required>
                                    <div class="invalid-feedback">
                                        Por favor introduza o pre&ccedil;o
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="categoriaProduto" class="col-2 col-form-label">Categoria <span class="text-danger">&#42;</span></label>
                              <div class="col-10">
                                  <select name="categoriaProduto" class="form-control" id="categoriaProduto" required>
                                      <option value="" hidden>Selecione...</option>
                                      <?php
                                        $sql = "SELECT id_categoria, designacao FROM categoriaproduto;";
                                        $result = $conn->query($sql);

                                        if (!$result) {
                                            $code = $conn->errno;
                                            $message = $conn->error;
                                            printf("SQL Error %d %s", $code, $message);
                                        }
                                        else {
                                            while ($row = $result->fetch_assoc()) {
                                                $idCategoriaProduto = $row["id_categoria"];
                                                $categoriaProduto = $row["designacao"];
                                                echo "<option value='$idCategoriaProduto'>$categoriaProduto</option>";
                                            }
                                        }
                                        $result->free();
                                      ?>
                                  </select>
                                    <div class="invalid-feedback">
                                        Por favor selecione uma categoria
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="qtdStock" class="col-2 col-form-label">Quantidade <span class="text-danger">&#42;</span></label>
                              <div class="col-10">
                                  <input type="number" name="qtdStock" class="form-control" id="qtdStock" min="1" required>
                                    <div class="invalid-feedback">
                                        Por favor indique a quantidade em stock
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="insertPhotos" class="col-2 col-form-label">Inserir Imagem <span class="text-danger">&#42;</span></label>
                              <div class="col-10 px-4 custom-file">
                                  <input type="file" name="insertPhotos" class="custom-file-input" id="insertPhotos" required>
                                  <label for="insertPhotos" class="custom-file-label" id="insertPhotosInputLabel" data-browse="Pesquisar">Selecione...</label>
                                    <div class="invalid-feedback">
                                        Por favor insira uma imagem
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row mt-5">
                            <label for="descricaoProduto" class="col-2 col-form-label">Descrição <span class="text-danger">&#42;</span></label>
                            <div class="col-10">
                                <textarea name="descricaoProduto" id="descricaoProduto" cols="30" rows="5" class="form-control" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor introduza uma descrição
                                </div>
                            </div>
                            <div class="row ml-1 mt-4">
                                <div class="col">
                                    <small><span class="text-danger">&#42;</span> Campos de preenchimento obrigatório</small>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="submit" name="adicionarProduto" class="btn rounded-pill modalBtn">Adicionar</button>
                <button type="button" class="btn rounded-pill dismissBtn" data-dismiss="modal">Cancelar</button>
            </div>
        </form>    
    </div>
  </div>
</div>

<!-- MODAL EDITAR PRODUTO -->

<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="editProduct" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content pt-3">
      <div class="modal-header border-0">
        <h5 class="modal-title text-uppercase px-4" id="editProductTitle">Editar Produto</h5>
      </div>
      <div class="modal-body">
          <form action="?pagina=rPages/editProduct.php" class="needs-validation" method="post" enctype="multipart/form-data" novalidate>
            <div class="container-fluid pt-3 px-4">
              <div class="row">
                      <div class="col">
                          <div class="form-group row">
                              <label for="marcaProdutoEdit" class="col-2 col-form-label">Marca</label>
                              <div class="col-10">
                                  <input type="text" name="marcaProdutoEdit" class="form-control" id="marcaProdutoEdit" required>
                                    <div class="invalid-feedback">
                                        Por favor indique a marca do produto
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="nomeProdutoEdit" class="col-2 col-form-label">Nome</label>
                              <div class="col-10">
                                  <input type="text" name="nomeProdutoEdit" class="form-control" id="nomeProdutoEdit" required>
                                    <div class="invalid-feedback">
                                        Por favor introduza o nome do produto
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="precoProdutoEdit" class="col-2 col-form-label">Pre&ccedil;o &#40;&euro;&#41;</label>
                              <div class="col-10">
                                  <input type="text" name="precoProdutoEdit" class="form-control" id="precoProdutoEdit" min="0" required>
                                    <div class="invalid-feedback">
                                        Por favor introduza o pre&ccedil;o
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="categoriaProdutoEdit" class="col-2 col-form-label">Categoria</label>
                              <div class="col-10">
                                  <select name="categoriaProdutoEdit" class="form-control" id="categoriaProdutoEdit" required>
                                      <option value="" hidden>Selecione...</option>
                                      <?php
                                        $sql = "SELECT id_categoria, designacao FROM categoriaproduto;";
                                        $result = $conn->query($sql);

                                        if (!$result) {
                                            $code = $conn->errno;
                                            $message = $conn->error;
                                            printf("SQL Error %d %s", $code, $message);
                                        }
                                        else {
                                            while ($row = $result->fetch_assoc()) {
                                                $idCategoriaProduto = $row["id_categoria"];
                                                $categoriaProduto = $row["designacao"];
                                                echo "<option value='$idCategoriaProduto'>$categoriaProduto</option>";
                                            }
                                        }
                                        $result->free();
                                      ?>
                                  </select>
                                    <div class="invalid-feedback">
                                        Por favor selecione uma categoria
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="qtdStockEdit" class="col-2 col-form-label">Quantidade</label>
                              <div class="col-10">
                                  <input type="number" name="qtdStockEdit" class="form-control" id="qtdStockEdit" min="0" required>
                                    <div class="invalid-feedback">
                                        Por favor indique a quantidade em stock
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="insertPhotosEdit" class="col-2 col-form-label">Inserir Imagem</label>
                              <div class="col-10 px-4 custom-file">
                                  <input type="file" name="insertPhotos" class="custom-file-input" id="insertPhotosEdit">
                                  <label for="insertPhotos" class="custom-file-label" id="insertPhotosInputLabelEdit">Selecione...</label>
                                    <div class="invalid-feedback">
                                        Por favor insira uma imagem
                                    </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="descricaoProdutoEdit" class="col-2 col-form-label">Descrição</label>
                            <div class="col-10">
                                <textarea name="descricaoProdutoEdit" id="descricaoProdutoEdit" cols="30" rows="5" class="form-control" required></textarea>
                                <div class="invalid-feedback">
                                    Por favor introduza uma descrição
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer border-0">
                <input type="hidden" name="idProdutoEditarHidden" value="" id="idProdutoEditarHidden">
                <button type="submit" name="editarProduto" class="btn rounded-pill modalBtn">Editar</button>
                <button type="button" class="btn rounded-pill dismissBtn" data-dismiss="modal">Cancelar</button>
            </div>
        </form>    
    </div>
  </div>
</div>

<!-- Modal eliminar produto -->

<div class='modal fade' id='eliminarProduto' tabindex='-1' role='dialog' aria-labelledby='eliminarProdutoTitle' aria-hidden='true'>
  <div class='modal-dialog modal modal-dialog-centered text-center' role='document'>
    <div class='modal-content '>
      <div class='modal-header border-0'>
        <h5 class='modal-title text-uppercase' id='eliminarProdutoTitle'>Eliminar Produto</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <form action="?pagina=rPages/deleteProduct.php" method="post">
        <div class='modal-body'>
          <p>Tem a certeza que pretende eliminar o produto?</p>
        </div>
       <div class='modal-footer border-0'>
          <input type="hidden" name="idProdutoEliminarHidden" value="" id="idProdutoEliminarHidden">
          <button type='submit' name="confirmEliminarProduto" class='btn rounded-pill modalBtn'>Eliminar</button>
          <button type='button' class='btn rounded-pill dismissBtn' data-dismiss='modal'>Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>