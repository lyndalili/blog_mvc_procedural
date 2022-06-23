<?php if ( 
    !isset($_GET["val"])) {
    die("erreur parametre!");
}
include("app/app.php");


include_once("app/models/postsModels.php");
$posts=topsearchPosts($_GET["val"]);
//var_dump($posts);
echo json_encode($posts); // afficher le tableau en json 