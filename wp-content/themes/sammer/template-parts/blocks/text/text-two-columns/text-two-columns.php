<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text/text-two-columns/text-two-columns.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'text-two-columns-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'text-two-columns';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $description = get_field('description');
    $text = get_field('text');
    $img_bg = get_field('img_bg');
    $background = get_field('background');
    ?>


    <?php if ($img_bg == 'Nein'): ?>
        <section id="<?php echo esc_attr($id); ?>"
            class="<?php echo esc_attr($class_name);
            if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
            if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
            if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
            if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>"
            style='background-image:none; <?php if ($background == 'Dunkelgrau'): ?> background: #24272E; <?php endif; ?>'>
        <?php else: ?>
            <section id="<?php echo esc_attr($id); ?>"
                class="<?php echo esc_attr($class_name);
                if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
                if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
                if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
                if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>"
                style='<?php if ($background == 'Dunkelgrau'): ?> background: #24272E; <?php endif; ?>'>
            <?php endif; ?>
            <div class="container">
                <div class="two-columns__wrap">
                    <div data-aos="fade-up" data-aos-once="true" class="two-columns__title">
                        <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                        echo file_get_contents($icon);
                        ?>
                        <?php if ($title): ?>
                            <?php echo $title; ?>
                        </div>
                    <?php endif; ?>
                    <div class="line"></div>
                    <div class="wrap-column">
                        <div class="wrap-left">
                            <?php if ($subtitle): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="two-columns__subtitle">
                                    <?php echo $subtitle; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($description): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="two-columns__description">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="wrap-right">
                            <?php if ($text): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="two-columns__text">
                                    <?php echo $text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>