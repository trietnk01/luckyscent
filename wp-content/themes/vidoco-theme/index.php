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
                                                        <div class="box-big-featured-product">
                                                            <div class="box-featured-title-wrapper"><h3 class="box-featured-title"><?php echo wp_trim_words( @$title, 10, "[...]") ?></h3></div>
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
                            <?php
                            $hp_featured_category_title_rpt=get_field("hp_featured_category_title_rpt","option");
                            if(count(@$hp_featured_category_title_rpt) > 0){
                                ?>
                                <div class="product-category-box">
                                    <?php
                                    foreach ($hp_featured_category_title_rpt as $value_1) {
                                        $title_1=$value_1["hp_featured_category_title_item"];
                                        $hp_featured_category_product_rpt=$value_1["hp_featured_category_product_rpt"];
                                        ?>
                                        <div class="product-guilta">
                                            <h2 class="product-category-guilta-title"><?php echo wp_trim_words( @$title_1, 8, "[...]" ); ?></h2>
                                            <?php
                                            if(count(@$hp_featured_category_product_rpt) > 0){
                                                ?>
                                                <div class="owl-carousel-featured-product-category owl-carousel owl-theme owl-loaded">
                                                    <?php
                                                    foreach ($hp_featured_category_product_rpt as $value_2) {
                                                        $post_id=$value_2["hp_featured_category_product_item"];
                                                        $args=array(
                                                            "post_type"=>"zaproduct",
                                                            "p"=>@$post_id
                                                        );
                                                        $the_query_cate_featured_product=new WP_Query($args);
                                                        if($the_query_cate_featured_product->have_posts()){
                                                            while ($the_query_cate_featured_product->have_posts()){
                                                                $the_query_cate_featured_product->the_post();
                                                                $post_id=$the_query_cate_featured_product->post->ID;
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
                                                                    <div class="magento">
                                                                        <div>
                                                                            <a href="<?php echo @$permalink; ?>">
                                                                                <figure>
                                                                                    <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600/863));"></div>
                                                                                </figure>
                                                                            </a>
                                                                        </div>
                                                                        <h4 class="magento-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,8,"[...]" ); ?></a></h4>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            wp_reset_postdata();
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            $hp_featured_video_rpt=get_field("hp_featured_video_rpt","option");
                            if(count(@$hp_featured_video_rpt) > 0){
                                ?>
                                <div class="box-videos">
                                    <h2 class="sent-bar-video-review">Video</h2>
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
                                                                    <div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (359/199));">

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