<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
// directory.php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';

// Ensure UTF-8 encoding
$DBcon->set_charset('utf8mb4');

// Make sure these are always defined as arrays
$platforms   = isset($_GET['platform'])    ? (array)$_GET['platform']    : [];
$models      = isset($_GET['model'])       ? (array)$_GET['model']       : [];
$styles      = isset($_GET['fishing_style']) ? (array)$_GET['fishing_style'] : [];

// Function to fetch games (used by both page load and AJAX)
function fetchGames($DBcon, &$totalPages) {
    // Collect filters and search query
    $platforms   = $_GET['platform']    ?? [];
    $models      = $_GET['model']       ?? [];
    $styles      = $_GET['fishing_style'] ?? [];
    $searchQuery = trim($_GET['q']       ?? '');

    // Build WHERE clauses
    $where = [];
    $params = [];
    if ($searchQuery !== '') {
        $where[]  = "title LIKE ?";
        $params[] = "%{$searchQuery}%";
    }
    if (!empty($platforms)) {
        $in = implode(',', array_fill(0, count($platforms), '?'));
        $where[]  = "platform IN ({$in})";
        $params   = array_merge($params, $platforms);
    }
    if (!empty($models)) {
        $in = implode(',', array_fill(0, count($models), '?'));
        $where[]  = "model IN ({$in})";
        $params   = array_merge($params, $models);
    }
    if (!empty($styles)) {
        $in = implode(',', array_fill(0, count($styles), '?'));
        $where[]  = "fishing_style IN ({$in})";
        $params   = array_merge($params, $styles);
    }
    $whereSQL = $where ? 'WHERE ' . implode(' AND ', $where) : '';

    // Pagination setup
    $page     = max(1, (int)($_GET['page'] ?? 1));
    $perPage  = 12;
    $offset   = ($page - 1) * $perPage;

    // Total count for pagination
    $countSql = "SELECT COUNT(*) FROM games {$whereSQL}";
    $stmtCount = $DBcon->prepare($countSql);
    if (!empty($params)) {
        $types = str_repeat('s', count($params));
        $stmtCount->bind_param($types, ...$params);
    }
    $stmtCount->execute();
    $stmtCount->bind_result($totalCount);
    $stmtCount->fetch();
    $stmtCount->close();
    $totalPages = ceil($totalCount / $perPage);

    // Main query
    $sql = "SELECT id, title, slug, platform, model, fishing_style, thumbnail
            FROM games
            {$whereSQL}
            ORDER BY title ASC
            LIMIT ? OFFSET ?";
    $stmt = $DBcon->prepare($sql);
    $allParams = array_merge($params, [(string)$perPage, (string)$offset]);
    $types = str_repeat('s', count($allParams));
    $stmt->bind_param($types, ...$allParams);
    $stmt->execute();
    return $stmt->get_result();
}

// On AJAX request, return partial HTML
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    $totalPages = 0;
    $result = fetchGames($DBcon, $totalPages);
    ob_start();
    // Render game-list
    echo '<div class="row" id="game-list">';
    if ($result->num_rows) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="single-game-wrap style-box">
                    <div class="thumb">
                        <a href="/game/<?=urlencode($row['slug'])?>/" title="<?=htmlspecialchars($row['title'])?>"><img src="<?=$row['thumbnail']?>" alt="<?=htmlspecialchars($row['title'])?>"></a>
                    </div>
                    <div class="details mt-2">
                        <h6 class="title">
                            <a href="/game/<?=urlencode($row['slug'])?>/"><?=htmlspecialchars($row['title'])?></a>
                        </h6>
                        <div class="tags">
                            <span class="badge badge-platform"><?=htmlspecialchars($row['platform'])?></span>
                            <span class="badge badge-style"><?=htmlspecialchars($row['fishing_style'])?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p>No games found.</p>';
    }
    echo '</div>';
    // Render pagination
    if ($totalPages > 1) {
        echo '<nav><ul class="pagination justify-content-center">';
        for ($p = 1; $p <= $totalPages; $p++) {
            $active = $p == ($_GET['page'] ?? 1) ? ' active' : '';
            $query = array_merge($_GET, ['page' => $p]);
            echo "<li class='page-item{$active}'><a class='page-link' href='?".http_build_query($query)."'>{$p}</a></li>";
        }
        echo '</ul></nav>';
    }

    ob_end_flush();
    exit;
}

// Initial page load
$totalPages = 0;
$result = fetchGames($DBcon, $totalPages);

$itemList = [];
$position = 1;
while ($row = $result->fetch_assoc()) {
    $itemList[] = [
        "@type"           => "ListItem",
        "position"        => $position++,
        "url"             => "https://mmofishing.games/game/" . urlencode($row['slug']."/"),
        "name"            => $row['title'],
        "image"           => "https://mmofishing.games" . $row['thumbnail']
    ];
}
$directoryLd = [
    "@context"           => "https://schema.org",
    "@type"              => "ItemList",
    "itemListElement"    => $itemList
];

