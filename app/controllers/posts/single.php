<?php if ( //test les paramettre
    !isset($_GET["id"])
    || !is_numeric($_GET["id"])
) {
    die("erreur parametre!");
}
include("app/app.php");


include_once("app/models/postsModels.php");

include("app/models/commentsModel.php");
$post= postById($_GET["id"]);//aller chercher un post grace a un id dans postsmodel
$comments= commentsByPost($_GET["id"]);

define("LAYOUT_TITLE", strip_tags($post["post_title"]));   
include("app/views/posts/singlePostView.php");