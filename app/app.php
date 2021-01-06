<?php 
//securiser la session 
if (isset ($_GET["token"]) && $_GET["token"]!= $_SESSION["userFO"]["token"]){
    die("Token invalide!"); // si le parametre token existe et si il est different du parametre tokken de la session bin ya un die et si il correspond au token de la sessiontt va bien 
}

include("app/models/categoriesModel.php");
$categoties = allCategories();
//var_dump($categoties);

include_once("app/models/postsModels.php");
$latestPosts = latestPosts(3); 
//var_dump($latestPosts);exit;



