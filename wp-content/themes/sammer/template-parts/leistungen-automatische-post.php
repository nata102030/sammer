<?php
setup_postdata($post);
$post_title = get_the_title($post->ID);
$post_image = get_the_post_thumbnail();
$post_link = get_the_permalink();
$post_excerpt = get_the_excerpt();
?>

<div class="postItem type-leistungen">
    <div class="postItem_wrap">
        <div class="leistungen-img">
            <a class="leistungen-img-a" href="<? echo $post_link; ?>">
                <?php echo  $post_image; ?>
            </a>
        </div>
        <div class="item-text">
            <div class="item-title">
                <a href="<? echo $post_link; ?>">
                    <div data-aos="fade-up" data-aos-once="true" class="item-name"><?php echo $post_title; ?></div>
                </a>
            </div>
            <div class="line"></div>
            <?php if ($post_excerpt) : ?>
                <div data-aos="fade-up" data-aos-once="true" class="item__excerpt">
                    <?php echo  $post_excerpt; ?>
                </div>
            <?php endif; ?>
            <a data-aos="fade-up" data-aos-once="true" href="<?php echo $post_link; ?>" class="btn_circle">
                MEHR ERFAHREN
                <?php $icon = get_stylesheet_directory() . '/img/icons/btn-right.svg';
                echo file_get_contents($icon);
                ?>
            </a>
        </div>
    </div>
</div>