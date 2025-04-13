<?php
include "./../includes/global.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Advertisement | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/advertisement/";
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
                    <h5 class="page-title">Advertisement</h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Ads</li>
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
                <p>Coming Soon!</p>
            </div>
        </div>
    </div>
</div>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
</body>
</html>