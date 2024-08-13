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
    $parallax = get_field('parallax');
    $number = get_field('number');
    ?>

    <section id="<?php echo esc_attr($id); ?>"
        class="<?php echo esc_attr($class_name);
        if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
        if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
        if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
        if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">
        <div class="container">
            <?php if ($zeigen_header == 'Ja'): ?>
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
            <div class="image-text-colums__wrap">
                <div class="wrap-column">
                    <div class="wrap-left">
                        <?php if ($image): ?>
                            <?php if ($parallax == 'Ja'): ?>
                              <!--  <div class="wrap-left-image wrap-left-image-parallax"
                                    style="background-image: url(' <?php echo $image['url']; ?>');">-->
                                    <div class="wrap-left-image wrap-left-image-parallax wrap-left-deck"
                                    style="background-image: url(' <?php echo $image['url']; ?>');">

  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="754" height="533" viewBox="0 0 754 533">
    <defs>
      <mask id="hole">
        <rect width="100%" height="100%" fill="white"/>
       <!-- <text y="85%" font-size="600"  fill="black">35</text>-->
       <text y="58%" font-size="600"  fill="black" dominant-baseline="middle">35</text>
      </mask> 
    </defs>
    <rect y="0" width="100%" height="100%" fill="#F6F6F6" mask="url(#hole)">
    </rect> 
  </svg>
  </div>


  <div class="wrap-left-image wrap-left-image-parallax wrap-left-mob"
                                    style="background-image: url(' <?php echo $image['url']; ?>');">

  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="530px" viewBox="0 0 100% 530px">
    <defs>
      <mask id="hole1">
        <rect width="100%" height="100%" fill="white"/>
        <text x="50%" y="60%" dominant-baseline="middle" text-anchor="middle" font-size="100%"  fill="black">35</text> 
      </mask> 
    </defs>
    <rect y="0" width="100%" height="100%" fill="#F6F6F6" mask="url(#hole1)">
    </rect> 
  </svg>

  
  </div>
  
  




                                <?php else: ?>
                                    <div class="wrap-left-image">
                                    <?php endif; ?>
                                    <?php if ($parallax == 'Nein'): ?>
                                        <?php echo wp_get_attachment_image($image['id'], 'large'); ?>
                                        </div>
                                    <?php else: ?>
                                       <!--  <span>
                                           <?php echo $number ?>
                                        </span>-->
                                    <?php endif; ?>
                                </div>

                               
                            <?php endif; ?>
                      

                        <?php if ($parallax == 'Ja'): ?>
                            <div class="wrap-right wrap-right-parallax">
                            <?php else: ?>
                                <div class="wrap-right">  
                                <?php endif; ?>
                                <?php if ($title): ?>
                                    <div data-aos="fade-up" data-aos-once="true" class="wrap-right__title">
                                        <?php echo $title; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($text): ?>
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