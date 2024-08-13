<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/awards/awards.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'awards-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'awards';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $image = get_field('image');
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $text = get_field('text');
    $button = get_field('button');
    $awards_img = get_field('awards_bild');
    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> margin-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> margin-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> margin-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> margin-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="awards__wrap">
            <div class="wrap-header-mob">
                <div class="wrap__title">
                    <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                    echo file_get_contents($icon);
                    ?>
                    <?php if ($title): ?>
                        <?php echo $title; ?>
                    <?php endif; ?>
                </div>
                <div class="line"></div>
                <?php if ($subtitle): ?>
                    <div class="wrap__subtitle">
                        <?php echo $subtitle; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="wrap-column">
                <div class="wrap-left">
                    <?php if ($image): ?>
                        <div class="wrap-left-image">
                            <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="wrap-right">
                    <div class="wrap-right-col">
                        <div class="wrap__header">
                            <div data-aos="fade-up" data-aos-once="true" class="wrap__title">
                                <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                                echo file_get_contents($icon);
                                ?>
                                <?php if ($title): ?>
                                    <?php echo $title; ?>
                                <?php endif; ?>
                            </div>
                            <div class="line"></div>
                            <?php if ($subtitle): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                                    <?php echo $subtitle; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($text): ?>
                            <div data-aos="fade-up" data-aos-once="true" class="wrap__text">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    
                    <?php if ($button): ?>
                        <a data-aos="fade-up" data-aos-once="true" href="<?php echo $button['url']; ?>" class="btn_circle">
                            <?php if ($$button['title']) { ?>
                                <?php echo $button['title']; ?>
                            <?php } else { ?>
                                <?php echo 'MEHR ERFAHREN'; ?>
                            <?php } ?>
                            <?php $icon = get_stylesheet_directory() . '/img/icons/btn-right.svg';
                            echo file_get_contents($icon);
                            ?>
                        </a>
                    <?php endif; ?>
                    </div>
                    <?php
                    if ($awards_img): ?>
                        <div data-aos="fade-up" data-aos-once="true" class="gallery">
                            <?php foreach ($awards_img as $image_id): ?>
                                <div class="gallery-img">
                                    <?php echo wp_get_attachment_image($image_id, 'medium'); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php  if ($awards_img): ?>
                        <div data-aos="fade-up" data-aos-once="true" class="gallery gallery_mob">
                            <?php foreach ($awards_img as $image_id): ?>
                                <div class="gallery-img">
                                    <?php echo wp_get_attachment_image($image_id, 'medium'); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

        </div>
    </section>
<?php } ?>