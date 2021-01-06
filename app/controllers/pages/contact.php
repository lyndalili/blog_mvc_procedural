<?php 
include("app/app.php");

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    
$css = array("style1.css", "style2.css"); // corrier les euures de la console de la validité du css

$js = array("https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAkADq7R0xf6ami9YirAM1N-yl7hdnYBhM", "static/js/garden-map.js"); //controle enclanche un js 
 
include("app/views/pages/contactView.php");

}else {
    $nom_expediteur = $_POST["nom"];
    $email_expediteur = $_POST["mail"];
    $email_reply = $_POST["mail"];
    $message_texte = $_POST["text"];
    $destinataire = "lyndahaddad50@gmail.com";
    $sujet = $_POST["sujet"];
    $message_html = $_POST["contenu"];

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


$message.= "--".$frontiere."\n";
$message.= 'Content-Type: image/jpeg; name="image.jpg"'."\n";
$message.= 'Content-Transfer-Encoding: base64'."\n";
$message.= 'Content-Disposition:attachement; filename="image.jpg"'."\n\n";
$message.= chunk_split(base64_encode(file_get_contents("image.jpg")))."\n\n";




//echo "<p><pre>Message = " . $message."</pre></p>" ;


   mail($destinataire, $sujet, $message, $headers);
    if (fakemail($destinataire, $sujet, $message, $headers)){
        flash_create("votre e-mail a bien éte envoyé !", "success");

    }else {
        flash_create("votre e-mail n'est pas pu étre envoyé!", "danger");
    }
header("Location:index.php");
}