<?php include("app/views/layout/header.inc.php"); ?>
<?php include("app/views/layout/sidebar.inc.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Utilisateurs</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Modification d'un utilisateur</li>
        </ol>



        <body class="bg-primary">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4">creation d'un utilisateur</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="userCreate.php?token=<?= $_SESSION["userBO"]["token"] ?>">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="user_login">Login</label>

                                                            <input class="form-control py-4" id="user_login" type="text" name="user_login" placeholder="Enter votre login" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="display_name">Nom a afficher</label>

                                                        <input class="form-control py-4" id="display_name" type="text" name="display_name" placeholder="Enter votre nom d'affichage" required>
                                                    </div>
                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="user_pass">Mot de passe</label>
                                                            <input class="form-control py-4" id="user_pass" name="user_pass" type="password" placeholder="Enter votre mot de passe" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="user_email">Email</label>
                                                        <input class="form-control py-4" id="user_email" type="user_email" aria-describedby="emailHelp" name="user_email" placeholder="Enter votre email addresse" required>
                                                    </div>

                                                </div>

                                                <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-ckeck">
                                                        <input class="form-check-input" type="checkbox" name="user_admin" id="user_admin" value="1">
                                                        <label class="form-check-label" for="user_admin"> Admin

                                                        </label>
                                                    </div>
                                                </div>
                                                </div>

                                                <div>
                                                    <label class="small mb-1" for="user_descr">Description</label>
                                                    <textarea class="form-control py-4" id="user_descr" name="user_descr" aria-describedby="emailHelp" placeholder="Enter votre description"> </textarea>

                                                </div>

                                                <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                        </div>
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