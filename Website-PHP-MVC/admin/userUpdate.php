<?php
include("app/app.php");
include("app/protect.php");
//var_dump($_POST); exit;

if (isset($_POST["id"])) {
    include("app/models/usersModel.php");
    if (userUpdate($_POST)) {  //userBo cest lid de la personne connecter dans la ssession templete backend
        if ($_POST["id"]==$_SESSION["userBO"]["ID"]){
            $_SESSION["userBO"]["user_login"]=$_POST["user_login"];
            //$_SESSION["userBO"]["user_pass"]=$_POST["user_pass"]; 
            $_SESSION["userBO"]["user_email"]=$_POST["user_email"];
            $_SESSION["userBO"]["display_name"]=$_POST["display_name"];
            $_SESSION["userBO"]["user_descr"]=$_POST["user_descr"];
            
        }
        flash_create("Modification effectuées", "success");
        header("Location: users.php");
    } else {
        flash_create("Modification non effectuées", "danger");
        header("Location: users.php");
    }
} else {
    die("bien tenté!");
}
