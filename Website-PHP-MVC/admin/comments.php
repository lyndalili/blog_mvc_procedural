<?php 
include("app/app.php");
include("app/protect.php");
//mettre une session de login qui test la presence de lutilisateur

include("app/models/commentsModel.php");
$comments = allComments();
//var_dump($comments); exit;
define("LAYOUT_TITLE", "Moderation des commentaires");

include("app/views/commentsView.php");