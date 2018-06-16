<!DOCTYPE html>
<html lang="en">

<head>
  <?php 
  require_once("includes.php");
  require_once("head.php"); 
  ?>
</head>

<body>

  <?php require_once("navbar.php") ?>
  <br><br><br>
  <!--Main layout-->
  <main >
    <div class="container">

      <!--Navbar-->
      <nav class="navbar navbar-expand-lg navbar-dark grey darken-2 mt-3 mb-5">

        <!-- Navbar brand -->
        <span class="navbar-brand">Categories:</span> <!--Buscar no Banco de Dados todas categorias com serviços disponíveis-->

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Tudo <!--Preencher com For com resultados do Banco de Dados -->
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cabelos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Unhas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Massagem</a>
            </li>

          </ul>
          <!-- Links -->

          <form class="form-inline">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar" aria-label="Search">
            </div>
          </form>
        </div>
        <!-- Collapsible content -->

      </nav>
      <!--/.Navbar-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

       

        <?php 
          $dao = new ServicoDao();
          $servicos = $dao->buscaAtivos();
          $size = count($servicos);
          if($size <= 0) {
            echo "Nenhum serviço encontrado.";
            die();
          }

          $count = 1;
          foreach($servicos as $servico):
        ?>
          <?php if($count%4 == 1): ?>
          <!--Grid row-->
          <div class="row wow fadeIn">
          <?php endif; ?>
              
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4">

                <!--Card-->
                <div class="card">

                  <!--Card image-->
                  <div class="view overlay">
                    <style>
                      div.card-img-top {
                        background-position: top center; 
                        background-size: cover; 
                        height: 530px;
                      }
                      /* responsive */
                      @media (min-width: 980px) {
                        div.card-img-top {
                          height: 340px;
                        } 
                      }
                    </style>
                    <div class="card-img-top" alt="" style="background-image: url('img/beauty/services/service<?php echo $servico->getId(); ?>.jpg');"></div>
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->

                  <!--Card content-->
                  <div class="card-body text-center">
                    <!--Category & Title-->
                    <a href="" class="grey-text">
                      <h5><?php echo $servico->getNome(); ?></h5> <!--Buscar no Banco de Dados-->
                    </a>
                    <?php /*<h5>
                      <strong>
                        <a href="" class="dark-grey-text"><?php echo $servico->getNome(); ?> <!--Buscar no Banco de Dados-->
                          <span class="badge badge-pill danger-color">NEW</span> <!--Buscar no Banco de Dados pela data de adição-->
                        </a>
                      </strong> */?>
                    </h5>

                    <h4 class="font-weight-bold blue-text">
                      <strong>R$ <?php echo $servico->getPreco(); ?></strong> <!--Buscar no Banco de Dados-->
                    </h4>

                  </div>
                  <!--Card content-->

                </div>
                <!--Card-->

              </div>
              <!--Grid column-->
        <?php if($count%4 == 0): ?>
        </div>
        <!--Grid row-->
        <?php endif; ?>
        <?php
            $count++;
          endforeach; 
        ?>

        

      </section>
      <!--Section: Products v.3-->


      <!--FAZER FOR PARA MONTAR ISTO DE ACORDO COM O NÚMERO DE RESULTADOS-->
      <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">

          <!--Arrow left-->
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <!--Page numbers-->
          <li class="page-item active">
            <a class="page-link" href="#">1
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">3</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">4</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">5</a>
          </li>

          <!--Arrow Right-->
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      <!--Pagination-->

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