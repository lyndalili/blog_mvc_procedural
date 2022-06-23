<?php
function userLogin($login, $password){
global $pdo;

try {//chercher un post grace a son id 
    global $pdo;
    $query =  "SELECT * FROM blog_users 
     WHERE user_login ='" . $login . "' 
    AND user_pass ='" . md5(SALT . $password . SALT) . "'"; 
    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $user = $req->fetch(); 
    $req->closeCursor();
    return $user;
} catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
}
}

function allUsers(){
    global $pdo;
    try { 
    $query =  "SELECT * FROM  blog_users" ;
    
    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $users= $req->fetchAll();
    $req->closeCursor();
    return $users;
    } catch (Exception $e) {
        die("erreur MYSQL! : " . $e->getMessage());
    }
    }

    function userInsert($user, $key){

        global $pdo;
             try {
                
                 $query =  "INSERT INTO blog_users
                 (user_login, user_pass,user_email, display_name, user_key, user_descr, user_admin)
                 VALUE
                 (:user_login, :user_pass, :user_email, :display_name, :user_key, :user_descr, :user_admin)";
                 
                 
              
                                        
                 $req = $pdo->prepare($query);
                 $req->bindValue(":user_login", $user["user_login"], PDO:: PARAM_STR);
                 $req->bindValue(":user_pass", md5(SALT . $user["user_pass"] . SALT), PDO:: PARAM_STR);
                 $req->bindValue(":user_email", $user["user_email"], PDO:: PARAM_STR);
                 $req->bindValue(":display_name", $user["display_name"], PDO:: PARAM_STR);
                 $req->bindValue(":user_key",    $key, PDO:: PARAM_STR);
                 $req->bindValue(":user_descr", $user["user_descr"], PDO:: PARAM_STR);
                 $req->bindValue(":user_admin", 0);
                 $req->execute();
                 return true ; 
                 
             } catch (Exception $e) {
              // die($e->getMessage());
                 return false;
             }
             }




             function userActivate($key){ //fonction pour vider la key pour ajouter un utilisateur quand il valide linscription par mail

                global $pdo;
                     try {
                        
                         $query =  "UPDATE blog_users
                                                 
                                                 SET 
                                                 user_key= ''
                                                
                                                 WHERE user_key= :user_key";
                                                
                         $req = $pdo->prepare($query);
                         $req->bindValue(":user_key", $key, PDO:: PARAM_STR);
                       
                         $req->execute();
                         return true ; 
                         
                     } catch (Exception $e) {
                      // die($e->getMessage());
                         return false;
                     }
                     }