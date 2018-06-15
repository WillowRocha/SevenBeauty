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
                <form name="" action="<?php echo SERVICE_REGISTER_SUPPLIER ?>" method="POST">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Cadastrar Cliente</strong>
                  </h3> 
                  <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                  <div class="col-md-12 text-center green-text">Cliente cadastrado com sucesso!</div>
                  <?php elseif(isset($_GET['success']) && $_GET['success'] == 0): ?>
                  <div class="col-md-12 text-center red-text">Erro ao cadastrar cliente!</div>
                  <?php endif; ?>

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-5 mb-2">

                      <!--firstName-->
                      <div class="md-form ">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nome do cliente">
                        <label for="firstName" class="">Nome</label>
                      </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-7 mb-2">

                      <!--lastName-->
                      <div class="md-form">
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Sobrenome do cliente">
                        <label for="lastName" class="">Sobrenome</label>
                      </div>

                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                  <!--Grid row-->
                  <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 col-sm-12">
                      <!--Username-->
                      <div class="md-form input-group pl-0 mb-5">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="username">@</span>
                        </div>
                        <input type="text" class="form-control py-0" name="username" placeholder="Digite um nome de usuário" aria-describedby="username">
                      </div>
                    </div>
                    <!--Grid column-->
                    <div class="col-md-6 col-sm-12">
                      <!--email-->
                      <div class="md-form mb-5">
                        <input type="text" id="email" name="email" class="form-control" placeholder="exemplo@examplo.com">
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
                        <input type="text" id="address" name="address" class="form-control" placeholder="Av Orfanatrófio, 555">
                        <label for="address" class="">Endereço</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Bairro-->
                      <div class="md-form mb-5">
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" placeholder="Orfanatrófio">
                        <label for="address" class="">Bairro</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Cidade-->
                      <div class="md-form mb-5">
                        <input type="text" id="city" name="city" class="form-control" placeholder="Porto Alegre">
                        <label for="address" class="">Cidade</label>
                      </div>
                    </div>
                  </div>
                  <!--Grid row-->
                   <!--Grid row-->
                  <div class="row">
                    
                    <div class="col-4">
                      <!--address-->
                      <div class="md-form mb-5">
                        <input type="text" id="rg" name="rg" class="form-control" placeholder="1234567890">
                        <label for="address" class="">Registro Geral (opicional)</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Bairro-->
                      <div class="md-form mb-5">
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="123.456.789-09">
                        <label for="address" class="">CPF (opicional)</label>
                      </div>
                    </div>
                    
                    <div class="col-4">
                      <!--telephone-->
                      <div class="md-form mb-5">
                        <input type="text" id="telephone" name="telephone" class="form-control" placeholder="(51) 99999-9999">
                        <label for="address-2" class="">Telefone/Celular</label>
                      </div>
                    </div>
                  </div>
                  <!--Grid row-->
                  <!--Grid row-->
                  <div class="row">
                     <div class="col-4">
                      <div class="md-form mb-5">
                        <input type="text" id="birthday" name="birthday" class="form-control" placeholder="dd/mm/aaaa">
                        <label for="address-2" class="">Data de nascimento (opcional)</label>
                      </div>
                    </div>
                     <div class="col-8">
                      <div class="md-form mb-5">
                        <input type="text" id="workplace" name="workplace" class="form-control" placeholder="Onde você trabalha?">
                        <label for="address-2" class="">Local de Trabalho</label>
                      </div>
                    </div>
                  </div>

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