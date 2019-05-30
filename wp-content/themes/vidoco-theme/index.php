<?php
/*
	Home template default
*/
	get_header();
	?>
	<h1 style="display: none;"><?php echo bloginfo( "name" ); ?></h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="calo-box">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="slide-home-page">
                                <?php
                                $data_banner=get_field("hp_banner_rpt","option");{
                                    if (count(@$data_banner) > 0) {
                                        ?>
                                        <div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">
                                            <?php
                                            foreach ($data_banner as $key => $value) {
                                                ?>
                                                <div class="item">
                                                    <div style="background-image:url('<?php echo @$value["hp_banner_item"]; ?>');background-repeat: no-repeat;background-size: cover;padding-top:calc(100% / (809/431));"></div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nutrifood">
                                <div class="just-arrived"><a href="javascript:void(0);"><span>Just Arrived</span><span class="chevron-right-just-arrived"><i class="fas fa-chevron-right"></i></span></a></div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Spring Fling 2019</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Shop our guide" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Bananas!</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("L'artisan Bana Banana" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">The anti-stress fragrance:</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Functional Fragrance" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Your scent, on the go:</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Sen7 travel atomizers" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Pure & Natural body wash:</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("New: Alpine Provisions" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">A brilliant natural deodorant</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Introducing: Corpus" ,10, null ); ?> </a></div>
                                </div>
                                <div class="just-arrived-2"><a href="javascript:void(0);"><span>All New Addition</span><span class="chevron-right-just-arrived"><i class="fas fa-chevron-right"></i></span></a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $hp_featured_product_rpt=get_field("hp_featured_product_rpt","option");
                    if(count(@$hp_featured_product_rpt) > 0){
                        ?>
                        <div class="row">
                            <div class="col">
                                <div class="product-featured">
                                    <div class="owl-carousel-featured-product owl-carousel owl-theme owl-loaded">
                                        <?php
                                        foreach ($hp_featured_product_rpt as $value) {
                                            $post_id=$value["hp_featured_product_item"];
                                            $args=array(
                                                "post_type"=>"zaproduct",
                                                "p"=>@$post_id
                                            );
                                            $the_query_sach_moi=new WP_Query($args);
                                            if($the_query_sach_moi->have_posts()){
                                                while ($the_query_sach_moi->have_posts()) {
                                                    $the_query_sach_moi->the_post();
                                                    $post_id=$the_query_sach_moi->post->ID;
                                                    $permalink=get_the_permalink(@$post_id);
                                                    $title=get_the_title(@$post_id);
                                                    $excerpt=get_the_excerpt(@$post_id);
                                                    $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                                    $product_price=get_field("zaproduct_price",@$post_id);
                                                    $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                                                    $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                                                    $product_count_view=get_field("zaproduct_count_view",@$post_id);
                                                    ?>
                                                    <div class="item">
                                                        <div class="box-big-featured-product">
                                                            <div class="box-featured-title-wrapper"><h3 class="box-featured-title"><?php echo wp_trim_words( @$title, 10, null ) ?></h3></div>
                                                            <div class="box-featured-product">
                                                                <a href="<?php echo @$permalink; ?>">
                                                                    <figure>
                                                                        <div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (240/200));"></div>
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                wp_reset_postdata();
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col">
                            <div class="product-category-box">
                                <?php
                                for ($j=0; $j < 2; $j++) {
                                    ?>
                                    <div class="product-guilta">
                                        <h2 class="product-category-guilta-title">New & Noteworthy</h2>
                                        <div class="owl-carousel-featured-product-category owl-carousel owl-theme owl-loaded">
                                            <?php
                                            for ($i=0;$i<12;$i++) {
                                                ?>
                                                <div class="item">
                                                    <div class="magento">
                                                        <div>
                                                            <a href="javascript:void(0);">
                                                                <figure>
                                                                    <div style="background-image: url('<?php echo wp_upload_dir()["url"]."/73217.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600/863));"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                        <h4 class="magento-title"><a href="javascript:void(0);"><?php echo wp_trim_words( "Sundazed",55,null ); ?></a></h4>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="box-videos">
                                <h2 class="sent-bar-video-review">Video</h2>
                                <div class="box-video-wrapper">
                                    <div class="owl-carousel-featured-videos owl-carousel owl-theme owl-loaded">
                                        <?php
                                        for ($i=0;$i<12;$i++) {
                                            ?>
                                            <div class="item">
                                                <div class="video-pin-box">
                                                    <a href="javascript:void(0);" class="js-modal-btn" data-video-id="jkAsbMkLnWo">
                                                        <div style="background-image: url('<?php echo wp_upload_dir()["url"]."/vid-home1.jpg"; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (359/199));">

                                                        </div>
                                                        <div class="overlay-youtube">
                                                        </div>
                                                        <div class="youtube-icon">
                                                            <div class="box-youtube-icon">
                                                                <div style="background-image: url('<?php echo wp_get_upload_dir()["url"].'/youtube-icon.png'; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (48/48));"></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="box-featured-article">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="javascript:void(0);">
                                            <figure>
                                                <div style="background-image: url('<?php echo wp_upload_dir()["url"]."/1680Outside2.jpg" ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (327/225))"></div>
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="box-featured-info">
                                            <h3 class="box-featured-article-title"><a href="javascript:void(0);"><?php echo wp_trim_words( "Come In For a Visit!", 55,null ); ?> </a></h3>
                                            <div class="box-featured-excerpt">
                                                <?php echo  wp_trim_words( "Browse the whole shop, including candles, home scent, bath and body and...of course...fragrances. Indulge in a scent consultation...or let us perform one for you online. Either way...we'll help you find something that fits. No need to be intimidated, fragrance should be fun...and it is, at Scent Bar. Now in Hollywood and downtown Los Angeles. ", 55, null ); ?>
                                            </div>
                                            <div class="box-featured-learn-more">
                                                <a href="javascript:void(0);"><span>Xem tiếp</span><span class="margin-left-5">></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>