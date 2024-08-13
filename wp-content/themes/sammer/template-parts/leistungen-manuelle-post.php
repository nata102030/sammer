

<?php

$post_title = get_sub_field('titel'); 
          $post_image = get_sub_field('image');
          $post_link = get_sub_field('link');
          $post_excerpt = get_sub_field('text');
          
             ?>

<div class="postItem type-leistungen">
    <div class="postItem_wrap">  
        <div class="leistungen-img">
            <a class="leistungen-img-a" href="<? echo $post_link['url']; ?>">
                
                <?php echo wp_get_attachment_image($post_image['id'], 'large'); ?>
            </a>  
        </div>
        <div class="item-text">
            <div class="item-title">
                <a href="<? echo $post_link['url']; ?>">
                    <div data-aos="fade-up" data-aos-once="true" class="item-name"><?php echo $post_title; ?></div>
                </a>
            </div>
            <div class="line"></div>
            <?php if ( $post_excerpt) : ?>
                <div data-aos="fade-up" data-aos-once="true" class="item__excerpt">
                    <?php echo  $post_excerpt; ?>
                </div>
            <?php endif; ?>
            <a data-aos="fade-up" data-aos-once="true" href="<?php echo $post_link['url']; ?>" class="btn_circle">
                MEHR ERFAHREN
                <?php $icon = get_stylesheet_directory() . '/img/icons/btn-right.svg';
                echo file_get_contents($icon);  
                ?>
            </a>
        </div>
    </div>
</div>