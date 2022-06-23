<?php
include("app/app.php");
if (isset($_GET["key"])){
    include("app/models/usersModel.php");
    if (userActivate($_GET["key"])) {
        
  flash_create("Activation reussie !", "success");
  header("Location: ?module=users&action=login");
    }else {
        flash_create("Activation refusée !", "danger");
        header("Location: index.php");
    }

}else {
    die("bien tenté !");
}