<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/sonder/list-cpt/list-cpt.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'list-cpt-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'list-cpt';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }

    $setting = get_field('setting');
    $ctp = get_field('ctp');
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $item = get_field('select-item-2');
    $article = get_field('item');
    $img_height_desktop = get_field('img_height_desktop');
    $img_height_mobile = get_field('img_height_mobile');
    $img_height_768 = $img_height_desktop - 100;
?>

   
    <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); if (get_field('margin_top_mobile')): ?> padding-top-mob-<?php echo get_field('margin_top_mobile'); endif;
            if (get_field('margin_bottom_mobile')): ?> padding-bottom-mob-<?php echo get_field('margin_bottom_mobile'); endif;
            if (get_field('margin_top_desktop')): ?> padding-top-desktop-<?php echo get_field('margin_top_desktop'); endif;
            if (get_field('margin_bottom_desktop')): ?> padding-bottom-desktop-<?php echo get_field('margin_bottom_desktop'); endif; ?>">

        <?php
        if ($item) :
            foreach ($item as $post) :
                if ($phone || $fax || $email || $post_text) {
                    $ctp = 'Berater';
                } else {
                    $ctp = 'Leistungen';
                    $post_text = $post_excerpt;
                }
            endforeach;
        endif;
        ?>
        <div class="container">
            <?php if ($ctp == 'Leistungen') : ?>
                <div class="wrap-leistungen">
                <?php else : ?>
                    <div class="wrap">
                    <?php endif; ?>
                    <div data-aos="fade-up" data-aos-once="true" class="wrap__title">
                        <?php $icon = get_stylesheet_directory() . '/img/icons/ellipse.svg';
                        echo file_get_contents($icon);
                        ?>
                        <?php if ($title) : ?>
                            <?php echo $title; ?>
                        <?php endif; ?>
                    </div>
                    <div class="line"></div>
                    <?php if ($subtitle) : ?>
                        <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                            <?php echo $subtitle; ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    if ($setting == 'manuelle Einstellung') :
                        $item = $article;
                    endif;
                    if ($item) : ?>
                        <div class="postsList">
                            <?php foreach ($item as $post) :
                                if ($setting == 'automatische Einstellung') :
                                    $post_image = get_the_post_thumbnail($post->ID);
                                    $post_title = get_the_title($post->ID);
                                    $post_excerpt = get_the_excerpt($post->ID);
                                    $post_descript =  get_field('descript', $post->ID);
                                    $post_link = get_the_permalink($post->ID);
                                    $post_specialty = get_field('specialty', $post->ID);
                                    $post_text = get_field('text', $post->ID);
                                    $phone = get_field('telefon', $post->ID);
                                    $fax = get_field('fax', $post->ID);
                                    $email = get_field('email', $post->ID);
                                    if ($ctp == 'Leistungen') :
                                        $post_text = $post_descript;
                                    endif;
                                endif;
                                if ($setting == 'manuelle Einstellung') :

                                    $post_image = $post['image'];
                                    $post_title = $post['titel'];
                                    $post_link = $post['link']['url'];
                                    $post_specialty = $post['specialty'];
                                    $post_text = $post['text'];
                                    $phone = $post['telefon'];
                                    $fax = $post['fax'];
                                    $email = $post['email'];
                                endif; ?>
                                <div class="postItem-cpt">
                                    <div class="postItem-cpt_wrap">
                                        <!-- <?php $title = get_the_title($post->ID); ?> -->
                                        <div class="item-text_wrap">
                                        <div class="item-text">
                                            <div data-aos="fade-up" data-aos-once="true" class="item-title">
                                                <a href="<?php if ($post_link) {
                                                                echo $post_link;
                                                            } else {
                                                                echo ('#');
                                                            } ?>">
                                                    <div class="item-name">
                                                    <?php   if ($setting == 'manuelle Einstellung') :
                                                        echo $post_title; 
                                                    else:
                                                        ?>  <h3><?php echo $post_title; ?></h3>
                                                 <?php endif; ?>
                                                    </div>
                                                </a>
                                                <div class="btn_circle">
                                                    <?php $icon = get_stylesheet_directory() . '/img/icons/arrow.svg';
                                                    echo file_get_contents($icon);  
                                                    ?> 
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="leistungen-img <?php if ($img_height_desktop > $img_height_mobile) : ?> leistungen-img-pl-<?php echo $img_height_768; ?> leistungen-img-mob-<?php the_field('img_height_mobile'); endif ?>" style=' height: <?php the_field('img_height_desktop'); ?>px; '>
                                            <a href="<?php if ($post_link) {
                                                            echo $post_link;
                                                        } else {
                                                            echo ('#');
                                                        } ?>">
                                                <?php if ($setting == 'automatische Einstellung') :
                                                    echo $post_image;
                                                endif;
                                                if ($setting == 'manuelle Einstellung') :
                                                    echo wp_get_attachment_image($post_image['id'], 'large');
                                                endif; ?>
                                            </a>
                                        </div>
                                        </div>
                                        <div class="wrapper-show <?php if ($img_height_desktop > $img_height_mobile) : ?> leistungen-img-pl-<?php echo $img_height_768; ?> leistungen-img-mob-<?php the_field('img_height_mobile'); endif ?>" style=' height: <?php the_field('img_height_desktop'); ?>px; '>

                                            <div class=" wrapper-show-transform wrapper-show-transform-desktop-<?php echo $img_height_desktop; ?> <?php if ($img_height_desktop > $img_height_mobile) : ?> wrapper-show-transform-pl-<?php echo $img_height_768; ?> wrapper-show-transform-mob-<?php the_field('img_height_mobile'); endif ?>" >

                                            <div class="bg-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-leistungen.svg" alt="">
                                            </div>
                                            <?php if ($post_specialty) : ?>
                                                <div class="wrap__specialty">
                                                    <?php echo $post_specialty ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($post_text) : ?>
                                                <div class="wrap__text">
                                                    <?php echo $post_text ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($ctp == 'Berater') : ?>
                                                <div class="contact">
                                                    <div class="contact-title">
                                                        <?php if ($phone) : ?>
                                                            <div class="phone-title">Telefon</div>
                                                        <?php endif; ?>
                                                        <?php if ($fax) : ?>
                                                            <div class="fax-title">Fax</div>
                                                        <?php endif; ?>
                                                        <?php if ($email) : ?>
                                                            <div class="email-title">E-Mail</div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="contact-value">
                                                        <?php if ($phone) : ?>
                                                            <div class="footer-phone">
                                                            <?php $phone_new = str_replace(" ", '', $phone); ?>
                                                                <a href="tel:<?php echo $phone_new; ?>" class="phone">
                                                                    <?php echo $phone; ?>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($fax) : ?>
                                                            <div class="footer-fax">
                                                            <?php $fax_new = str_replace(" ", '', $fax); ?>
                                                                <a href="fax:<?php echo $fax_new; ?>" class="fax">
                                                                    <?php echo $fax; ?>
                                                                </a>
                                                            </div>   
                                                        <?php endif; ?>
                                                        <?php if ($email) : ?>
                                                            <div class="footer-email">
                                                                <a href="mailto:<?php echo $email; ?>" class="email"><?php echo $email; ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                    </div>
                </div>
    </section>
<?php } ?>