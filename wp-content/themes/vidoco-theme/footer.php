<?php
/*

Footer template

*/
?>
<div class="content-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="box-logo">
                    <a href="<?php echo site_url( '', null ); ?>">
                        <figure><div style="background-image: url('<?php echo get_field("setting_thong_tin_chung_logo_footer","option"); ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (217/47));"></div></figure>
                    </a>
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
            <div class="col-md-2">
                <h3 class="content-bottom-footer-title">Thông tin</h3>
                <?php
                $args = array(
                    'menu'              => '',
                    'container'         => '',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'content-bottom-menu',
                    'echo'              => true,
                    'fallback_cb'       => 'wp_page_menu',
                    'before'            => '',
                    'after'             => '',
                    'link_before'       => '<span class="cevron-right"><i class="fas fa-chevron-right"></i></span>',
                    'link_after'        => '',
                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'             => 3,
                    'walker'            => '',
                    'theme_location'    => 'content_bottom_menu_1' ,
                    'menu_li_actived'       => 'current-menu-item',
                    'menu_item_has_children'=> 'menu-item-has-children',
                );
                wp_nav_menu($args);
                ?>
            </div>
            <div class="col-md-2">
                <h3 class="content-bottom-footer-title">Chính sách</h3>
                <?php
                $args = array(
                    'menu'              => '',
                    'container'         => '',
                    'container_class'   => '',
                    'container_id'      => '',
                    'menu_class'        => 'content-bottom-menu',
                    'echo'              => true,
                    'fallback_cb'       => 'wp_page_menu',
                    'before'            => '',
                    'after'             => '',
                    'link_before'       => '<span class="cevron-right"><i class="fas fa-chevron-right"></i></span>',
                    'link_after'        => '',
                    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'             => 3,
                    'walker'            => '',
                    'theme_location'    => 'content_bottom_menu_2' ,
                    'menu_li_actived'       => 'current-menu-item',
                    'menu_item_has_children'=> 'menu-item-has-children',
                );
                wp_nav_menu($args);
                ?>
            </div>
            <div class="col-md-5">
                <div class="dieu-khoan-box">
                    <h3 class="content-bottom-footer-title">Điều khoản</h3>
                    <?php
                    $args = array(
                        'menu'              => '',
                        'container'         => '',
                        'container_class'   => '',
                        'container_id'      => '',
                        'menu_class'        => 'content-bottom-menu',
                        'echo'              => true,
                        'fallback_cb'       => 'wp_page_menu',
                        'before'            => '',
                        'after'             => '',
                        'link_before'       => '<span class="cevron-right"><i class="fas fa-chevron-right"></i></span>',
                        'link_after'        => '',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'             => 3,
                        'walker'            => '',
                        'theme_location'    => 'content_bottom_menu_3' ,
                        'menu_li_actived'       => 'current-menu-item',
                        'menu_item_has_children'=> 'menu-item-has-children',
                    );
                    wp_nav_menu($args);
                    ?>
                </div>
                <div class="fanpage">
                    <h3 class="content-bottom-footer-title">Facebook</h3>
                    <div class="facebook-fp">
                        <div class="fb-page" data-href="https://www.facebook.com/alphabooks/" data-tabs="timeline" data-width="260" data-height="215" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/alphabooks/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/alphabooks/">Alpha Books</a></blockquote></div>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </div>
</div>
<footer class="bg-thoi">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <form class="dang-ky-ngay-box" name="frm_subcribe" method="POST">
                    <div class="dang-ky-ngay-txt"><input type="text" name="email" placeholder="Nhập email của bạn..." autocomplete="off"></div>
                    <div class="dang-ky-ngay-btn">
                        <a href="javascript:void(0);" onclick="registerSubcriber(this);">Gửi</a>
                    </div>
                    <div class="ajax-box">
                        <div class="ajax_loader_1"></div>
                    </div>
                </form>
                <div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>
            </div>
            <div class="col-lg-4">
                <div class="ban-quyen-footer">&copy; Bản quyền thuộc về Alpha Books | Cung cấp bởi Alphabook</div>
            </div>
            <div class="col-lg-4">
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
</footer>
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
<?php
wp_footer();
?>
</body>
</html>
