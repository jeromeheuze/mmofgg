<?php
// includes/rss_aggregator.php
// Simple RSS aggregator for game-specific news
// Requires SimplePie library: https://github.com/simplepie/simplepie

// 1) Load Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';
use SimplePie\SimplePie;

/**
 * Mapping of game slug to RSS feed URL
 */
function getGameFeedUrl(string $slug): ?string {
    $feeds = [
        'final-fantasy-xiv'      => 'https://na.finalfantasyxiv.com/lodestone/news/news.xml',
        'world-of-warcraft'      => null, // no official feed
        'black-desert-online'    => null, // no official feed
        'rune-scape'             => null, // no official feed
        'guild-wars-2'           => null, // no official feed
        'archeage'               => null, // no official feed
        'the-elder-scrolls-online'=> null, // no official feed
        'final-fantasy-xi'       => 'https://square-enix-games.com/en_US/rss?category=ffxi',
        'wurm-online'            => null, // no official feed
        'albion-online'          => null, // no official feed
    ];
    return $feeds[$slug] ?? null;
}

/**
 * Fetch and return feed items for a given game slug
 * @param string $slug
 * @param int $maxItems
 * @return array Array of SimplePie_Item
 */
function fetchGameNews(string $slug, int $maxItems = 5): array {
    $url = getGameFeedUrl($slug);
    if (!$url) {
        return [];
    }

    $feed = new SimplePie();
    $feed->set_feed_url($url);
    // Cache for 30 minutes
    $feed->set_cache_location(__DIR__ . '/../cache/simplepie');
    $feed->set_cache_duration(1800);
    $feed->init();
    $feed->handle_content_type();

    $items = $feed->get_items(0, $maxItems);
    return $items ?: [];
}

/**
 * Render HTML for news items
 * @param string $slug
 */
function renderGameNews(string $slug): void {
    $items = fetchGameNews($slug);
    if (empty($items)) {
        echo '<p>No news available for this game.</p>';
        return;
    }
    echo '<ul class="list-unstyled">';
    foreach ($items as $item) {
        $title = htmlspecialchars($item->get_title());
        $link  = htmlspecialchars($item->get_permalink());
        $date  = $item->get_date('F j, Y');
        echo "<li class=\"mb-3\">";
        echo "<a href=\"{$link}\" target=\"_blank\">{$title}</a> <small class=\"text-muted\">({$date})</small>";
        echo '</li>';
    }
    echo '</ul>';
}
