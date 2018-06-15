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
                  if(isset($_GET['client_id'])){
                    $id_cliente = $_GET['client_id'];
                  } elseif(isset($_GET['success']) && $_GET['success'] == 1) {
                    echo "Sucesso ao editar cliente!";
                    die();
                  } else if(isset($_GET['success']) && $_GET['success'] == 0){
                    echo "Erro ao editar cliente!";
                    die();
                  } else {
                    echo "Algo deu errado";
                    die();
                  }

                  $dao = new ClienteDao();
                  $cliente = $dao->buscaById($id_cliente);
                  if(!$cliente){
                    echo "Erro ao buscar cliente!";
                    die();
                  }
                ?>
                <!-- Form -->
                <form name="" action="<?php echo ROUTE.SERVICE_REGISTER_CLIENT."?client_id=".$cliente->getId()."&person_id=".$cliente->getIdPessoa()."&user_id=".$cliente->getUsuario()->getId() ?>" method="POST">
                  <!-- Heading -->
                  <h3 class="dark-grey-text text-center">
                    <strong>Editar Cliente</strong>
                  </h3> 
                  <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
                  <div class="col-md-12 text-center green-text">Cliente editado com sucesso!</div>
                  <?php elseif(isset($_GET['success']) && $_GET['success'] == 0): ?>
                  <div class="col-md-12 text-center red-text">Erro ao editar cliente!</div>
                  <?php endif; ?>
                  
                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-5 mb-2">

                      <!--firstName-->
                      <div class="md-form ">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Digite seu nome"
                        value="<?php echo $cliente->getNome()?>">
                        <label for="firstName" class="">Nome</label>
                      </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-7 mb-2">

                      <!--lastName-->
                      <div class="md-form">
                        <input type="text" id="surname" name="surname" class="form-control" placeholder="Digite seu sobrenome" value="<?php echo $cliente->getSobrenome()?>">
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
                        <input type="text" class="form-control py-0" name="username" placeholder="Usuário" aria-describedby="username" value="<?php echo $cliente->getUsuario()->getNome()?>">
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
                        <input type="text" id="address" name="address" class="form-control" placeholder="Av Orfanatrófio, 555" value="<?php echo $cliente->getEndereco()?>">
                        <label for="address" class="">Endereço</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Bairro-->
                      <div class="md-form mb-5">
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control" placeholder="Orfanatrófio" value="<?php echo $cliente->getBairro()?>">
                        <label for="address" class="">Bairro</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Cidade-->
                      <div class="md-form mb-5">
                        <input type="text" id="city" name="city" class="form-control" placeholder="Porto Alegre"
                        value="<?php echo $cliente->getCidade()?>">
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
                        <input type="text" id="rg" name="rg" class="form-control" placeholder="1234567890"
                        value="<?php echo $cliente->getRG()?>">
                        <label for="address" class="">Registro Geral (opicional)</label>
                      </div>
                    </div>
                    <div class="col-4">
                      <!--Bairro-->
                      <div class="md-form mb-5">
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="123.456.789-09"
                        value="<?php echo $cliente->getCPF()?>">
                        <label for="address" class="">CPF (opicional)</label>
                      </div>
                    </div>
                    
                    <div class="col-4">
                      <!--telephone-->
                      <div class="md-form mb-5">
                        <input type="text" id="telephone" name="telephone" class="form-control" placeholder="(51) 99999-9999" value="<?php echo $cliente->getTelefone()?>">
                        <label for="address-2" class="">Telefone/Celular</label>
                      </div>
                    </div>
                  </div>
                  <!--Grid row-->
                  <!--Grid row-->
                  <div class="row">
                     <div class="col-4">
                      <div class="md-form mb-5">
                        <input type="text" id="birthday" name="birthday" class="form-control" placeholder="dd/mm/aaaa" value="<?php echo $cliente->getNascimento()?>">
                        <label for="address-2" class="">Data de nascimento (opcional)</label>
                      </div>
                    </div>
                     <div class="col-8">
                      <div class="md-form mb-5">
                        <input type="text" id="workplace" name="workplace" class="form-control" placeholder="Onde você trabalha?" value="<?php echo $cliente->getLocalDeTrabalho()?>">
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