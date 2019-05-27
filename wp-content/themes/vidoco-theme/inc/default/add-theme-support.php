<?php
// -------------------------------
//  Load support
// -------------------------------
add_action('init','p_load_support');
function p_load_support(){
    register_nav_menus(
        array(
            "primary"    => __( "Primay Menu"),
            "dm_menu_sach"    => __( "Danh mục menu sách"),
            "dm_author"    => __( "Danh mục tác giả"),
            "content_bottom_menu_1"    => __( "Content bottom menu 1"),
            "content_bottom_menu_2"    => __( "Content bottom menu 2"),
            "content_bottom_menu_3"    => __( "Content bottom menu 3"),
        )
    );
}
