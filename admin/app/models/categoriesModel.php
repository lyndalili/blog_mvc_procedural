<?php
function allCategories(){
    global $pdo;
  try {//requetter chercher les categorie avec un order ascendant 
    $query =  "SELECT *,(SELECT count(*) AS nombre 
    FROM blog_posts 
    WHERE post_category= cat_id)AS nombre 
    FROM blog_categories 
    ORDER BY cat_descr ASC";

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $data = $req->fetchALL();//retourne les resultat dans un tableau 

    $req->closeCursor();
    return $data;
 } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());// si ya une erreur dans la requette on affiche lerreur 
 }
}
/*function allCategoriestray(){
  global $pdo;

try {
  $query =  "SELECT post_ID, post_title, post_content, post_author, post_category //a  la page de * on ecrit (post_title, post_content,post_date.display_name,cat_descr)//
                          FROM blog_posts 
                          
                  
                           WHERE post_ID = " . $_GET["id"];

  $req = $pdo->query($query);
  $req->setFetchMode(PDO::FETCH_ASSOC);
  $post = $req->fetch();

  var_dump($post);exit;
  $req->closeCursor();
} catch (Exception $e) {
  die("erreur MYSQL! : " . $e->getMessage());
}

try {
  $query =  "SELECT * 
  FROM blog_categories";



  $req = $pdo->query($query);
  $req->setFetchMode(PDO::FETCH_ASSOC);
  $categories = $req->fetchALL();
  //var_dump($categories);
  $req->closeCursor();
} catch (Exception $e) {
  die("erreur MYSQL! : " . $e->getMessage());
}
} */

function categoryInsert($category){ 
  global $pdo;
  try{ 
      $query= "INSERT INTO blog_categories
      (cat_descr)
      VALUES
      ('" . addslashes($category["cat_descr"]) . "')";
     // die($query);
      $req = $pdo->query($query);
      return true;
  } catch (Exception $e) {
     return false;
  }
}

function categoryDelete($id){ 
  global $pdo;
  try{ 
      $query= "DELETE
      FROM blog_categories
      WHERE cat_id = :cat_id";
      $req= $pdo->prepare($query);
      $req->bindvalue(":cat_id",$id, PDO::PARAM_INT);
     $req->execute();
      // die($query);
      
      return true;
  } catch (Exception $e) {
     return false;
  }
}





 