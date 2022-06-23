<?php
include("app/app.php");
include("app/protect.php");
//var_dump($_POST); exit;

if (isset($_POST["user_pass_old"])) {
    $_POST = sanitize($_POST);
    //var_dump($_POST);exit;
    include("app/models/usersModel.php");
    if ($_POST["user_pass"] != $_POST["user_pass_new"]){
        flash_create("mot de passe different" , "danger");
        header("Location: userEdit.php?id=". $_SESSION["userBO"]["ID"]);
        exit;
    }
    if (userPassUpdate($_POST, $_SESSION["userBO"]["ID"])){  
        $_SESSION["userBO"]["user_pass"] = md5(SALT . $_POST["user_pass"] . SALT); 
       
        flash_create("Modification effectuées", "success");
        
    } else {
        flash_create("Modification non effectuées", "danger");
        
    }
    header("Location: users.php");
    exit;
} else {
    die("bien tenté!");
}
