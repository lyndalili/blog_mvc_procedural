<?php
//page pour le login on test entre un internaute qui a un compte qui peu se connecter et ainssi lui ouvrir lacces au back end 
//var_dump($_POST);

include("app/app.php");
include("app/models/usersModel.php");
$user = userLogin($_POST["user_login"], $_POST["user_pass"]);
//var_dump($user);


if ($user){
//si la seesion detecte les cordoneers de l'internaute bin il a acces au contenu
    $_SESSION["userBO"] = $user; 
    $_SESSION["userBO"]["token"]=(md5(uniqid()));//on cree un token
     header("Location:index.php");
} else {
    flash_create("Login/password incorrectes !", "danger");
header("Location:login.php");
}
