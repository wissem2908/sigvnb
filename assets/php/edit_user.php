<?php


include './config.php';

try {
    // Connection to the database
    $bdd = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

   



    if (
    !isset($_POST['nom']) || empty($_POST['nom']) ||
    !isset($_POST['prenom']) || empty($_POST['prenom']) ||
    !isset($_POST['matricule']) || empty($_POST['matricule']) ||
    !isset($_POST['organisme']) || empty($_POST['organisme']) ||
    !isset($_POST['fonction']) || empty($_POST['fonction']) ||
    !isset($_POST['email']) || empty($_POST['email']) ||
    !isset($_POST['username']) || empty($_POST['username']) ||
    !isset($_POST['role']) || empty($_POST['role'])
) {

    echo json_encode(array('response' => 'false', 'message' => 'empty_fields'));
} else {
 $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $matricule = $_POST['matricule'];
        $organisme = $_POST['organisme'];
        $fonction = $_POST['fonction'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];

//verify if username exist
        $req = $bdd->prepare('select * from users where username=?');
        $req->execute(array($username));
        $count = $req->rowCount();
        if($count>1){
             die(json_encode(array('response' => 'false', 'message' => 'username_exist')));
        }


        //verify if email exist
            $req = $bdd->prepare('select * from users where email=?');
        $req->execute(array($email));
        $count = $req->rowCount();
        if($count>1){
             die(json_encode(array('response' => 'false', 'message' => 'email_exist')));
        }


        ///update user info

        $req = $bdd->prepare('UPDATE `users` SET `nom`=?,`prenom`=?,`matricule`=?,`organisme`=?,`fonction`=?,`role`=?,`email`=?,`username`=?,`updated_at`=NOW()');
        $req->execute(array($nom,$prenom,$matricule,$organisme,$fonction,$role,$email, $username));

 echo json_encode(array('response' => 'true'));
}
 



} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
}