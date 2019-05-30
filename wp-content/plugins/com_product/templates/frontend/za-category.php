<?php
get_header();
$productModel=$zController->getModel("/frontend","ProductModel");
/* start set the_query */
$the_query_product=null;

$args = $wp_query->query;
$args['orderby']='id';
$args['order']='DESC';
$wp_query->query($args);
$the_query_product=$wp_query;

/* end set the_query */
/* start setup pagination */
$totalItemsPerPage=8;
$pageRange=3;
$currentPage=1;
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];
}
$productModel->setWpQuery($the_query_product);
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
<h1 style="display: none;"><?php echo get_bloginfo( 'name', 'raw' ); ?></h1>
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
                        <div class="doreco">
                            <?php include get_template_directory()."/block/block-category-menu-product-left-side.php"; ?>
                        </div>
                        <div class="doreco">
                            <?php include get_template_directory()."/block/block-khoang-gia.php"; ?>
                        </div>
                        <div class="margin-top-20">
                            <?php include get_template_directory()."/block/block-ads.php";  ?>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form name="frm_category" method="POST" class="frm-category-za">
                            <input type="hidden" name="filter_page" value="1" />
                            <h2 class="category-header"><?php single_cat_title(); ?></h2>
                            <?php require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "loop-za-category.php"; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>