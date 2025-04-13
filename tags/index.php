<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';

//get studio slug
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $slug_text = str_replace("-", " ", $slug);
    $slug_url = $slug;
} else {
    $slug = "";
    $slug_text = "No Tags";
    $slug_url = "";
}
if ($slug !== '') {
    $query_item = "SELECT * FROM content WHERE active='1' AND post_tag='$slug' LIMIT 6";
    mysqli_set_charset($DBcon,"utf8");
    $result_all = $DBcon->query($query_item);
} else {
    $result_all = null;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = $slug_text." | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/tags/".$slug_url."/";
    ?>
    <title><?=$title?></title>
    <meta name="description" content="<?=$description?>">
    <link rel=“canonical” href=“<?=$url?>” />
    <meta property="og:url" content="<?=$url?>">
    <meta property="og:title" content="<?=$title?>">
    <meta property="og:description" content="<?=$description?>">
    <meta name="twitter:title" content="<?=$title?>">
    <meta name="twitter:description" content="<?=$description?>">
    <?php include "./../includes/ga.php" ?>
</head>
<body>
<?php include "./../modules/preloader.php" ?>
<?php include "./../modules/search_popup.php" ?>
<div class="body-overlay" id="body-overlay"></div>
<!-- header start -->
<div class="navbar-area">
    <?php include "./../modules/topbar.php" ?>
    <?php include "./../modules/adbar.php" ?>
    <?php include "./../modules/navbar.php" ?>
</div>
<!-- header end -->

<section class="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h5 class="page-title"><?=$slug_text?></h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Tags</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="cat-page-area pd-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pd-top-50">
                <div class="row">
                    <?php
                    while ($row = $result_all->fetch_assoc()) {
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-post-wrap style-box">
                                <div class="thumb">
                                    <img src="<?=$row["post_preview_img"]?>" alt="<?=$row["post_preview_title"]?>">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <?php if ($row["type"] === "guides") { ?>
                                            <li><a class="tag-base tag-yellow" href="/guides/">Guides</a></li>
                                            <?php } else if ($row["type"] === "reviews") { ?>
                                            <li><a class="tag-base tag-red" href="/reviews/">Reviews</a></li>
                                            <?php } ?>
                                            <li><i class="fa fa-user"></i><?=$row["post_author"]?></li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="<?=$row["post_preview_url"]?>"><?=$row["post_preview_title"]?></a></h6>
                                    <p><?=$row["post_preview_text"]?></p>
                                    <a class="btn btn-base mt-4" href="<?=$row["post_preview_url"]?>">Read more</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="add-area mb-4" style="display: none;">
                    <a href="/advertisement/"><img src="/assets/img/ads/2.jpg" alt=""></a>
                </div>
                <div class="row" style="display: none;">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post-wrap style-box">
                            <div class="thumb">
                                <img src="/assets/img/tech/7.png" alt="img">
                            </div>
                            <div class="details">
                                <div class="post-meta-single mb-4 pt-1">
                                    <ul>
                                        <li><a class="tag-base tag-light-blue" href="#">Tech</a></li>
                                        <li><i class="fa fa-user"></i>John R.bert</li>
                                    </ul>
                                </div>
                                <h6 class="title"><a href="blog-details.html">Night-time co recording app predicts
                                        asthma.</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit</p>
                                <a class="btn btn-base mt-4" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post-wrap style-box">
                            <div class="thumb">
                                <img src="/assets/img/tech/8.png" alt="img">
                            </div>
                            <div class="details">
                                <div class="post-meta-single mb-4 pt-1">
                                    <ul>
                                        <li><a class="tag-base tag-light-blue" href="#">Tech</a></li>
                                        <li><i class="fa fa-user"></i>John R.bert</li>
                                    </ul>
                                </div>
                                <h6 class="title"><a href="blog-details.html">Night-time co recording app predicts
                                        asthma.</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit</p>
                                <a class="btn btn-base mt-4" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post-wrap style-box">
                            <div class="thumb">
                                <img src="/assets/img/tech/9.png" alt="img">
                            </div>
                            <div class="details">
                                <div class="post-meta-single mb-4 pt-1">
                                    <ul>
                                        <li><a class="tag-base tag-light-blue" href="#">Tech</a></li>
                                        <li><i class="fa fa-user"></i>John R.bert</li>
                                    </ul>
                                </div>
                                <h6 class="title"><a href="blog-details.html">Night-time co recording app predicts
                                        asthma.</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit</p>
                                <a class="btn btn-base mt-4" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post-wrap style-box">
                            <div class="thumb">
                                <img src="/assets/img/tech/1.png" alt="img">
                            </div>
                            <div class="details">
                                <div class="post-meta-single mb-4 pt-1">
                                    <ul>
                                        <li><a class="tag-base tag-light-blue" href="#">Tech</a></li>
                                        <li><i class="fa fa-user"></i>John R.bert</li>
                                    </ul>
                                </div>
                                <h6 class="title"><a href="blog-details.html">Night-time co recording app predicts
                                        asthma.</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit</p>
                                <a class="btn btn-base mt-4" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post-wrap style-box">
                            <div class="thumb">
                                <img src="/assets/img/tech/5.png" alt="img">
                            </div>
                            <div class="details">
                                <div class="post-meta-single mb-4 pt-1">
                                    <ul>
                                        <li><a class="tag-base tag-light-blue" href="#">Tech</a></li>
                                        <li><i class="fa fa-user"></i>John R.bert</li>
                                    </ul>
                                </div>
                                <h6 class="title"><a href="blog-details.html">Night-time co recording app predicts
                                        asthma.</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit</p>
                                <a class="btn btn-base mt-4" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post-wrap style-box">
                            <div class="thumb">
                                <img src="/assets/img/tech/6.png" alt="img">
                            </div>
                            <div class="details">
                                <div class="post-meta-single mb-4 pt-1">
                                    <ul>
                                        <li><a class="tag-base tag-light-blue" href="#">Tech</a></li>
                                        <li><i class="fa fa-user"></i>John R.bert</li>
                                    </ul>
                                </div>
                                <h6 class="title"><a href="blog-details.html">Night-time co recording app predicts
                                        asthma.</a></h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipi elit</p>
                                <a class="btn btn-base mt-4" href="blog-details.html">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="mt-4 text-center" style="display: none;">
                    <ul class="pagination">
                        <li class="page-item prev"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 pd-top-50">
                <div class="category-sitebar">
                    <div class="widget widget-category" style="display: none;">
                        <h6 class="widget-title">Category</h6>
                        <div class="row custom-gutters-14">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/9.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/10.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/11.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/12.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/13.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/14.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/15.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="single-category-inner">
                                    <img src="/assets/img/category/16.png" alt="img">
                                    <a class="tag-base tag-blue" href="#">Tech</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-add" style="display: none;">
                        <div class="add">
                            <img class="w-100" src="/assets/img/ads/3.jpg" alt="img">
                        </div>
                    </div>
                    <div class="widget widget-social">
                        <h6 class="widget-title">Join to Us</h6>
                        <ul class="social-area social-area-2">
                            <li><a class="twitter-icon" href="https://x.com/E2Prod" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube-icon" href="https://www.youtube.com/@Spectrum3900" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <form id="nl" class="single-newsletter-inner bg-blue text-center">
                            <h5>Newsletter</h5>
                            <p>Stay Updated on all that's new add noteworthy</p>
                            <div class="single-input-inner">
                                <input id="side_subscribe_email" type="email" name="side_subscribe_email" placeholder="Enter Your Email" required>
                            </div>
                            <button id="nl-submit" type="submit" class="btn btn-white w-100">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
</body>
</html>