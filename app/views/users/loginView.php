<?php include("app/views/layout/header.inc.php"); ?>

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="page-wrapper">
                    <div class="row">

                        <div class="col-lg-8 offset-lg-2">
                            <h1>Identification</h1>
                            <form class="form-wrapper" method="post" action="">

                                <input type="hidden" name="referer" value="<?= $_SERVER["HTTP_REFERER"] ?>">

                                <input type="text" class="form-control" placeholder="votre login" name="user_login" required>
                                <input type="password" class="form-control" placeholder="votre mot de passe" name="user_pass" required>
                                <button type="submit" class="btn btn-primary">Me connecter</button>
                            </form>
                        </div>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>



<?php include("app/views/layout/footer.inc.php"); ?>