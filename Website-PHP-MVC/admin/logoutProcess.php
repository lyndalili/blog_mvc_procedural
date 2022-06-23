<?php
include("app/app.php");

unset($_SESSION["userBO"]);
flash_create("vous avez etes bien deconnecter", "success");
header("Location:index.php");