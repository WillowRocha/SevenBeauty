<!DOCTYPE html>
<html lang="en">

<head>
 <?php 
  //session_start();
  include_once("head.php");
 ?>
</head>

<body>

  <?php include_once("navbar.php") ?>

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('img/beauty/capa01.jpg'); background-repeat: no-repeat; background-size: cover;">
    <!--http://www.mysthairandbeauty.com.au/wp-content/uploads/2016/11/beauty-header-1.jpg-->
    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <div class="col-md-6 mb-4 white-text text-center text-md-left">

            <h1 class="display-4 font-weight-bold">7 Beauty Studio</h1>

            <hr class="hr-light">

            <p>
              <strong>Aqui sua beleza e bem-estar são levados a sério</strong>
            </p>
            
            <p class="mb-4 d-none d-md-block">
              <strong><br>Entre bonita e saia linda. Venha conhecer nosso espaço, registre-se e 
              tenha acesso a conteúdos exclusivos, como agendamentos online. </strong>
            </p>
            <br>
            <a href="home.php" class="btn btn-grey btn-lg">Página Inicial
              <i class="fa fa-home ml-2"></i>
            </a>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-5 offset-xl-1 col-xl-5 mb-4">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="" action="service/LoginService.php" method="POST">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Acesse sua conta</strong>
                  </h3>
                  <hr>

                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="form3" class="form-control" name="username">
                    <label for="form3">Usuário</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-lock prefix grey-text"></i>
                    <input type="password" id="form2" class="form-control" name="password">
                    <label for="form2">Senha</label>
                  </div>
                  <div class="md-form">
                    <?php
                      //session_start();
                      if(isset($_GET['sucess']) && !$_GET['sucess']){
                        echo "Senha incorreta!";
                      }
                      if(isset($_GET['userNotFound']) && $_GET['userNotFound'] && !isset($_GET['sucess'])){
                        echo "Usuário não encontrado!";
                      }

                    ?>  
                  </div>
                  
                  <div class="text-center">
                    <button class="btn btn-grey">Entrar</button>
                    <hr>
                    <fieldset class="form-check">
                      <input type="checkbox" class="form-check-input" id="checkbox1">
                      <label for="checkbox1" class="form-check-label dark-grey-text">Lembrar minha senha</label>
                    </fieldset>
                  </div>

                </form>
                <!-- Form -->

              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </div>
      <!-- Content -->

    </div>
    <!-- Mask & flexbox options-->

  </div>
  <!-- Full Page Intro -->

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