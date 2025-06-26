<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';
require_once './../admin/csrf.php';
session_start();

// Generate a token for the form
$csrfToken = generate_csrf_token();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Advertise with MMO Fishing Games";
    $description = "Reach thousands of MMO gamers passionate about in-game fishing with targeted ad placements on MMO Fishing Games.";
    $url = "https://mmofishing.games/advertisement/";
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

<!-- Page Title -->
<section class="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h5 class="page-title">Advertise with Us</h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Advertise</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Advertising Content -->
<section class="advertise-page-area pd-top-80 pd-bottom-100">
    <div class="container">
        <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
            <div class="alert alert-success" role="alert">
                Thanks! Your inquiry has been received. We’ll be in touch within 24 hours.
            </div>
        <?php endif; ?>
        <!-- Why Advertise -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <h2>Why Advertise on MMO Fishing Games?</h2>
                <p>MMO Fishing Games is the go-to directory for gamers who love virtual fishing. Our audience:</p>
                <ul>
                    <li>Over <strong>50,000</strong> monthly unique visitors</li>
                    <li><strong>70%</strong> aged 18–34, predominantly PC gamers</li>
                    <li>Highly engaged with <strong>5+ pages</strong> per session on average</li>
                    <li>Passionate about in-game gear, guides, and community events</li>
                </ul>
            </div>
        </div>

        <!-- Ad Formats & Sizes -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <h2>Ad Formats & Sizes</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Placement</th>
                            <th>Size (px)</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Header Banner</td>
                            <td>728×90</td>
                            <td>Prominent leaderboard at top of every page</td>
                        </tr>
                        <tr>
                            <td>Sidebar MPU</td>
                            <td>300×250</td>
                            <td>Mid-page ad in sidebar, visible during directory navigation</td>
                        </tr>
                        <tr>
                            <td>Inline Rectangle</td>
                            <td>336×280</td>
                            <td>Within article and game profile content</td>
                        </tr>
                        <tr>
                            <td>Mobile Banner</td>
                            <td>320×50</td>
                            <td>Responsive banner on mobile viewports</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pricing -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <h2>Pricing & Packages</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Placement</th>
                            <th>Rate (Per Month)</th>
                            <th>Notes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Header Banner</td>
                            <td>$500</td>
                            <td>Includes 1 million+ impressions</td>
                        </tr>
                        <tr>
                            <td>Sidebar MPU</td>
                            <td>$300</td>
                            <td>400,000+ impressions</td>
                        </tr>
                        <tr>
                            <td>Inline Rectangle</td>
                            <td>$250</td>
                            <td>300,000+ impressions</td>
                        </tr>
                        <tr>
                            <td>Mobile Banner</td>
                            <td>$200</td>
                            <td>250,000+ impressions</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2>Contact Us</h2>
                <p>Ready to reel in new customers? Fill out the form below and our advertising team will be in touch within 24 hours.</p>
                <form id="ad-inquiry-form" method="post" action="/bin/submit-ad-inquiry.php">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
                    <div class="mb-3">
                        <label for="company" class="form-label">Company Name</label>
                        <input type="text" id="company" name="company" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact_name" class="form-label">Contact Name</label>
                        <input type="text" id="contact_name" name="contact_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message / Requirements</label>
                        <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Inquiry</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
</body>
</html>