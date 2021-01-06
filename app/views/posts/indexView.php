<?php include("app/views/layout/header.inc.php"); ?>
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">

            <?php foreach ($postsByComments as $key => $postByComment) { ?>
                <div class="<?php
                switch ($key) {
                    case 0:
                        echo "left-side";
                        break;
                    case 1:
                        echo "center-side";
                        break;
                    case 2:
                       echo "right-side hidden-md-down";
                    break;
           }
        ?> ">
                   
                        <div class="masonry-box post-media">

                            <img src="static/img/<?= $postByComment["post_img_url"]; ?>" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-aqua"><a href="?action=category&id=<?= $postByComment["cat_id"]?>" title=""><?= $postByComment["cat_descr"]?></a></span>
                                        <h4><a href="?action=single&id=<?= $postByComment["post_ID"] ?>" title=""><?= $postByComment["post_title"]; ?></a></h4>
                                        <small><a href="single.php" title=""><?= displayDate($postByComment["post_date"], 1); ?></a></small>
                                        <small><a href="#" title=""><?= $postByComment["display_name"]; ?></a></small>
                                    </div>
                                    <!-- end meta -->
                                </div>
                                <!-- end shadow-desc -->
                            </div>
                            <!-- end shadow -->


                        </div>
                        <!-- end post-media -->
                    </div>
                    <!-- end left-side -->
                <?php } ?>
                <!-- <div class="left-side">  <div class="center-side">  <div class="right-side hidden-md-down"> -->

                <!-- end left-side -->


                <!-- end right-side -->
                </div>
                <!-- end masonry -->
        </div>
</section>

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

                <?php //var_dump($posts) 
                ?>
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
<?php if (count($posts)== 0){ // gerer la pagination si un utilisateur tape un nombre de page= pas definit ?> 
<h2> Page inexistante ! </h2>
<?php } ?>
                        <?php foreach ($posts as $post) { ?>
                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">

                                        <a href="?action=single&id=<?= $post["post_ID"] ?>" title="">
                                            <img src="static/img/<?= $post["post_img_url"]; ?>" alt="" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div>
                                    <!-- end media -->
                                </div>
                                <!-- end col -->

                                <div class="blog-meta big-meta  col-md-8">
                                    <span class="bg-aqua"><a href="?action=category&id=<?= $post["cat_id"] ?>" title=""> <?= $post["cat_descr"]; ?></a></span>
                                    <h4><a href="?action=single&id=<?= $post["post_ID"] ?>" title=""><?= $post["post_title"]; ?></a></h4>
                                    <p><?php echo $post["post_content"]; ?>...</p>

                                    <small><a href="garden-category.html" title=""><i class="fa fa-eye"></i> 1887</a></small>


                                    <small><a href="single.php" title=""><?= displayDate($post["post_date"], 1) ?></a></small>

                                    <small><a href="#" title=""><?= $post["display_name"];  ?></a></small>

                                </div>
                                <!-- end meta -->
                            </div>


                            <!-- end blog-box -->


                        <?php } ?>



                        <hr class="invis">




                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="static/images/banner.png" alt="" class="img-fluid">
                                    </div>
                                    <!-- end banner-img -->
                                </div>
                                <!-- end banner -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <hr class="invis">

                        <!-- end blog-box -->



                        <!-- end blog-box -->
                    </div>
                    <!-- end blog-list -->
                </div>
                <!-- end page-wrapper -->



                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                          <?php for($i=1; $i <= $nbPages ; $i++) { ?>      
                            <li class="page-item"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li> 
                        <?php } ?>  
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end col -->


            <!-- end col -->
            <?php include("app/views/layout/sidebar.inc.php"); ?>
        </div>

        <!-- end row -->
    </div>
    <!-- end container -->
</section>

<?php include("app/views/layout/footer.inc.php"); ?>