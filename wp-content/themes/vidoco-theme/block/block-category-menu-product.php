<div class="dm-menu-sach">
	<?php
	$args = array(
		'menu'              => '',
		'container'         => '',
		'container_class'   => '',
		'container_id'      => '',
		'menu_class'        => 'cateprodhorizontalright',
		'echo'              => true,
		'fallback_cb'       => 'wp_page_menu',
		'before'            => '',
		'after'             => '',
		'link_before'       => '',
		'link_after'        => '<span class="span-fa-caret-down"><i class="fas fa-chevron-right"></i></span>',
		'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'             => 3,
		'walker'            => '',
		'theme_location'    => 'dm_menu_sach' ,
		'menu_li_actived'       => 'current-menu-item',
		'menu_item_has_children'=> 'menu-item-has-children',
	);
	wp_nav_menu($args);
	?>
</div>