<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "./../includes/global.php";
require_once "./../bin/dbconnect.php";
require_once "./../admin/csrf.php"; // for CSRF token
require_once __DIR__ . '/../includes/rss_aggregator.php';

// Ensure UTF-8 encoding
$DBcon->set_charset('utf8mb4');

// 1. Get slug and fetch game
$slug = $_GET['slug'] ?? '';
if (!$slug) {
    header("Location: /directory/");
    exit;
}

$stmt = $DBcon->prepare("SELECT * FROM games WHERE slug = ? LIMIT 1");
$stmt->bind_param('s', $slug);
$stmt->execute();
$game = $stmt->get_result()->fetch_assoc();
if (!$game) {
    http_response_code(404);
    echo "<h1>Game Not Found</h1><p>The game you requested does not exist.</p>";
    exit;
}

// 2. Fetch fishing features
$stmt2 = $DBcon->prepare("SELECT feature, details FROM fishing_features WHERE game_id = ?");
$stmt2->bind_param('i', $game['id']);
$stmt2->execute();
$features = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);

// 3. (Optional) Fetch related posts
// $stmt3 = $DBcon->prepare("
//   SELECT p.*
//     FROM posts p
//     JOIN game_posts gp ON gp.post_id = p.id
//    WHERE gp.game_id = ?
//    ORDER BY p.published_date DESC
// ");
// $stmt3->bind_param('i', $game['id']);
// $stmt3->execute();
// $posts = $stmt3->get_result()->fetch_all(MYSQLI_ASSOC);

// Build JSON-LD for VideoGame
$additionalProps = array_map(function($feat) {
    return [
        "@type" => "PropertyValue",
        "name"  => $feat['feature'],
        "value" => $feat['details']
    ];
}, $features);
$videoGameLd = [
    "@context"            => "https://schema.org",
    "@type"               => "VideoGame",
    "name"                => $game['title'],
    "url"                 => "https://mmofishing.games/game.php?slug=" . urlencode($slug),
    "image"               => "https://mmofishing.games" . $game['thumbnail'],
    "description"         => $game['description'],
    "genre"               => $game['genre'] ?? 'MMORPG',
    "datePublished"       => $game['release_date'],
    "publisher"           => [
        "@type" => "Organization",
        "name"  => $game['developer']
    ],
    "operatingSystem"     => $game['platform'],
    "applicationCategory" => "Game",
    "additionalProperty"  => $additionalProps
];

// Generate CSRF token
$csrfToken = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = htmlspecialchars($game['title'])." | MMO Fishing Games";
    $description = htmlspecialchars($game['description']);
    $url = "https://mmofishing.games/game/".$slug."/";
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
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    <?= json_encode($videoGameLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) ?>
    </script>
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
                    <h1 class="page-title"><?= htmlspecialchars($game['title']) ?></h1>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li><a href="/directory/">Directory</a></li>
                        <li><?= htmlspecialchars($game['platform']) ?> &bull; <?= htmlspecialchars($game['model']) ?> &bull; <?= htmlspecialchars($game['fishing_style']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fishing Overview -->
<section class="container py-5">
    <h2>Fishing Overview</h2>
    <p><?= nl2br(htmlspecialchars($game['description'])) ?></p>
</section>

<!-- Features -->
<section class="container pb-5">
    <h2>Fishing Features</h2>
    <?php if ($features): ?>
        <ul class="list-unstyled">
            <?php foreach ($features as $feat): ?>
                <li class="mb-2">
                    <strong><?= htmlspecialchars($feat['feature']) ?>:</strong>
                    <?= htmlspecialchars($feat['details']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No specific fishing features listed.</p>
    <?php endif; ?>
</section>

<section class="container pb-5">
    <h2>Latest News</h2>
    <?php renderGameNews($slug); ?>
</section>

<!-- User Reviews Section -->
<section class="container pb-5" id="user-reviews">
    <h2>Player Reviews</h2>
    <div id="avg-rating" class="mb-2"></div>
    <div id="reviews-list" class="mb-4"></div>

    <h3>Leave a Review</h3>
    <form id="review-form" class="mb-5">
        <input type="hidden" name="csrf_token" value="<?=$csrfToken?>">
        <input type="hidden" name="game_id" value="<?=$game['id']?>">
        <div class="mb-3">
            <label for="user_name" class="form-label">Name</label>
            <input type="text" id="user_name" name="user_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select id="rating" name="rating" class="form-select" required>
                <option value="">Choose...</option>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?=$i?>"><?=$i?> star<?= $i>1?'s':''?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</section>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
<script type="text/javascript">
    $(function(){
        const GAME_ID = <?= (int)$game['id'] ?>;

        function renderReviews(reviews) {
            const $list = $('#reviews-list').empty();
            if (!reviews.length) {
                return $list.append('<p>No reviews yet.</p>');
            }
            reviews.forEach(r => {
                const stars = '★'.repeat(r.rating) + '☆'.repeat(5-r.rating);
                $list.append(
                    `<div class="mb-3">
                    <strong>${r.user_name}</strong> <small class="text-muted">(${new Date(r.created_at).toLocaleDateString()})</small><br>
                    <span class="text-warning">${stars}</span>
                    <p>${r.comment}</p>
                </div>`
                );
            });
        }

        function updateAvgRating(avg, total) {
            const stars = '★'.repeat(Math.round(avg)) + '☆'.repeat(5-Math.round(avg));
            $('#avg-rating').html(`<strong>Average Rating:</strong> ${avg} ${stars} (${total} review${total!==1?'s':''})`);
        }

        // Load reviews
        $.getJSON('/bin/get-reviews.php', { game_id: GAME_ID }, function(data) {
            if (!data.reviews) {
                console.error('No reviews in response', data);
                return;
            }
            renderReviews(data.reviews);
            updateAvgRating(data.avgRating, data.totalReviews);
        });

        // Submit review form
        $('#review-form').on('submit', function(e) {
            e.preventDefault();
            $.post('/bin/submit-review.php', $(this).serialize(), function(resp) {
                if (resp.success) {
                    // reload reviews
                    window.location.reload();
                    // renderReviews(resp.reviews);
                    // updateAvgRating(resp.avgRating, resp.totalReviews);
                    // $('#review-form')[0].reset();
                } else {
                    alert(resp.error || 'Failed to submit review.');
                }
            }, 'json');
        });

    });
</script>
</body>
</html>
