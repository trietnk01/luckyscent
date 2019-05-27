<?php
$args = array(
    'menu'              => '',
    'container'         => '',
    'container_class'   => '',
    'container_id'      => '',
    'menu_class'        => 'main-category',
    'echo'              => true,
    'fallback_cb'       => 'wp_page_menu',
    'before'            => '',
    'after'             => '',
    'link_before'       => '',
    'link_after'        => '',
    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'             => 3,
    'walker'            => '',
    'theme_location'    => 'dm_author' ,
    'menu_li_actived'       => 'current-menu-item',
    'menu_item_has_children'=> 'menu-item-has-children',
);
wp_nav_menu($args);
$q="";
if(isset($_POST["q"])){
    $q=$_POST["q"];
}
$page_id_search_product = $zController->getHelper('GetPageId')->get('_wp_page_template','search-product.php');
$permalink_search_product=get_permalink( $page_id_search_product);
?>
<div class="khoang-gia">Khoảng giá</div>
<form method="POST" action="<?php echo @$permalink_search_product; ?>"  class="frm-price" name="price_form">
    <input type="hidden" name="price_min" value="2000000" />
    <input type="hidden" name="price_max" value="5000000" />
    <div id="filter-price">
    </div>
    <div class="sidebar-content-inner">
      <label for="amount">Từ:</label>
      <input type="text"  readonly id="amount">
  </div>
  <div class="btn-submit">
    <a href="javascript:void(0);" onclick="document.forms['price_form'].submit();">Tìm kiếm</a>
</div>
<div class="clr"></div>
</form>