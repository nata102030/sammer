<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/sonder/leistungen-list/leistungen-list.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {  
    $id = 'leistungen-list-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'leistungen-list';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $setting = get_field('setting');
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $subtitle_mobil = get_field('subtitle_mobil');
    $zeigen_header = get_field('zeigen_header');
    $article = get_field('item');
    $item = get_field('select-item-2');
    $background = get_field('background');
    $img_height_768 = get_field('img_height_desktop') - 100;
?>

    <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name);   if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
            if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
            if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
            if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="container">
            <div class="wrap">
                <?php if ($zeigen_header == 'Ja') : ?>
                    <div data-aos="fade-up" data-aos-once="true" class="wrap__title">
                        <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                        echo file_get_contents($icon);
                        ?>
                        <?php if ($title) : ?>
                            <?php echo $title; ?>
                        <?php endif; ?>
                    </div>
                    <div class="line"></div>
                    <?php if ($subtitle) : ?>
                        <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                            <?php echo $subtitle; ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($subtitle_mobil) : ?>
                        <div class="wrap__subtitle_mobil">
                            <?php echo $subtitle_mobil; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($setting == 'manuelle Einstellung') :
                    $item = $article;
                endif; ?>
                <?php if ($setting == 'automatische Einstellung') :
                    if ($item) { ?>
                        <?php if ($background == 'Blau') : ?>
                            <div class="postsList Blau" <?php if ($zeigen_header == 'Nein') : ?> style='margin-top: 0;' <?php endif; ?>>
                            <?php elseif ($background == 'Dunkelgrau') : ?>
                                <div class="postsList Dunkelgrau" <?php if ($zeigen_header == 'Nein') : ?> style='margin-top: 0;' <?php endif; ?>>
                                <?php else : ?>
                                    <div class="postsList ListWhite" <?php if ($zeigen_header == 'Nein') : ?> style='margin-top: 0;' <?php endif; ?>>
                                    <?php endif; ?>
                                    <?php
                                    foreach ($item as $post) :
                                        setup_postdata($post);
                                        $post_title = get_the_title($post->ID);
                                        $post_image = get_the_post_thumbnail($post->ID);
                                        $post_link = get_the_permalink($post->ID);
                                        $post_excerpt = get_the_excerpt($post->ID);
                                    ?> 
                                        <div class="postItem type-leistungen">
                                            <div class="postItem_wrap">
                                                <div class="leistungen-img leistungen-img-pl-<?php echo $img_height_768;?> leistungen-img-mob-<?php the_field('img_height_mobile'); ?>" style=' height: <?php the_field('img_height_desktop'); ?>px; '>
                                                    <a class="leistungen-img-a" href="<? echo $post_link; ?>"> 
                                                    <?php echo  $post_image; ?>
                                                    </a>
                                                </div>
                                                <div class="item-text">
                                                    <div class="item-title">
                                                        <a href="<? echo $post_link; ?>">
                                                            <div data-aos="fade-up" data-aos-once="true" class="item-name">
                                                               <h3><?php echo $post_title; ?></h3></div>
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
                                    <?php endforeach; ?>
                                    </div>
                                <?php }
                        endif;
                        if ($setting == 'manuelle Einstellung') :
                            if (have_rows('item')) : ?>
                                    <?php if ($background == 'Blau') : ?>
                                        <div class="postsList Blau" <?php if ($zeigen_header == 'Nein') : ?> style='margin-top: 0;' <?php endif; ?>>
                                        <?php else : ?>
                                            <div class="postsList"  <?php if ($zeigen_header == 'Nein') : ?> style='margin-top: 0;' <?php endif; ?>>
                                            <?php endif; ?>
                                            <?php while (have_rows('item')) : the_row();
                                                echo get_template_part('template-parts/leistungen-manuelle', 'post');
                                            endwhile;
                                            ?>
                                            </div>
                                    <?php
                                endif;
                            endif;
                            wp_reset_postdata(); ?>
                                        </div>
                                </div>
                            
    </section>
<?php } ?>