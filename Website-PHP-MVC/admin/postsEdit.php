<?php 
include("app/app.php");

include("app/models/postsModels.php");
$post = postById($_GET["id"]);

include("app/models/categoriesModel.php");
$categories= allCategories();



//var_dump($post); exit;
define("LAYOUT_TITLE", "Edition du profil d'utilisateur"); //gerer en dynamique le titre de la page pour le seo

include("app/views/postsEditView.php");
