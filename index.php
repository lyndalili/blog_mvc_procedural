<?php
session_start();


include_once("core/core.php");

if (!isset($_GET["module"])){
    $module = DEFAULT_MODULE;
}else {
    $module = $_GET["module"];
}



if (!isset($_GET["action"])){
    $action = DEFAULT_ACTION;
}else {
    $action = $_GET["action"];
}


$file = "app/controllers/" . $module . "/" . $action . ".php";
if(file_exists($file)){
include($file);
}else{
    include_once("app/views/404.php");
}


