<?php 
include("app/app.php");
include("app/protect.php");


include("app/models/postsModels.php");
$posts = allPosts();
//var_dump($posts);


include("app/models/dashboardModel.php");
$counts = allCounts();
//var_dump($counts); exit;
include("app/models/categoriesModel.php");
$categories= allCategories();


define("LAYOUT_TITLE", "bienvenue sur mon blog");

include("app/views/postNewView.php");