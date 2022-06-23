<?php //on appel les fonctions des formulaire commentaires 

if (isset($_GET["id"])) {

    include("app/app.php");


    include("app/models/postsModels.php");
    if (postDelete($_GET["id"])) {
        flash_create("Votre article  à bien été supprimé", "success");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    } else {
        flash_create("votre article n'a pas été supprimer  !", "danger");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
} else {
    die("bien tenté");
}


