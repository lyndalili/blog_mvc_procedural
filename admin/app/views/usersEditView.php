<?php include("app/views/layout/header.inc.php"); ?>
<?php include("app/views/layout/sidebar.inc.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Utilisateurs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Modifier un utilisateur</li>
        </ol>



        <body class="bg-primary">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container card">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4">Modification du profile</h3>
                                        </div>
                                        <div class="card-body ">
                                            <form method="post" action="userUpdate.php?token=<?= $_SESSION["userBO"]["token"] ?>">

                                                <div class="form-group">
                                                    <label class="small mb-1" for="user_login">Login</label>
                                                    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
                                                    <input class="form-control py-4" id="user_login" type="text" name="user_login" placeholder="Enter votre login" value="<?= $user["user_login"] ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="display_name">Nom d'usage</label>

                                                    <input class="form-control py-4" id="display_name" type="text" name="display_name" placeholder="Enter votre nom d'affichage" value="<?= $user["display_name"] ?>" required>
                                                </div>
                                                <!--   <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="user_pass">Mot de passe</label>
                                                            <input class="form-control py-4" id="user_pass" name="user_pass" type="password" placeholder="Enter votre mot de passe" required>
                                                        </div>
                                                    </div>-->
                                                <div class="form-group">
                                                    <label class="small mb-1" for="user_email">E-mail</label>
                                                    <input class="form-control py-4" id="user_email" type="user_email" aria-describedby="emailHelp" name="user_email" placeholder="Enter votre email addresse" value="<?= $user["user_email"] ?>" required>
                                                </div>


                                                <div>
                                                    <label class="small mb-1" for="user_descr">Description</label>
                                                    <textarea class="form-control py-4" id="user_descr" name="user_descr" aria-describedby="emailHelp" placeholder="Enter votre description"> <?= $user["user_descr"] ?></textarea>

                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <label class="small mb-1" for="post_img_url"> Image Upload </label>
                                                    </div>
                                                    <input class="form_contol py-4" name="post_img_url" id="post_img_url" type="file" placeholder="Entre le nom de l'image"></input>
                                                </div>

                                                <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>


                                        <?php if ($_GET["id"] == $_SESSION["userBO"]["ID"]) { ?>

                                            <div>
                                                <div class="card-header">
                                                    <h3 class="text-center font-weight-light my-4">Modification du Password</h3>
                                                </div>
                                                <div class="card-body ">
                                                    <form method="post" action="userPassUpdate.php?token=<?= $_SESSION["userBO"]["token"] ?>">

                                                        <div class="form-group">
                                                            <label class="small mb-1" for="user_pass_old">Ancien mot de passe</label>
                                                            <input class="form-control py-4" id="user_pass_old" name="user_pass_old" type="password" placeholder="Enter votre mot de passe" required>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="small mb-1" for="user_pass">Nouveau mot de passe</label>
                                                            <input class="form-control py-4" id="user_pass" name="user_pass" type="password" placeholder="nouveau mot de passe" required>
                                                        </div>



                                                        <div class="form-group">
                                                            <label class="small mb-1" for="user_pass_new">confirmer le nouveau mot de passe</label>
                                                            <input class="form-control py-4" id="user_pass_new" name="user_pass_new" type="password" placeholder="confirmer votre nouveau mot de passe" required>
                                                        </div>


                                                        <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Changer le mot de passe</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>



        </body>
    </div>
</main>
<?php include("app/views/layout/footer.inc.php"); ?>