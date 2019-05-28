<?php
/*
	Home template default
*/
	get_header();
	?>
	<h1 style="display: none;"><?php echo bloginfo( "name" ); ?></h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="calo-box">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="slide-home-page">
                                <div class="owl-carousel-banner owl-carousel owl-theme owl-loaded">
                                    <?php
                                    for ($i=1;$i<=4;$i++) {
                                        ?>
                                        <div class="item">
                                            <div style="background-image:url('<?php echo wp_upload_dir()["url"]."/slide-".$i.".jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top:calc(100% / (809/431));"></div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="nutrifood">
                                <div class="just-arrived"><a href="javascript:void(0);"><span>Just Arrived</span><span class="chevron-right-just-arrived"><i class="fas fa-chevron-right"></i></span></a></div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Spring Fling 2019</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Shop our guide" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Bananas!</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("L'artisan Bana Banana" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">The anti-stress fragrance:</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Functional Fragrance" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Your scent, on the go:</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Sen7 travel atomizers" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">Pure & Natural body wash:</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("New: Alpine Provisions" ,10, null ); ?> </a></div>
                                </div>
                                <div class="ruby-box">
                                    <div class="spring-fling-1">A brilliant natural deodorant</div>
                                    <div class="spring-fling-2"><a href="javascript:void(0);"><?php echo wp_trim_words("Introducing: Corpus" ,10, null ); ?> </a></div>
                                </div>
                                <div class="just-arrived-2"><a href="javascript:void(0);"><span>All New Addition</span><span class="chevron-right-just-arrived"><i class="fas fa-chevron-right"></i></span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="product-featured">
                                <div class="owl-carousel-featured-product owl-carousel owl-theme owl-loaded">
                                    <?php
                                    for ($i=1;$i<=9;$i++) {
                                        ?>
                                        <div class="item">
                                            <div class="box-big-featured-product">
                                                <div class="box-featured-title-wrapper"><h3 class="box-featured-title">ROSE REFERENCE</h3></div>
                                                <div class="box-featured-product">
                                                    <a href="javascript:void(0);">
                                                        <figure>
                                                            <div style="background-image: url('<?php echo wp_upload_dir()["url"]."/lustre2.jpg"; ?>');background-size: cover;background-repeat: no-repeat;padding-top: calc(100% / (240/200));"></div>
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="product-category-box">
                                <div class="product-guilta">
                                    <h3 class="product-category-guilta-title">New & Noteworthy</h3>
                                    <div class="owl-carousel-featured-product-category owl-carousel owl-theme owl-loaded">
                                        <?php
                                        for ($i=0;$i<12;$i++) {
                                            ?>
                                            <div class="item">
                                                <div class="magento">
                                                    <a href="javascript:void(0);">
                                                        <figure>
                                                            <div style="background-image: url('<?php echo wp_upload_dir()["url"]."/73217.jpg"; ?>');background-repeat: no-repeat;background-size: cover;padding-top: calc(100% / (600/863));"></div>
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>