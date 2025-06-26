<!-- navbar start -->
<?php
// At top of your navbar include (before the <nav>), fetch distinct values:
$nav_platforms = $DBcon->query("SELECT DISTINCT platform FROM games ORDER BY platform");
$nav_models    = $DBcon->query("SELECT DISTINCT model    FROM games ORDER BY model");
$nav_styles    = $DBcon->query("SELECT DISTINCT fishing_style FROM games ORDER BY fishing_style");
?>
<nav class="navbar navbar-sticky navbar-expand-lg">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo d-lg-none d-block">
                <a class="main-logo" href="/"><img src="/assets/img/logo.png" alt="MMO Fishing Games"></a>
            </div>
            <button class="menu toggle-btn d-block d-lg-none" data-target="#nextpage_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>
<!--        <div class="nav-right-part nav-right-part-mobile">-->
<!--            <a class="search header-search" href="#"><i class="fa fa-search"></i></a>-->
<!--        </div>-->
        <div class="collapse navbar-collapse" id="nextpage_main_menu">
            <ul class="navbar-nav menu-open">
                <li class="menu-item current-menu-item">
                    <a href="/">Home</a>
                </li>
                <li class="menu-item current-menu-item">
                    <a href="/directory/">Directory</a>
                </li>
                <!-- Platforms -->
                <li class="menu-item-has-children">
                    <a href="#">Platforms</a>
                    <ul class="sub-menu">
                        <?php while ($row = $nav_platforms->fetch_assoc()): ?>
                            <li>
                                <a href="/directory/?platform[]=<?= urlencode($row['platform']) ?>">
                                    <?= htmlspecialchars($row['platform']) ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <!-- Business Models -->
                <li class="menu-item-has-children">
                    <a href="#">Business Model</a>
                    <ul class="sub-menu">
                        <?php while ($row = $nav_models->fetch_assoc()): ?>
                            <li>
                                <a href="/directory/?model[]=<?= urlencode($row['model']) ?>">
                                    <?= htmlspecialchars($row['model']) ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
                <!-- Fishing Styles -->
                <li class="menu-item-has-children">
                    <a href="#">Fishing Style</a>
                    <ul class="sub-menu">
                        <?php while ($row = $nav_styles->fetch_assoc()): ?>
                            <li>
                                <a href="/directory/?fishing_style[]=<?= urlencode($row['fishing_style']) ?>">
                                    <?= htmlspecialchars($row['fishing_style']) ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop">
<!--            <div class="menu-search-inner">-->
<!--                <input type="text" placeholder="Search For">-->
<!--                <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>-->
<!--            </div>-->
        </div>
    </div>
</nav>
<!-- navbar end -->