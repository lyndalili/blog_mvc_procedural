<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Recherche</h2>
        
   
           
            <form method="post" class="form-inline search-form" action="?action=bareSearch">
                <div class="form-group">
                    <input type="text" name="bareSearch" class="form-control" placeholder="recherche sur le site">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>



        </div><!-- end widget -->

        <div class="widget">
            <h2 class="widget-title">Articles récents</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    <?php foreach ($latestPosts as $latestPost) { ?>
                        <a href="?action=single&id=<?= $latestPost["post_ID"] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="w-100 justify-content-between">
                                <img src="static/img/<?= $latestPost["post_img_url"] ?>" alt="" class="img-fluid float-left">
                                <h5 class="mb-1"><?= $latestPost["post_title"] ?></h5>
                                <?php
                                $tab = explode(" ", $latestPost["post_date"]);
                                $date = explode("-", $tab[0]);
                                $mois = array("janvier", "fevrier", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "decembre") ?>
                                <small> <?= $mois[(int)$date[1] - 1] ?> , <?= $date[0] ?>
                        </a></small>
                        <!--  <small> displayDate($post["post_date"], 1)  </small>-->
                </div>
                </a>
            <?php } ?>

            </div>
        </div><!-- end blog-list -->
    </div><!-- end widget -->



    <div class="widget">
        <h2 class="widget-title">Instagram Grille</h2>
        <div class="instagram-wrapper clearfix">
            <!-- LightWidget WIDGET -->
          <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/114d6f386fd951d8a9e403780209a045.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
        </div><!-- end Instagram wrapper -->
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Catégories</h2>
        <div class="link-widget">

            <ul>
                <?php foreach ($categoties as $category) { ?>
                    <li><a href="?action=category.php&id=<?= $category["cat_id"] ?>"> <?= $category["cat_descr"] ?> <span>(<?= $category["nombre"] ?>)</span></a></li>
                <?php  } ?>
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
</div><!-- end col -->