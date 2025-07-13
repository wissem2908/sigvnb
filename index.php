<?php
include('includes/header.php');
?>
<style>
   .banner-slide {
    position: relative;
    height: 80vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}

.banner-caption {
    background: rgba(0, 0, 0, 0.6);
    padding: 30px 40px;
    border-radius: 10px;
    text-align: center;
    color: white;
 width:100%;
 height:100%;
    /* Centrage vertical/horizontal du texte dans ce bloc */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

    .banner-caption h1 {
        font-size: 2.5rem;
        color: #fff;
        font-weight: 600;
    }

    .banner-caption p {
        font-size: 1.2rem;
        color: #ddd;
        margin-top: 15px;
    }

    @media (max-width: 768px) {
        .banner-caption h1 {
            font-size: 1.8rem;
        }

        .banner-caption p {
            font-size: 1rem;
        }
    }

    #map {
        transition: box-shadow 0.3s ease;
    }

    #map:hover {
        box-shadow: 0 0 20px rgba(0, 123, 255, 0.4);
    }

    .gallery-item img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .gallery-item img:hover {
        transform: scale(1.03);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="page-wrapper">
        <!-- Start Modern Banner / Carousel -->
        <div id="mainBanner" class="carousel slide mb-5" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#mainBanner" data-slide-to="0" class="active"></li>
                <li data-target="#mainBanner" data-slide-to="1"></li>
                <li data-target="#mainBanner" data-slide-to="2"></li>
                <li data-target="#mainBanner" data-slide-to="3"></li>
            </ol>

            <!-- Slides -->
            <div class="carousel-inner rounded shadow-lg overflow-hidden">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="banner-slide" style="background-image: url('./assets/images/images/slide01.png');">
                        <div class="banner-caption">
                            <h1>Bienvenue à Boughezoul</h1>
                            <p>Un Système d’Information Géographique moderne et interactif.</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="banner-slide" style="background-image: url('./assets/images/images/slide02.png');">
                        <div class="banner-caption">
                            <h1>Analyse et Cartographie</h1>
                            <p>Visualisez les données de manière intuitive.</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="banner-slide" style="background-image: url('./assets/images/images/slide03.png');">
                        <div class="banner-caption">
                            <h1>Gestion Avancée</h1>
                            <p>Utilisateurs, cartes, statistiques et plus encore.</p>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="carousel-item">
                    <div class="banner-slide" style="background-image: url('./assets/images/images/slide04.png');">
                        <div class="banner-caption">
                            <h1>Gestion Centralisée</h1>
                            <p>Un accès sécurisé à toutes vos données SIG.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="carousel-control-prev" href="#mainBanner" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#mainBanner" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
        <!-- End Modern Banner / Carousel -->
    <div class="container">




        <!-- Title -->
        <div class="row page-titles " style="padding-top:78px" id="presentation" >
            <div class="col-md-12 text-center">
                <h1 class="text-white">Présentation</h1>
            </div>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="./assets/images/images/about.png" alt="Présentation" class="img-fluid rounded shadow">
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div>
                                    <h4 class="mb-3">Système d'information géographique de Boughezoul</h4>
                                    <p style="font-size: 16px; line-height: 1.7; ">
                                        Cette application SIG est développée pour permettre une visualisation, une analyse et une gestion efficace des données spatiales de la ville de Boughezoul. Elle offre une interface intuitive, un tableau de bord dynamique et des fonctionnalités avancées de cartographie.
                                    </p>
                                    <p style="font-size: 16px;">
                                        L’objectif est de centraliser les informations géographiques et de faciliter la prise de décision pour les acteurs locaux et régionaux.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Presentation Content -->

        <!-- Fonctionnalités Section -->
        <div class="row " style="padding-top:80px"  id="fonctionnalite">
            <div class="col-md-12 text-center">
                <h1 class="mb-4 text-white">Fonctionnalités de l'application</h1>
            </div>


        </div>

        <div class="row">
            <!-- column -->
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="./assets/images/images/card01.png" alt="Card image cap">
                    <div class="card-block text-center">
                        <h4 class="card-title">Carte interactive</h4>
                        <p class="card-text">Visualisez les données spatiales dynamiquement avec zoom, couches, et légendes.</p>
                        </p>

                    </div>
                </div>
                <!-- Card -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="./assets/images/images/card02.png" alt="Card image cap">
                    <div class="card-block text-center">
                        <h4 class="card-title">Tableau de bord</h4>
                        <p class="card-text">Accédez à des statistiques clés, graphiques et indicateurs sur les données collectées.</p>
                        </p>

                    </div>
                </div>
                <!-- Card -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="./assets/images/images/card03.png" alt="Card image cap">
                    <div class="card-block text-center">
                        <h4 class="card-title">Base de données</h4>
                        <p class="card-text">Stockage structuré des données géographiques et attributaires avec possibilités d’édition.</p>
                        </p>

                    </div>
                </div>
                <!-- Card -->
            </div>
            <div class="col-lg-3 col-md-6">
                <!-- Card -->
                <div class="card">
                    <img class="card-img-top img-responsive" src="./assets/images/images/card03.png" alt="Card image cap">
                    <div class="card-block text-center">
                        <h4 class="card-title">Carte interactive</h4>
                        <p class="card-text">Visualisez les données spatiales dynamiquement avec zoom, couches, et légendes.</p>
                        </p>

                    </div>
                </div>
                <!-- Card -->
            </div>

        </div>
        <!-- Add more cards as needed -->
</div>

        <!-- Carte Section -->
         <div style="padding-top:110px;scroll-margin-top: 120px;"> 
        <div class="card" style="border-radius:0; " id="carte">
            <div class="card-block" style=" padding:0 !important; padding-top: 1.25rem !important; ">
                <h4 class="card-title text-center">Carte interactive - Ville de Boughezoul</h4>
                <div id="styledmap" class="gmaps" style="z-index:0;"></div>
            </div>
        </div>
</div>
        <script>
            //     // Initialize the map centered on Boughezoul
            var map = L.map('styledmap').setView([35.8755, 2.8937], 13);

            // Tile layer (OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap',
                maxZoom: 19
            }).addTo(map);

            // Example marker with popup
            L.marker([35.8755, 2.8937]).addTo(map)
                .bindPopup('<strong>Boughezoul</strong><br>Ville intelligente en développement.')
                .openPopup();
        </script>


        <!-- Mini Galerie Section -->

