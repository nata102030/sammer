<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/slider-image-text/slider-image-text.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'slider-image-text-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'slider-image-text';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $zeigen_header = get_field('zeigen_header');
    $title_header = get_field('title_header');
    $subtitle_header = get_field('subtitle_header');
    $rows = get_field('slider');
    $hover_mob = get_field('hover_mob', 'option');

    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <?php if ($zeigen_header): ?>
            <div data-aos="fade-up" data-aos-once="true" class="wrap__title">
                <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                echo file_get_contents($icon);
                ?>
                <?php if ($title_header): ?>
                    <?php echo $title_header; ?>
                <?php endif; ?>
            </div>
            <div class="line"></div>
            <?php if ($subtitle_header): ?>
                <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                    <?php echo $subtitle_header; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($rows) { ?>
            <div class="slider__wrap-1">
                <div id="slider-2" class="flexslider">
                    <div class="slides-wrap">
                        <?php foreach ($rows as $item): ?>
                            <div class="slides-item">
                                <div class="image-text-colums__wrap">
                                    <div class="wrap-column">
                                        <div class="wrap-left">
                                            <div data-aos="fade-up" data-aos-once="true" class="wrap-left-header">
                                                <?php if ($item['title']): ?>
                                                    <div class="wrap-left-title">
                                                        <?php echo $item['title']; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="slider__handle">
                                                    <div class="swiper-pagination"></div>
                                                    <div class="custom-inner">
                                                        <div class="slider-posts__arrow-1">
                                                            <div class="dots"></div>
                                                            <div class="slider-nav">
                                                                <div class="btn__swiper-prev-1">
                                                                    <?php
                                                                    $icon = get_stylesheet_directory() . '/img/icons/arrow.svg';
                                                                    echo file_get_contents($icon);
                                                                    ?>
                                                                </div>
                                                                <div class="btn__swiper-next-1">
                                                                    <?php
                                                                    $icon = get_stylesheet_directory() . '/img/icons/arrow.svg';
                                                                    echo file_get_contents($icon);
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($item['image']): ?>
                                                <div class="wrap-left-image">
                                                    <?php echo wp_get_attachment_image($item['image']['id'], 'large'); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="wrap-right">
                                            <?php if ($item['subtitle']): ?>
                                                <div data-aos="fade-up" data-aos-once="true" class="wrap-right__title">
                                                    <?php echo $item['subtitle']; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($item['text']): ?>
                                                <div data-aos="fade-up" data-aos-once="true" class="wrap-right__text">
                                                    <?php echo $item['text']; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($item['link']): ?>
                                                <a data-aos="fade-up" data-aos-once="true" href="<?php echo $item['link']['url']; ?>"
                                                    class="btn_circle">
                                                    <?php if ($item['link']['title']) { ?>
                                                        <?php echo $item['link']['title']; ?>
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
<?php } ?>