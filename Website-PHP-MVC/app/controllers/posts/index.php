<?php //organier notre fichier en Architecture MVC 
include("app/app.php");

include_once("app/models/postsModels.php");
if (isset($_GET["page"])){
  $offset = ($_GET["page"]-1) * NBPAGE; 
}else {
 $offset = 0;   
}
$posts = allPosts($offset, NBPAGE);  //pour aller chercher limiter 
$postsByComments = postsByComments(3);
$nbPosts= coreCount("blog_posts"); // avoir le nombre totale d'aticle 
//var_dump($nbPosts); exit;
$nbPages = ceil($nbPosts / NBPAGE);

//var_dump($pages); exit;



define("LAYOUT_TITLE", "bienvenue sur mon blog");

include("app/views/posts/indexView.php");