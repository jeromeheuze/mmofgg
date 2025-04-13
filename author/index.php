<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Author | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/author/";
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
                    <h5 class="page-title">Author</h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Spectrum3900</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog-page-area pd-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pd-top-50">
                <div class="author-area style-two">
                    <div class="media">
                        <img src="/assets/logos/ProfilePic.jpg" alt="img" style="width: 400px;">
                        <div class="media-body align-self-center mt-4 mt-md-0">
                            <h4 class="mb-0">Jerome Heuze (Spectrum3900)</h4>
                            <a href="https://heuzeproductions.com/" target="_blank"><strong class="mb-3 d-block">https://heuzeproductions.com/</strong></a>
                            <p>We are making 2D casual video games using many game engines for web, mobile, desktop, and Metaverse.
                                We are building a series of simple games with short stories and designed for any audience. We are also developing
                                websites and tools for game communities.</p>
                            <ul class="social-area social-area-2 mt-4">
                                <li><a class="twitter-icon" href="https://x.com/E2Prod" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="https://www.youtube.com/@Spectrum3900" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
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