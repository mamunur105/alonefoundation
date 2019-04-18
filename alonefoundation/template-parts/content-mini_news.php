<?php

if (!empty(get_the_post_thumbnail_url())) {
    $all_thinks = getimagesize(get_the_post_thumbnail_url());
    if ($all_thinks[0] > 550) {
        $grid = "col-md-8 single_iteam";
    }else{
        $grid = "col-md-4 single_iteam";
    }
}else{
    $grid = "col-md-4 single_iteam";
}


?>

<div <?php post_class($grid); ?> style="height:auto;" > 
    <div class="grid-item bg-1 d-flex align-items-center justify-content-center" style="<?php echo 'background-image: url('.get_the_post_thumbnail_url().')';?>" >
        <div class="entry-content text-white text-center">
            <div class="news-term-list">
                <?php  the_category(','); ?>
            </div>
            <?php  the_title( '<h4 class="title "> <a class="title-link text-white" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
                ?>
        </div>
    </div>
</div>