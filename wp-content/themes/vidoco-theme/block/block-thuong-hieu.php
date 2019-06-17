<div class="khoang-gia">Nhãn hiệu</div>
<?php

$terms = get_terms( array(
    'taxonomy' => 'za_category_nhan_hieu',
    'hide_empty' => false,
) );
if(count(@$terms) > 0){
    ?>
    <ul class="main-category">
        <?php
        foreach (@$terms as $key=>$value) {
            $term_permalink=get_term_link( @$value, 'za_category_nhan_hieu' );
            $cat=get_category(@$value,OBJECT,  'raw' );
            ?>
            <li><a href="<?php echo @$term_permalink; ?>"><?php echo @$value->name; ?></a></li>
            <?php
        }
        ?>
    </ul>
    <?php
}

?>