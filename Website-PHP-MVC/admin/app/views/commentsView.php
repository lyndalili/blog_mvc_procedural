<?php include("app/views/layout/header.inc.php"); ?>
<?php include("app/views/layout/sidebar.inc.php"); ?>
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Commentaires</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Listes des commentaires</li>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <td>Login</td>
                                                <th>Auteur</th>
                                                <th>Comentaire</th>
                                                <th>Article</th>
                                                <th>Date</th>
                                                
                                                <th>Actions</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                         
                                           <?php foreach($comments as $comment){ ?>

                                           
                                            <tr>
                                            <td><?= $comment["user_login"] ?></td>
                                                <td><?= $comment["display_name"] ?></td>
                                                <td><?= $comment["comment_content"] ?></td>
                                                <td> <a href="../single.php?id=<?= $comment["post_ID"] ?>" target="_blank"><?= $comment["post_title"] ?> </a></td>
                                                <td> <?= $comment["comment_date"] ?></td>
                                                 
                                              <td> <a href="modif_post.php?id=<?= $comment["post_ID"]; ?>" class=""><i class="fas fa-edit"></a></i><a href="comment_delete.php?id=<?= $comment["comment_ID"] ?>" class="suppr"> <i class="fa fa-trash" aria-hidden="true"></a></i>  </td>
                                             
                                              
                                            </tr>
                                          
                                       <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Login</td>
                                                <th>Auteur</th>
                                                <th>Comentaire</th>
                                                <th>Article</th>
                                                <th>Date</th>
                                               
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