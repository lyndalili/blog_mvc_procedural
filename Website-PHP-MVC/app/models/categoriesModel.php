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