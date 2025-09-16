<?php


include './config.php';


try {
    // Connection to the database
    $bdd = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));



    $new_password = $_POST['new_password'];
    $user_id = $_POST['user_id'];


    $hashed_pass = sha1($new_password);
     $req = $bdd->prepare('update users set password = ? where user_id=?');
     $req->execute(array($hashed_pass,$user_id));
      echo "true";



 



} catch (Exception $e) {
    $msg = $e->getMessage();
    echo $msg;
}