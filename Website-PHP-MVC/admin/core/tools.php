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
