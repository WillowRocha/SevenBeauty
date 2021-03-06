<html lang="en">

<head>
  <?php require_once("head.php") ?>
</head>

<body style="background-color: #1c2331; background-image: url('img/beauty/admin_background.jpg');background-size: cover;">

  <?php require_once("navbar.php") ?>

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container wow fadeIn">

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="offset-md-2 col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

                <!-- Form -->
                <form name="" action="<?php echo ROUTE.SERVICE_REGISTER_PRODUCT?>" method="POST">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Cadastrar Produto</strong>
                  </h3> 
                  <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                    <div class="col-md-12 text-center green-text">Produto cadastrado com sucesso!</div>
                  <?php elseif(isset($_GET['success']) && $_GET['success'] == 0): ?>
                    <div class="col-md-12 text-center red-text">Erro ao cadastrar produto!</div>
                  <?php endif; ?>
                  
                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-7 mb-2">
                      <!--lastName-->
                      <div class="md-form">
                        <input type="text" id="barcode" name="barcode" class="form-control" placeholder="Insira o código de barras">
                        <label for="lastName" class="">Código de Barras</label>
                      </div>
                    </div>
                    <!--Grid column-->
                    
                    <!--Grid column-->
                    <div class="col-5 mb-2">
                      <!--firstName-->
                      <div class="md-form ">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do produto">
                        <label for="firstName" class="">Nome</label>
                      </div>

                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">
                    <!--Grid column-->
                    <div class="col-md-2 col-sm-4">
                      <!--email-->
                      <div class="md-form mb-5">
                        <input type="text" id="quantidade" name="quantidade" class="form-control" placeholder="Nº itens">
                        <label for="email" class="">Quantidade</label>
                      </div>
                    </div>
                    <!--Grid column-->

                    <?php 
                        $dao = new UnidadeMedidaDao();
                        $unidades = $dao->buscaTodos();
                     ?>
                    <!--Grid column-->
                    <div class="col-md-4 col-sm-6">
                      <div class="md-form mb-5">
                        <label>Un. Medida</label>
                        <input type="text" id="" name="" class="form-control" hidden="" placeholder="Ex.: Kilograma">
                        <select class="mdb-select form-control" name="medida" style="border: none; border-bottom: 1px solid grey">
                          <?php 
                            foreach ($unidades as $unidade):
                          ?>
                            <option value="<?php echo $unidade->getId() ?>"><?php echo $unidade->getNome() ?></option>
                          <?php
                            endforeach;
                          ?>
                        </select>
                      </div>
                    </div>
                    <!--Grid column-->
                    
                    <!--Grid column-->
                    <div class="col-md-2 col-sm-4">
                      <!--address-->
                      <div class="md-form mb-5">
                        <input type="text" id="min_qtd" name="min_qtd" class="form-control" placeholder="Nº itens">
                        <label for="address" class="">Quant. Mínima</label>
                      </div>
                    </div>
                    
                    <?php 
                        $dao = new CategoriaProdutoDao();
                        $categorias = $dao->buscaTodos();
                     ?>
                    <!--Grid column-->
                    <div class="col-md-4 col-sm-6">
                      <div class="md-form mb-5">
                        <label>Categoria</label>
                        <input type="text" id="" name="" class="form-control" hidden="" placeholder="Ex.: Cabelo">
                        <select class="mdb-select form-control" name="categoria" style="border: none; border-bottom: 1px solid grey">
                          <?php 
                            foreach ($categorias as $categoria):
                          ?>
                            <option value="<?php echo $categoria->getId() ?>"><?php echo $categoria->getNome() ?></option>
                          <?php
                            endforeach;
                          ?>
                        </select>
                      </div>
                    </div>
                    <!--Grid column-->
                  </div>
                  <!--Grid row-->
                  <button class="btn btn-grey btn-lg btn-block" type="submit">Registrar</button>
                </form>
                <!-- Form -->
              </div>
              <!-- Card body -->
        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  </main>
  <!--Main layout-->

  <?php require_once("footer.php") ?>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>