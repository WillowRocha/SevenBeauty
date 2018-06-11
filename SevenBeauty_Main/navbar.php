
<!-- Navbar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" <?php echo 'href="'.HOME.'"' ?>>
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
        <li 
          <?php 
              if(!strcasecmp($paginaLink, HOME))
                  $active = "active";
                echo 'class="nav-item '.$active.'"';
                $active = "";
            ?>
        >
          <a class="nav-link" href= <?php echo '"'.HOME.'"'; ?>>Início</a>
        </li>
        <li 
            <?php 
              if(!strcasecmp($paginaLink, SERVICES))
                  $active = "active";
                echo 'class="nav-item '.$active.'"';
                $active = "";
            ?>
          >
          <a class="nav-link" href= <?php echo '"'.SERVICES.'"'; ?>>Serviços</a>
        </li>
        <li 
          <?php 
              if(!strcasecmp($paginaLink, CONTACT))
                  $active = "active";
                echo 'class="nav-item '.$active.'"';
                $active = "";
            ?>
        >
          <a class="nav-link" href= <?php echo '"'.CONTACT.'"'; ?>>Contato</a>
        </li>
        <li 
          <?php 
              if(!strcasecmp($paginaLink, ABOUT))
                  $active = "active";
                echo 'class="nav-item '.$active.'"';
                $active = "";
            ?>
        >
          <a class="nav-link" href= <?php echo '"'.ABOUT.'"'; ?>>Sobre</a>
        <!--Fazer if para ver se tem permissões para tal-->
        </li>
        <li 
          <?php 
              if(!strcasecmp($paginaLink, ADMIN))
                  $active = "active";
                echo 'class="nav-item '.$active.'"';
                $active = "";
            ?>
        >
          <a class="nav-link" href= <?php echo '"'.ADMIN.'"'; ?>>Área Adminitrativa</a>
        </li>

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
          if(isset($_SESSION['logged']) && !strcmp($_SESSION['logged'], VERDADEIRO) && isset($_SESSION['current_user'])){
            echo '<li class="nav-item">
                    <a href="'.USER_INFO.'" class="nav-link border border-light rounded">
                      Bem vindo, '.$_SESSION['current_user'].
                    '</a>
                  </li>
                  <li class="nav-item">
                      <a href="'.LOGOUT.'" class="nav-link border border-light rounded">
                        Sair
                      </a>
                    </li>';
          } else {
            if(!strcasecmp($paginaLink, LOGIN)){
              echo '<li class="nav-item">
                      <a href="'.REGISTER.'" class="nav-link border border-light rounded">
                        Registre-se <i class="fa fa-sign-in mr-2"></i>
                      </a>
                    </li>
              ';
            } else {
              echo '<li class="nav-item">
                      <a href="'.LOGIN.'" class="nav-link border border-light rounded">
                        Login <i class="fa fa-sign-in mr-2"></i>
                      </a>
                    </li>
                ';
            }
          }
        ?>
      </ul>
    </div>

  </div>
</nav>
<!-- Navbar -->