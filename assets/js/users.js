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
           fetchUsers()
        } else if (data.response == "false") {
          if (data.message == "empty_fields") {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Veuillez remplir tous les champs!",
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
            var row = `<tr>
              <td>${user.nom}</td>
              <td>${user.prenom}</td>
              <td>${user.matricule}</td>
              <td>${user.organisme}</td>
       
              <td>${user.role}</td>
             <td><button class="btn btn-sm btn-danger btn-circle"><i class="fa fa-trash"></i></button></td>
            </tr>`;
            usersTable.append(row);
          });
        } else {
          usersTable.append("<tr><td colspan='8'>Aucun utilisateur trouvé</td></tr>");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching users:", error);
      },
    });
  }

  fetchUsers()
});
