<?php //on appel les fonctions des formulaire commentaires 
include("app/app.php");


if (isset($_POST["comment_post_ID"]) && isset($_SESSION["userFO"]["ID"])){//on gere la securiter si on bien du bon formulaire
$_POST = sanitize($_POST);
//var_dump($_POST); exit;


  //  $_POST["comment_content"] = htmlentities( $_POST["comment_content"]); //code de securiter : netoit ce qui a dans $_post, cette fonction demasque autres code que le html et le conversite en contenu inactive html qui etait un script sous forme de cookie pour recuper la valeur de lidentifiant des administrateur 
//pourvoir cela on ajout un var_dump($_POST);

//a noter que grace a cette methode securise les commentaire en modofiant exemple un code js frauduleau en un code html simple cela affiche le commentaire comme un code html 

/*var_dump($_POST);
foreach($_POST as $key => $value){
   $_POST[$key]=  htmlentities($value);
}/* ce code de securité de commentaire est generique grace a une boucle pour passer sur tout les commentaire ou tableau et securiser de la meme maniere que  $_POST["comment_content"] = htmlentities( $_POST["comment_content"]);*/
//var_dump($_POST); exit;

include("app/models/commentsModel.php");
if (commentInsert($_POST, $_SESSION["userFO"]["ID"])){
    flash_create("votre commentaire a été créé !", "success");
    header("Location:?action=single&id=" . $_POST["comment_post_ID"]);
} else {
    flash_create("votre commentaire a été créé !", "danger");
    header("Location:?action=single&id=" . $_POST["comment_post_ID"]);
}
}else {
    die("bien tenté");
}
