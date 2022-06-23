<?php

function pluralize($quantity, $singular, $plural = null)
{
    if ($quantity <2) {
        return $singular;
    } else {
        if ($plural == null) {
            return $singular . "s";
        } else {
            return $plural;
        }
    }
}

function sanitize($tab){ //meme fonctionnement de securité sauf que je suis passée par une function retulisable
    //var_dump($_POST);
    foreach($tab as $key => $value){
        $tab[$key]=  htmlentities($value);
}
//var_dump($tab);
return $tab;
}
function displayDate($date, $format){


$tab = explode(" ", $date);
$date = explode("-", $tab[0]);
$mois = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre");

$annee = $date[0];
$libMois = $mois[(int)$date[1] - 1];
$jour = $date[2];
if ($format == 1 ) return $jour . " " . $libMois . " " . $annee;
if ($format == 2 ) return $annee . " " . $libMois . " " . $jour;
}

function fakemail($dest, $subject, $text, $header, $return= true){

    if ($return) {
        $_SESSION["fakemail"]["dest"]= $dest;
        $_SESSION["fakemail"]["subject"]= $subject;
        $_SESSION["fakemail"]["text"]= $text;
        $_SESSION["fakemail"]["header"]= $header;
    
    
    }
    return $return;
    }