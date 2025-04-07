<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "News | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/news/";
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
<?php include "./../includes/mobile-menu-wrap.php" ?>
<?php include "./../includes/navigation-wrap.php" ?>
<?php include "./../includes/mobile-menu-pull.php" ?>

<!-- BANNER WRAP -->
<div class="banner-wrap gaming-news">
    <!-- BANNER -->
    <div class="banner grid-limit">
        <h1 class="banner-title">Gaming News</h1>
        <p class="banner-sections">
            <span class="banner-section">Home</span>
            <!-- ARROW ICON -->
            <svg class="arrow-icon">
                <use xlink:href="#svg-arrow"></use>
            </svg>
            <!-- /ARROW ICON -->
            <span class="banner-section">Gaming News</span>
        </p>
    </div>
    <!-- /BANNER -->
</div>
<!-- /BANNER WRAP -->
<?php //include "./../modules/live-news-widget.php" ?>

<!-- LAYOUT CONTENT 1 -->
<div class="layout-content-1 layout-item-3-1 grid-limit">
    <!-- LAYOUT BODY -->
    <div class="layout-body">
        <!-- LAYOUT ITEM -->
        <div class="layout-item gutter-big">
            <!-- POST PREVIEW -->
            <div class="post-preview large gaming-news" style="display: none">
                <!-- POST PREVIEW IMG WRAP -->
                <a href="post-v1.html">
                    <div class="post-preview-img-wrap">
                        <!-- POST PREVIEW IMG -->
                        <figure class="post-preview-img liquid">
                            <img src="/img/games/albion-online-fishing.jpeg" alt="albion online">
                        </figure>
                        <!-- POST PREVIEW IMG -->
                    </div>
                </a>
                <!-- /POST PREVIEW IMG WRAP -->

                <!-- TAG ORNAMENT -->
                <a href="/news/" class="tag-ornament">Gaming news</a>
                <!-- /TAG ORNAMENT -->

                <!-- POST PREVIEW TITLE -->
                <a href="post-v1.html" class="post-preview-title">Albion Online fishing profession mastery explained.</a>
                <!-- POST AUTHOR INFO -->
                <div class="post-author-info-wrap">
                    <!-- USER AVATAR -->
                        <figure class="user-avatar tiny liquid">
                            <img src="/img/users/admin-profile.jpg" alt="user-admin">
                        </figure>
                    <!-- /USER AVATAR -->
                    <p class="post-author-info small light">By <span class="post-author">Spectrum3900</span><span class="separator">|</span>January 11, 2025</p>
                </div>
                <!-- /POST AUTHOR INFO -->
                <!-- POST PREVIEW TEXT -->
                <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
            </div>
            <!-- /POST PREVIEW -->

        </div>
        <!-- /LAYOUT ITEM -->

        <!-- PAGE NAVIGATION -->
        <div class="page-navigation blue spaced" style="display: none">
            <!-- CONTROL PREVIOUS -->
            <div class="slider-control big control-previous">
                <!-- ARROW ICON -->
                <svg class="arrow-icon medium">
                    <use xlink:href="#svg-arrow-medium"></use>
                </svg>
                <!-- /ARROW ICON -->
            </div>
            <!-- /CONTROL PREVIOUS -->
            <a href="#" class="page-navigation-item">1</a>
            <a href="#" class="page-navigation-item active">2</a>
            <a href="#" class="page-navigation-item">3</a>
            <a href="#" class="page-navigation-item">...</a>
            <a href="#" class="page-navigation-item">8</a>
            <!-- CONTROL PREVIOUS -->
            <div class="slider-control big control-next">
                <!-- ARROW ICON -->
                <svg class="arrow-icon medium">
                    <use xlink:href="#svg-arrow-medium"></use>
                </svg>
                <!-- /ARROW ICON -->
            </div>
            <!-- /CONTROL PREVIOUS -->
        </div>
        <!-- /PAGE NAVIGATION -->
    </div>
    <!-- /LAYOUT BODY -->

    <!-- LAYOUT SIDEBAR -->
    <div class="layout-sidebar layout-item gutter-medium">

        <?php include "./../modules/sidebar-popular-posts-4x.php" ?>
        <?php include "./../modules/sidebar-latest-reviews-4x.php" ?>
        <?php include "./../modules/sidebar-banner-ad-250x250.php" ?>
        <?php include "./../modules/sidebar-tags.php" ?>

    </div>
    <!-- /LAYOUT SIDEBAR -->
</div>
<!-- /LAYOUT CONTENT 1 -->

<?php include "./../includes/footer-top-wrap.php" ?>
<?php include "./../includes/footer-bottom-wrap.php" ?>
<?php include "./../includes/global_footer.php" ?>
</body>
</html>