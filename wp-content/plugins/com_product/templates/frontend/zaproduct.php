<?php
get_header();
$post_id=0;
$title="";
$excerpt="";
$permalink="";
$featured_img="";
$source_term_id=array();
$source_thumbnail=array();
$source_tinh_trang_con_hang=array();
$product_price=0;
$product_price_desc_percent=0;
$product_sale_price=0;
$product_count_view=0;
$product_price_tiet_kiem=0;
$dich_vu_va_khuyen_mai=null;
$content=null;
?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="calo-box">
                <div class="row">
                    <div class="col">
                        <?php include get_template_directory()."/block/block-breadcrumb.php"; ?>
                    </div>
                </div>
                <?php
                if(have_posts()){
                    while (have_posts()) {
                        the_post();
                        $post_id=get_the_ID();
                        $title=get_the_title(@$post_id);
                        $excerpt=get_the_excerpt( @$post_id );
                        $content=apply_filters( "the_content", get_the_content( null, false ) );
                        $permalink=get_the_permalink( $post_id );
                        $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                        $source_term = wp_get_object_terms( @$post_id,  'za_category' );
                        if(count($source_term) > 0){
                            foreach ($source_term as $key => $value) {
                                $source_term_id[]=$value->term_id;
                            }
                        }
                        $product_price=get_field("zaproduct_price",@$post_id);
                        $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                        $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                        $product_price_tiet_kiem=(float)@$product_price - (float)@$product_sale_price;
                        $product_count_view=get_field("zaproduct_count_view",@$post_id);
                        $dich_vu_va_khuyen_mai=get_field("zaproduct_dv_km",@$post_id);
                        $source_tinh_trang_con_hang=get_field("zaproduct_tinh_trang",@$post_id);
                        $data_thumbnail=get_field("zaproduct_thumbnail_rpt",@$post_id);
                        $source_thumbnail[]=$featured_img;
                        foreach ($data_thumbnail as $key => $value) {
                            $source_thumbnail[]=$value["zaproduct_thumbnail_img"];
                        }
                    }
                    wp_reset_postdata();
                }
                ?>
                <div class="row box-rox">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="box-product-detail-image">
                                    <div class="owl-carousel-product-detail-img owl-carousel owl-theme owl-loaded">
                                        <?php
                                        foreach ($source_thumbnail as $key => $value) {
                                            ?>
                                            <div class="item">
                                                <div style="background-image: url('<?php echo @$value; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (340/490));"></div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h1 class="product-detail-title"><?php echo @$title; ?></h1>
                                <div class="product-detail-info">
                                    <span class="product-detail-info-left">Tình trạng:</span>
                                    <span class="product-detail-info-right">
                                        <?php
                                        if($source_tinh_trang_con_hang != null){
                                            echo "Còn hàng";
                                        }else{
                                            echo "Hết hàng";
                                        }
                                        ?>
                                    </span>
                                </div>
                                <?php
                                if((float)@$product_price == (float)@$product_sale_price){
                                    ?>
                                    <div class="product-detail-info">
                                        <span class="product-detail-info-left">Giá gốc:</span>
                                        <span class="product-detail-info-gia-da-giam"><?php echo fnPrice(@$product_price); ?> đ</span>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="product-detail-info">
                                        <span class="product-detail-info-left">Giá gốc:</span>
                                        <span class="product-detail-info-koala"><?php echo fnPrice(@$product_price); ?> đ</span>
                                    </div>
                                    <div class="product-detail-info">
                                        <span class="product-detail-info-left">Giá đang giảm:</span>
                                        <span class="product-detail-info-gia-da-giam"><?php echo fnPrice(@$product_sale_price); ?> đ</span>
                                    </div>
                                    <?php
                                }
                                if((float)@$product_price_desc_percent > 0){
                                    ?>
                                    <div class="product-detail-info">
                                        <span class="product-detail-info-left">Tiết kiệm:</span>
                                        <span class="product-detail-info-gia-tiet-kiem"><?php echo fnPrice((float)@$product_price_tiet_kiem); ?> đ (-<?php echo @$product_price_desc_percent ?>%)</span>
                                    </div>
                                    <?php
                                }
                                if(!empty(@$excerpt)){
                                    ?>
                                    <div class="product-detail-excerpt">
                                        <?php echo @$excerpt; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <form class="product-detail-dat-mua-ngay" name="product_mua_ngay">
                                    <div class="txt-slg">
                                        <input type="text" name="quantity" onkeypress="return isNumberKey(event);" class="quantity" placeholder="1">
                                    </div>
                                    <div class="btn-mua-ngay">
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="javascript:addToCart(<?php echo $post_id; ?>,document.getElementsByName('quantity')[0].value);">
                                            <span><i class="fas fa-shopping-cart"></i></span>
                                            <span class="margin-left-5">Mua ngay</span>
                                        </a>
                                    </div>
                                    <div class="clr"></div>
                                </form>
                                <?php
                                if(!empty($dich_vu_va_khuyen_mai)){
                                    ?>
                                    <h3 class="dv-km">Dịch vụ và khuyến mãi</h3>
                                    <div class="ul-dv-km">
                                        <?php echo @$dich_vu_va_khuyen_mai; ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="product-detail-social">
                                    <div class="social-box">
                                        <a href="<?php echo get_field("setting_thong_tin_chung_facebook","option"); ?>">
                                            <span><i class="fab fa-facebook-f"></i></span>
                                            <span class="margin-left-5">Facebook</span>
                                        </a>
                                    </div>
                                    <div class="social-box">
                                        <a href="<?php echo get_field("setting_thong_tin_chung_twitter","option"); ?>">
                                            <span><i class="fab fa-twitter"></i></span>
                                            <span class="margin-left-5">Twitter</span>
                                        </a>
                                    </div>
                                    <div class="social-box">
                                        <a href="<?php echo get_field("setting_thong_tin_chung_google_plus","option"); ?>">
                                            <span><i class="fab fa-twitter"></i></span>
                                            <span class="margin-left-5">Google+</span>
                                        </a>
                                    </div>
                                    <div class="social-box">
                                        <a href="<?php echo get_field("setting_thong_tin_chung_instagram","option"); ?>">
                                            <span><i class="fab fa-instagram"></i></span>
                                            <span class="margin-left-5">Instagram</span>
                                        </a>
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if(!empty($content)){
                            ?>
                            <div class="row">
                                <div class="col">
                                    <h2 class="product-detail-gioi-thieu-so-bo">
                                        Giới thiệu sách
                                    </h2>
                                    <div class="box-product-detail-intro">
                                        <?php echo @$content; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        $args = array(
                            'post_type' => 'zaproduct',
                            'orderby' => 'id',
                            'order'   => 'DESC',
                            'posts_per_page' => 12,
                            'post__not_in'=>array($post_id),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'za_category',
                                    'field'    => 'term_id',
                                    'terms'    => @$source_term_id,
                                ),
                            ),
                        );
                        $the_query_sp_lien_quan=new WP_Query($args);
                        if($the_query_sp_lien_quan->have_posts()){
                            ?>
                            <div class="margin-top-15">
                                <h2 class="giam-gia-dac-biet">Sách cùng loại</h2>
                                <div class="box-sach-moi">
                                    <div class="owl-carousel-new-product owl-carousel owl-theme owl-loaded">
                                        <?php
                                        $j=0;
                                        $k=0;
                                        $count=8;
                                        while ($the_query_sp_lien_quan->have_posts()) {
                                            $the_query_sp_lien_quan->the_post();
                                            $post_id=$the_query_sp_lien_quan->post->ID;
                                            $permalink=get_the_permalink(@$post_id);
                                            $title=get_the_title(@$post_id);
                                            $excerpt=get_the_excerpt(@$post_id);
                                            $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                            $product_price=get_field("zaproduct_price",@$post_id);
                                            $product_price_desc_percent=get_field("zaproduct_price_desc_percent",@$post_id);
                                            $product_sale_price=get_field("zaproduct_sale_price",@$post_id);
                                            $product_count_view=get_field("zaproduct_count_view",@$post_id);
                                            if($j % 4 == 0){
                                                echo '<div class="item">';
                                            }
                                            if($k % 4 ==0){
                                                echo '<div class="row">';
                                            }
                                            ?>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="box-product bx-pr-bottom">
                                                    <div class="box-sso">
                                                        <a href="<?php echo site_url( '', null ) ?>" class="a-overlay">
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
                                                        <a href="javascript:void(0)" class="a-add-to-cart" data-toggle="modal" data-target="#modal-alert-add-cart" onclick="addToCart(<?php echo @$post_id; ?>,1);"  >
                                                            <div class="a-bg-add-to-cart">
                                                                <span><i class="fas fa-shopping-cart"></i></span>
                                                                <span class="margin-left-5 a-add-mua-ngay">Mua ngay</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="box-product-info">
                                                        <h3 class="box-product-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words( @$title, 55, null ); ?></a></h3>
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
                                            $k++;
                                            $j++;
                                            if($k % 4 == 0 || $k == 8){
                                                echo '</div>';
                                            }
                                            if($j % 4 == 0 || $j == $the_query_sp_lien_quan->count_post){
                                                echo '</div>';
                                            }
                                        }
                                        wp_reset_postdata();
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-3">
                        <div class="margin-top-15">
                            <?php include get_template_directory()."/block/block-dm-sp.php"; ?>
                        </div>
                        <div class="sach-tai-ban-hang-thang-product-detail">
                            <?php include get_template_directory()."/block/block-sach-tai-ban-hang-thang.php"; ?>
                        </div>
                        <div class="margin-top-15">
                            <?php include get_template_directory()."/block/block-ads.php"; ?>
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