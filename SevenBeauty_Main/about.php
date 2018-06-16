<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("head.php") ?>
</head>

<body>

    <!--Main Navigation-->
    <header>
        <?php require_once("navbar.php") ?>
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5 pt-5" >
        <div class="container">

            <!--Section: Jumbotron-->
            <section class="card gradient-custom wow fadeIn" style="background-image: url('img/beauty/about_01.jpg'); background-repeat: no-repeat; background-size: cover; ">

                <!-- Content -->
                <div class="card-body text-white text-center py-5 px-5 my-5">

                    <h1 class="mb-4">
                        <strong>Sobre Seven Beauty Studio</strong>
                    </h1>
                    <p>
                        <strong>Salão de beleza e manicure</strong>
                    </p>
                    <p class="mb-4">
                        <strong>Salão de beleza com qualidade, inovação e que pensa no cliente em primeiro lugar, localizado em Porto Alegre - RS - Brasil</strong>
                    </p>
                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->

            <!--Section: Cards-->
            <section class="pt-5">

                <!-- Heading & Description -->
                <div class="wow fadeIn">
                    <!--Section heading-->
                    <h2 class="h1 text-center mb-5">O que você encontra aqui?</h2>
                    <!--Section description-->
                    <p class="text-center">A descrição para o salão de beleza que será escolhida pela cliente e terão várias frases de efeitos, que o farão parecer um salão de beleza internacional apenas pela beleza das palavras aqui escritas.</p>
                    <p class="text-center mb-5 pb-5">Trusted by over
                        <strong>400 000</strong> developers and designers. Easy to use & customize. 400+ material UI elements, templates
                        & tutorials.</p>
                </div>
                <!-- Heading & Description -->

                <!--Grid row-->
                <div class="row wow fadeIn">

                    <!--Grid column-->
                    <div class="col-lg-5 col-xl-4 mb-4">
                        <!--Featured image-->
                        <div class="view overlay rounded z-depth-1-half">
                            <div class="view overlay">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                        <h3 class="mb-3 font-weight-bold dark-grey-text">
                            <strong>Vejo nosso vídeo institucional</strong>
                        </h3>
                        <p class="grey-text">Conheça melhor a empresa e veja que você pode confiar no nosso serviço. Venha conhecer e se surpreender.</p>
                        <p>
                            <strong>Um vídeo com apenas algumas minutos, que vai fazer você ter certeza de que aqui é o lugar certo.</strong>
                        </p>
                        <a <?php echo 'href="'.SCHEDULLER.'"' ?> class="btn btn-primary btn-md">Agende seu horário
                            <i class="fa fa-play ml-2"></i>
                        </a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Cards-->

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