<?php

// -------------------------------

//  Load support

// -------------------------------

add_action('init','p_load_support');

function p_load_support(){

    register_nav_menus(

        array(

            "primary"    => __( "Primay Menu"),

            "footer_1"    => __( "Footer 1"),

            "footer_2"    => __( "Footer 2"),

            "footer_3"    => __( "Footer 3"),

            "footer_4"    => __( "Footer 4"),

            "dm_menu_san_pham"    => __( "Danh mục sản phẩm"),
            "dm_menu_thuong_hieu"    => __( "Danh mục thương hiệu"),

        )

    );

}

