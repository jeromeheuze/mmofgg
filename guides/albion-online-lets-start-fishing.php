<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';
include "./../bin/class/Pages.php";

$Pages = new Pages(DBHOST, DBUSER, DBPASS, DBNAME);
$slug = "/guides/albion-online-lets-start-fishing.php";
$Pages->incrementTotalVisitsFromSlug($slug);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Albion Online - Let's start fishing! | Guides | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games".$slug;
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
                    <h5 class="page-title">Game Guides</h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li><a href="/guides/">Guides</a></li>
                        <li>Albion Online - Let's start fishing!</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog-page-area pd-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pd-top-50">
                <div class="blog-details-page-inner">
                    <div class="single-blog-inner m-0">
                        <div class="single-post-wrap style-overlay">
                            <div class="thumb">
                                <img src="/assets/games/albion-online-fishing.jpg" alt="Albion Online">
                            </div>
                            <div class="details pb-4">
                                <div class="post-meta-single mb-2">
                                    <ul>
                                        <li><a class="tag-base tag-yellow" href="/guides/">Guides</a></li>
                                        <li>
                                            <p><i class="fa fa-clock-o"></i>January 25, 2025</p>
                                        </li>
                                        <li><i class="fa fa-user"></i>Spectrum3900</li>
                                    </ul>
                                </div>
                                <h1 class="h5 title mt-0">Albion Online - Let's start fishing!</h1>
                            </div>
                        </div>
                        <div class="single-blog-details">

                            <p>Welcome to Albion Online player - so you want to be a Master fisherman in no time. Sounds good to me.</p>

                            <p>Fishing in AO is quite interesting - you can reach level 100 and wear special clothing to increase your fishing performance. You can equip different level of fishing rods, fishing gears, use bait, and eat food as well. Everything in Albion is created by players. You can craft all the items if you wanted too. Even the fish can be prepared and eaten or combined to make better dishes. It is a niche economy to be a fisherman in Albion Online.</p>

                            <figure style="margin-top: 20px;">
                                <picture>
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_10-48-58.webp" type="image/webp">
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_10-48-58.jpg" type="image/jpeg">
                                    <img src="/assets/games/albion-online/Screenshot_2025-01-25_10-48-58.jpg" alt="albion-online">
                                </picture>
                            </figure>

                            <p>To start fishing you will need a fishing rod starting at tier 3. Items in Albion are split into tiers (1-8) and quality (Good to Masterpiece). To reach Tier 3 you just need to play the intro game and start gathering. You need to unlock Trainee Gatherer and the Gathering Fisherman skill will unlock where you will be able to use a fishing rod.</p>

                            <figure style="margin-top: 20px;">
                                <picture>
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_11-07-14.webp" type="image/webp">
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_11-07-14.jpg" type="image/jpeg">
                                    <img src="/assets/games/albion-online/Screenshot_2025-01-25_11-07-14.jpg" alt="albion-online">
                                </picture>
                            </figure>

                            <p>We are focusing on fishing skill and won't be crafting each rod and gears or cooking. The fishing rod is using a standard item power of 500 and each quality step is adding +20 up to a maximum of 600 for a tier 3 fishing rod. We have to remember that items we use will decay and can be repaired in town.</p>

                            <figure style="margin-top: 20px;">
                                <picture>
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_11-24-09.webp" type="image/webp">
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_11-24-09.jpg" type="image/jpeg">
                                    <img src="/assets/games/albion-online/Screenshot_2025-01-25_11-24-09.jpg" alt="albion-online">
                                </picture>
                            </figure>

                            <p>Unlocking Rewards</p>

                            <p>Our next goal is to unlock Gathering Fisherman Level 1 Rewards to be able to equip our first specialize clothing for fishing - we need to get 7k points to advance. It seems beginner fish gets you 20. Either way let's fish!</p>

                            <figure style="margin-top: 20px;">
                                <picture>
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_11-35-05.webp" type="image/webp">
                                    <source srcset="/assets/games/albion-online/Screenshot_2025-01-25_11-35-05.jpg" type="image/jpeg">
                                    <img src="/assets/games/albion-online/Screenshot_2025-01-25_11-35-05.jpg" alt="albion-online">
                                </picture>
                            </figure>

                        </div>
                        <div class="meta">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="tags">
                                        <span>Tags:</span>
                                        <a href="/tags/albion-online/">Albion Online</a>
                                    </div>
                                </div>
                                <div class="col-lg-7 text-md-right">
                                    <div class="blog-share">
                                        <span>Share:</span>
                                        <ul class="social-area social-area-2 d-inline">
                                            <li><a class="facebook-icon" href="https://www.facebook.com/sharer/sharer.php?u=<?=$url?>"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter-icon" href="https://twitter.com/intent/tweet?url=<?=$url?>&text=<?=urlencode($title)?>&via=E2Prod&hashtags=mmofishing"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="author-area">
                            <div class="media">
                                <img src="/assets/users/admin-profile.jpg" alt="img">
                                <div class="media-body align-self-center">
                                    <h4>Spectrum3900</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-post" style="display: none;">
                        <div class="section-title mb-0">
                            <h5 class="mb-0">Related Post</h5>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-6">
                                <div class="single-post-wrap">
                                    <div class="thumb">
                                        <img src="/assets/img/post/19.png" alt="img">
                                        <a class="tag-base tag-red" href="#">Tech</a>
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                <li><i class="fa fa-user"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title mt-2"><a href="#">Lifting Weights Makes Your Nervous</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-post-wrap">
                                    <div class="thumb">
                                        <img src="/assets/img/post/20.png" alt="img">
                                        <a class="tag-base tag-blue" href="#">Tech</a>
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                <li><i class="fa fa-user"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title mt-2"><a href="#">New, Remote Weight-Loss Method </a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="single-post-wrap">
                                    <div class="thumb">
                                        <img src="/assets/img/post/21.png" alt="img">
                                        <a class="tag-base tag-light-green" href="#">Tech</a>
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                <li><i class="fa fa-user"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title mt-2"><a href="#">Social Connection Boosts Fitness App </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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