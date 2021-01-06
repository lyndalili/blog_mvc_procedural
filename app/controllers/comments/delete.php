<?php //on appel les fonctions des formulaire commentaires 

if (isset($_GET["id"])) {

    include("app/app.php");


    include("app/models/commentsModel.php");
    if (commentDelete($_GET["id"], $_SESSION["userFO"]["ID"], $_SESSION["userFO"]["user_admin"])) {
        flash_create("Votre commentaire à bien été supprimé", "success");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    } else {
        flash_create("votre commentaire n'a pas été supprimer  !", "danger");
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
} else {
    die("bien tenté");
}
