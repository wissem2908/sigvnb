<?php
include('includes/header2.php');
?>
<style>
    .card-header {
        background: linear-gradient(to right, #318f94 0%, #5ec58c 100%);

        color: #fff;
    }

    .retour {
        float: inline-end;
        margin-top: -24px;
        margin-bottom: -7px;
    }

    .container-fluid {

    max-width: 95%;
}
</style>

<div class="page-wrapper">
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
           <div class="card text-center">
                            <div class="card-header">
                             <h3><b class="text-white">Web Mapping</b></h3>    
                            </div>
                            <div class="card-block">
                                 <iframe 
                            src="https://eavanam.maps.arcgis.com/apps/mapviewer/index.html?webmap=340d05129ca14dcbb01034f470dfd2a7" 
                            width="100%" 
                         
                            style="border:0; height:100vh" 
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                            </div>
                            <!-- <div class="card-footer text-muted">
                                 Web Mapping
                            </div> -->
                        </div>
            </div>
        </div>
    </div>
</div>
</div>








<!-- Mini Galerie Section -->


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

<script src="assets/js/users.js"></script>