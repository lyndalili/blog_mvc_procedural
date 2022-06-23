<!DOCTYPE html>
<html lang="fr en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title><?= (defined("LAYOUT_TITLE")) ? LAYOUT_TITLE : LAYOUT_TITLE_DEFAULT  ?></title><!-- constante avec condistion qui sert a afficher pas de tire quand ya pas de constante definie pour le titre qui est pour nous au debut (LAYOUT_TITLE)dans config  -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="static/images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="static/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="static/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="static/css/style.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="static/css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="static/css/colors.css" rel="stylesheet">

    <?php if (isset($ccs))foreach($css as $url){ ?>
        <link href="<?= $url?>" rel="stylesheet"> <!-- code boucle pour afficher le css en boucle pour ecraser le css du templete  -->
<?php  }?> 

    <!-- Version Garden CSS for this template -->
    <link href="static/css/version/garden.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                    <input type="hidden" value="<?= ABSOLUTE?>" id="absolute">
                        <input type="text" class="form-control" placeholder="Lancer votre recherche" id="topsearch">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </form>
                </div><!-- end newsletter -->

                <ul id ="responsesList">
                </ul>
            </div>
        </div><!-- end top-search -->

        <div class="topbar-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 hidden-xs-down">
                        <div class="topsocial">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Flickr"><i class="fa fa-flickr"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google+"><i class="fa fa-google-plus"></i></a>
                        </div><!-- end social -->
                    </div><!-- end col -->

                    <div class="col-lg-4 hidden-md-down">
                    </div><!-- end col -->





                        <div class="dropdown d-flex justify-content-end bd-highlight">
                            <a class="dropdown-toggle mr-3" data-toggle="dropdown">
                                <i class="fa fa-user-o" aria-hidden="true"></i> Connexion </a>

                            <div class="dropdown-menu dropdown-child ">
                                <?php if (!isset($_SESSION["userFO"])) { ?>
                                    <a class="dropdown-item" href="?module=users&action=login"><span class="fa fa-life-ring"></span>
                                        Connexion</a>
                                <?php } else { ?>
                                    <p class="dropdown-item">  Bonjour <?= $_SESSION["userFO"]["display_name"] ?> </p>
                                    <a href="?module=users&action=logoutProcess"> <i class="fa fa-user-o" aria-hidden="true"></i> Deconnexion</a>
                                <?php } ?></a>
                                <a class="dropdown-item" href="#"><span class="fa fa-wrench"></span> Mon compte</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?module=users&action=userNew"><span class="fa fa-bullhorn"></span> Rejoignez-nous en créant un compte !</a>

                            </div>
                            <div class="">
                                <a class="card-search" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-search"></i> Search</a>
                            </div>
                        </div>


                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end topbar -->

        <div class="header-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <!--<a href="index.php"><img src="static/images/version/garden-logo.png" alt=""></a>-->
                            <h1 class="card-title">Blog  Dynamique  Php Mysql</h1>
                            <p class="card-sous-title">échos, éditos, confidences et enquêtes sur l’actualité politique </p>
                        </div><!-- end logo -->
                    </div>
                </div><!-- end row -->
            </div><!-- end header-logo -->
        </div><!-- end header -->



        
        <?php flash_display(); ?>
        <header class="header">
            <div class="container">
                <nav class="navbar navbar-inverse navbar-toggleable-md">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest_Timemenu" aria-controls="Forest_Timemenu" aria-expanded="false" aria-label="Toggle_navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="Forest_Timemenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="index.php">Acceuil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="?action=category&id=2">La droite</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="?action=category&id=1">La gauche</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="?action=category&id=4">Le centre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="?action=category&id=3">Les autres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link color-green-hover" href="?module=pages&action=contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->


        </header><!-- end header -->
    </div>