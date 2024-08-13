<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/sonder/information-package/information-package.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'information-package-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'information-package';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $text = get_field('text');
    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="container">
            <div class="wrap">
                <div data-aos="fade-up" data-aos-once="true" class="wrap__title">
                    <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                    echo file_get_contents($icon);
                    ?>
                    <?php if ($title): ?>
                        <?php echo $title; ?>
                    <?php endif; ?>
                </div>
                <div class="line"></div>
                <div class="wrap-columns">
                    <div class="left-columns">
                        <?php if ($subtitle): ?>
                            <div data-aos="fade-up" data-aos-once="true" class="form__title">
                                <?php echo $subtitle; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="right-columns">
                        <?php if ($text): ?>
                            <div data-aos="fade-up" data-aos-once="true" class="form__text">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-once="true" class="form">
                    <?php echo do_shortcode('[gravityform id="5" title="false"]') ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>