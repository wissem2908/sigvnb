<?php
include('includes/header2.php');
?>
<style>
.card-header {
    background-color: #46a891;
    color: #fff;
}
</style>

<div class="page-wrapper">
    <br />
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                     
                     <div id="accordion1" role="tablist" aria-multiselectable="true">

  <!-- Card 1 -->
  <div class="card m-b-0">
    <div class="card-header toggle-collapse" data-toggle="collapse" data-target="#collapseOne1"
         role="tab" id="headingOne1" style="cursor: pointer;">
      <h5 class="mb-0 text-white">Ajouter un nouveau utilisateur</h5>
    </div>
    <div id="collapseOne1" class="collapse "
         role="tabpanel" aria-labelledby="headingOne1">
      <div class="card-block">
      <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <!-- <div class="card-header">
                        <h4 class="m-b-0 text-white">Ajouter un nouveau utilisateur</h4>
                    </div> -->
                    <div class="card-block">
                        <form action="#">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nom</label>
                                            <input type="text" id="nom" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Prénom</label>
                                            <input type="text" id="prenom" class="form-control form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Matricule</label>
                                            <input type="text" id="matricule" class="form-control form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Organisme</label>
                                            <input type="text" id="organisme" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Fonction</label>
                                            <input type="text" id="fonction" class="form-control form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Role</label>
                                            <input type="text" id="role" class="form-control form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-t-20">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="email" id="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Nom d'utilisateur</label>
                                            <input type="text" id="username" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label">Mot de passe</label>
                                            <input type="password" id="password" class="form-control form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn  btn-primary" id="add_user"> <i class="fa fa-check"></i> Ajouter l'utilisateur</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Card 2 -->
  <div class="card m-b-0">
    <div class="card-header toggle-collapse" data-toggle="collapse" data-target="#collapseTwo2"
         role="tab" id="headingTwo2" style="cursor: pointer;">
      <h5 class="mb-0 text-white" >Liste des utilisateurs</h5>
    </div>
    <div id="collapseTwo2" class="collapse"
         role="tabpanel" aria-labelledby="headingTwo2">
      <div class="card-block">
       <div class="row">
            <div class="col-lg-12">
                <div class="card card-outline-primary">
                    <!-- <div class="card-header">
                        <h4 class="m-b-0 text-white">Liste des utilisateurs</h4>
                    </div> -->
                    <div class="card-block">

                        <div class="table-responsive ">
                            <table id="users_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                         <th>Matricule</th>
                                        <th>Organisme</th>
                                        <th>Role</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

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