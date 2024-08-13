<?php
if (isset($block['data']['gutenberg_preview_image']) && $is_preview) {
    echo '<img src="' . get_stylesheet_directory_uri() . '/template-parts/blocks/sonder/references/references.jpg" style="max-width:100%; height:auto;">';
}

if (!$is_preview) {
    $id = 'references-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }

    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    $class_name = 'references';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }


    $title = get_field('titel');
    $subtitle = get_field('subtitle');
    $item = get_field('item');
    $img_height_desktop = get_field('img_height_desktop');
    $img_height_mobile = get_field('img_height_mobile');
    $img_height_768 = $img_height_desktop - 100;
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
                <?php if ($subtitle): ?>
                    <div data-aos="fade-up" data-aos-once="true" class="wrap__subtitle">
                        <?php echo $subtitle; ?>
                    </div>
                <?php endif; ?>
                <?php
                if ($item): ?>
                    <div class="postsList">
                        <?php foreach ($item as $post):
                            $post_image = $post['image'];
                            $post_title = $post['titel'];
                            $post_link = $post['link'];
                            $post_text = $post['text'];
                            ?>
                            <div class="postItem-references">
                                <div class="postItem-references_wrap">
                                    <div class="item-text-info">
                                        <div class="item-text">
                                            <div data-aos="fade-up" data-aos-once="true" class="item-title">
                                                <a href="<?php if ($post_link) {
                                                    echo $post_link;
                                                } else {
                                                    echo ('#');
                                                } ?>">
                                                    <div class="item-name">
                                                        <?php echo $post_title; ?>
                                                    </div>
                                                </a>
                                                <div class="btn_circle">
                                                    <?php $icon = get_stylesheet_directory() . '/img/icons/btn-right.svg';
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
                                                <?php echo wp_get_attachment_image($post_image['id'], 'large'); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="wrapper-show <?php if ($img_height_desktop > $img_height_mobile) : ?> leistungen-img-pl-<?php echo $img_height_768; ?> leistungen-img-mob-<?php the_field('img_height_mobile'); endif ?>" style=' height: <?php the_field('img_height_desktop'); ?>px; '>

                                        <div class=" wrapper-show-transform wrapper-show-transform-desktop-<?php echo $img_height_desktop; ?> <?php if ($img_height_desktop > $img_height_mobile) : ?> wrapper-show-transform-pl-<?php echo $img_height_768; ?> wrapper-show-transform-mob-<?php the_field('img_height_mobile'); endif ?>" >

                                        <div class="line"></div>
                                        <div class="wrapper-show-content">
                                            <div class="bg-image">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/bg-leistungen.svg" alt="">
                                            </div>
                                            <?php if ($post_text): ?>
                                                <div class="wrap__text">
                                                    <?php echo $post_text ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
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

<script>
 // $(document).ready(
 //  function(e) {
 


  /*  $('.references .btn_circle').click(function () {

  

    nice =   $(".wrapper-show_active .wrapper-show-content").niceScroll({
        cursorcolor:"#6dc0c8", 
        background:"#ecedee", 
        autohidemode:"false", 
        cursorborder:"none", 
        cursorwidth: "5px",
        cursorborderradius:"none"
      });*/

     
    /*  var nice1 = $(".wrapper-show_active .wrapper-show-content").getNiceScroll();
      $(".wrapper-show_active .wrapper-show-content").parent().append( $('<figure>' +
  '<div class="scroll">' +
  nice1(0) +
  '</div>' +
'</figure>'))

$(".wrapper-show_active .wrapper-show-content").parent().append($('<div>', {
        nice1
  }));*/


/*console.log('aaa');
var classList = $(".wrapper-show-transform").attr("class");
      //nice.hide();
      console.log(classList);
    //  nice(0).addClass('ddd');
    
    $("#ascrail2000").addClass('scroll scroll-372');
   
  //  nice.hide();*/


/*var setScroll = function(i) {
       if($(i).length>0)
       $(i).niceScroll().updateScrollBar();
} 
setScroll(".wrapper-show_active .wrapper-show-content");*/

  //});

  

//$('.wrapper-show_active .wrapper-show-content').getNiceScroll(0).doScrollTop($(selector).height() + 1, 1);
//console.log('Высота прокручиваемого блока: ' + $(selector).height());




  
</script>