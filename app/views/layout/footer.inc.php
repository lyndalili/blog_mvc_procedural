<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="widget">
                    <div class="footer-text text-center">
                        <a href="index.html"><img src="static/images/version/garden-footer-logo.png" alt="" class="img-fluid"></a>
                        <p>Forest Time is a personal blog for handcrafted, cameramade photography content, fashion styles from independent creatives around the world.</p>
                        <div class="social">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </div>

                        <hr class="invis">

                        <div class="newsletter-widget text-center">
                            <form class="form-inline">
                                <input type="text" class="form-control" placeholder="Enter your email address">
                                <button type="submit" class="btn btn-primary">Suscrire <i class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div>
                        <!-- end newsletter -->
                    </div>
                    <!-- end footer-text -->
                </div>
                <!-- end widget -->
            </div>
            <!-- end col -->
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <br>
                <br>
                <div class="copyright">&copy; Forest Time. Design: <a href="http://html.design">HTML Design</a>.</div>
            </div>
        </div>
    </div>
    <!-- end container -->
</footer>
<!-- end footer -->
<?php if (DEV) {
    var_dump($_SESSION);

    var_dump($_COOKIE);

    var_dump($_SERVER);
   
} ?>
<div class="dmtop">Scroll to Top</div>

</div>


<!-- Core JavaScript
    ================================================== -->
<script src="static/js/jquery.min.js"></script>
<script src="static/js/tether.min.js"></script>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/custom.js"></script>
<script src="static/js/confirm.js"></script>

<?php if (isset($js))foreach($js as $url){ ?>
<script src="<?= $url?>"></script> <!-- code boucle pour afficher le js en boucle dans chaque page pour eviter lerreur du validateur  au debut on a met le js apres la balise bodu html sinon ca fonctioner pas -->
<?php  }?> 

</body>

</html>