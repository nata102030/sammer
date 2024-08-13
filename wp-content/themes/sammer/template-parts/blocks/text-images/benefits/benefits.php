<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/benefits/benefits.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'benefits-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'benefits';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }
    ?>

    
    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> margin-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> margin-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> margin-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> margin-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="container">
            <?php if (have_rows('items')): ?>
                <div class="List">
                    <?php $i = 100; ?>
                    <?php while (have_rows('items')):
                        the_row();
                        $title = get_sub_field('title');
                        $text = get_sub_field('text');
                        $image = get_sub_field('image');
                        ?>

                        <div data-aos="fade-up" data-aos-delay="<?php echo $i; ?>" data-aos-once="true" class="List-item">
                            <?php $i += 300; ?>
                            <?php if ($image): ?>
                                <div class="List-item-img">
                                    <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="List-item-info">
                                <?php if ($title): ?>
                                    <div class="List-item-info-title">
                                        <?php echo $title; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="line"></div>
                                <?php if ($text): ?>
                                    <div class="List-item-info-text">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php } ?>