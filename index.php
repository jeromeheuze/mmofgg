<?php
include "./includes/global.php";
require_once './bin/dbconnect.php';
// Ensure UTF-8 encoding
$DBcon->set_charset('utf8mb4');

// Fetch all games for display (limit to 8 or paginate as needed)
$query = "
SELECT id, title, slug, platform, model, fishing_style, thumbnail
FROM games
ORDER BY title ASC
LIMIT 8
";
$result_games = $DBcon->query($query);
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

<!-- Directory Preview Section -->
<?php
// Banner: Fetch Albion Online
$bannerStmt = $DBcon->prepare("SELECT title, slug, thumbnail, description, release_date FROM games WHERE slug = 'albion-online' LIMIT 1");
$bannerStmt->execute();
$bannerGame = $bannerStmt->get_result()->fetch_assoc();
?>
<!-- banner area start -->
<div class="banner-area banner-inner-1 bg-black">
    <div class="banner-inner pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="thumb after-left-top">
                        <img src="/assets/games/albion-online-fishing.jpg" alt="<?= htmlspecialchars($bannerGame['title']) ?>">
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="banner-details mt-4 mt-lg-0">
                        <div class="post-meta-single">
                            <ul>
                                <li><a class="tag-base tag-blue" href="/game/<?= urlencode($bannerGame['slug']) ?>/">Explore Game</a></li>
                                <li class="date"><i class="fa fa-clock-o"></i><?= date("F d, Y", strtotime($bannerGame['release_date'] ?? date('Y-m-d'))) ?></li>
                            </ul>
                        </div>
                        <h2><?= htmlspecialchars($bannerGame['title']) ?> - Fishing Overview</h2>
                        <p><?= nl2br(htmlspecialchars($bannerGame['description'])) ?></p>
                        <a class="btn btn-blue" href="/game/<?= urlencode($bannerGame['slug']) ?>/">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner area end -->

<!-- Directory Preview Section -->
<section class="directory-preview pd-top-75 pd-bottom-50">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>MMO Fishing Games Directory</h2>
            <p>Browse our curated list of MMOs featuring in-game fishing mechanics.</p>
        </div>
        <div class="row">
            <?php if ($result_games && $result_games->num_rows > 0): ?>
                <?php while ($game = $result_games->fetch_assoc()): ?>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="single-game-wrap style-box">
                            <div class="thumb mb-4">
                                <img src="<?= htmlspecialchars($game['thumbnail']) ?>" alt="<?= htmlspecialchars($game['title']) ?>">
                            </div>
                            <div class="details mt-2">
                                <h6 class="title">
                                    <a href="/game/<?= urlencode($game['slug']) ?>/"><?= htmlspecialchars($game['title']) ?></a>
                                </h6>
                                <div class="tags">
                                    <span class="badge badge-platform"><?= htmlspecialchars($game['platform']) ?></span>
                                    <span class="badge badge-model"><?= htmlspecialchars($game['model']) ?></span>
                                </div>
                                <p class="mt-2 small text-muted"><?= htmlspecialchars($game['fishing_style']) ?> style fishing</p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p>No games found in the directory.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="/directory/" class="btn btn-primary">View Full Directory</a>
        </div>
    </div>
</section>

<?php include "./modules/footer.php" ?>
<?php include "./includes/global_footer.php" ?>
</body>
</html>