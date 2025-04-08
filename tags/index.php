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
    $query_item = "SELECT * FROM content WHERE active='1' AND post_tag='$slug' LIMIT 10";
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
<?php include "./../includes/mobile-menu-wrap.php" ?>
<?php include "./../includes/navigation-wrap.php" ?>
<?php include "./../includes/mobile-menu-pull.php" ?>

<!-- BANNER WRAP -->
<div class="banner-wrap gaming-news">
    <!-- BANNER -->
    <div class="banner grid-limit">
        <h1 class="banner-title"><?=$slug_text?></h1>
        <p class="banner-sections">
            <span class="banner-section">Home</span>
            <!-- ARROW ICON -->
            <svg class="arrow-icon">
                <use xlink:href="#svg-arrow"></use>
            </svg>
            <!-- /ARROW ICON -->
            <span class="banner-section">Tags</span>
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

            <?php
            if ($result_all != null) {
                while ($row = $result_all->fetch_assoc()) {
                    $class_color = "";
                    if ($row["type"] === "guides") {
                        $class_color = " movie-news";
                    } else if ($row["type"] === "reviews") {
                        $class_color = " game-review";
                    } else {
                        $class_color = " gaming-news";
                    }
                ?>
                <div class="post-preview large<?=$class_color;?>">
                    <a href="<?=$row["post_preview_url"]?>">
                        <div class="post-preview-img-wrap">
                            <figure class="post-preview-img liquid">
                                <img src="<?=$row["post_preview_img"]?>" alt="<?=$row["post_preview_title"]?>">
                            </figure>
                        </div>
                    </a>
                    <?php if ($row["type"] === "guides") { ?>
                    <a href="/guides/" class="tag-ornament">Game Guide</a>
                    <?php } else if ($row["type"] === "reviews") { ?>
                    <a href="/reviews/" class="tag-ornament">Game Review</a>
                    <?php } ?>
                    <a href="<?=$row["post_preview_url"]?>" class="post-preview-title"><?=$row["post_preview_title"]?></a>
                    <div class="post-author-info-wrap">
                        <figure class="user-avatar tiny liquid">
                            <img src="<?=$row["user_avatar"]?>" alt="user-admin">
                        </figure>
                        <p class="post-author-info small light">By <span class="post-author"><?=$row["post_author"]?></span><span class="separator">|</span><?=$row["created"]?></p>
                    </div>
                    <p class="post-preview-text"><?=$row["post_preview_text"]?></p>
                </div>
                <?php
                }
            } else {
            ?>
                <div class="post-preview large gaming-news">No Tags</div>
            <?php } ?>
        </div>
        <!-- /LAYOUT ITEM -->

        <?php /** ?>
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
        <?php **/ ?>
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