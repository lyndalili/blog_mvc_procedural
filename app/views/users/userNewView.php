<?php include("app/views/layout/header.inc.php"); ?>
<!-- ajout creation un utilisateur -->
<main>
    <div class="container-fluid ">



        <body class="bg-info">
            <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-2">
                                        <div class="card-header">
                                            <h3 class="text-center font-weight-light my-4">creation d'un compte</h3>
                                        </div>
                                        <div class="card-body">
                                            <form class="form-wrapper" method="post" action="?module=users&action=userCreate">
                                                <input type="hidden" class="form_controle" placeholder="Enter votre login" id="user_login" name="referer" value="<?= $_SERVER["HTTP_REFERER"] ?>">

                                                <div class="form-row ">
                                                    <div class="form-group col-md-6">

                                                        <label class="small mb-1" for="user_login">Login</label>
                                                        <input class="form-control py-1" id="user_login" type="text" name="user_login" placeholder="Enter votre login" required>

                                                    </div>



                                                    <div class="form-group col-md-6">
                                                        <label class="small mb-1" for="display_name">Nom a afficher</label>
                                                        <input class="form-control py-1" id="display_name" type="text" name="display_name" placeholder="Enter votre nom d'affichage" required>
                                                    </div>

                                                </div>


                                                <div class="form-row">
                                                    <div class="col-md-6">

                                                        <label class="small mb-1" for="user_email">Email</label>
                                                        <input class="form-control py-1" id="user_email" type="user_email" aria-describedby="emailHelp" name="user_email" placeholder="Enter votre email" required>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="user_pass">Mot de passe</label>
                                                        <input class="form-control py-1"  name="user_pass" type="password" placeholder="Enter votre mot de passe" id="user_pass" required >
                                                        <i id ="eye" class="fa fa-eye-slash" aria-hidden="true"></i>
                                                    </div>

                                                </div>               
                                                    <div class="form-group">
                                                        <div class="col">
                                                            <label class="small mb-1" for="user_descr">Description</label>
                                                            <textarea class="form-control py-4" id="user_descr" name="user_descr" aria-describedby="emailHelp" placeholder="Enter votre bio"> </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group mt-4 mb-0 "><button type="submit" class="btn btn-primary btn-block">M'inscrire</button>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="small"><a href="login.php"> Vous avez un compte? allez vous connecter</a></div>
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