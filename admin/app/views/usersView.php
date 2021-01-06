<?php include("app/views/layout/header.inc.php"); ?>
<?php include("app/views/layout/sidebar.inc.php"); ?>
<main>

    <div class="container-fluid">
        <h1 class="mt-4">Utilisateurs</h1>
        <ol class="breadcrumb mb-4">
            <p class="breadcrumb-item active">Liste des utilisateurs: </p>  
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
                <div>
               <h4> <i class="fas fa-table mr-1"></i>  Action: </h4>
                </div>
               <i class="fa fa-plus" aria-hidden="true"></i> <a href="userNew.php" class="">  Ajouter un nouvel utilisateur</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Login</th>

                                <td>Nom</td>
                                <th>Email</th>
                                <th>Role</th>
                                 <th>Publication</th>
                                <th>Actions</th>



                            </tr>
                        </thead>

                        <tbody>


                            <?php foreach ($users as $user) { ?>
                                <tr>
                                    <td>
                                        <img src="../static/avatars/<?= $user["user_photo"] ?>" alt=""> <?= $user["user_login"] ?>
                                    </td>
                                    <td><?= $user["display_name"] ?></td>
                                    <td><?= $user["user_email"] ?></td>
                                    <td> <?= ($user["user_admin"]) ? "Administrateur" : "Utilisateur" ?></td>
<td><?= $user["nbPosts"] ?></td>
                                    <td>
                                        <a href="usersEdit.php?id=<?= $user["ID"]; ?>" class=""><i class="fas fa-edit"></a></i><a href="" class="suppr"> <i class="fa fa-trash" aria-hidden="true"></a></i>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Login</th>
                                <td>Nom</td>
                                <th>Email</th>
                                <th>Role</th>
 <th>Publication</th>
                                <th>Actions</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("app/views/layout/footer.inc.php"); ?>