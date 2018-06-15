<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("head.php") ?>
</head>
<?php 
  require_once("includes.php");
  if(!isset($_SESSION['access_level']) || (isset($_SESSION['access_level']) && $_SESSION['access_level'] < AC_PROFISSIONAL)){
    header("location: ".ROUTE.HOME); 
  }
?>
<body style="background-image: url('img/beauty/admin_background.jpg');  background-size: cover;">

  <?php require_once("navbar.php") ?>

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container col-10">

      <h3 class="my-5 h3 text-center text-white">Área Administrativa</h3>

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-md-8 text-center text-white">

          <p class="mb-5">Escolha abaixo a opção desejada</p>

        </div>
        <!--Grid column-->
        
      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row text-center wow fadeIn" hidden="true">

        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#schedullerCollpser">
                  <h4>
                    <strong>Agenda</strong>
                  </h4>
                </button>
              </a>
            </div>
            

            <!--Card content-->
            <div class="card-body collapse" id="schedullerCollpser">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Visualizar</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Registar atendimento</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Desmarcar atendimento</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Bloquear horários</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>

      <!--Grid row-->
      <div class="row text-center wow fadeIn">
        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#custumerCollapse">
                <h4>
                  <strong>Clientes</strong>
                </h4>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body collapse" id="custumerCollapse">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="<?php echo LIST_CLIENTS ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Visualizar</button></a>
                </li>
                <hr>
                <li>
                  <a href="<?php echo REGISTER_CLIENT ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Cadastrar</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>
    <?php if($_SESSION['access_level'] >= AC_GERENTE):  ?>
      <!--Grid row-->
      <div class="row text-center wow fadeIn">
        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#managerCollapse">
                <h4>
                  <strong>Funcionários</strong>
                </h4>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body collapse" id="managerCollapse">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="<?php echo ROUTE.LIST_EMPLOYEES ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Visualizar</button></a>
                </li>
                <hr>
                <li>
                  <a href="<?php echo ROUTE.REGISTER_EMPLOYEE ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Cadastrar</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row text-center wow fadeIn">
        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#productsCollapse">
                <h4>
                  <strong>Produtos</strong>
                </h4>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body collapse" id="productsCollapse">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="<?php echo ROUTE.LIST_PRODUCTS ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Visualizar</button></a>
                </li>
                <hr>
                <li>
                  <a href="<?php echo ROUTE.REGISTER_PRODUCT ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Cadastrar</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>

      <!--Grid row-->
      <div class="row text-center wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#suppliersCollapse">
                <h4>
                  <strong>Fornecedores</strong>
                </h4>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body collapse" id="suppliersCollapse">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="<?php echo ROUTE.LIST_SUPPLIERS ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Visualizar</button></a>
                </li>
                <hr>
                <li>
                  <a href="<?php echo ROUTE.REGISTER_SUPPLIER ?>"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Cadastrar</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>

      <!--Grid row-->
      <div class="row text-center wow fadeIn">
        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#reportsCollapse">
                <h4>
                  <strong>Relatórios</strong>
                </h4>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body collapse" id="reportsCollapse">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Caixa</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Agenda</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Produtos em Estoque</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Novo Relatório</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>

      <!--Grid row-->
      <div class="row text-center wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 mb-4">

          <!--Card-->
          <div class="card">

            <!-- Card header -->
            <div class="card-header">
              <a data-toggle="collapse" href="#cashierCollapse">
                <h4>
                  <strong>Caixa</strong>
                </h4>
              </a>
            </div>

            <!--Card content-->
            <div class="card-body collapse" id="cashierCollapse">

              <ol class="list-unstyled mb-4">
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Abrir caixa</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Registar venda</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Sangria</button></a>
                </li>
                <hr>
                <li>
                  <a href="#"><button type="button" class="btn btn-md btn-block btn-grey waves-effect">Fechar Caixa</button></a>
                </li>
              </ol>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    <?php else: ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    <?php endif; ?>

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