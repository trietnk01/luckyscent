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
						<a href="<?php echo site_url( '', null ); ?>">
							<div style="background-image: url('<?php echo get_field( "setting_thong_tin_chung_favicon", "option" ); ?>');background-repeat: no-repeat;background-size:cover;padding-top: calc(100% / (542/176));"></div>
						</a>
					</div>
					<div class="box-search">
						<div class="wishlist">
							<div class="tara-sign-in"><a href="javascript:void(0);">Sign In</a></div>
							<div class="tara-sign-in margin-left-5">|</div>
							<div class="tara-sign-in margin-left-5"><a href="javascript:void(0);">Wishlist</a></div>
							<div class="cart-header margin-left-5">
								<a href="javascript:void(0);">
									<span><i class="fas fa-shopping-cart"></i></span>
									<span>Cart 0 Items</span>
								</a>
							</div>
						</div>
						<form class="tim-kiem-sp" name="frm_tim_kiem_sp" action="<?php echo @$permalink_search_product; ?>" method="POST">
							<div class="tim-kiem-txt"><input type="text" name="q" autocomplete="off" placeholder="Search by Brand, Note or Keyword" value="<?php echo @$_POST["q"]; ?>"></div>
							<div class="btn-search-product"><a href="javascript:void(0);" onclick="document.forms['frm_tim_kiem_sp'].submit();"><i class="fas fa-search"></i></a></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>