<?php 
  require_once("includes.php");
?>
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
                <?php
                  if(isset($_GET['product_id'])){
                    $id_produto = $_GET['product_id'];
                  } elseif(isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "Sucesso ao editar produto!";
                    die();
                  } else if(isset($_GET['success']) && $_GET['success'] == 0){
                    echo "Erro ao editar produto!";
                    die();
                  } else {
                    echo "Algo deu errado";
                    die();
                  }

                  $dao = new ProdutoDao();
                  $produto = $dao->buscaByCodigoBarras($id_produto);
                  if(!$produto){
                    echo "Erro ao buscar produto!";
                    die();
                  }
                ?>
                <!-- Form -->
                <form name="" action="<?php echo ROUTE.SERVICE_REGISTER_PRODUCT."?client_id=".$produto->getCodigoBarras() ?>" method="POST">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Editar produto</strong>
                  </h3> 
                  <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                  <div class="col-md-12 text-center green-text">Produto editado com sucesso!</div>
                  <?php elseif(isset($_GET['success']) && $_GET['success'] == 0): ?>
                  <div class="col-md-12 text-center red-text">Erro ao editar produto!</div>
                  <?php endif; ?>
                  
                  <!--Grid row-->
                  <div class="row">


                    <!--Grid column-->
                    <div class="col-7 mb-2">
                      <!--lastName-->
                      <div class="md-form">
                        <input type="text" id="barcode" name="barcode" class="form-control" placeholder="Insira o código de barras" value="<?php echo $produto->getCodigoBarras()?>">
                        <label for="lastName" class="">Código de Barras</label>
                      </div>

                    </div>
                    <!--Grid column-->
                    
                    <!--Grid column-->
                    <div class="col-5 mb-2">
                      <!--firstName-->
                      <div class="md-form ">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do produto"
                        value="<?php echo $produto->getNome()?>">
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
                        <input type="text" id="quantidade" name="quantidade" class="form-control" placeholder="Nº itens" value="<?php echo $produto->getQuantidade()?>">
                        <label for="email" class="">Quantidade</label>
                      </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 col-sm-6">
                      <div class="md-form mb-5">
                        <label>Un. Medida</label>
                        <input type="text" id="" name="" class="form-control" hidden="" placeholder="Ex.: Kilograma">
                        <select class="mdb-select form-control" name="medida" style="border: none; border-bottom: 1px solid grey">
                            <option value="<?php echo $produto->getUnidadeMedida()->getId() ?>"><?php echo $produto->getUnidadeMedida()->getNome() ?></option>
                        </select>
                      </div>
                    </div>
                    <!--Grid column-->
                    
                    <!--Grid column-->
                    <div class="col-md-2 col-sm-4">
                      <!--address-->
                      <div class="md-form mb-5">
                        <input type="text" id="min_qtd" name="min_qtd" class="form-control" placeholder="Nº itens" value="<?php echo $produto->getEstoqueMinimo()?>">
                        <label for="address" class="">Quant. Mínima</label>
                      </div>
                    </div>
                    
                    <!--Grid column-->
                    <div class="col-md-4 col-sm-6">
                      <div class="md-form mb-5">
                        <label>Categoria</label>
                        <input type="text" id="" name="" class="form-control" hidden="" placeholder="Ex.: Cabelo">
                        <select class="mdb-select form-control" name="categoria" style="border: none; border-bottom: 1px solid grey">
                          <option value="<?php echo $produto->getCategoria()->getId() ?>"><?php echo $produto->getCategoria()->getNome() ?></option>
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