<?php
include "./includes/global.php";
require_once './bin/dbconnect.php';
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
<?php include "./includes/mobile-menu-wrap.php" ?>
<?php include "./includes/navigation-wrap.php" ?>
<?php include "./includes/mobile-menu-pull.php" ?>
<?php //include "./modules/live-news-widget.php" ?>

<?php include "./includes/footer-top-wrap.php" ?>
<?php include "./includes/footer-bottom-wrap.php" ?>
<?php include "./includes/global_footer.php" ?>
</body>
</html>