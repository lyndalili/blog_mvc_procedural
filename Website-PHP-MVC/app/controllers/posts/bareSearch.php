<?php if ( 
    isset($_POST["bareSearch"]) & !empty($_POST["bareSearch"])) {
        $var = htmlspecialchars($_POST['bareSearch']);
} else {
    die("erreur parametre!");
}

include("app/app.php");


include_once("app/models/postsModels.php");
$posts=bareSearchPosts($_POST["bareSearch"]);
//var_dump($posts);

include("app/views/posts/postsSearchView.php");