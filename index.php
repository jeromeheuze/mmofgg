<?php
include "./includes/global.php";
require_once './bin/dbconnect.php';

$query_item = "SELECT * FROM content WHERE active='1' ORDER BY created DESC LIMIT 4";
mysqli_set_charset($DBcon,"utf8");
$result_all = $DBcon->query($query_item);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./includes/global_head.php" ?>
    <?php
    $title = "MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/";
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

<!-- banner area start -->
<div class="banner-area banner-inner-1 bg-black">
    <!-- banner area start -->
    <div class="banner-inner pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb after-left-top">
                        <img src="/assets/games/albion-online-fishing.jpg" alt="img">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-details mt-4 mt-lg-0">
                        <div class="post-meta-single">
                            <ul>
                                <li><a class="tag-base tag-yellow" href="/guides/">Guides</a></li>
                                <li class="date"><i class="fa fa-clock-o"></i>2025-01-25</li>
                            </ul>
                        </div>
                        <h2>Albion Online - Let's start fishing!</h2>
                        <p>Fishing in AO is quite interesting - you can reach level 100 and wear special clothing to increase your fishing performance.</p>
                        <a class="btn btn-blue" href="/">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->
</div>

<div class="dont-miss-area pd-top-75 pd-bottom-50">
    <div class="container">
        <div class="section-title">
            <div class="row">
                <div class="col-6">
                    <h6 class="title">Top News</h6>
                </div>
                <div class="col-6 text-center text-md-right">
<!--                    <a class="btn-read-more" href="/">See More <i class="la la-arrow-right"></i></a>-->
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if ($result_all != null) {
            while ($row = $result_all->fetch_assoc()) {
                $class_color = "";
                if ($row["type"] === "guides") {
                    $class_color = " tag-yellow";
                } else if ($row["type"] === "reviews") {
                    $class_color = " tag-red";
                } else {
                    $class_color = " tag-blue";
                }
            ?>
            <div class="col-lg-3 col-sm-6">
                <div class="single-post-wrap style-box">
                    <div class="thumb">
                        <img src="<?=$row["post_preview_img"]?>" alt="<?=$row["post_preview_title"]?>">
                    </div>
                    <div class="details">
                        <div class="post-meta-single mb-4 pt-1">
                            <ul>
                                <li><a class="text-capitalize tag-base<?=$class_color?>" href="/<?=$row["type"];?>/"><?=$row["type"];?></a></li>
                            </ul>
                        </div>
                        <h6 class="title"><a href="<?=$row["post_preview_url"]?>"><?=$row["post_preview_title"]?></a></h6>
                        <p><?=$row["post_preview_text"]?></p>
                        <div class="spw-bottom">
                            <ul>
                                <li>
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="<?=$row["user_avatar"]?>" alt="<?=$row["post_author"]?>">
                                        </div>
                                        <div class="media-body align-self-center">
                                            <p class="text-capitalize"><?=$row["post_author"]?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <p><?=$row["created"]?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            } else {
            ?>
            <div class="col-lg-3 col-sm-6">No News</div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include "./modules/footer.php" ?>
<?php include "./includes/global_footer.php" ?>
</body>
</html>