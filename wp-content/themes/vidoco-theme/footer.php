<?php
/*

Footer template

*/
?>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="footer-box">
        <div class="footer-wrapper">
          <div class="row">
            <div class="col-md-3">
              <div class="box-footer-child">
                <h3 class="box-footer-child-title"><?php echo wp_get_nav_menu_name("footer_1"); ?></h3>
                <?php
                $args = array(
                  'menu'              => '',
                  'container'         => '',
                  'container_class'   => '',
                  'container_id'      => '',
                  'menu_class'        => 'menu-footer',
                  'echo'              => true,
                  'fallback_cb'       => 'wp_page_menu',
                  'before'            => '',
                  'after'             => '',
                  'link_before'       => '',
                  'link_after'        => '',
                  'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth'             => 3,
                  'walker'            => '',
                  'theme_location'    => 'footer_1' ,
                  'menu_li_actived'       => 'current-menu-item',
                  'menu_item_has_children'=> 'menu-item-has-children',
                );
                wp_nav_menu($args);
                ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-footer-child">
                <h3 class="box-footer-child-title"><?php echo wp_get_nav_menu_name("footer_2"); ?></h3>
                <?php
                $args = array(
                  'menu'              => '',
                  'container'         => '',
                  'container_class'   => '',
                  'container_id'      => '',
                  'menu_class'        => 'menu-footer',
                  'echo'              => true,
                  'fallback_cb'       => 'wp_page_menu',
                  'before'            => '',
                  'after'             => '',
                  'link_before'       => '',
                  'link_after'        => '',
                  'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth'             => 3,
                  'walker'            => '',
                  'theme_location'    => 'footer_2' ,
                  'menu_li_actived'       => 'current-menu-item',
                  'menu_item_has_children'=> 'menu-item-has-children',
                );
                wp_nav_menu($args);
                ?>
                <div class="connect-with-us">
                  <h4 class="conntect-with-us-title">Connect with us</h4>
                  <ul class="iconsocialbg" itemscope itemtype="http://schema.org/Organization">
                    <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_facebook","option"); ?>"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_twitter","option"); ?>"><i class="fab fa-twitter"></i></a></li>
                    <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_google_plus","option"); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_instagram","option"); ?>"><i class="fab fa-instagram"></i></a></li>
                    <li><a itemprop="sameAs" href="<?php echo get_field("setting_thong_tin_chung_youtube","option"); ?>"><i class="fab fa-youtube"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-footer-child">
                <h3 class="box-footer-child-title">Visit Our Stores</h3>
                <ul class="company-info">
                  <li>
                    <span class="icon-info"><i class="fas fa-map-marker-alt"></i></span>
                    <span class="company-text-info"><?php echo get_field("setting_thong_tin_chung_address","option"); ?></span>
                  </li>
                  <li class="margin-top-10">
                    <span class="icon-info"><i class="fas fa-mobile-alt"></i></span>
                    <span class="company-text-info-2"><a href="tel:<?php echo get_field("setting_thong_tin_chung_call_now","option"); ?>"><?php echo get_field("setting_thong_tin_chung_hotline","option"); ?></a></span>
                  </li>
                  <li class="margin-top-10">
                    <span class="icon-info"><i class="far fa-envelope"></i></span>
                    <span class="company-text-info-2"><a href="mailto:<?php echo get_field("setting_thong_tin_chung_email","option"); ?>"><?php echo get_field("setting_thong_tin_chung_email","option"); ?></a></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-footer-child">
                <h3 class="box-footer-child-title"><?php echo wp_get_nav_menu_name("footer_4"); ?></h3>
                <?php
                $args = array(
                  'menu'              => '',
                  'container'         => '',
                  'container_class'   => '',
                  'container_id'      => '',
                  'menu_class'        => 'menu-footer',
                  'echo'              => true,
                  'fallback_cb'       => 'wp_page_menu',
                  'before'            => '',
                  'after'             => '',
                  'link_before'       => '',
                  'link_after'        => '',
                  'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                  'depth'             => 3,
                  'walker'            => '',
                  'theme_location'    => 'footer_4' ,
                  'menu_li_actived'       => 'current-menu-item',
                  'menu_item_has_children'=> 'menu-item-has-children',
                );
                wp_nav_menu($args);
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright-box">
        <span>&copy;</span><span class="margin-left-5">Luckyscent Inc. All Rights Reserved</span>
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-add-cart" id="modal-alert-add-cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="com-product-modal-title">Thông báo</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
<div class="scrollTop">
    <a href="javascript:void(0);"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
 </div>
<?php
wp_footer();
?>
</body>
</html>
