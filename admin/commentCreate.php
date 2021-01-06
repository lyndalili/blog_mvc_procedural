<?php //on appel les fonctions des formulaire commentaires 
include("app/app.php");


if (isset($_POST["cat_descr"]) && isset($_SESSION["userBO"]["ID"])){
$_POST = sanitize($_POST);
//var_dump($_POST); exit;
  
include("app/models/commentsModel.php");
if (commentInsert($_POST)){
    flash_create("La categorie a été créé !", "success");
    header("Location:categories.php");
} else {
    flash_create("La categorie n'a pas été créé !", "danger");
    header("Location:categories.php");
}
}else {
    die("bien tenté");
}
