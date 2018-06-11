<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("head.php") ?>
</head>

<body style="background-color: #1c2331;">

  <?php require_once("navbar.php") ?>

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('img/beauty/capa04.jpg'); background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">
          <!--Grid column-->
          <div class="col-xl-7 col-lg-7 col-md-12">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <form name="">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Contate-nos:</strong>
                  </h3>
                  <hr>

                  <div class="md-form">
                    <i class="fa fa-user prefix grey-text"></i>
                    <input type="text" id="form3" class="form-control">
                    <label for="form3">Nome</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-building prefix grey-text"></i>
                    <input type="text" id="form2" class="form-control">
                    <label for="form2">Local de Trabalho</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-envelope prefix grey-text"></i>
                    <input type="text" id="form2" class="form-control">
                    <label for="form2">E-mail</label>
                  </div>
                  <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea"></textarea>
                    <label for="form8">Qual sua mensagem?</label>
                  </div>

                  <div class="text-center">
                    <button class="btn btn-grey">Send</button>
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