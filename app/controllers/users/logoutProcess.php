<?php

include("app/app.php");

unset($_SESSION["userFO"]);
flash_create("Vous êtes bien déconnecté !", "success");
header("Location:" . $_SERVER["HTTP_REFERER"]);