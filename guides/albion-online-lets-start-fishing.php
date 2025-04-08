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
<?php include "./../includes/mobile-menu-wrap.php" ?>
<?php include "./../includes/navigation-wrap.php" ?>
<?php include "./../includes/mobile-menu-pull.php" ?>

<!-- LAYOUT CONTENT 1 -->
<div class="layout-content-1 layout-item-3-1 grid-limit">
    <!-- LAYOUT BODY -->
    <div class="layout-body">
        <!-- LAYOUT ITEM -->
        <div class="layout-item gutter-big">
            <!-- POST OPEN -->
            <div class="post-open movie-news">
                <!-- POST OPEN IMG -->
                <figure class="post-open-img liquid">
                    <img src="/img/games/albion-online-fishing.jpg" alt="Albion Online">
                </figure>
                <!-- /POST OPEN IMG -->

                <!-- POST OPEN CONTENT -->
                <div class="post-open-content">
                    <!-- POST OPEN BODY  -->
                    <div class="post-open-body">
                        <!-- TAG LIST -->
                        <div class="tag-list">
                            <a href="/guides/" class="tag-ornament">Game Guide</a>
                        </div>
                        <!-- /TAG LIST -->

                        <!-- POST OPEN TITLE -->
                        <h1 class="post-open-title">Albion Online - Let's start fishing!</h1>
                        <!-- /POST OPEN TITLE -->

                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <!-- USER AVATAR -->
                            <a href="/">
                                <figure class="user-avatar tiny liquid">
                                    <img src="/img/users/admin-profile.jpg" alt="user-admin">
                                </figure>
                            </a>
                            <!-- /USER AVATAR -->
                            <p class="post-author-info small light">By <span class="post-author">Spectrum3900</span><span class="separator">|</span>January 25, 2025<span class="separator"></p>
                        </div>
                        <!-- /POST AUTHOR INFO -->

                        <!-- POST OPEN TEXT -->
                        <p class="post-open-text bold">Welcome to Albion Online player - so you want to be a master fisherman in no time. Sounds good to me.</p>
                        <!-- /POST OPEN TEXT -->

                        <!-- POST OPEN TEXT -->
                        <p class="post-open-text">Fishing in AO is quite interesting - you can reach level 100 and wear special clothing to increase your fishing performance. You can equip different level of fishing rods, fishing gears, use bait, and eat food as well. Everything in Albion is created by players. You can craft all the items if you wanted too. Even the fish can be prepared and eaten or combined to make better dishes. It is a niche economy to be a fisherman in Albion Online.</p>
                        <!-- /POST OPEN TEXT -->

                        <!-- POST OPEN IMG -->
                        <figure class="post-open-img blur-bg-img liquid" style="margin-top: 20px;">
                            <img src="/img/games/albion-online/Screenshot_2025-01-25_10-48-58.jpg" alt="albion-online">
                        </figure>
                        <!-- /POST OPEN IMG -->

                        <!-- POST OPEN TEXT -->
                        <p class="post-open-text">To start fishing you will need a fishing rod starting at tier 3. Items in Albion are split into tiers (1-8) and quality (Good to Masterpiece). To reach Tier 3 you just need to play the intro game and start gathering. You need to unlock Trainee Gatherer and the Gathering Fisherman skill will unlock where you will be able to use a fishing rod.</p>
                        <!-- /POST OPEN TEXT -->

                        <!-- POST OPEN IMG -->
                        <figure class="post-open-img blur-bg-img liquid" style="margin-top: 20px;">
                            <img src="/img/games/albion-online/Screenshot_2025-01-25_11-07-14.jpg" alt="albion-online">
                        </figure>
                        <!-- /POST OPEN IMG -->

                        <!-- POST OPEN TEXT -->
                        <p class="post-open-text">We are focusing on fishing skill and won't be crafting each rod and gears or cooking. The fishing rod is using a standard item power of 500 and each quality step is adding +20 up to a maximum of 600 for a tier 3 fishing rod. We have to remember that items we use will decay and can be repaired in town.</p>
                        <!-- /POST OPEN TEXT -->

                        <!-- POST OPEN IMG -->
                        <figure class="post-open-img blur-bg-img liquid" style="margin-top: 20px;">
                            <img src="/img/games/albion-online/Screenshot_2025-01-25_11-24-09.jpg" alt="albion-online">
                        </figure>
                        <!-- /POST OPEN IMG -->

                        <!-- POST OPEN SUBTITLE -->
                        <p class="post-open-subtitle">Unlocking Rewards</p>
                        <!-- /POST OPEN SUBTITLE -->

                        <!-- POST OPEN TEXT -->
                        <p class="post-open-text">Our next goal is to unlock Gathering Fisherman Level 1 Rewards to be able to equip our first specialize clothing for fishing - we need to get 7k points to advance. It seems beginner fish gets you 20. Either way let's fish!</p>
                        <!-- /POST OPEN TEXT -->

                        <!-- POST OPEN IMG -->
                        <figure class="post-open-img blur-bg-img liquid" style="margin-top: 20px;">
                            <img src="/img/games/albion-online/Screenshot_2025-01-25_11-35-05.jpg" alt="albion-online">
                        </figure>
                        <!-- /POST OPEN IMG -->

                    </div>
                    <!-- /POST OPEN BODY -->

                    <!-- POST OPEN SIDEBAR -->
                    <div class="post-open-sidebar">
                        <!-- SOCIAL LINKS -->
                        <div class="social-links medium vertical animated">

                            <a target="_blank" href="https://twitter.com/intent/tweet?url=<?=$url?>&text=<?=urlencode($title)?>&via=E2Prod&hashtags=mmofishing" class="bubble-ornament big twt">
                                <svg class="twitter-icon big">
                                    <use xlink:href="#svg-twitter"></use>
                                </svg>
                                <p class="bubble-ornament-text">Share</p>
                                <p class="bubble-ornament-text hover-replace">Now</p>
                            </a>

                        </div>
                        <!-- /SOCIAL LINKS -->
                    </div>
                    <!-- /POST OPEN SIDEBAR -->
                </div>
                <!-- /POST OPEN CONTENT -->

                <!-- POST OPEN TAGS -->
                <div class="post-open-tags">
                    <div class="tag-list">
                        <a href="/tags/albion-online/" class="tag-item">Albion Online</a>
                    </div>
                </div>
                <!-- /POST OPEN TAGS -->
            </div>
            <!-- /POST OPEN -->

            <?php /** ?>
            <!-- WIDGET NEWS -->
            <div class="widget-news">
                <!-- SECTION TITLE WRAP -->
                <div class="section-title-wrap blue">
                    <h2 class="section-title medium">Related News</h2>
                    <div class="section-title-separator"></div>
                </div>
                <!-- /SECTION TITLE WRAP -->

                <!-- POST PREVIEW SHOWCASE -->
                <div class="post-preview-showcase grid-3col centered">
                    <!-- POST PREVIEW -->
                    <div class="post-preview gaming-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v1.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="/img/posts/09.jpg" alt="post-09">
                                </figure>
                                <!-- /POST PREVIEW IMG -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->

                        <!-- TAG ORNAMENT -->
                        <a href="news-v1.html" class="tag-ornament">Gaming news</a>
                        <!-- /TAG ORNAMENT -->

                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v1.html" class="post-preview-title">New "Rizen" game is gonna be released in summer 2019</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html" class="post-author">Vellatrix</a><span class="separator">|</span>December 15th, 2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                        <!-- POST PREVIEW TEXT -->
                        <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview geeky-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v4.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="/img/posts/02.jpg" alt="post-02">
                                </figure>
                                <!-- /POST PREVIEW IMG -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->

                        <!-- TAG ORNAMENT -->
                        <a href="news-v4.html" class="tag-ornament">Geeky news</a>
                        <!-- /TAG ORNAMENT -->

                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v4.html" class="post-preview-title">Jessica Tam to star in the new "Charlotte" series</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html" class="post-author">Vellatrix</a><span class="separator">|</span>December 15th, 2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                        <!-- POST PREVIEW TEXT -->
                        <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                    </div>
                    <!-- /POST PREVIEW -->

                    <!-- POST PREVIEW -->
                    <div class="post-preview movie-news">
                        <!-- POST PREVIEW IMG WRAP -->
                        <a href="post-v3.html">
                            <div class="post-preview-img-wrap">
                                <!-- POST PREVIEW IMG -->
                                <figure class="post-preview-img liquid">
                                    <img src="/img/posts/12.jpg" alt="post-12">
                                </figure>
                                <!-- /POST PREVIEW IMG -->

                                <!-- RATING ORNAMENT -->
                                <div class="rating-ornament">
                                    <!-- RATING ORNAMENT ITEM -->
                                    <div class="rating-ornament-item">
                                        <!-- RATING ORNAMENT ICON -->
                                        <svg class="rating-ornament-icon">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                    </div>
                                    <!-- /RATING ORNAMENT ITEM -->

                                    <!-- RATING ORNAMENT ITEM -->
                                    <div class="rating-ornament-item">
                                        <!-- RATING ORNAMENT ICON -->
                                        <svg class="rating-ornament-icon">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                    </div>
                                    <!-- /RATING ORNAMENT ITEM -->

                                    <!-- RATING ORNAMENT ITEM -->
                                    <div class="rating-ornament-item">
                                        <!-- RATING ORNAMENT ICON -->
                                        <svg class="rating-ornament-icon">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                    </div>
                                    <!-- /RATING ORNAMENT ITEM -->

                                    <!-- RATING ORNAMENT ITEM -->
                                    <div class="rating-ornament-item">
                                        <!-- RATING ORNAMENT ICON -->
                                        <svg class="rating-ornament-icon empty">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                    </div>
                                    <!-- /RATING ORNAMENT ITEM -->

                                    <!-- RATING ORNAMENT ITEM -->
                                    <div class="rating-ornament-item">
                                        <!-- RATING ORNAMENT ICON -->
                                        <svg class="rating-ornament-icon empty">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                    </div>
                                    <!-- /RATING ORNAMENT ITEM -->
                                </div>
                                <!-- /RATING ORNAMENT -->
                            </div>
                        </a>
                        <!-- /POST PREVIEW IMG WRAP -->

                        <!-- TAG ORNAMENT -->
                        <a href="news-v3.html" class="tag-ornament">Movie news</a>
                        <!-- /TAG ORNAMENT -->

                        <!-- POST PREVIEW TITLE -->
                        <a href="post-v3.html" class="post-preview-title">We reviewed the "Guardians of the Universe" movie</a>
                        <!-- POST AUTHOR INFO -->
                        <div class="post-author-info-wrap">
                            <p class="post-author-info small light">By <a href="search-results.html" class="post-author">Faye V.</a><span class="separator">|</span>December 15th, 2018</p>
                        </div>
                        <!-- /POST AUTHOR INFO -->
                        <!-- POST PREVIEW TEXT -->
                        <p class="post-preview-text">Lorem ipsum dolor sit amet, consectetur bere adipisicing elit, sed do eiusmod tempor lorem incididunt ut labore et dolore magna.</p>
                    </div>
                    <!-- /POST PREVIEW -->
                </div>
                <!-- /POST PREVIEW SHOWCASE -->
            </div>
            <!-- /WIDGET NEWS -->
            <?php **/ ?>
        </div>
        <!-- /LAYOUT ITEM -->

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