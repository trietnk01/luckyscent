<?php
global $zController;
$zController->getController("/frontend","ProductController");
$page_id_cart = $zController->getHelper('GetPageId')->get('_wp_page_template','zcart.php');
$cart_link=get_permalink($page_id_cart );
$ssNameCart="vmart";
$ssValueCart="zcart";
$arrCart=array();
$ssCart     = $zController->getSession('SessionHelper',$ssNameCart,$ssValueCart);
$arrCart = @$ssCart->get($ssValueCart)["cart"];
$quantity=0;
if(count($arrCart) > 0){
	foreach($arrCart as $cart){
		$quantity+=(float)$cart['product_quantity'];
	}
}
$q="";
if(isset($_POST["q"])){
	$q=$_POST["q"];
}
$page_id_search_product = $zController->getHelper('GetPageId')->get('_wp_page_template','search-product.php');
$permalink_search_product=get_permalink( $page_id_search_product);
?>
<!DOCTYPE html>
<html <?php language_attributes() ?> data-user-agent="<?php echo $_SERVER['HTTP_USER_AGENT'] ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="icon" href="<?php echo get_field("setting_thong_tin_chung_favicon","option"); ?>"/>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body >
	<!-- begin fanpage -->
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=1994326743991661&autoLogAppEvents=1"></script>
	<!-- end fanpage -->
	<div class="container container-header">
		<div class="row">
			<div class="col">
				<div class="header-box">
					<div class="box-img-header">

					</div>
					<div class="box-search">
						<div class="wishlist">
							<div class="cart-header">
								<a href="<?php echo @$cart_link; ?>">
									<span><i class="fas fa-shopping-cart"></i></span>
									<span>Cart</span><span class="cart-total margin-left-5"><?php echo @$quantity; ?></span><span class="margin-left-5">Items</span>
								</a>
							</div>
						</div>
						<form class="tim-kiem-sp" name="frm_tim_kiem_sp" action="<?php echo @$permalink_search_product; ?>" method="POST">
							<div class="tim-kiem-txt"><input type="text" name="q" autocomplete="off" placeholder="Tìm kiếm sản phẩm" value="<?php echo @$_POST["q"]; ?>"></div>
							<div class="btn-search-product"><a href="javascript:void(0);" onclick="document.forms['frm_tim_kiem_sp'].submit();"><i class="fas fa-search"></i></a></div>
						</form>
					</div>
				</div>
				<div class="bradon-box">
					<div id="smoothmainmenu" class="ddsmoothmenu">
						<?php
						$args = array(
							'menu'              => '',
							'container'         => '',
							'container_class'   => '',
							'container_id'      => '',
							'menu_class'        => 'main-menu',
							'echo'              => true,
							'fallback_cb'       => 'wp_page_menu',
							'before'            => '',
							'after'             => '',
							'link_before'       => '',
							'link_after'        => '',
							'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'             => 3,
							'walker'            => '',
							'theme_location'    => 'primary' ,
							'menu_li_actived'       => 'current-menu-item',
							'menu_item_has_children'=> 'menu-item-has-children',
						);
						wp_nav_menu($args);
						?>
					</div>
					<div class="clr"></div>
					<div class="mobile-navbar">
						<nav class="navbar navbar-expand-lg navbar-light bg-light">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<?php
								$args = array(
									'menu'              => '',
									'container'         => '',
									'container_class'   => '',
									'container_id'      => '',
									'menu_class'        => 'mobile-menu',
									'echo'              => true,
									'fallback_cb'       => 'wp_page_menu',
									'before'            => '',
									'after'             => '',
									'link_before'       => '',
									'link_after'        => '',
									'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'             => 3,
									'walker'            => '',
									'theme_location'    => 'primary' ,
									'menu_li_actived'       => 'current-menu-item',
									'menu_item_has_children'=> 'menu-item-has-children',
								);
								wp_nav_menu($args);
								?>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>