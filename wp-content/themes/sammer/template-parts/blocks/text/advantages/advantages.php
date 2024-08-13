<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text/advantages/advantages.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'advantages-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'advantages';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $rows = get_field('advantages_item');
    ?>

    <?php if (count($rows) > 3):
        $basic = (count($rows) - 1) * 24 ?>
    <?php endif; ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="container">
            <div class="advantages__wrap">
                <div data-aos="fade-up" data-aos-once="true" class="advantages__title">
                    <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                    echo file_get_contents($icon);
                    ?>
                    <?php if ($title): ?>
                        <?php echo $title; ?>
                    <?php endif; ?>
                </div>

                <div class="line"></div>
                <?php if ($subtitle): ?>
                    <div data-aos="fade-up" data-aos-once="true" class="advantages-subtitle">
                        <?php echo $subtitle; ?>
                    </div>
                <?php endif; ?>
                <?php if ($rows): ?>

                    <?php if (count($rows) > 3): ?>
                        <div class="list list-big">
                    <?php else:  ?>
                        <div class="list">
                    <?php endif; ?>
                        <?php $i = 100; ?>
                        <?php foreach ($rows as $row) { ?>  
                            <?php if (count($rows) > 3): ?>
                                <div data-aos="fade-up" data-aos-delay="<?php echo $i; ?>" data-aos-once="true" class="list_item list_item_big" style="flex-basis: calc((100% - <?php echo $basic ?>px) / <?php echo count($rows) ?> );">
                            <?php else:  ?>
                                <div data-aos="fade-up" data-aos-delay="<?php echo $i; ?>" data-aos-once="true" class="list_item">
                            <?php endif; ?>
                                <?php $i += 300; ?>
                                <?php if ($row['number']): ?>
                                    <div class="item-number">
                                        <?php echo $row['number']; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="item-col">
                                    <?php if ($row['title']): ?>
                                        <div class="item-title">
                                            <?php echo $row['title']; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($row['text']): ?>
                                        <div class="item-text">
                                            <?php echo $row['text']; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php } ?>