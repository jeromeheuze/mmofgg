<?php
include "./includes/global.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./includes/global_head.php" ?>
    <?php
    $title = "404 | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/404.php";
    ?>
    <title><?=$title?></title>
    <meta name="description" content="<?=$description?>">
    <link rel=“canonical” href=“<?=$url?>” />
    <meta property="og:url" content="<?=$url?>">
    <meta property="og:title" content="<?=$title?>">
    <meta property="og:description" content="<?=$description?>">
    <meta name="twitter:title" content="<?=$title?>">
    <meta name="twitter:description" content="<?=$description?>">
    <?php include "./includes/ga.php" ?>
</head>
<body>
<?php include "./modules/preloader.php" ?>
<?php include "./modules/search_popup.php" ?>
<div class="body-overlay" id="body-overlay"></div>
<!-- header start -->
<div class="navbar-area">
    <?php include "./modules/topbar.php" ?>
    <?php include "./modules/adbar.php" ?>
    <?php include "./modules/navbar.php" ?>
</div>
<!-- header end -->

<div class="blog-page-area">
    <div class="container">
        <div class="error-area-inner text-center">
            <h1>404</h1>
            <h2>Sorry, This Page Doesn't Exist.</h2>
            <a class="btn btn-base" href="/">Back To Homepage</a>
        </div>
    </div>
</div>

<?php include "./modules/footer.php" ?>
<?php include "./includes/global_footer.php" ?>
</body>
</html>