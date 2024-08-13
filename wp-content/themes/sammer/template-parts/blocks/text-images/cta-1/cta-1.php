<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/cta-1/cta-1.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'cta-1-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'cta-1';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $image = get_field('image');
    $title = get_field('title');
    $text = get_field('text');
    $button = get_field('button');
    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> margin-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> margin-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> margin-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> margin-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="container">
            <div class="cta-1__wrap">
                <div class="wrap-column">
                    <div class="wrap-left-1">
                        <?php if ($image): ?>
                            <div class="wrap-left-image-1">
                                <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="wrap-right">
                        <div class="wrap-right-col">
                            <?php if ($title): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="wrap-right__title">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($text): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="wrap-right__text">
                                    <?php echo $text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($button): ?>
                            <a data-aos="fade-up" data-aos-once="true" href="<?php echo $button['url']; ?>" class="btn_circle">
                                <?php if ($button['title']) { ?>
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
                </div>
            </div>
        </div>
    </section>
<?php } ?>