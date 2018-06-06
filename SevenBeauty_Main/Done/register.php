<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>

  <?php include_once("navbar.php") ?>

  <!-- Full Page Intro -->
  <div class="view full-page-intro" style="background-image: url('http://alihairzone.com/img/hair_dresser.jpg'); background-repeat: no-repeat; background-size: cover;">

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
                  <button class="btn btn-grey btn-lg btn-block" type="submit">Enviar solicitação de registro</button>
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
  <?php include_once("footer.php") ?>

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