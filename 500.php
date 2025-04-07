<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./includes/global_head.php" ?>
    <?php
    $title = "500 | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/500.php";
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
<?php include "./includes/mobile-menu-wrap.php" ?>
<?php include "./includes/navigation-wrap.php" ?>
<?php include "./includes/mobile-menu-pull.php" ?>

<!-- BANNER WRAP -->
<div class="banner-wrap forum-banner">
    <!-- BANNER -->
    <div class="banner grid-limit">
        <h2 class="banner-title">500 Error</h2>
        <p class="banner-sections">
            <span class="banner-section">Home</span>
            <!-- ARROW ICON -->
            <svg class="arrow-icon">
                <use xlink:href="#svg-arrow"></use>
            </svg>
            <!-- /ARROW ICON -->
            <span class="banner-section">404 Error Page</span>
        </p>
    </div>
    <!-- /BANNER -->
</div>
<!-- /BANNER WRAP -->

<!-- LAYOUT CONTENT FULL -->
<div class="layout-content-full">
    <!-- ERROR DISPLAY -->
    <div class="error-display grid-limit">
        <!-- ERROR IMG -->
        <figure class="error-img liquid">
            <img src="/img/other/error-img.png" alt="error-img">
        </figure>
        <!-- /ERROR IMG -->

        <!-- ERROR TITLE -->
        <p class="error-title">Oooooopsss!</p>
        <!-- /ERROR TITLE -->

        <!-- ERROR SUBTITLE -->
        <p class="error-subtitle">Seems that something went wrong</p>
        <!-- /ERROR SUBTITLE -->

        <!-- ERROR TEXT -->
        <p class="error-text">The page you are looking for has been moved or doesn’t exist anymore, if you like you can return to the previous page, or go to our main homepage. If the problem persists, please send us an email to <a class="highlight" href="mailto:info@pixeldiamonds.com">info@pixeldiamonds.com</a></p>
        <!-- /ERROR TEXT -->
    </div>
    <!-- /ERROR DISPLAY -->

    <!-- SECTION ACTIONS -->
    <div class="section-actions">
        <!-- BUTTON -->
        <a href="/" class="button blue">
            Go to previous page
            <!-- BUTTON ORNAMENT -->
            <div class="button-ornament">
                <!-- ARROW ICON -->
                <svg class="arrow-icon medium">
                    <use xlink:href="#svg-arrow-medium"></use>
                </svg>
                <!-- /ARROW ICON -->

                <!-- CROSS ICON -->
                <svg class="cross-icon small">
                    <use xlink:href="#svg-cross-small"></use>
                </svg>
                <!-- /CROSS ICON -->
            </div>
            <!-- /BUTTON ORNAMENT -->
        </a>
        <!-- /BUTTON -->

        <!-- BUTTON -->
        <a href="/" class="button violet">
            Go to main home
            <!-- BUTTON ORNAMENT -->
            <div class="button-ornament">
                <!-- ARROW ICON -->
                <svg class="arrow-icon medium">
                    <use xlink:href="#svg-arrow-medium"></use>
                </svg>
                <!-- /ARROW ICON -->

                <!-- CROSS ICON -->
                <svg class="cross-icon small">
                    <use xlink:href="#svg-cross-small"></use>
                </svg>
                <!-- /CROSS ICON -->
            </div>
            <!-- /BUTTON ORNAMENT -->
        </a>
        <!-- /BUTTON -->
    </div>
    <!-- /SECTION ACTIONS -->
</div>
<!-- LAYOUT CONTENT FULL -->

<?php include "./includes/footer-top-wrap.php" ?>
<?php include "./includes/footer-bottom-wrap.php" ?>
<?php include "./includes/global_footer.php" ?>
</body>
</html>