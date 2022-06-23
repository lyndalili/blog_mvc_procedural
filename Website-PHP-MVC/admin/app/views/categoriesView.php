<?php include("app/views/layout/header.inc.php"); ?>
<?php include("app/views/layout/sidebar.inc.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">catégories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Liste des catégories</li>
        </ol>


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

            <div class="row">
                <div class="col-6">
                   
                        <form method="post" action="categorieCreate.php">
                         <div class="from-group">
                            <h2> Ajouter une nouvelle categorie</h2>
                            <label for="cat_descr">Nom de la categorie</label>
                            <input type="text" class="from-control" id="cat_descr" name="cat_descr" aria-describedby="emailHelp"  required>

                            <small id="catDescrHelp" class="from-text text-muted"> Rappel : le libellé est important pour le SEO !  </small>
                        </div>
                            <button type="submit" class="btn-primary">Ajouter une nouvelle catégorie</button>
                        </form>
                        </div>
                </div>

           

<div class="">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>categorie</th>
                                <th>Nom</th>
                                 <th>Totale</th>
                                <th>Action</th>




                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($categories as $category) { ?>
                                <tr>
                                    <td><?= $category["cat_id"] ?></td>
                                    <td><?= $category["cat_descr"] ?></td>
                                    <td><?= $category["nombre"] ?></td>
                                    <td> <a href="#" ><i class="fas fa-edit"></a></i>
                                        <a href="categoryDelete.php?id=<?= $category["cat_id"] ?>&token=<?= $_SESSION["userBO"]["token"] ?>" class="suppr"> <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>categorie</th>
                                <th>Nom</th>
                                 <th>Totale</th>
                                <th>Action</th>


                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 </div>
        
    </div>
</main>
<?php include("app/views/layout/footer.inc.php"); ?>