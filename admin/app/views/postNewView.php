<?php include("app/views/layout/header.inc.php"); ?>
<?php include("app/views/layout/sidebar.inc.php"); ?>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Articles</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Liste des article</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><?= $counts["postsCount"] ?> Article<?= ($counts["postsCount"] > 1) ? "s" : "" ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir la list</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"> <?= $counts["commentsCount"] ?> Commentaire<?= ($counts["commentsCount"] > 1) ? "s" : "" ?></div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir la liste</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><?= $counts["categoriesCount"] ?> Catégories</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><?= $counts["usersCount"] ?> Utilisateurs</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Voir la liste</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!--
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                         -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>catégorie</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>photo</th>
                                <th>commentaire</th>
                                <th>Action</th>



                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($posts as $post) { ?>


                                <tr>
                                    <td><?= $post["cat_descr"] ?></td>
                                    <td> <a href="../single.php?id=<?= $post["post_ID"] ?>" target="_blank"><?= $post["post_title"] ?> </a></td>
                                    <td><?= $post["display_name"] ?></td>
                                    
                                    <td> 
                                         <img src="../static/img/<?= $post["post_img_url"] ?>">
                                   </td>

                                   
                                    <td><?= $post["nbComments"] ?></td>
                                    <td> <a href="postsEdit.php?id=<?= $post["post_ID"]; ?>" class=""><i class="fas fa-edit"></a></i><a href="postDelect.php?id=<?= $post["post_ID"] ?>" class="suppr"> <i class="fa fa-trash" aria-hidden="true"></a></i> </td>

                                </tr>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>categorie</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>photo</th>
                                <th>commentaire</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card-header">
                <h3 class="text-center font-weight-light my-4"> Ajout d'un article</h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="Page navigation">

                        <form method="post" action="postUpdate.php?token=<?= $_SESSION["userBO"]["token"] ?>" enctype="multipart/form-data">
                            <!--proposer a linternaute un upload d'un image-->
                            <table>
                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="small mb-1" for="auteur"> Auteur</label>
                                        <input class="form-control" name="auteur" type="text" id="auteur">

                                    </div>

                                    <div class="form-group">

                                        <label class="small mb-1" for="title"> Titre</label>
                                        <input class="form-control " name="title" type="text" id="title">

                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1" for="categorie"> categorie</label>

                                        <!--<input name="categorie" type="text" id="categorie">-->
                                        <select class="form-control" name="categorie" id="categorie">
                                            <?php foreach ($categories as $category) { ?>
                                                <option value="<?= $category["cat_id"] ?>"><?= $category["cat_descr"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">

                                        <label for="contenu" class="form-label"> Contenu de l'article</label></th>
                                        <textarea class="form-control " name="contenu" id="contenu" rows="3" cols="40"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <label class="small mb-1" for="post_img_url"> Image Upload </label>
                                        </div>
                                        <input class="form_contol py-4" name="post_img_url" id="post_img_url" type="file" placeholder="Entre le nom de l'image"></input>
                                    </div>


                                    <div class="text-center">
                                        <input class="btn btn-primary center" type="submit" value="Enregistrer">

                                    </div>

                                </div>
                            </table>
                        </form>

                </div>
            </div>
        </div>
</main>
<?php include("app/views/layout/footer.inc.php"); ?>