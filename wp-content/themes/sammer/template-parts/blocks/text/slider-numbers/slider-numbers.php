<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text/slider-numbers/slider-numbers.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'slider-numbers-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'slider-numbers';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $rows = get_field('slider_list');
    $hover_mob = get_field('hover_mob', 'option');
    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> margin-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> margin-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> margin-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> margin-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?> ">
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
                <?php if ($subtitle): ?>
                    <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                        <?php echo $subtitle; ?>
                    </div>
                <?php endif; ?>
                <?php if ($rows):
                    $i = 1 ?>
                    <div class="list-title">
                        <?php foreach ($rows as $row) { ?>
                            <div data-aos="fade-up" data-aos-once="true" class="list-title_item">
                                <div class="list-title_number">
                                    <?php echo $i; ?>
                                </div>
                                <?php if ($row['title']): ?>
                                    <div class="item-title_title">
                                        <?php echo $row['title']; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php $i++;
                        } ?>
                    </div>
                <?php endif; ?>
                <?php if ($rows) {
                    $i = 1; ?>
                    <div class="slider__wrap-1">
                        <div id="slider-1" class="flexslider">
                            <div class="slides-wrap">
                                <?php foreach ($rows as $item): ?>
                                    <div class="slides-item">
                                        <div class="left-column">
                                            <?php if ($item['title']): ?>
                                                <div data-aos="fade-up" data-aos-once="true" class="slides-item_title">
                                                    <?php echo $item['title']; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($item['subtitle']): ?>
                                                <div data-aos="fade-up" data-aos-once="true" class="slides-item_subtitle">
                                                    <?php echo $item['subtitle']; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($item['text']): ?>
                                                <div data-aos="fade-up" data-aos-once="true" class="slides-item_text">
                                                    <?php echo $item['text']; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="right-column">
                                            <div data-aos="fade-up" data-aos-once="true" class="slides-item-number">
                                                <?php echo $i; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
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
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>