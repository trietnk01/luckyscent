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
                                                    <img src="<?php echo @$value["hp_banner_item"]; ?>" alt="<?php echo get_bloginfo( 'name', 'raw' ); ?>">
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
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'orderby' => 'id',
                                'order'   => 'DESC',
                                'posts_per_page' => 6,
                            );
                            $the_query_hot_news=new WP_Query($args);
                            if($the_query_hot_news->have_posts()){
                                ?>
                                <div class="nutrifood">
                                    <div class="just-arrived"><a href="javascript:void(0);"><span>Tin tiêu điểm</span><span class="chevron-right-just-arrived"><i class="fas fa-chevron-right"></i></span></a></div>
                                    <?php
                                    while($the_query_hot_news->have_posts()){
                                        $the_query_hot_news->the_post();
                                        $post_id=$the_query_hot_news->post->ID;
                                        $permalink=get_the_permalink(@$post_id);
                                        $title=get_the_title(@$post_id);
                                        $date_post=get_the_date( 'd/m/Y', @$post_id );
                                        ?>
                                        <div class="ruby-box">
                                            <div class="spring-fling-1"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 6,"[...]"); ?></a></div>
                                            <div class="spring-fling-2">
                                                <div class="dong-ho">
                                                    <span><i class="far fa-clock"></i></span><span class="margin-left-5"><?php echo @$date_post; ?></span><span class="margin-left-5"><i class="far fa-heart"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    $term_article=get_term_by( "slug", "tin-tuc", 'category', OBJECT, 'raw' );
                                    $term_article_link=get_term_link( $term_article, 'category' );
                                    ?>
                                    <div class="just-arrived-2"><a href="<?php echo @$term_article_link; ?>"><span>Xem thêm</span><span class="chevron-right-just-arrived"><i class="fas fa-chevron-right"></i></span></a></div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    $hp_featured_product_rpt=get_field("hp_featured_product_rpt","option");
                    if(count(@$hp_featured_product_rpt) > 0){
                        ?>
                        <div class="row margin-top-40">
                            <div class="col">
                                <h2 class="sp-noi-bat">
                                    Dòng sản phẩm nổi bật
                                </h2>
                                <div class="owl-carousel-sale-off-on-day owl-carousel owl-theme owl-loaded">
                                    <?php
                                    foreach ($hp_featured_product_rpt as $key => $value){
                                        $post_id=$value["hp_featured_product_item"];
                                        $args=array(
                                            "post_type"=>"zaproduct",
                                            "p"=>@$post_id
                                        );
                                        $the_query_featured_product=new WP_Query($args);
                                        if($the_query_featured_product->have_posts()){
                                            while ($the_query_featured_product->have_posts()) {
                                                $the_query_featured_product->the_post();
                                                $post_id=$the_query_featured_product->post->ID;
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
                                                    <div class="sale-off-on-day-box-item">
                                                        <div class="sale-off-box-hinh-tron">
                                                            <a href="<?php echo @$permalink; ?>">
                                                                <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>" style="width:150px;">
                                                            </a>
                                                            <?php
                                                            if(floatval(@$product_price_desc_percent) > 0){
                                                                ?>
                                                                <div class="sale-off-box">
                                                                    <div class="sale-off-txt">Sale off</div>
                                                                    <div class="sale-off-number"><?php echo floatval(@$product_price_desc_percent) ; ?>%</div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <h3 class="sale-off-on-day-title">
                                                            <a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, "[...]" ) ?></a>
                                                            <div class="post-kk-star-rating">
                                                                <?php echo do_shortcode( "[ratings]" ); ?>
                                                            </div>
                                                        </h3>
                                                        <div class="sale-off-on-day-price">
                                                            <span class="sale-off-on-day-sale-price"><?php echo fnPrice(@$product_sale_price) ; ?> ₫</span>
                                                            <?php
                                                            if(floatval(@$product_price) > floatval(@$product_sale_price)){
                                                                ?>
                                                                <span class="sale-off-on-day-sale-original-price"><?php echo fnPrice(@$product_price); ?> ₫</span>
                                                                <?php
                                                            }
                                                            ?>
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
                        <?php
                    }
                    $hp_za_category_rpt=get_field("hp_za_category_rpt","option");
                    if(count(@$hp_za_category_rpt) > 0){

                        foreach ($hp_za_category_rpt as $key => $value) {
                            $za_category_id=$value["hp_za_category_item"];
                            $za_category_item=get_term_by( "id",floatval(@$za_category_id), 'za_category', OBJECT,'raw' );
                            ?>
                            <div class="row sp-theo-chuyen-muc">
                                <div class="col">
                                    <h2 class="sp-noi-bat"><?php echo @$za_category_item->name; ?></h2>
                                    <?php
                                    $args=array(
                                        "post_type"=>"zaproduct",
                                        "orderby"=>"id",
                                        "order"=>"DESC",
                                        "post_per_page"=>-1,
                                        "tax_query"=>array(
                                            array(
                                                'taxonomy' => 'za_category',
                                                'field'    => 'term_id',
                                                'terms'    => array(@$za_category_item->term_id),
                                            )
                                        )
                                    );
                                    $the_query_spcm=new WP_Query(@$args);
                                    if($the_query_spcm->have_posts()){
                                        ?>
                                        <div class="owl-carousel-sale-off-on-day owl-carousel owl-theme owl-loaded">
                                            <?php
                                            while ($the_query_spcm->have_posts()) {
                                                $the_query_spcm->the_post();
                                                $post_id=$the_query_spcm->post->ID;
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
                                                    <div class="sale-off-on-day-box-item">
                                                        <div class="sale-off-box-hinh-tron">
                                                            <a href="<?php echo @$permalink; ?>">
                                                                <img src="<?php echo @$featured_img; ?>" alt="<?php echo @$title; ?>" style="width:150px;">
                                                            </a>
                                                            <?php
                                                            if(floatval(@$product_price_desc_percent) > 0){
                                                                ?>
                                                                <div class="sale-off-box">
                                                                    <div class="sale-off-txt">Sale off</div>
                                                                    <div class="sale-off-number"><?php echo floatval(@$product_price_desc_percent) ; ?>%</div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <h3 class="sale-off-on-day-title">
                                                            <a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, "[...]" ) ?></a>
                                                            <div class="post-kk-star-rating">
                                                                <?php echo do_shortcode( "[ratings]" ); ?>
                                                            </div>
                                                        </h3>
                                                        <div class="sale-off-on-day-price">
                                                            <span class="sale-off-on-day-sale-price"><?php echo fnPrice(@$product_sale_price) ; ?> ₫</span>
                                                            <?php
                                                            if(floatval(@$product_price) > floatval(@$product_sale_price)){
                                                                ?>
                                                                <span class="sale-off-on-day-sale-original-price"><?php echo fnPrice(@$product_price); ?> ₫</span>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        wp_reset_postdata();
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="row sp-theo-chuyen-muc">
                        <div class="col">
                            <?php
                            $hp_featured_video_rpt=get_field("hp_featured_video_rpt","option");
                            if(count(@$hp_featured_video_rpt) > 0){
                                ?>
                                <div class="box-videos">
                                    <h2 class="sp-noi-bat">Video</h2>
                                    <div class="box-video-wrapper">
                                        <div class="owl-carousel-featured-videos owl-carousel owl-theme owl-loaded">
                                            <?php
                                            foreach ($hp_featured_video_rpt as $value) {
                                                $post_id=$value["hp_featured_video_item"];
                                                $args=array(
                                                    "post_type"=>"zavideo",
                                                    "p"=>@$post_id
                                                );
                                                $the_query_featured_video=new WP_Query($args);
                                                if($the_query_featured_video->have_posts()){
                                                    while ($the_query_featured_video->have_posts()){
                                                        $the_query_featured_video->the_post();
                                                        $post_id=$the_query_featured_video->post->ID;
                                                        $permalink=get_the_permalink(@$post_id);
                                                        $title=get_the_title(@$post_id);
                                                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                                        $video_id=get_field("video_id",@$post_id);
                                                        ?>
                                                        <div class="item">
                                                            <div class="video-pin-box">
                                                                <a href="javascript:void(0);" class="js-modal-btn" data-video-id="<?php echo @$video_id; ?>">
                                                                    <img src="<?php echo @$featured_img; ?>" alt="<?php echo get_bloginfo( 'name','raw' ); ?>">
                                                                    <div class="overlay-youtube">
                                                                    </div>
                                                                    <div class="youtube-icon">
                                                                        <div class="box-youtube-icon">
                                                                            <div class="youtube-icon-xidu"></div>
                                                                        </div>
                                                                    </div>
                                                                </a>
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
                                <?php
                            }
                            $hp_single_featured_article_item=get_field("hp_single_featured_article_item","option");
                            $args=array(
                                "post_type"=> "post",
                                "p"=>@$hp_single_featured_article_item
                            );
                            $the_query_single_featured_article_item=new WP_Query($args);
                            if($the_query_single_featured_article_item->have_posts()){
                                while($the_query_single_featured_article_item->have_posts()){
                                    $the_query_single_featured_article_item->the_post();
                                    $post_id=$the_query_single_featured_article_item->post->ID;
                                    $permalink=get_the_permalink(@$post_id);
                                    $title=get_the_title(@$post_id);
                                    $date_post=get_the_date( 'd/m/Y', @$post_id );
                                    ?>
                                    <div class="box-featured-article">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a href="<?php echo @$permalink; ?>">
                                                    <figure>
                                                        <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (327/225))"></div>
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="box-featured-info">
                                                    <h3 class="box-featured-article-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title, 55,"[...]" ); ?> </a></h3>
                                                    <div class="box-featured-excerpt">
                                                        <?php echo  wp_trim_words(@$excerpt,100, "[...]" ); ?>
                                                    </div>
                                                    <div class="box-featured-learn-more">
                                                        <a href="<?php echo @$permalink; ?>"><span>Xem tiếp</span><span class="margin-left-5">></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                wp_reset_postdata();
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>