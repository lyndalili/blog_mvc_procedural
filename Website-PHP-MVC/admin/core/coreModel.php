<?php //fonction generale retulisable pour les compte sur toute les table 
function coreCount($table){
    global $pdo;
  try {
    $query =  "SELECT count(*) AS nombre 
    FROM " . $table;

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $data = $req->fetch();

    $req->closeCursor();
    return $data;
 } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
 }
}