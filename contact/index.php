<?php
include "./../includes/global.php";
require_once './../bin/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./../includes/global_head.php" ?>
    <?php
    $title = "Contact | MMO Fishing Games";
    $description = "MMO Fishing Games will be reviewing fishing skills and write guides for every game we can play.";
    $url = "https://mmofishing.games/contact/";
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
                    <h5 class="page-title">Contact</h5>
                    <ul class="page-list">
                        <li><a href="/">Home</a></li>
                        <li>Contact</li>
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
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input class="form-control" type="text" id="subject" name="subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="5" cols="30" required></textarea>
                    </div>

                    <button class="btn-base btn" type="submit">Send</button>
                </form>
                <div id="msg"></div>
            </div>
        </div>
    </div>
</div>

<?php include "./../modules/footer.php" ?>
<?php include "./../includes/global_footer.php" ?>
<script type="text/javascript">
    jQuery(document).ready(function() {

        $('#contactForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '/bin/submit_contact.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function (response) {
                    if (response.status === 'success') {
                        $("#msg").text(response.message);
                        $('#contactForm')[0].reset();
                    } else {
                        $("#msg").text('Error: ' + response.message);
                    }
                },
                error: function () {
                    $("#msg").text('An error occurred while submitting the form.');
                }
            });
        });

    });
</script>
</body>
</html>