// Detect protocol (http or https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    ? 'https://'
    : 'http://';

// Base domain and path
$base = $protocol . $_SERVER['HTTP_HOST'] . '/directory/';

// Parse all supported query parameters
$platform      = isset($_GET['platform'][0]) ? urlencode($_GET['platform'][0]) : null;
$model         = isset($_GET['model'][0]) ? urlencode($_GET['model'][0]) : null;
$fishing_style = isset($_GET['fishing_style'][0]) ? urlencode($_GET['fishing_style'][0]) : null;
$page          = isset($_GET['page']) ? (int)$_GET['page'] : null;

// Construct SEO-friendly path
$seoPath = '';

if ($platform) {
    $seoPath .= 'platform/' . $platform . '/';
}
if ($model) {
    $seoPath .= 'model/' . $model . '/';
}
if ($fishing_style) {
    $seoPath .= 'fishing-style/' . $fishing_style . '/';
}
if ($page) {
    $seoPath .= 'page/' . $page . '/';
}

// Final canonical URL
$canonical = $base . $seoPath;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Directory | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = $canonical;
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
    <script type="application/ld+json">
    <?= json_encode($directoryLd, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) ?>
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

<section class="directory-section pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <form id="game-filters" method="get">
                    <div class="filter-group mb-3 position-relative">
                        <h6>Search</h6>
                        <input
                                list="games-list"
                                id="search-query"
                                name="q"
                                class="form-control"
                                placeholder="Search games…"
                                autocomplete="off"
                        >
                        <ul
                                id="search-suggestions"
                                class="list-group position-absolute w-100"
                                style="z-index:1000; display:none; max-height:200px; overflow-y:auto;"
                        ></ul>
                    </div>
                    <!-- Platform -->
                    <div class="filter-group mb-3">
                        <h6>Platform</h6>
                        <?php foreach (["PC","Console","Mobile","Cross-platform"] as $plat): ?>
                            <label>
                                <input
                                        type="checkbox"
                                        name="platform[]"
                                        value="<?= $plat ?>"
                                    <?= in_array($plat, $platforms) ? 'checked' : '' ?>
                                >
                                <?= $plat ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>

                    <!-- Business Model -->
                    <div class="filter-group mb-3">
                        <h6>Business Model</h6>
                        <?php foreach (["Free-to-Play","Subscription","Buy-to-Play"] as $model): ?>
                            <label>
                                <input
                                        type="checkbox"
                                        name="model[]"
                                        value="<?= $model ?>"
                                    <?= in_array($model, $models) ? 'checked' : '' ?>
                                >
                                <?= $model ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>

                    <!-- Fishing Style -->
                    <div class="filter-group mb-3">
                        <h6>Fishing Style</h6>
                        <?php foreach (["Arcade","Simulation","Rhythm","Mixed"] as $style): ?>
                            <label>
                                <input
                                        type="checkbox"
                                        name="fishing_style[]"
                                        value="<?= $style ?>"
                                    <?= in_array($style, $styles) ? 'checked' : '' ?>
                                >
                                <?= $style ?>
                            </label><br>
                        <?php endforeach; ?>
                    </div>

                </form>
            </div>
            <div class="col-lg-9">
                <div id="ajax-results">
                    <!-- initial load: render games + pagination -->
                    <?php include './../partials/game-list.php'; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
<script type="application/javascript">
    $(function(){
        function loadResults() {
            $.ajax({
                url: location.pathname,
                data: $('#game-filters').serialize(),
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                success: function(html) {
                    $('#ajax-results').html(html);
                }
            });
        }
        $('#game-filters input').on('change keypress', function(e) {
            if (e.type === 'change' || e.which === 13) {
                e.preventDefault();
                loadResults();
            }
        });

        let ajaxTimer;
        $('#search-query').on('input', function() {
            const term = this.value.trim();
            clearTimeout(ajaxTimer);

            // hide if too short
            if (term.length < 2) {
                $('#search-suggestions').hide().empty();
                return;
            }

            ajaxTimer = setTimeout(() => {
                $.getJSON('/bin/search-games.php', { term }, function(data) {
                    const $list = $('#search-suggestions').empty();
                    if (!data.length) {
                        return $list.hide();
                    }
                    data.forEach(item => {
                        $('<li>')
                            .addClass('list-group-item list-group-item-action')
                            .text(item.label)
                            .data('slug', item.slug)
                            .appendTo($list);
                    });
                    $list.show();
                });
            }, 250);
        });

        // Click on a suggestion
        $('#search-suggestions').on('click', 'li', function() {
            const slug = $(this).data('slug');
            window.location = '/game/' + encodeURIComponent(slug) + "/";
        });

        // Hide suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('#search-query, #search-suggestions').length) {
                $('#search-suggestions').hide();
            }
        });

        // Initial
        loadResults();
    });
</script>
</body>
</html>
