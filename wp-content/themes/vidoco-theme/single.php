<?php
get_header();
$post_id=0;
$title="";
$permalink="";
$excerpt="";
$content="";
$featured_img="";
$source_term_id=array();
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
                <div class="row">
                    <div class="col-lg-3">
                        <div class="box-tin-moi"><?php include get_template_directory()."/block/block-tin-moi.php"; ?></div>
                        <?php include get_template_directory()."/block/block-ads.php";?>
                    </div>
                    <div class="col-lg-9">
                        <?php
                        if(have_posts()){
                            while (have_posts()) {
                                the_post();
                                $post_id= get_the_id();
                                $title=get_the_title(@$post_id);
                                $permalink=get_the_permalink( @$post_id );
                                $excerpt=get_field("single_article_excerpt",@$post_id);
                                $content=apply_filters( "the_content", get_the_content( null,false ) );
                                $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                $source_term = wp_get_object_terms( $post_id,  'category' );
                                if(count($source_term) > 0){
                                    foreach ($source_term as $key => $value) {
                                        $source_term_id[]=$value->term_id;
                                    }
                                }
                            }
                            wp_reset_postdata();
                        }
                        ?>
                        <div itemscope itemtype="http://schema.org/NewsArticle" class="box-single-article">
                            <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
                            <h1 class="post-title" itemprop="headline"><?php echo @$title; ?></h1>
                            <h2 style="display: none;"><?php echo get_bloginfo( 'name', 'raw' ); ?></h2>
                            <!-- begin schema -->
                            <p style="display: none;" itemprop="author" itemscope itemtype="https://schema.org/Person"> By <span itemprop="name">DienKim</span>
                            </p>
                            <p style="display: none;" itemprop="description"><?php echo @$title; ?></p>
                            <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" style="display: none;">
                                <img src="<?php echo @$featured_img; ?>"/>
                                <meta itemprop="url" content="<?php echo @$featured_img; ?>">
                                <meta itemprop="width" content="800">
                                <meta itemprop="height" content="800">
                            </div>
                            <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style="display: none;">
                                <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                                    <img src="<?php echo @$featured_img; ?>"/>
                                    <meta itemprop="url" content="<?php echo @$featured_img; ?>">
                                    <meta itemprop="width" content="600">
                                    <meta itemprop="height" content="60">
                                </div>
                                <meta itemprop="name" content="Google">
                            </div>
                            <meta itemprop="datePublished" content="2015-02-05T08:00:00+08:00" style="display: none;" />
                            <meta itemprop="dateModified" content="2015-02-05T09:20:00+08:00" style="display: none;" />
                            <!-- end schema -->
                            <div class="post-user-date">
                                <span><i class="far fa-user"></i></span>
                                <span class="margin-left-5"><?php echo get_bloginfo( 'name','raw' ); ?></span>
                                <span class="margin-left-5">-</span>
                                <span class="margin-left-5"><i class="far fa-calendar-alt"></i></span>
                                <span class="margin-left-5"><?php echo @$date_post; ?></span>
                            </div>
                            <?php
                            if(!empty(@$excerpt)){
                                ?>
                                <div class="post-excerpt"><?php echo @$excerpt; ?></div>
                                <?php
                            }
                            ?>
                            <div class="post-content">
                                <?php
                                echo @$content;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'orderby' => 'id',
                    'order'   => 'DESC',
                    'posts_per_page' => 6,
                    'post__not_in'=>array($post_id),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'term_id',
                            'terms'    => @$source_term_id,
                        ),
                    ),
                );
                $the_query_related_news=new WP_Query($args);
                if($the_query_related_news->have_posts()){
                    ?>
                    <div class="txnnhat-tuan">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <h2 class="tin-xem-nhieu-nhat-tuan">Tin liên quan</h2>
                                </div>
                            </div>
                            <div class="margin-top-10">
                                <?php
                                $k=0;
                                while($the_query_related_news->have_posts()){
                                    $the_query_related_news->the_post();
                                    $post_id=$the_query_related_news->post->ID;
                                    $permalink=get_the_permalink(@$post_id);
                                    $title=get_the_title(@$post_id);
                                    $excerpt=get_the_excerpt(@$post_id);
                                    $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                                    $date_post=get_the_date( 'd/m/Y', @$post_id );
                                    if($k%3==0){
                                        echo '<div class="row">';
                                    }
                                    ?>
                                    <div class="col-md-4">
                                        <div class="box-tnntuan">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <a href="<?php echo @$permalink; ?>">
                                                        <figure>
                                                            <div style="background-image: url('<?php echo @$featured_img; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (130/70));"></div>
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="col-sm-8">
                                                    <h3 class="tin-xem-nhieu-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title,55, null ); ?></a></h3>
                                                    <div class="tin-xem-nhieu-date-post">
                                                        <span><?php echo @$date_post; ?></span>
                                                        <span class="margin-left-5">-</span>
                                                        <span class="margin-left-5">22 lượt xem</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $k++;
                                    if($k%3==0 || $k==$the_query_related_news->post_count){
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
        </div>
    </div>
</div>
<?php
get_footer();
?>