<?php
function allPosts($offset, $limite, $catId = null)
{
  global $pdo; //appel la variable ailleurs dans 
  try { //recuper le contenu tranquer 
    $query =  "SELECT post_ID, post_title, LEFT(post_content," .  TRUNCATE . ") AS post_content, post_date, display_name,cat_id, cat_descr, post_img_url


                            FROM blog_posts A, blog_users B, blog_categories C
                            WHERE A.post_author = B.ID
                              AND A.post_category= C.cat_id ";
    if ($catId != null) {
      $query .=   " AND C.cat_id = " . $catId; //couper la requette en 3 morceaux
    }
    $query .= " ORDER BY post_date DESC
    
    LIMIT " . $offset . " , " . $limite;

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $req->fetchALL(); //retourne les resultat dans un tableau 

    $req->closeCursor();
    return $posts;
  } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
  }
}
function postById($id)
{ //rechercher un artcile avec un id


  try { //chercher un post grace a son id 
    global $pdo;
    $query =  "SELECT post_ID, post_title, post_content, post_date, user_photo, user_descr, display_name, cat_id, cat_descr ,post_img_url
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

function latestPosts($nb) //pour recuper les recent post afficher dans la sidebar
{
  global $pdo; //appel la variable ailleurs dans 
  try {
    $query =  "SELECT post_ID, post_title, post_date, post_img_url
                          FROM blog_posts          
                     ORDER BY post_date DESC
                     LIMIT " . $nb;

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $req->fetchALL(); //retourne les resultat dans un tableau 

    $req->closeCursor();
    return $posts;
  } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
  }
}


function postsByComments($nb){
  global $pdo;
try {//requetter chercher les categorie avec un order ascendant 
  $query =  "SELECT post_ID, post_title, post_date, display_name, cat_id, cat_descr,post_img_url ,(SELECT count(*) AS nombre 
             FROM blog_comments
            WHERE comment_post_ID= post_ID) AS nombre 
        FROM blog_posts A, blog_users B, blog_categories C 
       WHERE post_author= B.ID
        AND A.post_category = C.cat_id
        ORDER BY nombre DESC
       LIMIT " . $nb;

  $req = $pdo->query($query);
  $req->setFetchMode(PDO::FETCH_ASSOC);
  $posts = $req->fetchALL();//retourne les resultat dans un tableau 

  $req->closeCursor();
  return $posts;
} catch (Exception $e) {
  die("erreur MYSQL! : " . $e->getMessage());// si ya une erreur dans la requette on affiche lerreur 
}
}



function topsearchPosts($val) //function bare de recherche pour afficher les artcile dans la recherche avec js ajax et php
{
  global $pdo; 
  try {
    $query =  "SELECT DISTINCT post_ID, post_title
     
                          FROM blog_posts          
                     WHERE post_content LIKE :val 
                       OR post_title LIKE :val 
                     ORDER BY post_date DESC
                     LIMIT 5";
    
    $req = $pdo->prepare($query);
    $req->bindValue(":val", "%" . $val . "%", PDO:: PARAM_STR);
    $req-> execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $req->fetchALL();
    $req->closeCursor();
    return $posts;
  } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
  }
}




function bareSearchPosts($val)
{
  global $pdo; 
  try {
    $query =  "SELECT DISTINCT post_ID, post_title,LEFT(post_content," .  TRUNCATE . ") AS post_content, post_date
     
                          FROM blog_posts          
                     WHERE post_content LIKE :val 
                       OR post_title LIKE :val
                       ORDER BY post_date DESC" ;
                  
                  
   //echo ($query) ; exit;
    $req = $pdo->prepare($query);
    $req->bindValue(":val", "%" . $val . "%", PDO:: PARAM_STR);
    $req-> execute();
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $req->fetchALL();
    $req->closeCursor();
    return $posts;
  } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
  }
}
