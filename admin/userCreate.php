<?php
include("app/app.php");
include("app/protect.php");
//var_dump($_POST); exit;

if (isset($_POST["user_login"])) {
    $_POST = sanitize($_POST); //je netoie mon tableau si ya des chose bizzare de piratage
    //var_dump($_POST);exit;
    
    include("app/models/usersModel.php");

    if (userInsert($_POST)) {  //userBo cest lid de la personne connecter dans la ssession templete backend
        if ($_POST["id"]==$_SESSION["userBO"]["ID"]){
            $_SESSION["userBO"]["user_login"]=$_POST["user_login"];
            $_SESSION["userBO"]["user_pass"]=$_POST["user_pass"]; 
            $_SESSION["userBO"]["user_email"]=$_POST["user_email"];
            $_SESSION["userBO"]["display_name"]=$_POST["display_name"];
            $_SESSION["userBO"]["user_descr"]=$_POST["user_descr"];
            
        }
        flash_create("creation d'utilisateur effectuées", "success");
        header("Location: users.php");
    } else {
        flash_create("creation d'utilisateur non effectuées", "danger");
        header("Location: users.php");
    }
} else {
    die("bien tenté!");
}
