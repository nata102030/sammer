<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/secret-ivestments/secret-ivestments.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'secret-ivestments-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'secret-ivestments';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $image = get_field('image');
    $text = get_field('text');
    $button = get_field('button');
    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> margin-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> margin-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> margin-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> margin-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">

        <div class="image-layer" style="background-image: url(<?php if ($image) {
            echo $image;
        }
        ?>);"></div>
        <div class="wrap">
            <div data-aos="fade-up" data-aos-once="true" class="secret-img">
                <?php $icon = get_stylesheet_directory() . '/img/secret-ivestments.svg';
                echo file_get_contents($icon);
                ?>
            </div>
            <?php if ($text): ?>
                <div data-aos="fade-up" data-aos-once="true" class="wrap_text">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>
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
    </section>
<?php } ?>