<?php //on appel les fonctions des formulaire commentaires 

if (isset($_GET["id"])) {

    include("app/app.php");


    include("app/models/categoriesModel.php");
    if (categoryDelete($_GET["id"])) {
        flash_create("la categorie à bien été supprimé", "success");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    } else {
        flash_create("la categorie n'a pas été supprimer  !", "danger");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
} else {
    die("bien tenté");
}