<?php
function commentsByPost($idPost){
global $pdo;
try { 
$query =  "SELECT * FROM blog_comments, blog_users
WHERE comment_author= ID 
AND comment_post_ID = " . $idPost .
" ORDER BY comment_date DESC";

$req = $pdo->query($query);
$req->setFetchMode(PDO::FETCH_ASSOC);
$comments = $req->fetchAll();
$req->closeCursor();
return $comments;
} catch (Exception $e) {
    die("erreur MYSQL! : " . $e->getMessage());
}
}

function commentInsert($comment, $userId){ 
    global $pdo;
    try{ //requet insertion (recuper le contenu sous forme denvoie de formulaire pour les afficher dans notre page web )
        $query= "INSERT INTO blog_comments
        (comment_post_ID,comment_author,comment_content)
        VALUES
        (". $_POST["comment_post_ID"] ." , ". $userId  . " , '".addslashes($_POST["comment_content"]) . "')";
       // die($query);
        $req = $pdo->query($query);
        return true;
    } catch (Exception $e) {
       return false;
    }
}



function commentDelete($id, $userId, $admin){ 
    global $pdo;
    try{ 
        $query= "DELETE 
        FROM blog_comments
        WHERE comment_ID = " . $id;

  if (!$admin){

         $query .= " AND comment_author = " . $userId;
        }
    $req = $pdo->query($query);
        
        return true;
    } catch (Exception $e) {
       return false;
    }
}