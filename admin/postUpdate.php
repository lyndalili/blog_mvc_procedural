<?php
include("app/app.php");
include("app/protect.php");
//var_dump($_POST); exit;
//var_dump($_POST);
//var_dump($_FILES);
//var_dump($_POST); exit;
if (isset($_POST["title"])) {

    $filename = substr(md5(uniqid(rand())), 0, 16); // tranker le nom de la photo pour avoir un nombre de carratere de 16
    $ext = array("jpg", "jpeg");  //on gerer l'extension du ficier img
    $ext_upload = strtolower(substr(strrchr($_FILES["post_img_url"]["name"], "."), 1));
    $url = "../static/img/" . $filename . "." . $ext_upload;
//die ($url);
    if (in_array($ext_upload, $ext)) {
//var_dump($_FILES);exit;
        if (move_uploaded_file($_FILES["post_img_url"]["tmp_name"], $url)) { //upload img 


$image = ImageCreateFromJPEG($url);
$width = imagesx($image);
$height = imagesy ($image);

$ratio = $width / $height;

if ($width > $height) {
$new_width = 500;
$new_height = ceil($new_width / $ratio);
}else {
$new_height = 375;
$new_width = ceil($new_height * $ratio);
}
//echo "w=" . $width . " - h=" . $height . " - ratio=" . $ratio . " -newW=" . $new_width . " -newH=" . $new_height; exit;           
 $thumb= imagecreatetruecolor($new_width, $new_height) ;         

imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

ImageJPEG($thumb, $url);
imagedestroy($image);

$_POST = sanitize($_POST);
            $_POST["post_img_url"] = $filename . "." . $ext_upload;
            include("app/models/postsModels.php");
            if (postInsert($_POST, $_SESSION["userBO"]["ID"])) {

                flash_create("Création d'un article effectuée", "success");
            } else {
                flash_create("Création d'un article non effectuée", "danger");
            }
        } else {
            flash_create("Déplacement du fichier impossible !", "danger");
        }
    } else {
        flash_create("type de fichier refusé ! ", "danger");
    }




    header("Location: posts.php");
    exit;
} else {
    die("bien tenté!");
}
