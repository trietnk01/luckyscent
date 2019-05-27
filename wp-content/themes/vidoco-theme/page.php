<?php
get_header();
$post_id=0;
$title="";
$permalink="";
$excerpt="";
$content="";
$featured_img="";
?>
<div class="container margin-bottom-20">
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
                    $excerpt=get_field("single_page_excerpt",@$post_id);
                    $content = apply_filters('the_content',get_the_content( null, false ));
                    $featured_img=get_the_post_thumbnail_url(@$post_id, 'full');
                    $date_post=get_the_date( 'd/m/Y',@$post_id );
                }
                wp_reset_postdata();
            }
            ?>
            <div itemscope itemtype="http://schema.org/NewsArticle">
                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="https://google.com/article"/>
                <h1 class="post-title" itemprop="headline"><?php echo @$title; ?></h1>
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
</div>
<?php
get_footer();
?>