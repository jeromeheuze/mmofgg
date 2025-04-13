<div class="footer-area bg-black pd-top-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="widget">
                    <h5 class="widget-title">ABOUT MMO Fishing</h5>
                    <div class="widget_about">
                        <p>MMO Fishing Games offers reviews and guides focused on fishing skills across a wide range of multiplayer games. Whether you're a casual angler or a pro, we cover every game we can get our hands on.</p>
                        <ul class="social-area social-area-2 mt-4">
                            <li><a class="twitter-icon" href="https://x.com/E2Prod" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube-icon" href="https://www.youtube.com/@Spectrum3900" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget widget_tag_cloud">
                    <h5 class="widget-title">TAGS</h5>
                    <div class="tagcloud">
                        <a href="/tags/albion-online/">Albion Online</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget widget_recent_post">
                    <h5 class="widget-title">POPULAR GUIDES</h5>
                    <?php
                    $query_item_g = "SELECT * FROM content WHERE active='1' AND type='guides' ORDER BY total_visits DESC LIMIT 2";
                    mysqli_set_charset($DBcon,"utf8");
                    $result_2g = $DBcon->query($query_item_g);

                    while ($row = $result_2g->fetch_assoc()) {
                    ?>
                    <div class="single-post-list-wrap style-white">
                        <div class="media">
                            <div class="media-left">
                                <img src="<?=$row['post_preview_icon'];?>" alt="img">
                            </div>
                            <div class="media-body">
                                <div class="details">
                                    <div class="post-meta-single">
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?=date("F d, Y", strtotime($row["created"]))?></li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="<?=$row['post_preview_url'];?>"><?=$row['post_preview_title'];?></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="widget widget_recent_post">
                    <h5 class="widget-title">POPULAR REVIEWS</h5>
                    <?php
                    $query_item_g = "SELECT * FROM content WHERE active='1' AND type='reviews' ORDER BY total_visits DESC LIMIT 2";
                    mysqli_set_charset($DBcon,"utf8");
                    $result_2g = $DBcon->query($query_item_g);

                    while ($row = $result_2g->fetch_assoc()) {
                    ?>
                    <div class="single-post-list-wrap style-white">
                        <div class="media">
                            <div class="media-left">
                                <img src="<?=$row['post_preview_icon'];?>" alt="img">
                            </div>
                            <div class="media-body">
                                <div class="details">
                                    <div class="post-meta-single">
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?=date("F d, Y", strtotime($row["created"]))?></li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="<?=$row['post_preview_url'];?>"><?=$row['post_preview_title'];?></a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <ul class="widget_nav_menu">
<!--                <li><a href="#">About</a></li>-->
                <li><a href="/terms/">Terms & Conditions</a></li>
                <li><a href="/privacy-policy/">Privacy Policy</a></li>
                <li><a href="/contact/">Contact</a></li>
            </ul>
            <p>Copyright ©<?=date("Y");?> MMO Fishing Games - Developed by <a href="https://heuzeproductions.com/" target="_blank">HeuzeProductions.com</a></p>
        </div>
    </div>
</div>