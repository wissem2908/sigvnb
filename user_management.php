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
                            <div class="card  userForm" style="margin-bottom:10px;">
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
                            <div class="card m-b-0 userTable">
                                <div class="card-header toggle-collapse" data-toggle="collapse" data-target="#collapseTwo2"
                                    role="tab" id="headingTwo2" style="cursor: pointer;">
                                    <h5 class="mb-0 text-white">Liste des utilisateurs</h5>
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
                                                                        <th>Status</th>
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
                            <!-- Card 3 -->
                            <div class="card m-b-0 editForm" hidden>
                                <div class="card-header toggle-collapse" data-toggle="collapse" data-target="#collapseTwo3"
                                    role="tab" id="headingTwo3" style="cursor: pointer;">
                                    <h5 class="mb-0 text-white">Modifier l'utilisateur</h5>
                                    <button class="btn btn-info retour">Retour</button>
                                </div>
                                <div id="collapseTwo3" class="collapse show"
                                    role="tabpanel" aria-labelledby="headingTwo2">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card card-outline-primary">
                                                    <!-- <div class="card-header">
                        <h4 class="m-b-0 text-white">Liste des utilisateurs</h4>
                    </div> -->
                                                    <div class="card-block">

                                                     <form action="#">
                                                            <div class="form-body">

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Nom</label>
                                                                            <input type="text" id="nom_edit" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                            <label class="control-label">Prénom</label>
                                                                            <input type="text" id="prenom_edit" class="form-control form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                            <label class="control-label">Matricule</label>
                                                                            <input type="text" id="matricule_edit" class="form-control form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row p-t-20">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Organisme</label>
                                                                            <input type="text" id="organisme_edit" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                            <label class="control-label">Fonction</label>
                                                                            <input type="text" id="fonction_edit" class="form-control form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group ">
                                                                            <label class="control-label">Role</label>
                                                                            <input type="text" id="role_edit" class="form-control form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row p-t-20">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Email</label>
                                                                            <input type="email" id="email_edit" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Nom d'utilisateur</label>
                                                                            <input type="text" id="username_edit" class="form-control">
                                                                             <input type="hidden" id="user_id" class="form-control">
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                     <div class="form-actions">
                                                                <button type="submit" class="btn  btn-primary" id="edit_user"> <i class="fa fa-check"></i> Modifier l'utilisateur</button>

                                                            </div>
                                                                </div>
                                                                <div class="col-lg-6 text-right">
                                                                     <div class="form-actions">
                                                                <button type="button" class="btn  btn-primary"  alt="default" data-toggle="modal" data-target="#responsive-modal" > <i class="fa fa-check"></i> Changer le mot de passe</button>

                                                            </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </form>
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




       <!-- sample modal content -->
                                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Changer le mot de passe</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="new_password" class="control-label">Mot de passe :</label>
                                                     <div class="d-flex align-items-center gap-2">
  <input type="password" class="form-control" id="new_password" placeholder="Mot de passe">
  <button type="button" class="btn btn-outline-secondary" id="togglePassword" style="padding:10px 12px">
    <i class="fa fa-eye" id="eyeIcon"></i>
  </button>
  <button type="button" class="btn btn-outline-secondary" id="generatePassword" style="padding:10px 12px">
    <i class="fa fa-undo"></i>
  </button>
</div>

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fermer</button>
                                                <button type="button" class="btn btn-danger waves-effect waves-light" id="change_password">Valider</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->



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