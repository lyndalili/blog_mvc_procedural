<?php 
include("app/app.php");
include("app/protect.php");


include("app/models/postsModels.php");
$posts = allPosts();
//var_dump($posts);

include("app/models/dashboardModel.php");
$counts = allCounts();
//var_dump($counts); exit;


define("LAYOUT_TITLE", "bienvenue sur mon blog");

include("app/views/indexView.php");