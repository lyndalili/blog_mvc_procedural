<?php 
include("app/app.php");
//include("app/protect.php");
//mettre une session de login qui test la presence de lutilisateur

include("app/models/categoriesModel.php");
$categories = allCategories();
//var_dump($categories); exit;
define("LAYOUT_TITLE", "Moderation des commentaires");

include("app/views/categoriesView.php");