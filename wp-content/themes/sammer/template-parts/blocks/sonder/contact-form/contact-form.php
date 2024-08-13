<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/sonder/contact-form/contact-form.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'contact-form-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'contact-form';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $image = get_field('image');
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
                        <div class="form">
                            <?php if ($subtitle): ?>
                                <div data-aos="fade-up" data-aos-once="true" class="form__title">
                                    <?php echo $subtitle; ?>
                                </div>
                            <?php endif; ?>
                            <div data-aos="fade-up" data-aos-once="true">
                                <?php echo do_shortcode('[gravityform id="4" title="false"]') ?>
                            </div>
                        </div>
                    </div>
                    <div class="right-columns">
                        <?php if ($image): ?>
                            <div class="wrap-right-image">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2658.947167940746!2d11.161315076018182!3d48.207633546281855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479e818688670b4d%3A0xd9d672c95825b992!2sWirtschaftskanzlei%20Sammer%20GmbH%20%26%20Co.%20KG!5e0!3m2!1sru!2sua!4v1697735428855!5m2!1sde!2sde" width="556" height="556" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>