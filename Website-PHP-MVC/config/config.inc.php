<?php

if ($_SERVER["HTTP_HOST"] == "localhost:8888") {

    //en DEV
    define("DB_HOST", "localhost");
    define("DB_NAME", "afpa_blog_2020");
    define("DB_USER", "root");
    define("DB_PASSWORD", "root");
    define("DB_CHARSET", "utf8");
    define("DEV", true);
    define("DEFAULT_MODULE", "posts");
    define("DEFAULT_ACTION", "index");
    define("ABSOLUTE", "http://localhost:8888/documents/blog2/");
    
} else {
    //en prod
    define("DB_HOST", "sql105.epizy.com");
    define("DB_NAME", "epiz_32024732_lyndahaddad");
    define("DB_USER", "epiz_32024732");
    define("DB_PASSWORD", "R69InREZn0");
    define("DB_CHARSET", "utf8");
    define("DEV", false);
    define("DEFAULT_MODULE", "posts");
    define("DEFAULT_ACTION", "index");
    define("ABSOLUTE", "http://lyndahaddad.epizy.com/blog2/");
   
}
define("TRUNCATE", 300);

define("LAYOUT_TITLE_DEFAULT", "Titre par defaut");

define('SALT', 'P*C*:.[YTFQAQI=wURRK`jsORa(}_K@5F;4$c#`K;o:zofF5xOFZL?x<liAl4vhP'); //changer la clef du mot de passe meme si on tape le meme mot de passse pour ajouter au mot de passe une ceertaine complication 
define("NBPAGE", 3);