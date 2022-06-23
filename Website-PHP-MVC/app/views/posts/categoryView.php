<?php include("app/views/layout/header.inc.php"); ?>
<div class="page-title wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-leaf bg-green"></i> <?= (isset($posts[0]["cat_descr"]))?"Categorie de: " . $posts[0]["cat_descr"] : "Aucun resultat ! " ?></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
                    <li class="breadcrumb-item">Categorigie</a></li>
                    <li class="breadcrumb-item active"><?= (isset($posts[0]["cat_descr"]))?"Categorie de: " . $posts[0]["cat_descr"] : "Aucun resultat ! " ?></li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">

                        <?php foreach ($posts as $post) { ?>

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="single.php?id=<?= $post["post_ID"] ?>" title="">
                                            <img src="static/img/<?= $post["post_img_url"]; ?>" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <span class="bg-aqua"><a href="garden-category.html" title="">La droite</a></span>
                                    <h4> <a href="single.php?id=<?= $post["post_ID"] ?>" title=""><?= $post["post_title"]; ?></a></h4>
                                    <p><?php echo $post["post_content"]; ?>...</p>
                                    <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>
                                    
                                    <?php 
                                    $tab = explode(" ", $post["post_date"]);
                                    $date = explode("-", $tab[0]);
                                    $mois = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre") ?>
                                    <small><a href="?action=single&id=<?= $post["post_ID"]?>" title=""> <?= $date[2] ?> <?= $mois[(int)$date[1] - 1] ?> , <?= $date[0] ?></a></small>
                                    <small><a href="?action=single&id=<?= $post["post_ID"]?>" title=""> par<?= $post["display_name"];  ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                        <?php } ?>




                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="static/images/banner.png" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis">

                        
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">
<?php if (isset($posts[0]["cat_descr"])) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                            <?php for($i=1; $i <= $nbPages ; $i++) { ?>      
                               <li class="page-item"><a class="page-link" href="index.php?action=category&id=<?= $posts[0]["cat_id"]?>&page<?= $i ?>"><?= $i ?></a></li>
                            <?php } //faut fabriquer laction et le numero de la page comme url?> 
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
                <?php } ?>
            </div><!-- end col -->

           

                   

            <?php include("app/views/layout/sidebar.inc.php"); ?>
        </div><!-- end row -->
    </div><!-- end container -->
</section>

<?php include("app/views/layout/footer.inc.php"); ?>