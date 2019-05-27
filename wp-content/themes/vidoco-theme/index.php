<?php
/*
	Home template default
*/
	get_header();
	?>
	<h1 style="display: none;"><?php echo bloginfo( "name" ); ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php include get_template_directory()."/block/block-category-menu-product.php"; ?>
            </div>
            <div class="col-lg-9">
                <?php
                $data_banner=get_field("hp_banner_rpt","option");
                if(count(@$data_banner) > 0){
                    ?>
                    <div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">
                        <?php
                        foreach ($data_banner as $key => $value) {
                            ?>
                            <div class="item">
                                <div style="background-image:url('<?php echo @$value["hp_banner_item"]; ?>');background-repeat: no-repeat;background-size: cover;padding-top:calc(100% / (820/315));"></div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <?php include get_template_directory()."/block/block-giam-gia-dac-biet.php"; ?>
                <div class="sach-tai-ban-hang-thang">
                    <?php include get_template_directory()."/block/block-sach-tai-ban-hang-thang.php"; ?>
                </div>
                <div class="taka-comment">
                    <?php include get_template_directory()."/block/block-y-kien-khach-hang.php"; ?>
                </div>
            </div>
            <div class="col-lg-9">
                <h2 class="giam-gia-dac-biet">Sách mới</h2>
                <?php
                $hp_sach_moi_rpt=get_field("hp_sach_moi_rpt","option");
                if(count($hp_sach_moi_rpt) > 0){
                    ?>
                    <div class="box-sach-moi">
                        <div class="owl-carousel-new-product owl-carousel owl-theme owl-loaded">
                            <?php
                            $j=0;
                            $k=0;
                            foreach ($hp_sach_moi_rpt as $key => $value) {
                                if($j % 8 == 0){
                                    echo '<div class="item">';
                                }
                                if($k % 4 ==0){
                                    echo '<div class="row">';
                                }
                                $post_id=$value["hp_sach_moi_item"];
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
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="box-product bx-pr-bottom">
                                                <div class="box-sso">
                                                    <a href="javascript:void(0);" class="a-overlay">
                                                        <?php
                                                        if((float)@$product_price_desc_percent > 0){
                                                            ?>
                                                            <div class="percent-sale">
                                                                <div class="box-cent-sale">
                                                                    -<?php echo @$product_price_desc_percent; ?>%
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="box-img">
                                                            <div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (140/218))"></div>
                                                        </div>
                                                        <div class="overlay">
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="a-add-to-cart" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="addToCart(<?php echo @$post_id; ?>,1);">
                                                        <div class="a-bg-add-to-cart">
                                                            <span><i class="fas fa-shopping-cart"></i></span>
                                                            <span class="margin-left-5 a-add-mua-ngay">Mua ngay</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="box-product-info">
                                                    <h3 class="box-product-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( $title, 55, null ); ?></a></h3>
                                                    <div class="box-product-price">
                                                        <div class="box-pr-price-1"><span><?php echo fnPrice(@$product_sale_price); ?></span><span class="margin-left-5">đ</span></div>
                                                        <?php
                                                        if((float)@$product_price_desc_percent > 0){
                                                            ?>
                                                            <div class="box-pr-price-2">-<?php echo @$product_price_desc_percent; ?>%</div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <?php
                                                    if((float)@$product_sale_price < (float)@$product_price){
                                                        ?>
                                                        <div class="box-product-price-through-margin">
                                                            <span class="bx-pr-pr-through"><span><?php echo fnPrice(@$product_price); ?></span><span class="margin-left-5">₫</span></span>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="danh-gia-bang-ngoi-sao">
                                                        <div class="ngoi-sao">
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                        </div>
                                                        <div class="number-user">
                                                            <?php echo fnPrice(@$product_count_view);  ?>
                                                        </div>
                                                        <div class="box-product-user">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div class="clr"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                }
                                $k++;
                                $j++;
                                if($k % 4 == 0 || $k == 8){
                                    echo '</div>';
                                }
                                if($j % 8 == 0 || $j == count($hp_sach_moi_rpt)){
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="bg-banner">
                    <a href="javascript:void(0);">
                        <figure>
                            <div style="background-image: url('<?php echo get_field("hp_banner_ads","option"); ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (845/250));"></div>
                        </figure>
                    </a>
                </div>
                <h2 class="giam-gia-dac-biet margin-top-20">Sách bán chạy nhất</h2>
                <?php
                $hp_sach_ban_chay_rpt=get_field("hp_sach_ban_chay_rpt","option");
                if(count(@$hp_sach_ban_chay_rpt) > 0){
                    ?>
                    <div class="box-sach-moi">
                        <div class="owl-carousel-new-product owl-carousel owl-theme owl-loaded">
                            <?php
                            $j=0;
                            $k=0;
                            foreach ($hp_sach_ban_chay_rpt as $key => $value) {
                                if($j % 8 == 0){
                                    echo '<div class="item">';
                                }
                                if($k % 4 ==0){
                                    echo '<div class="row">';
                                }
                                $post_id=$value["hp_sach_ban_chay_item"];
                                $args=array(
                                    "post_type"=>"zaproduct",
                                    "p"=>@$post_id
                                );
                                $the_query_sach_ban_chay=new WP_Query($args);
                                if($the_query_sach_ban_chay->have_posts()){
                                    while ($the_query_sach_ban_chay->have_posts()) {
                                        $the_query_sach_ban_chay->the_post();
                                        $post_id=$the_query_sach_ban_chay->post->ID;
                                        $permalink=get_the_permalink(@$post_id);
                                        $title=get_the_title(@$post_id);
                                        $excerpt=get_the_excerpt(@$post_id);
                                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                        $product_price=get_field("zaproduct_price",@$post_id);
                                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                                        ?>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="box-product bx-pr-bottom">
                                                <div class="box-sso">
                                                    <a href="javascript:void(0);" class="a-overlay">
                                                        <?php
                                                        if((float)@$product_price_desc_percent > 0){
                                                            ?>
                                                            <div class="percent-sale">
                                                                <div class="box-cent-sale">
                                                                    -<?php echo @$product_price_desc_percent; ?>%
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="box-img">
                                                            <div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (140/218))"></div>
                                                        </div>
                                                        <div class="overlay">
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)" class="a-add-to-cart" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="addToCart(<?php echo @$post_id; ?>,1);" >
                                                        <div class="a-bg-add-to-cart">
                                                            <span><i class="fas fa-shopping-cart"></i></span>
                                                            <span class="margin-left-5 a-add-mua-ngay">Mua ngay</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="box-product-info">
                                                    <h3 class="box-product-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( $title, 55, null ); ?></a></h3>
                                                    <div class="box-product-price">
                                                        <div class="box-pr-price-1"><span><?php echo fnPrice(@$product_sale_price); ?></span><span class="margin-left-5">đ</span></div>
                                                        <?php
                                                        if((float)@$product_price_desc_percent > 0){
                                                            ?>
                                                            <div class="box-pr-price-2">-<?php echo @$product_price_desc_percent; ?>%</div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="clr"></div>
                                                    </div>
                                                    <?php
                                                    if((float)@$product_sale_price < (float)@$product_price){
                                                        ?>
                                                        <div class="box-product-price-through-margin">
                                                            <span class="bx-pr-pr-through"><span><?php echo fnPrice(@$product_price); ?></span><span class="margin-left-5">₫</span></span>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="danh-gia-bang-ngoi-sao">
                                                        <div class="ngoi-sao">
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                        </div>
                                                        <div class="number-user">
                                                            <?php echo fnPrice(@$product_count_view);  ?>
                                                        </div>
                                                        <div class="box-product-user">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div class="clr"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                }
                                $k++;
                                $j++;
                                if($k % 4 == 0 || $k == 8){
                                    echo '</div>';
                                }
                                if($j % 8 == 0 || $j == count(@$hp_sach_ban_chay_rpt)){
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a href="javascript:void(0);">
                    <figure>
                        <div style="background-image: url('<?php echo get_field("hp_banner_ads_spbc_1","option"); ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (555/320));"></div>
                    </figure>
                </a>
            </div>
            <div class="col-sm-6">
                <div class="banner22">
                    <a href="javascript:void(0);">
                        <figure>
                            <div style="background-image: url('<?php echo get_field("hp_banner_ads_spbc_2","option"); ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (555/150));"></div>
                        </figure>
                    </a>
                </div>
                <div class="margin-top-20">
                    <a href="javascript:void(0);">
                        <figure>
                            <div style="background-image: url('<?php echo get_field("hp_banner_ads_spbc_3","option"); ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (555/150));"></div>
                        </figure>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2 class="giam-gia-dac-biet sach-tai-ban-hang-thang">Sách sắp xuất bản</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php
                $hp_zaproduct_featured_item=get_field("hp_zaproduct_featured_item","option");
                $post_id=$hp_zaproduct_featured_item;
                $args=array(
                    "post_type"=>"zaproduct",
                    "p"=>@$post_id
                );
                $the_query_zaproduct_featured_item=new WP_Query($args);
                if($the_query_zaproduct_featured_item->have_posts()){
                    while ($the_query_zaproduct_featured_item->have_posts()) {
                        $the_query_zaproduct_featured_item->the_post();
                        $post_id=$the_query_zaproduct_featured_item->post->ID;
                        $permalink=get_the_permalink(@$post_id);
                        $title=get_the_title(@$post_id);
                        $excerpt=get_the_excerpt(@$post_id);
                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                        $product_price=get_field("zaproduct_price",@$post_id);
                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                        ?>
                        <div class="margin-top-20">
                            <a href="<?php echo @$permalink; ?>">
                                <figure>
                                    <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (260/440));">

                                    </div>
                                </figure>
                            </a>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
                ?>
            </div>
            <div class="col-md-9">
                <?php
                $hp_zaproduct_sach_sap_xuat_ban_rpt=get_field("hp_zaproduct_sach_sap_xuat_ban_rpt","option");
                if(count($hp_zaproduct_sach_sap_xuat_ban_rpt) > 0){
                    ?>
                    <div class="box-book-sap-xuat-ban padding-top-20">
                        <div class="owl-carousel-sach-sap-xuat-ban owl-carousel owl-theme owl-loaded">
                            <?php
                            $j=0;
                            $k=0;
                            foreach ($hp_zaproduct_sach_sap_xuat_ban_rpt as $key => $value) {
                                if($j % 9 == 0){
                                    echo '<div class="item">';
                                }
                                if($k % 3 ==0){
                                    echo '<div class="row">';
                                }
                                $post_id=$value["hp_zaproduct_cot_phai_item"];
                                $args=array(
                                    "post_type"=>"zaproduct",
                                    "p"=>@$post_id
                                );
                                $the_query_sach_sap_xuat_ban=new WP_Query($args);
                                if($the_query_sach_sap_xuat_ban->have_posts()){
                                    while ($the_query_sach_sap_xuat_ban->have_posts()) {
                                        $the_query_sach_sap_xuat_ban->the_post();
                                        $post_id=$the_query_sach_sap_xuat_ban->post->ID;
                                        $permalink=get_the_permalink(@$post_id);
                                        $title=get_the_title(@$post_id);
                                        $excerpt=get_the_excerpt(@$post_id);
                                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                        $product_price=get_field("zaproduct_price",@$post_id);
                                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                                        ?>
                                        <div class="col-sm-4">
                                            <div class="sach-sap-xuat-ban-box">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="ssxb-img">
                                                            <a href="<?php echo @$permalink; ?>">
                                                                <figure>
                                                                    <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (90/120));"></div>
                                                                </figure>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h3 class="ssxp-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title,5,null ); ?></a></h3>
                                                        <div class="ngoi-sao-sp-stbht">
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                            <span><i class="far fa-star"></i></span>
                                                        </div>
                                                        <div class="ssxp-price">
                                                            <?php echo fnPrice(@$product_sale_price); ?> đ
                                                        </div>
                                                        <?php
                                                        if((float)@$product_sale_price < (float)@$product_price){
                                                            ?>
                                                            <div class="ssxp-price-line-through">
                                                                <?php echo fnPrice(@$product_price); ?> đ
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                }
                                $k++;
                                $j++;
                                if($k % 3 == 0 || $k == 9){
                                    echo '</div>';
                                }
                                if($j % 9 == 0 || $j == count($hp_zaproduct_sach_sap_xuat_ban_rpt)){
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2 class="giam-gia-dac-biet">Tuyển dụng</h2>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'id',
                    'order'   => 'DESC',
                    'posts_per_page' => 8,
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'category',
                        'field'    => 'slug',
                        'terms'    => array('tuyen-dung'),
                    ),
                  ),
                );
                $the_query_goc_tuyen_dung=new WP_Query($args);
                if($the_query_goc_tuyen_dung->have_posts()){
                    ?>
                    <div class="goc-tuyen-dung-box">
                        <div class="owl-carousel-tuyen-dung owl-carousel owl-theme owl-loaded">
                            <?php
                            while($the_query_goc_tuyen_dung->have_posts()) {
                                $the_query_goc_tuyen_dung->the_post();
                                $post_id=$the_query_goc_tuyen_dung->post->ID;
                                $permalink=get_the_permalink(@$post_id);
                                $title=get_the_title(@$post_id);
                                $excerpt=get_the_excerpt(@$post_id);
                                $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                $date_post=get_the_date( 'd/m/Y', @$post_id );
                                ?>
                                <div class="item">
                                    <div class="gtd-box">
                                        <div class="bx-gtd-img">
                                            <a href="<?php echo @$permalink; ?>">
                                                <figure>
                                                    <div style="background-image: url('<?php echo @$featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (260/170));"></div>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="bx-gtd-info">
                                            <h3 class="bx-gtd-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( $title, 15,null ); ?></a></h3>
                                            <div class="bx-gtd-date-post">
                                                <span><i class="far fa-calendar-alt"></i></span>
                                                <span class="margin-left-5"><?php echo @$date_post; ?></span>
                                            </div>
                                            <div class="bx-gtd-readmore">
                                                <a href="<?php echo @$permalink; ?>">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6">
                <h2 class="giam-gia-dac-biet">Đối tác</h2>
                <?php
                $args = array(
                    'post_type' => 'zapartner',
                    'orderby' => 'id',
                    'order'   => 'DESC',
                    'posts_per_page' => 24,
                  );
                $the_query_doi_tac=new WP_Query($args);
                if($the_query_doi_tac->have_posts()){
                    ?>
                    <div class="brand-box">
                        <div class="owl-carousel-brand owl-carousel owl-theme owl-loaded">
                            <?php
                            $j=0;
                            $k=0;
                            while($the_query_doi_tac->have_posts()) {
                                $the_query_doi_tac->the_post();
                                $post_id=$the_query_doi_tac->post->ID;
                                $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                if($j % 12 == 0){
                                    echo '<div class="item">';
                                }
                                if($k % 4==0){
                                    echo '<div class="brand-row">';
                                }
                                ?>
                                <div class="brand-item">
                                    <a href="javascript:void(0);">
                                        <figure>
                                            <div style="background-image: url('<?php echo $featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (140/140));"></div>
                                        </figure>
                                    </a>
                                </div>
                                <?php
                                $k++;
                                $j++;
                                if($k % 4==0 || $k == 12){
                                    echo '<div class="clr"></div>';
                                    echo '</div>';
                                }
                                if($j % 12 == 0 || $j == $the_query_doi_tac->post_count){
                                    echo '</div>';
                                }
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php

                }
                ?>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>