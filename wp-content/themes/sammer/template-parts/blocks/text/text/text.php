<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text/text/text.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'text-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'text';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }


    $title = get_field('titel');
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
                <?php if ($title): ?>
                    <?php echo $title; ?>
                <?php endif; ?>
            </div>
            <div class="line"></div>
            <?php if ($text): ?>
                <div class="wrap__text">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php } ?>