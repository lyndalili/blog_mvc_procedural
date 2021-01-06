<?php
function userLogin($login, $password){
  global $pdo;

try {
   
   /* $query =  "SELECT * 
    FROM blog_users 
     WHERE user_login =" . $pdo->quote($login, PDO::PARAM_STR) . "
    AND user_pass =" . $pdo->quote($password, PDO::PARAM_STR) . " 
      AND user_admin = 1";*/
//on dit au programe de surveiller les paramettre et dechaper les ""
    //echo ($query); exit; //injection SQL pour eviter de detourner le mot de passe avec le code suivant (coucou' or 'coucou' = 'coucou) et se connecter sans etablire les regles de securité 


      $query =  "SELECT * 
      FROM blog_users 
       WHERE user_login = :login
      AND user_pass = :password
        AND user_admin = 1";
    
  $req = $pdo->prepare($query);
  $req->bindValue(":login", $login, PDO::PARAM_STR);
  $req->bindValue(":password", md5(SALT . $password . SALT), PDO::PARAM_STR);
  $req ->execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);//on chercher dans le fichier pdo pour chercher une constante 
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

  $query =  "SELECT *, (SELECT count(*) FROM blog_posts WHERE post_author = ID) AS nbPosts 
  FROM blog_users";
  
  $req = $pdo->query($query);
  $req->setFetchMode(PDO::FETCH_ASSOC);
  $users= $req->fetchAll();
  $req->closeCursor();
  return $users;
  } catch (Exception $e) {
      die("erreur MYSQL! : " . $e->getMessage());
  }
  }

  /*try { 
  $query =  "SELECT * (SELECT count(*)FROM  blog_users WHERE post_autor= ID) AS nbPosts
  FROM blog_users";*/





  function usertById($id){//rechercher un utilisateur avec un id


    try {//chercher un utilisateur grace a son id 
        global $pdo;
        $query =  "SELECT *
                                FROM blog_users 
                                WHERE ID = :id"; 
        $req = $pdo->prepare($query);
        $req->bindValue(":id", $id, PDO:: PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $post = $req->fetch(); 
        $req->closeCursor();
        return $post;
    } catch (Exception $e) {
        die("erreur MYSQL! : " . $e->getMessage());
    }
    }


function userUpdate($user){

 global $pdo;
      try {
         
          $query =  "UPDATE blog_users
                                  
                                  SET 
                                  user_login= :user_login,
                                 
                                  user_email= :user_email,
                                  display_name= :display_name,
                                  user_descr= :user_descr
                                  WHERE ID= :id";
                                 
          $req = $pdo->prepare($query);
          $req->bindValue(":user_login", $user["user_login"], PDO:: PARAM_STR);
          //$req->bindValue(":user_pass", $user["user_pass"], PDO:: PARAM_STR);
          $req->bindValue(":user_email", $user["user_email"], PDO:: PARAM_STR);
          $req->bindValue(":display_name", $user["display_name"], PDO:: PARAM_STR);
          $req->bindValue(":user_descr", $user["user_descr"], PDO:: PARAM_STR);
          $req->bindValue(":id", $user["id"], PDO:: PARAM_INT);
          $req->execute();
          return true ; 
          
      } catch (Exception $e) {
       // die($e->getMessage());
          return false;
      }
      }



      function userPassUpdate($user, $id){

        global $pdo;
             try {
                
                 $query =  "UPDATE blog_users
                 SET user_pass = :user_pass
                 WHERE ID = :id
                 AND user_pass = :user_pass_old";
                 
      
                 
              
                                        
                $req = $pdo->prepare($query);
                 $req->bindValue(":user_pass", md5(SALT . $user["user_pass"] . SALT), PDO:: PARAM_STR);
                 $req->bindValue(":user_pass_old", md5(SALT . $user["user_pass_old"] . SALT), PDO:: PARAM_STR);
                 $req->bindValue(":id", $id, PDO:: PARAM_INT);
                 $req->execute();
                 return true ; 
                 
             } catch (Exception $e) {
              // die($e->getMessage());
                 return false;
             }
             }

      function userInsert($user){

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
                 $req->bindValue(":user_key",    "", PDO:: PARAM_STR);
                 $req->bindValue(":user_descr", $user["user_descr"], PDO:: PARAM_STR);
                 $req->bindValue(":user_admin", isset($user["user_admin"])?1:0, PDO:: PARAM_INT);
                 $req->execute();
                 return true ; 
                 
             } catch (Exception $e) {
              // die($e->getMessage());
                 return false;
             }
             }


            

            