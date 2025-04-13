<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Privacy Policy | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/privacy-policy/";
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
                    <h5 class="page-title">Privacy Policy</h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog-page-area pd-bottom-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pd-top-50">

                <h1>Privacy Policy</h1>
                <p><strong>Effective Date:</strong> April 12, 2025<br>
                    <strong>Website:</strong> <a href="https://mmofishing.games">https://mmofishing.games</a><br>
                    <strong>Contact:</strong> <a href="mailto:info@mmofishing.games">info@mmofishing.games</a></p>

                <h2>1. Introduction</h2>
                <p>Welcome to MMO Fishing Games! Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your information when you visit our website at https://mmofishing.games.</p>

                <h2>2. Information We Collect</h2>
                <p>We may collect the following types of information:</p>
                <ul>
                    <li>Personal Information: such as your name, email address, or any details you provide via contact forms or game submissions.</li>
                    <li>Non-Personal Information: including your browser type, IP address, and site usage data collected through cookies or analytics tools.</li>
                </ul>

                <h2>3. How We Use Your Information</h2>
                <p>We use the collected information to:</p>
                <ul>
                    <li>Respond to your inquiries or support requests.</li>
                    <li>Improve website content and user experience.</li>
                    <li>Communicate updates, promotions, or news (only if you’ve opted in).</li>
                </ul>
                <p>We do not sell or rent your personal information to third parties.</p>

                <h2>4. Cookies</h2>
                <p>Our site may use cookies to enhance your experience. You can disable cookies in your browser settings if you prefer not to allow them.</p>

                <h2>5. Third-Party Services</h2>
                <p>We may use trusted third-party services like Google Analytics to analyze website traffic. These services may use cookies or similar technologies but are bound by their own privacy policies.</p>

                <h2>6. Data Security</h2>
                <p>We take reasonable steps to protect your information, but no method of transmission over the internet is 100% secure. Use the site at your own risk.</p>

                <h2>7. Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Request access to the personal data we hold about you.</li>
                    <li>Ask for corrections or deletions.</li>
                    <li>Withdraw consent for data use at any time.</li>
                </ul>
                <p>Contact us at info@mmofishing.games for any privacy-related requests.</p>

                <h2>8. Changes to This Policy</h2>
                <p>We may update this policy from time to time. Any changes will be posted on this page with a revised "Effective Date."</p>

                <p>If you have any questions about this Privacy Policy, please contact us at info@mmofishing.games.</p>
            </div>
        </div>
    </div>
</div>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
</body>
</html>