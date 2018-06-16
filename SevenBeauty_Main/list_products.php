<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("head.php") ?>
  <style type="text/css">
      .pt-3-half {
            padding-top: 1.4rem;
        }
  </style>
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
    <div class="container col-12">

      <!--Grid row-->
      <div class="row d-flex justify-content-center">
        
        <!-- Editable table -->
        <div class="card col-12">
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Produtos</h3>
            <div class="card-body">
                <div id="table" class="table-editable">
                    <span class="table-add float-right mb-3 mr-2"><a href="<?php echo ROUTE.REGISTER_PRODUCT ?>" class="text-success"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></a></span>
                    
                    <?php 
                      if(isset($_GET['removed'])) 
                        if($_GET['removed'] > 0):
                    ?>
                    <div class="col-12 text-center green-text">
                          Produto removido com sucesso!
                    </div>
                    <?php elseif($_GET['removed'] == 0): ?>
                      <div class="col-12 text-center red-text">
                          Nenhum produto removido.
                      </div>
                    <?php endif; ?>
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <tr>
                            <th class="text-center">Código de barras</th>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Quantidade</th>
                            <th class="text-center">Unidade de medida</th>
                            <th class="text-center">Categoria</th>
                            <th class="text-center">Estoque mínimo</th>
                            <th class="text-center">Editar/Remover</th>
                        </tr>
                        <?php 
                            $dao = new ProdutoDao();
                            $produtos = $dao->buscaAtivos();
                            $size = count($produtos);
                            if($size > 0):
                        ?>
                            <?php
                                $count = 0;
                                foreach($produtos as $produto):
                            ?>
                                <tr>
                                    <td class="pt-3-half">
                                        <?php echo $produto->getCodigoBarras() ?>
                                    </td>
                                    <td class="pt-3-half">
                                        <?php echo $produto->getNome(); ?>
                                    </td>
                                    <td class="pt-3-half">
                                        <?php echo $produto->getQuantidade(); ?>
                                    </td>
                                    <td class="pt-3-half">
                                        <?php echo $produto->getUnidadeMedida()->getNome(); ?>
                                    </td>
                                    <td class="pt-3-half">
                                        <?php echo $produto->getCategoria()->getNome(); ?>
                                    </td>
                                    <td class="pt-3-half">
                                        <?php echo $produto->getEstoqueMinimo(); ?>
                                    </td>
                                    <td>
                                        <span class="edit-client"><a href="<?php echo ROUTE.EDIT_PRODUCT.'?product_id='.$produto->getCodigoBarras() ?>"><button type="button" class="btn btn-yellow btn-rounded btn-sm my-0">Editar</button></a></span>
                                        <p></p>
                                        <span class="remove-client"><a href="<?php echo ROUTE.SERVICE_REMOVE.'?identifier='.$produto->getCodigoBarras().'&class=produto' ?>"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Excluir</button></a></span>
                                    </td>
                                </tr>
                                <!-- This is our clonable table line -->
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="offset-4 col-4 text-center">Nenhum resultado encontrado.</div>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- Editable table -->

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