<div class="container" id="galerie" style="padding-top:110px;scroll-margin-top: 80px;">

        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4 text-white">Mini Galerie</h1>
            </div>

        </div>
        <div class="card-columns el-element-overlay">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <a class="image-popup-vertical-fit" href="./assets/images/big/img5.jpg"> <img src="./assets/images/big/img5.jpg" alt="user" /> </a>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                        <br />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <a class="image-popup-vertical-fit" href="./assets/images/users/1.jpg"> <img src="./assets/images/users/1.jpg" alt="user" /> </a>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                        <br />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <a class="image-popup-vertical-fit" href="./assets/images/users/2.jpg"> <img src="./assets/images/users/2.jpg" alt="user" /> </a>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                        <br />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <a class="image-popup-vertical-fit" href="./assets/images/big/img4.jpg"> <img src="./assets/images/big/img4.jpg" alt="user" /> </a>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                        <br />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <a class="image-popup-vertical-fit" href="./assets/images/big/img2.jpg"> <img src="./assets/images/big/img2.jpg" alt="user" /> </a>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                        <br />
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <a class="image-popup-vertical-fit" href="./assets/images/users/1.jpg"> <img src="./assets/images/big/img1.jpg" alt="user" /> </a>
                    </div>
                    <div class="el-card-content">
                        <h3 class="box-title">Project title</h3> <small>subtitle of project</small>
                        <br />
                    </div>
                </div>

            </div>

            <!-- Add more images as needed -->
        </div>

    </div>



</div>

<footer class="footer">
    © ANURB 2025 - Tous Droits Réservés.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
<?php
include('includes/footer.php');
?>