<?php
include("app/app.php");

//requet uplode      
try {
    $query =  "SELECT post_ID, post_title, post_content, post_author, post_category /*a  la page de * on ecrit (post_title, post_content,post_date.display_name,cat_descr)*/
                            FROM blog_posts 
                            
                    
                             WHERE post_ID = " . $_GET["id"];

    $req = $pdo->query($query);
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $post = $req->fetch();

    //var_dump($post);exit;
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
?>
<?php
include("app/views/layout/header.inc.php");
include("app/views/layout/sidebar.inc.php") ?>

<body>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edition d'un comentaire</h3>
                    </div>


                    <form class="container" method="post" action="update_post.php">


                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="auteur"> Auteur</label>
                                    <input name="id" type="hidden" id="id" value="<?= $_GET["id"] ?>">
                                    <input class="form-control py-4" name="auteur" type="text" id="auteur" value="<?= $post["post_author"] ?>"></td>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="titre"> Titre</label>
                                    <input class="form-control" name="titre" type="text" id="titre" value="<?= $post["post_title"] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categorie"> categorie</label>

                                    <!--<input name="categorie" type="text" id="categorie">-->
                                    <select class="form-control " name="categorie" id="categorie">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?= $category["cat_id"] ?>" <?= ($post["post_category"] == $category["cat_id"]) ? "selected" : ""; ?>><?= $category["cat_descr"] ?></option>
                                        <?php } //generer avec une boucle et une condition (selected) en prenat un aricle et en voulant le classer dans le centre il se classe bien sur le centre
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--
    <tr>
       <th> <label for="categorie"> categorie</label></th>
      <td> <input name="categorie" type="text" id="categorie" value=" //$post["post_category"] "></td> 
    </tr>
   -->
                        <div class="form-row">

                            <label for="contenu"> Contenu</label>
                            <textarea class="form-control py-4" id="user_descr" name="user_descr" aria-describedby="emailHelp" placeholder="Enter votre commentaire"> <?= $post["post_content"] ?></textarea>

                        </div>
                        <div class="form-group pt-4 text-center">
                            <input class="btn btn-primary " type="submit" value="Enregistrer">
                            <input class="btn btn-primary " type="reset" value="Effacer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
    <script src="script.js"> </script>
</body>

</html>