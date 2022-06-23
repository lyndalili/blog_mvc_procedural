<?php
if ( //test les paramettre des categories (id=hhh)
    !isset($_GET["id"])
    || !is_numeric($_GET["id"])
) {
    die("erreur parametre!");
}
include("app/app.php");

include_once("app/models/postsModels.php");
if (isset($_GET["page"])){
  $offset = ($_GET["page"]-1) * NBPAGE; 
}else {
 $offset = 0;   
}
$nbPosts= coreCount("blog_posts","post_category=" . $_GET["id"]); // avoir le nombre totale d'aticle 
//var_dump($nbPosts); exit;
$nbPages = ceil($nbPosts / NBPAGE);


$posts= allPosts($offset,NBPAGE,$_GET["id"]);
//var_dump($posts);

if (isset($posts[0]["cat_descr"])){
    define("LAYOUT_TITLE","catégorie: " . $posts[0]["cat_descr"]);  

}else {
    define("LAYOUT_TITLE","Aucun article dans la categorie");  

}
 
include("app/views/posts/categoryView.php");