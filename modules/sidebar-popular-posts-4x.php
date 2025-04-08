<!-- WIDGET SIDEBAR -->
<div class="widget-sidebar">
    <!-- SECTION TITLE WRAP -->
    <div class="section-title-wrap blue">
        <h2 class="section-title medium">Popular Posts</h2>
        <div class="section-title-separator"></div>
    </div>
    <!-- /SECTION TITLE WRAP -->

    <!-- POST PREVIEW SHOWCASE -->
    <div class="post-preview-showcase grid-1col centered gutter-small">
        <?php
        $query_post4x = "SELECT * FROM content WHERE active='1' ORDER BY total_visits DESC LIMIT 4";
        mysqli_set_charset($DBcon,"utf8");
        $result_post4x = $DBcon->query($query_post4x);
        while ($row = $result_post4x->fetch_assoc()) {
        ?>
        <div class="post-preview tiny gaming-news">
            <a href="<?=$row["post_preview_url"]?>">
                <div class="post-preview-img-wrap">
                    <figure class="post-preview-img liquid">
                        <img src="<?=$row["post_preview_icon"]?>" alt="<?=$row["post_preview_title"]?>">
                    </figure>
                </div>
            </a>
            <a href="<?=$row["post_preview_url"]?>" class="post-preview-title"><?=$row["post_preview_title"]?></a>
            <div class="post-author-info-wrap">
                <p class="post-author-info small light">
                    By <span class="post-author"><?=$row["post_author"]?></span>
                    <span class="separator">|</span><?=$row["created"]?>
                </p>
            </div>
        </div>
        <?php
        }
        $result_post4x->free_result();
        ?>
    </div>
    <!-- /POST PREVIEW SHOWCASE -->
</div>
<!-- /WIDGET SIDEBAR -->