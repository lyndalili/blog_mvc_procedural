<?php
include("app/app.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {


    define("LAYOUT_TITLE", "page de connexion");
    include("app/views/users/loginView.php");
} else {


    //page pour le login on test entre un internaute qui a un compte qui peu se connecter et ainssi lui ouvrir lacces au back end 
    //var_dump($_POST);


    include("app/models/usersModel.php");
    $user = userLogin($_POST["user_login"], $_POST["user_pass"]);
    //var_dump($user);

    if ($user) {
        if ($user["user_key"] == "") { //test pour faire le login que la key est vrai pour que on connecte que les utilisateur qui sont activer de la part de ladmin (la presence de la kley on laisse lutilisateur se connecter)



            //si la seesion detecte les cordoneers de l'internaute bin il a acces au contenu
            $_SESSION["userFO"] = $user; //cette ligne fait que la personne est connecter elle cree vraiment le login
            $_SESSION["userFO"]["token"] = md5(uniqid());
            flash_create("vous êtes bien connecté!", "success");
            header("Location: . index.php");
            exit;
        } else {
            flash_create("votre compte n'est pas activé, un message d'activation  vous a êté envoyer par e-mail !", "warning");
            header("Location: ?module=users&action=login");
            exit;
        }
    } else {
        flash_create("Login/password incorrectes !", "danger");
        header("Location: ?module=users&action=login");
        exit;
    }
}
