<?php

session_start();

if (!isset($_SESSION['is_login'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/images/Logo-vnb.png">
    <title>System d'information geographique de la ville de boughezoul</title>
    <!-- Bootstrap Core CSS -->
    <link href="./assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="./css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="./css/colors/green.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 -->


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css
" rel="stylesheet">

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <!-- ✅ DataTables core -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- ✅ DataTables Buttons extension -->


    <style>
        html {
            scroll-behavior: smooth;
        }

        .card-outline-primary .card-header {
            background: #2f3d4a !important;
            border-color: #2f3d4a !important;
        }

        .btn-primary {
            background: linear-gradient(0deg, rgb(0, 166, 190) 0%, rgb(42, 201, 186) 100%);
            border: #fff;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(0deg, rgb(42, 201, 186) 0%, rgb(0, 166, 190) 100%);
            border: #fff;
        }

        .btn-info,
        .btn-info.disabled,
        .btn-info:hover {
            background: #fff;
            color: #359493;
            border: none;
        }

        .sidebar-nav>ul>li>a.active {
            font-weight: 400;
            background: #ffffff;
            color: #22c3ba !important;
        }

        .sidebar-nav>ul>li>a.active i {
            color: #22c3ba !important;
        }

        .card-no-border .sidebar-nav>ul>li>a {
            font-size: 1.0rem !important;
        }

        @media (min-width: 768px) {
            .sidebar-nav #sidebarnav>li>ul {

                width:470px !important
            }
        }
    </style>
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="./assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo icon -->
                            <b style="font-weight:600; font-size:1.3rem; color:#fff;">Système d'Information Géographique de la Ville Nouvelle de Boughezoul</b>

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <!-- <img src="./assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                            <!-- Light Logo text -->
                            <!-- <img src="./assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->

                        </span>

                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <!-- This is  -->
                        <!-- <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li> -->
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- <li class="nav-item hidden-sm-down">
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search for..."> <a class="srh-btn"><i class="ti-search"></i></a> </form>
                        </li> -->

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu  dropdown-menu-right animated bounceInDown"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li> -->

                        <li class="nav-item dropdown">
                            <!-- <a type="button" class="btn btn-danger btn-circle btn-sm text-white" href="assets/php/logout.php" ><i class="fa fa-power-off"></i> </a> -->
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="./assets/images/images/avatar-s-27.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <!-- <div class="u-img"><img src="./assets/images/users/1.jpg" alt="user"></div> -->
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION["nom"] . " " . $_SESSION["prenom"]; ?></h4>
                                                <p class="text-muted"><?php echo $_SESSION["role"]; ?></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li><a href="assets/php/logout.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- <li class="nav-small-cap">PERSONAL</li> -->

                        <li>
                            <a href="index.php"> <img src="./assets/images/images/logo-vnb.png" alt="homepage" class="light-logo" width="100" /> &nbsp; |</a>
                        </li>

                        <li>
                            <a class="has-arrow" href="user_management.php" aria-expanded="false"><i class="mdi mdi-airplay"></i><span>Administration </span></a>
                        </li>
                        <!-- <li>
                            <a class="has-arrow" href="index.php" aria-expanded="false"><i class="mdi mdi-home"></i><span>Accueil </span></a>
                        </li> -->
                        <li>
                            <a class="has-arrow" href="web_mapping.php" aria-expanded="false"><i class="mdi mdi-map"></i><span>Web Mapping </span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false">
                                <i class="fa fa-database"></i>
                                <span class="hide-menu">Base de données</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">

                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">
                                        Aménagement urbain et typologie résidentielle
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="db_residentiel.php?value=residence">Résidences</a></li>
                                      
                                    </ul>
                                </li>
                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">
                                        Activité Économique et Équipement Public
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="db_equipement.php?value=equipement">Equipement</a></li>
                                     
                                    </ul>
                                </li>
                                    <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">
                                        Espace vert et aménagement paysager
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="db_esp_vert.php?value=esp_vert">Espace vert</a></li>
                                        <li><a href="db_esp_vert.php?value=parc">Parc</a></li>
                                        <li><a href="db_esp_vert.php?value=ceinture_verte">Ceinture verte</a></li>
                                       
                                    </ul>
                                </li>
                               <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">
                                       Voirie, mobilité et transports
                                    </a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="db_voirie_mobilite_transport.php?value=voirie">Voirie</a></li>
                                        
                                    </ul>
                                </li>
                               

                            </ul>
                        </li>


                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class=" fa fa-bar-chart-o"></i><span class="hide-menu">Statistiques </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="stat_residentiel.php">Aménagement urbain et typologie résidentielle</a></li>
                                <li><a href="stat_equipement.php"> Activité Économique et Équipement Public</a></li>
                                <li><a href="stat_esp_vert.php">Espace vert et aménagement paysager </a></li>
                                <li><a href="stat_voirie_mobilite_transport.php">Voirie, mobilité et transports </a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Tableau de board </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="tb_residentiel.php">Aménagement urbain et typologie résidentielle</a></li>
                                <li><a href="tb_equipement.php"> Activité Économique et Équipement Public</a></li>
                                <li><a href="tb_esp_vert.php">Espace vert et aménagement paysager</a></li>
                                <li><a href="tb_voirie_mobilite_transport.php">Voirie, mobilité et transports</a></li>

                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-external-link"></i><span>Lien utiles </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="https://vnboughezoul.dz/ar/" target="_blank">vnboughezoul</a></li>


                            </ul>
                        </li>

                        <!--                     
                        <li>
                            <a class="has-arrow " href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Multi level dd</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.1</a></li>
                                <li><a href="#">item 1.2</a></li>
                                <li>
                                    <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="#">item 1.3.1</a></li>
                                        <li><a href="#">item 1.3.2</a></li>
                                        <li><a href="#">item 1.3.3</a></li>
                                        <li><a href="#">item 1.3.4</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">item 1.4</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>