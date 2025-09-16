$(document).ready(function () {
  /************************************** add user ************************************************ */
  $("#add_user").click(function (e) {
    e.preventDefault();
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    var matricule = $("#matricule").val();
    var organisme = $("#organisme").val();
    var fonction = $("#fonction").val();
    var role = $("#role").val();
    var email = $("#email").val();
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
      url: "assets/php/add_user.php",
      type: "POST",
      data: {
        nom: nom,
        prenom: prenom,
        matricule: matricule,
        organisme: organisme,
        fonction: fonction,
        email: email,
        username: username,
        password: password,
        role: role,
      },
      success: function (response) {
        var data = JSON.parse(response);
        console.log(data.message);
        if (data.response == "true") {
          Swal.fire({
            title: "Succès",
            text: "Utilisateur ajouté avec succès!",
            icon: "success",
          });
          $("#nom").val("");
          $("#prenom").val("");
          $("#matricule").val("");
          $("#organisme").val("");
          $("#fonction").val("");
          $("#role").val("");
          $("#email").val("");
          $("#username").val("");
          $("#password").val("");
          fetchUsers();
        } else if (data.response == "false") {
          if (data.message == "empty_fields") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Veuillez remplir tous les champs!",
            });
          } else if (data.message == "username_exist") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Nom d'utilisateur déja exist!",
            });
          } else if (data.message == "email_exist") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Email déja exist!",
            });
          }
        }
      },
    });
  });

  //************************************ users list************************************************* */

  function fetchUsers() {
    $.ajax({
      url: "assets/php/fetch_users.php",
      type: "GET",
      success: function (response) {
        var data = JSON.parse(response);
        var usersTable = $("#users_table tbody");
        usersTable.empty(); // Clear existing rows

        if (data.length > 0) {
          data.forEach(function (user) {
            var status = "";
            if (user.is_active == "1") {
              status = `<span style="cursor:pointer;" class="badge badge-success" id="desactiver" data="${user.user_id}">Actif</span>`;
            } else if (user.is_active == "0") {
              status = `<span style="cursor:pointer;" class="badge badge-danger" id="activer" data="${user.user_id}">Inactif</span>`;
            } else {
              status = `<span style="cursor:pointer;" class="badge badge-warning">Inconnu</span>`;
            }
            var row = `<tr>
              <td style="white-space: nowrap">${user.nom}</td>
              <td style="white-space: nowrap">${user.prenom}</td>
              <td style="white-space: nowrap">${user.matricule}</td>
              <td style="white-space: nowrap">${user.organisme}</td>
              <td style="white-space: nowrap">${user.role}</td>
              <td style="white-space: nowrap">${status}</td>
              <td style="white-space: nowrap;"><button class="btn btn-sm btn-danger btn-circle" id="delete_user" data="${user.user_id}"><i class="fa fa-trash"></i></button>&nbsp;<button class="btn btn-sm btn-warning btn-circle" id="edit_user" data="${user.user_id}"><i class="fa fa-edit"></i></button></td>
            </tr>`;
            usersTable.append(row);

            if (!$.fn.DataTable.isDataTable("#myTable")) {
              $("#users_table").DataTable();
            }
          });
        } else {
          usersTable.append(
            "<tr><td colspan='8'>Aucun utilisateur trouvé</td></tr>"
          );
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching users:", error);
      },
    });
  }

  fetchUsers();

  /************************************ delete user ************************************************* */

  $(document).on("click", "#delete_user", function () {
    var user_id = $(this).attr("data");

    console.log(user_id);

    Swal.fire({
      title: "Etes-vous sûr?",
      text: "Vous ne pourrez pas revenir en arrière!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Oui, supprimer!",
      cancelButtonText: "Annuler",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "assets/php/delete_user.php",
          method: "POST",
          data: { user_id: user_id },
          success: function (response) {
            if (response == "true") {
              Swal.fire({
                title: "succès",
                text: "Cet utilisateur a été supprimé!",
                icon: "success",
              });

              fetchUsers();
            }
          },
        });
      }
    });
  });

  /************************************ activate/deactivate user ************************************************* */
  $(document).on("click", "#desactiver", function () {
    var user_id = $(this).attr("data");
    console.log(user_id);

    $.ajax({
      url: "assets/php/change_status_user.php",
      method: "POST",
      data: { user_id: user_id, action: "deactive" },
      success: function (response) {
        fetchUsers();
      },
    });
  });

  ///activate user

  $(document).on("click", "#activer", function () {
    var user_id = $(this).attr("data");
    console.log(user_id);

    $.ajax({
      url: "assets/php/change_status_user.php",
      method: "POST",
      data: { user_id: user_id, action: "active" },
      success: function (response) {
        fetchUsers();
      },
    });
  });

  /************************************ edit user ************************************************* */
  $(document).on("click", "#edit_user", function () {
    $(".userForm").slideUp();
    $(".userTable").slideUp();

    $(".editForm").removeAttr("hidden");
    $(".editForm").slideDown();
    $("#collapseTwo3").addClass("show");

    var user_id = $(this).attr("data");

    console.log(user_id);

    $.ajax({
      url: "assets/php/get_user.php",
      method: "POST",
      data: { user_id: user_id },
      success: function (response) {
        var data = JSON.parse(response);
        console.log(data);
        if (data) {
          $("#nom_edit").val(data.nom);
          $("#prenom_edit").val(data.prenom);
          $("#matricule_edit").val(data.matricule);
          $("#organisme_edit").val(data.organisme);
          $("#fonction_edit").val(data.fonction);
          $("#role_edit").val(data.role);
          $("#email_edit").val(data.email);
          $("#username_edit").val(data.username);
          $("#user_id").val(data.user_id); // Assuming you have a hidden input for user_id
        }
      },
    });
  });

  /************************************ edit user submit ************************************************* */

  $("#edit_user").click(function (e) {
    e.preventDefault();

    var user_id = $("#user_id").val();
    var nom = $("#nom_edit").val();
    var prenom = $("#prenom_edit").val();
    var matricule = $("#matricule_edit").val();
    var organisme = $("#organisme_edit").val();
    var fonction = $("#fonction_edit").val();
    var role = $("#role_edit").val();
    var email = $("#email_edit").val();
    var username = $("#username_edit").val();

    $.ajax({
      url: "assets/php/edit_user.php",
      type: "POST",
      data: {
        user_id: user_id,
        nom: nom,
        prenom: prenom,
        matricule: matricule,
        organisme: organisme,
        fonction: fonction,
        email: email,
        username: username,
        role: role,
      },
      success: function (response) {
        var data = JSON.parse(response);
        console.log(data.message);
        if (data.response == "true") {
          Swal.fire({
            title: "Succès",
            text: "Utilisateur modifié avec succès!",
            icon: "success",
          });
          fetchUsers();
        } else if (data.response == "false") {
          if (data.message == "empty_fields") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Veuillez remplir tous les champs!",
            });
          } else if (data.message == "username_exist") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Nom d'utilisateur déja exist!",
            });
          } else if (data.message == "email_exist") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Email déja exist!",
            });
          }
        }
      },
    });
  });

  /*********************************** retour button  *********************************************** */

  $(".retour").click(function () {
    $(".editForm").slideUp();
    $(".userTable").slideDown();
    $(".userForm").slideDown();
  });

  /******************************************** change password *********************************************** */

  // Toggle password visibility
  $("#togglePassword").on("click", function () {
    const input = $("#new_password");
    const icon = $("#eyeIcon");
    const isPassword = input.attr("type") === "password";
    input.attr("type", isPassword ? "text" : "password");
    icon
      .removeClass("fa-eye fa-eye-slash")
      .addClass(isPassword ? "fa-eye-slash" : "fa-eye");
  });

  // Generate password
  $("#generatePassword").on("click", function () {
    const charset =
      "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$!?";
    let password = "";
    for (let i = 0; i < 12; i++) {
      password += charset.charAt(Math.floor(Math.random() * charset.length));
    }
    $("#new_password").val(password);
  });

  /****************************************************************************************************** */

  $("#change_password").click(function (e) {
    e.preventDefault();

    var new_password = $("#new_password").val();
    var user_id = $("#user_id").val();

    if (new_password == "") {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Veuillez remplir tous les champs",
      });
    } else {
      $.ajax({
        url: "assets/php/change_password.php",
        method: "post",
        data: { new_password: new_password, user_id: user_id },
        success: function (response) {
          console.log(response);

          if (response == "true") {
            Swal.fire({
              title: "Succès",
              text: "Modification effectuée avec succès",
              icon: "success",
            });
          }
        },
      });
    }
  });
});
