<?php


include_once 'config.php';
if (
    !isset($_POST['nom']) || empty($_POST['nom']) ||
    !isset($_POST['prenom']) || empty($_POST['prenom']) ||
    !isset($_POST['matricule']) || empty($_POST['matricule']) ||
    !isset($_POST['organisme']) || empty($_POST['organisme']) ||
    !isset($_POST['fonction']) || empty($_POST['fonction']) ||
    !isset($_POST['email']) || empty($_POST['email']) ||
    !isset($_POST['username']) || empty($_POST['username']) ||
    !isset($_POST['password']) || empty($_POST['password']) ||
    !isset($_POST['role']) || empty($_POST['role'])
) {

    echo json_encode(array('response' => 'false', 'message' => 'empty_fields'));
} else {
    try {
        // Connection to the database
        $bdd = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $matricule = $_POST['matricule'];
        $organisme = $_POST['organisme'];
        $fonction = $_POST['fonction'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Hash the password
        $hashed_password = sha1($password);

        // Prepare and execute the SQL statement
        $req = $bdd->prepare("INSERT INTO `users`( `nom`, `prenom`, `matricule`, `organisme`, `fonction`, `role`, `email`, `username`, `password`) VALUES  (?, ?, ?, ?, ?,?,?,?,?)");
        // Execute the query with the provided parameters
        $res = $req->execute(array($nom, $prenom, $matricule, $organisme, $fonction, $role, $email, $username, $hashed_password));
        if ($res) {
            echo json_encode(array('response' => 'true', 'message' => 'user_added'));
        } else {
            echo json_encode(array('response' => 'false', 'message' => 'error_adding_user'));
        }
    } catch (Exception $e) {
        $msg = $e->getMessage();
        echo $msg;
    }
}
