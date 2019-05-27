<?php
get_header();
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$the_query_category=null;

$args = $wp_query->query;
$args['orderby']='id';
$args['order']='DESC';
$s="";
if(isset($_POST["s"])){
    $s=trim($_POST["s"]);
}
if(!empty(@$s)){
    $args["s"] =@$s;
}
$wp_query->query($args);
$the_query_category=$wp_query;
/* end set the_query */
/* start setup pagination */
$totalItemsPerPage=9;
$pageRange=3;
$currentPage=1;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];
}
$productModel->setWpQuery($the_query_category);
$productModel->setPerpage($totalItemsPerPage);
$productModel->prepare_items();
$totalItems= $productModel->getTotalItems();
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage
);
$pagination=$zController->getPagination("Pagination",$arrPagination);
/* end setup pagination */
?>
<h1 style="display: none;"><?php single_cat_title(); ?></h1>
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
            if($the_query_category->have_posts()){
                ?>
                <form class="category-box" method="POST">
                    <input type="hidden" name="filter_page" value="1" />
                    <?php
                    $k=0;
                    while ($the_query_category->have_posts()) {
                        $the_query_category->the_post();
                        $post_id=$the_query_category->post->ID;
                        $title=get_the_title($post_id);
                        $permalink=get_the_permalink($post_id);
                        $featured_img=get_the_post_thumbnail_url($post_id, 'full');
                        $excerpt=get_field("single_article_excerpt",@$post_id);
                        if((float)@$k % 3 == 0){
                            echo '<div class="row">';
                        }
                        ?>
                        <div class="col-md-4">
                            <div class="category-post">
                                <div class="category-post-img">
                                    <a href="<?php echo @$permalink; ?>">
                                        <figure>
                                            <div style="background-image: url('<?php echo $featured_img; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (260/140));"></div>
                                        </figure>
                                    </a>
                                </div>
                                <h3 class="category-post-title"><a href="<?php echo @$permalink; ?>"><?php echo wp_trim_words(@$title, 55,null ); ?></a></h3>
                                <div class="category-post-user">
                                    <span><i class="far fa-user"></i></span>
                                    <span class="margin-left-5"><?php echo get_bloginfo( 'name', 'raw' ); ?></span>
                                </div>
                                <div class="category-post-excerpt">
                                    <?php echo wp_trim_words(@$excerpt, 50,null ); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $k++;
                        if((float)@$k % 3 == 0 || $k == $the_query_category->post_count){
                            echo '</div>';
                        }
                    }
                    wp_reset_postdata();
                    ?>
                    <div class="row"><div class="col"><?php echo @$pagination->showPagination();?></div></div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>