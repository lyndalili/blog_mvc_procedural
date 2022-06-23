<?php 

if ($_SERVER["HTTP_HOST"] == "localhost"){

//en DEV
define("DB_HOST", "localhost");
define("DB_NAME", "afpa_blog_2020");
define("DB_USER", "root");
define("DB_PASSWORD", "root");
define("DB_CHARSET", "utf8");
ini_set("display_errors", "1");
define("DEV", true);
} else {
    //en prod
    define("DB_HOST", "sql203.epizy.com");
    define("DB_NAME", "epiz_27280626_lhh");
    define("DB_USER", "epiz_27280626");
    define("DB_PASSWORD", "lyndahaddad1992");
    define("DB_CHARSET", "utf8"); 
    ini_set("display_errors", "1");
    define("DEV", false);
}
define("TRUNCATE", 300);

define ("LAYOUT_TITLE_DEFAULT", "Titre par defaut");

define( 'SALT', 'P*C*:.[YTFQAQI=wURRK`jsORa(}_K@5F;4$c#`K;o:zofF5xOFZL?x<liAl4vhP' ); //changer la clef du mot de passe meme si on tape le meme mot de passse pour ajouter au mot de passe une ceertaine complication 
 