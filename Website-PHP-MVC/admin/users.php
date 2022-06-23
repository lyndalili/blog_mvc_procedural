<?php 
include("app/app.php");
//include("app/protect.php");
//mettre une session de login qui test la presence de lutilisateur

include("app/models/usersModel.php");
$users = allUsers();
//var_dump($comments); exit;
define("LAYOUT_TITLE", "Moderation des utilisateur");

include("app/views/usersView.php");