<html lang="en">

<head>
  <?php require_once("head.php") ?>
</head>

<body>

  <?php require_once("navbar.php") ?>

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('img/beauty/capa04.jpg'); background-repeat: no-repeat; background-size: cover;">

    <!-- Mask & flexbox options-->
    <div class="mask rgba-black-light d-flex justify-content-left align-items-center">

      <!-- Content -->
      <div class="container">

        <!--Grid row-->
        <div class="row wow fadeIn">
          <!--Grid column-->
          <div class="col-xl-8 col-lg-8 col-md-12">

            <!--Card-->
            <div class="card">

              <!--Card content-->
              <div class="card-body">

                <!-- Form -->
                <fform name="">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Registrar</strong>
                  </h3>
                  <hr>

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-4 mb-2">

                      <!--firstName-->
                      <div class="md-form ">
                        <input type="text" id="name" class="form-control" placeholder="Digite seu nome">
                        <label for="firstName" class="">Nome</label>
                      </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-8 mb-2">

                      <!--lastName-->
                      <div class="md-form">
                        <input type="text" id="surname" class="form-control" placeholder="Digite seu sobrenome">
                        <label for="lastName" class="">Sobrenome</label>
                      </div>

                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">
                    <!--Grid column-->
                    <div class="col-6">
                      <!--Username-->
                      <div class="md-form input-group pl-0 mb-5">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="username">@</span>
                        </div>
                        <input type="text" class="form-control py-0" placeholder="Usuário" aria-describedby="username">
                      </div>
                    </div>
                    <!--Grid column-->
                    <div class="col-6">
                      <!--email-->
                      <div class="md-form mb-5">
                        <input type="text" id="email" class="form-control" placeholder="exemplo@examplo.com">
                        <label for="email" class="">E-mail (opcional)</label>
                      </div>
                    </div>
                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">
                    
                    <div class="col-4">
                      <!--address-->
                      <div class="md-form mb-5">
                        <input type="text" id="address" class="form-control" placeholder="Av Orfanatrófio, 555">
                        <label for="address" class="">Endereço</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Bairro-->
                      <div class="md-form mb-5">
                        <input type="text" id="neighborhood" class="form-control" placeholder="Orfanatrófio">
                        <label for="address" class="">Bairro</label>
                      </div>
                    </div>
                      <div class="col-4">
                      <!--Cidade-->
                      <div class="md-form mb-5">
                        <input type="text" id="city" class="form-control" placeholder="Porto Alegre">
                        <label for="address" class="">Cidade</label>
                      </div>
                    </div>
                  
                  </div>

                  <!--telephone-->
                  <div class="md-form mb-5">
                    <input type="text" id="telephone" class="form-control" placeholder="(51) 99999-9999">
                    <label for="address-2" class="">Telefone/Celular</label>
                  </div>

                  <hr>

                  <div class="md-form mb-5">
                    <input type="text" id="birthday" class="form-control" placeholder="dd/mm/aaaa">
                    <label for="address-2" class="">Aniversário</label>
                  </div>

                  <div class="md-form mb-5">
                    <input type="text" id="telephone" class="form-control" placeholder="Onde você trabalha?">
                    <label for="address-2" class="">Local de Trabalho</label>
                  </div>

                  <hr class="mb-4">
                  <button class="btn btn-grey btn-lg btn-block" type="submit">Registrar</button>
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