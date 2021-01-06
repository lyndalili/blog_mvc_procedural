<?php 
include("app/app.php");

include("app/models/usersModel.php");
$user = usertById($_GET["id"]);


//var_dump($user); exit;
define("LAYOUT_TITLE", "Edition du profil d'utilisateur"); //gerer en dynamique le titre de la page pour le seo

include("app/views/usersEditView.php");