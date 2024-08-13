<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/image-text-colums/image-text-colums.jpg" style="max-width:100%; height:auto;">';
}
  
if (!$is_preview) {
    $id = 'image-text-colums-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'image-text-colums';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $image = get_field('image');
    $title = get_field('title');
    $text = get_field('text');
    $zeigen_header = get_field('zeigen_header');
    $title_header = get_field('title_header');
    $subtitle_header = get_field('subtitle_header');
?>

    <style>
        #<?php echo $id; ?> {
            padding-top: <?php the_field('margin_top_desktop'); ?>px;
            padding-bottom: <?php the_field('margin_bottom_desktop'); ?>px;
        }

        @media(max-width: 768px) {
            #<?php echo $id; ?> {
                padding-top: <?php the_field('margin_top_mobile'); ?>px;
                padding-bottom: <?php the_field('margin_bottom_mobile'); ?>px
            }
        }

    </style>

    <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
        <div class="container">

            <?php if ($zeigen_header == 'Ja') : ?>
                <div data-aos="fade-up" data-aos-once="true" class="wrap__title">
                    <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                    echo file_get_contents($icon);
                    ?>
                    <?php if ($title_header) : ?>
                        <?php echo $title_header; ?>
                    <?php endif; ?>
                </div>
                <div class="line"></div>
                <?php if ($subtitle_header) : ?>
                    <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                        <?php echo $subtitle_header; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
  
            <div class="image-text-colums__wrap">
                <div class="wrap-column">
                    <div class="wrap-left">  
                        <?php if ($image) : ?>
                            <div class="wrap-left-image">  
                            <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="wrap-right">
                        <?php if ($title) : ?>
                            <div data-aos="fade-up" data-aos-once="true" class="wrap-right__title">
                                <?php echo $title; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($text) : ?>
                            <div data-aos="fade-up" data-aos-once="true" class="wrap-right__text">
                                <?php echo $text; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>