<?php
$post_image = get_the_post_thumbnail_url();
$post_title = get_the_title();
$post_excerpt = get_the_excerpt();
$post_link = get_the_permalink();
?> 

<div class="postItem-cpt">
    <div class="postItem-cpt_wrap">
    <?php $title = get_the_title( $post->ID );
    echo $post->ID;
    echo $title; ?>
        <div class="item-text">
            <div class="item-title">
                <a href="#">
                    <div class="item-name"><?php echo $post_title; ?></div>
                </a>
                <div class="btn_circle">

                    <?php $icon = get_stylesheet_directory() . '/img/icons/btn-right.svg';
                    echo file_get_contents($icon);
                    ?>
                </div>
            </div>


 
        </div>

        <div class="leistungen-img">
           
                <?php echo $post_image; ?>
         
        </div>
      


    </div>


</div>