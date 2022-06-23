<?php //fonction generale retulisable pour les compte sur toute les table  pour tester je lai appler dans index.php pour savoir combien ya d'utilisateur
function coreCount($table, $where = ""){
    global $pdo;
  try {
    $query =  "SELECT count(*) AS nombre 
    FROM " . $table;
if ($where != ""){
   $query .= " WHERE " . $where;
}
  //die ($query) ;
$req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $data = $req->fetch();

    $req->closeCursor();
    return (int) $data["nombre"];
 } catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
 }
}