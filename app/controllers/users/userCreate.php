<?php
include("app/app.php");
include("app/protect.php");
//var_dump($_POST); exit;


if ($_SERVER["REQUEST_METHOD"]=="GET") { //test la methode si la methode est get on affcihe la vu 
    
    $js = array("static/js/eye.js"); //controle enclanche un js specifique a a une seule car les autres page affiche une erreur car elle sont pas besoin de ce js

   
    define("LAYOUT_TITLE", "Page de creation de compte"); //gerer en dynamique le titre de la page pour le seo

    include("app/views/users/userNewView.php");
   
   
   
} else { 
    if (isset($_POST["user_login"])) { 
   
    $_POST = sanitize($_POST); //je netoie mon tableau si ya des chose bizzare de piratage
    //var_dump($_POST);exit;
    $key = md5(uniqid(rand()));
    include("app/models/usersModel.php");

    if (userInsert($_POST, $key)) {  //userBo cest lid de la personne connecter dans la ssession templete backend
        



        $nom_expediteur = "Mon blog";
        $email_expediteur = "admin@monblog.com";
        $email_reply = "noreply@monblog.com";
        $message_texte = "merci de consulter ce mail sur un outil plus moderne !";
        $destinataire = $_POST["user_email"];
        $sujet = "Inscription sur monblog.com";
        $message_html = "<html>
        <head>
        <title>  Le Titre  </title>
        </head>
    
        <body>
        Bienvenue sur le site Monblog.com <br>
        Pour confirmer votre inscription veuillez 
        <a href='" . ABSOLUTE . "?module=users&action=activate&key=" . $key ."'> cliquez ici </a>
        </body>
        </html>";
    
        $frontiere = md5(uniqid(mt_rand()));
      
                $headers = 'From: "'.$nom_expediteur.'" <'.$email_expediteur.'>' . "\n";	
                $headers .= 'Return-Path: <' .$email_reply. '>' . "\n";
        
                $headers .= 'MIME-Version: 1.0'."\n";
                
                $headers .= 'Content-Type: multipart/mixed; boundary="'.$frontiere.'"';
            
    //echo "<p><pre>Header" . $headers. "</pre></p>\n\n" ;
    
    
    
    
    
    $message = 'Multipart/ messagein MINE format' . "\n\n";
    $message.= "--".$frontiere."\n";
    $message.= 'Content-Type: text/plain; charset="uft-8"'."\n";
    $message.= "Content-Transfer-Encoding: 8bit"."\n\n";
    $message.= $message_texte."\n\n";
    
    
    
    $message.= "--".$frontiere."\n";
    $message.= 'Content-Type: text/html; charset="uft-8"'."\n";
    $message.= 'Content-Transfer-Encoding: 8bit'."\n\n";
    $message.= $message_html."\n\n";
    
       mail($destinataire, $sujet, $message, $headers);
        if (fakemail($destinataire, $sujet, $message, $headers)) {
            flash_create("Inscription reussie, verifiez  vos e-mail ! ", "warning");
            header("Location:?module=users&action=login");
            exit;
        
 }else {
    flash_create("Inscription reussi , mail non envoyé! ", "danger");
    header("Location:?module=users&action=login");
        exit;
    }
    } else {
        flash_create("Echec de creation de compte ! ", "danger");
        header("Location:?module=users&action=userCreate");
      
    }
} else {
    
    die("bien tenté!");
}
}