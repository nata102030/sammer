<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/text-images/top-page-banner/top-page-banner.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'top-page-banner-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'top-page-banner';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];  
    }  

    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $bg = get_field('background');
    $image = get_field('image');
    $video = get_field('video');
    $slider = get_field('slider');
   // $opacity = get_field('opacity');
   
?>

   <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); if (get_field('margin_top_mobile')) : ?> margin-top-mob-<?php echo get_field('margin_top_mobile'); endif;  if (get_field('margin_bottom_mobile')) : ?> margin-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif; if (get_field('margin_top_desktop')) : ?> margin-top-desktop-<?php echo get_field('margin_top_desktop'); endif;  if (get_field('margin_bottom_desktop')) : ?> margin-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif;?>">
        <?php
        if ($bg == 'Bild') : ?>
            <div class="image-container">
                <div class="banner-image" style="background-image: url(<?php if ($image) {
                                                                                                                                                                                    echo $image;
                                                                                                                                                                                        }
                                                                                                                                                                                        ?>);">
                    <div class="top-banner__color">
                        <div class="top-banner__wrap">
                            <div class="container">
                                <?php if ($title) : ?>
                                    <div class="title">
                                        <?php echo $title; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($subtitle) : ?>
                                    <div class="subtitle"><?php echo $subtitle; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        if ($bg == 'Video') : ?>
            <div class="container-fluid g-0">
                <div onclick="myFunction()" class="video-wrap">
                    <a href="<?php echo $video['url']; ?>"><img class="img-play" src="<?php echo get_template_directory_uri(); ?>/img/icons/play.svg" alt="play"></a>
                    <video loop preload="auto" autoplay muted playsinline id="myVideo">
                        <source src="<?php echo $video['url']; ?>" type="video/mp4">
                    </video>
                    <div class="top-banner__wrap">
                        <div class="container">
                            <?php if ($title) : ?>
                                <div class="title">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($subtitle) : ?>
                                <div class="subtitle"><?php echo $subtitle; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($bg == 'Slider') : ?>
            <?php if ($slider) { ?>
                <div class="slider__wrap">
                    <div id="slider" class="flexslider">
                        <div class="slides-wrap">
                            <?php foreach ($slider as $item) : ?>
                                <div class="slides-item">
                                    <div class="slides-image">

                                        <?php echo wp_get_attachment_image($item, 'large'); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="slider-posts__handle">
                        <div class="swiper-pagination"></div>
                        <div class="custom-inner">
                            <div class="slider-posts__arrow">
                                <div class="slider-nav">
                                    <div class="btn__swiper-prev">
                                        <?php
                                        $icon = get_stylesheet_directory() . '/img/icons/arrow.svg';
                                        echo file_get_contents($icon);
                                        ?>
                                    </div>
                                    <div class="btn__swiper-next">
                                        <?php
                                        $icon = get_stylesheet_directory() . '/img/icons/arrow.svg';
                                        echo file_get_contents($icon);
                                        ?>
                                    </div>
                                    <?php
                            $id = get_the_ID();
                            if ($id == 27) : ?>
                                <div class="secret-img">
                                    <?php $icon = get_stylesheet_directory() . '/img/secret-ivestments.svg';
                                    echo file_get_contents($icon);
                                    ?>
                                </div>
                            <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-banner__wrap">
                        <div class="container">
                            <?php if ($title) : ?>
                                <div data-aos="fade-up" data-aos-once="true" class="title">
                                    <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($subtitle) : ?>
                                <div data-aos="fade-up" data-aos-once="true" class="subtitle"><?php echo $subtitle; ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endif; ?>
    </section>
<?php } ?>



