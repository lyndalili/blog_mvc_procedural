<?php
function allPosts($catId= null){
    global $pdo;//appel la variable ailleurs dans 
  try {
    $query =  "SELECT post_ID, post_title, LEFT(post_content," .  TRUNCATE . ") AS post_content, post_date, display_name, cat_id, cat_descr, post_img_url, (SELECT count(*) FROM blog_comments WHERE comment_post_ID = post_ID) AS nbComments
                            FROM blog_posts A, blog_users B, blog_categories C
                            WHERE A.post_author = B.ID
                              AND A.post_category= C.cat_id ";
                              
                     if ($catId!= null){ 
                     $query .=   " AND C.cat_id = " . $catId ;
    }
     $query .= " ORDER BY post_date DESC";

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $req->fetchALL();//retourne les resultat dans un tableau 

    $req->closeCursor();
    return $posts;
 } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
 }
}
function postById($id){//rechercher un artcile avec un id


try {//chercher un post grace a son id 
    global $pdo;
    $query =  "SELECT post_ID, post_title, post_content, post_date, user_photo, user_descr, display_name, cat_id, cat_descr ,post_img_url , post_category
                            FROM blog_posts A, blog_users B, blog_categories C
                            WHERE A.post_author = B.ID
                              AND A.post_category= C.cat_id
                              AND A.post_ID = " . $id; 
    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $post = $req->fetch(); 
    $req->closeCursor();
    return $post;
} catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
}
}




//jai ajouter cette fonction pour essayer de modifier un article 

function postUpdate($post){

  global $pdo;
       try {
          
           $query =  "UPDATE blog_posts
                                   
                                   SET 
                                   post_category= :post_category,
                                   post_title= :post_title,
                                   post_author= :post_author,
                                   post_content= :post_content
                                   
                              
                                   WHERE ID= :id";
                                  
           $req = $pdo->prepare($query);
           $req->bindValue(":post_category", $post["post_category"], PDO:: PARAM_STR);
           $req->bindValue(":post_title", $post["post_title"], PDO:: PARAM_STR);
           $req->bindValue(":post_author", $post["post_author"], PDO:: PARAM_STR);
           $req->bindValue(":post_content", $post["post_content"], PDO:: PARAM_STR);
           
        
           $req->bindValue(":id", $post["id"], PDO:: PARAM_INT);
           $req->execute();
           return true ; 
           
       } catch (Exception $e) {
        // die($e->getMessage());
           return false;
       }
       }

       function postInsert($post, $id_user){
        global $pdo;
        if (isset($_POST["title"])) {      //tester la presence d'un champs si on a bien recu le formulaire 
            //var_dump($_POST);
        
        
        try{ //requet insertion (recuper le contenu sous forme denvoie de formulaire pour les afficher dans notre page web )
            $query= "INSERT INTO blog_posts
            (post_title, post_author, post_category, post_content, post_img_url)
            VALUES
            ('".addslashes($post["title"])."', ". $id_user . " , " . $post["categorie"] ." , '".addslashes($post["contenu"])."','" . $post["post_img_url"]."' )";

            //die($query);
            $req = $pdo->query($query);
            return true;
        } catch (Exception $e) {
            return false;
        }
        } 
       }



       function postDelete($id){ 
        global $pdo;
        try{ 
            $query= "DELETE 
            FROM blog_posts
            WHERE post_ID = " . $id;
    
        $req = $pdo->query($query);
            
            return true;
        } catch (Exception $e) {
           return false;
        }
    }