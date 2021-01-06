<?php 
function allCounts(){
    global $pdo;
  try {//requetter chercher les categorie avec un order ascendant 
    $query =  "SELECT count(*)  AS postsCount,
            (SELECT count(*)  FROM blog_comments) AS commentsCount,
            (SELECT count(*)  FROM blog_categories) AS categoriesCount,
            (SELECT count(*)  FROM blog_users) AS usersCount
                FROM blog_posts";
   

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $data = $req->fetch();//retourne les resultat dans un tableau 

    $req->closeCursor();
    return $data;
 } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());// si ya une erreur dans la requette on affiche lerreur 
 }
}