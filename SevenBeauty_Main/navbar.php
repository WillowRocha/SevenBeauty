
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="<?php echo HOME ?>">
      <strong>Seven Beauty</strong>
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php 
        // atribui a variável paginaLink apenas o nome da página
        $paginaLink = basename($_SERVER['SCRIPT_NAME']);
        $active = "";
      ?>

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <?php 
          if(!strcasecmp($paginaLink, HOME)) $active = " active"; 
        ?>
        <li class="nav-item<?php echo $active ?>">
        <?php $active = ""; ?>
          <a class="nav-link" href="<?php echo ROUTE.HOME ?>">Início</a>
        </li>
        <?php 
          if(!strcasecmp($paginaLink, SERVICES)) $active = " active"; 
        ?>
        <li class="nav-item <?php echo $active ?>">
        <?php $active = ""; ?>
          <a class="nav-link" href="<?php echo ROUTE.SERVICES ?>">Serviços</a>
        </li>
        <?php 
          if(!strcasecmp($paginaLink, CONTACT)) $active = " active"; 
        ?>
        <li class="nav-item<?php echo $active ?>">
        <?php $active = ""; ?>
          <a class="nav-link" href="<?php echo ROUTE.CONTACT ?>">Contato</a>
        </li>
        <?php 
          if(!strcasecmp($paginaLink, ABOUT)) $active = " active"; 
        ?>
        <li class="nav-item<?php echo $active ?>">
        <?php $active = ""; ?>
          <a class="nav-link" href="<?php echo ABOUT ?>" >Sobre</a>
        <!--Fazer if para ver se tem permissões para tal-->
        </li>
        <?php if(isset($_SESSION['access_level']) && $_SESSION['access_level'] >= AC_PROFISSIONAL): ?>
          <?php 
            if(!strcasecmp($paginaLink, ADMIN)) $active = " active"; 
          ?>
          <li class="nav-item<?php echo $active ?>">
          <?php $active = ""; ?>
            <a class="nav-link" href="<?php echo ADMIN ?>">Área Adminitrativa</a>
          </li>
        <?php endif; ?>
      </ul>
      
      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        <li class="nav-item">
          <a href="https://www.facebook.com/" class="nav-link" target="_blank">
            <i class="fa fa-facebook"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://twitter.com/" class="nav-link" target="_blank">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <?php
          if(isset($_SESSION['logged']) && !strcmp($_SESSION['logged'], VERDADEIRO) && isset($_SESSION['current_user'])):
        ?>
            <li class="nav-item">
              <a href="<?php echo USER_INFO ?>" class="nav-link border border-light rounded">
                Bem vindo, <?php echo $_SESSION['current_user'] ?>
              </a>
            </li>
            <li class="nav-item" style="padding: 0 0 0 10px;">
                <a href="<?php echo LOGOUT ?>" class="nav-link border border-light rounded">
                  Sair
                </a>
              </li>
        <?php 
          elseif(!strcasecmp($paginaLink, LOGIN)): 
            session_destroy();  
        ?>
          <li class="nav-item">
            <a href="<?php echo REGISTER ?>" class="nav-link border border-light rounded">
              Registre-se <i class="fa fa-sign-in mr-2"></i>
            </a>
          </li>
          <?php 
            else: 
          ?>
            <li class="nav-item">
              <a href="<?php echo LOGIN ?>" class="nav-link border border-light rounded">
                Entrar <i class="fa fa-sign-in mr-2"></i>
              </a>
            </li>
          <?php 
            endif;
          ?>
      </ul>
    </div>

  </div>
</nav>
<!-- Navbar -->