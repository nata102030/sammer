jQuery(function($) {
    var custom_content_scrollbar_custom_uploader;
    $('#upload_image_button').on('click', function(e) {
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_content_scrollbar_custom_uploader) {
            custom_content_scrollbar_custom_uploader.open();
            return;
        }
        //Extend the wp.media object
        custom_content_scrollbar_custom_uploader = wp.media({
            title: 'Choose Image Gallery',
            button: {
                text: 'Insert Image Gallery'
            },
            multiple: true,
        });
        
        //When a file is selected, grab the URL and set it as the text field's value
        custom_content_scrollbar_custom_uploader.on('select', function() {
            var custom_content_scrollbar_selection = custom_content_scrollbar_custom_uploader.state().get('selection');
            var increment_i = 1;
            custom_content_scrollbar_selection.map( function( attachment ) {
                attachment = attachment.toJSON();
                var all_images = "<div class='single-image'><span class='dashicons dashicons-no-alt'></span><img src='"+attachment.url+"' /></div>";
                if (increment_i === 1) {
                    $("#uploaded-images").html("");
                }
                $("#uploaded-images").append(all_images);

                $("#uploaded-images .single-image span.dashicons-no-alt").on('click', function() {
                    $(this).parent().remove();
                });
                increment_i++;
            });
        });

        custom_content_scrollbar_custom_uploader.open();
        return false;
   });


    $(document).ready(function(){
        $('#insert-scrollbar-shortcode').on('click', function() {
            $('.scrollbar-shrotcode-container-area').show();
        }); 

        $('.scrollbar-shortcode-close').on('click', function() {
            $('.scrollbar-shrotcode-container-area').hide();
        }); 

        $('.scrollbar-shortcode-insert button').on('click', function() {
            
            // set up variables to contain our input values
            var scrollbar_theme = $('.scrollbar-shortcode-content select#scrollbar_theme').val();               
            var custom_class = $('.scrollbar-shortcode-content input#custom_class').val();
            var arrow_button_mode = $('.scrollbar-shortcode-content select#arrow_button_mode').val();           
            var width = $('.scrollbar-shortcode-content input#width').val();
            var height = $('.scrollbar-shortcode-content input#height').val();
            var unit_type_width = $('.scrollbar-shortcode-content select#unit_type_width').val();
            var unit_type_tablet_device_width = $('.scrollbar-shortcode-content select#unit_type_tablet_device_width').val();
            var unit_type_mobile_device_horizontal = $('.scrollbar-shortcode-content select#unit_type_mobile_device_horizontal').val();
            var unit_type_mobile_device_vertical = $('.scrollbar-shortcode-content select#unit_type_mobile_device_vertical').val();
            var tablet_device_width = $('.scrollbar-shortcode-content input#tablet_device_width').val();
            var mobile_device_horizontal = $('.scrollbar-shortcode-content input#mobile_device_horizontal').val();
            var mobile_device_vertical = $('.scrollbar-shortcode-content input#mobile_device_vertical').val();
            var axis = $('.scrollbar-shortcode-content select#axis').val();
            var mouse_wheel_axis = $('.scrollbar-shortcode-content select#mouse_wheel_axis').val();
            var scroll_to_y = $('.scrollbar-shortcode-content input#scroll_to_y').val();
            var scroll_to_x = $('.scrollbar-shortcode-content input#scroll_to_x').val();
            var scrollbar_position = $('.scrollbar-shortcode-content select#scrollbar_position').val();
            var scroll_speed = $('.scrollbar-shortcode-content input#scroll_speed').val();
            var snap_amount = $('.scrollbar-shortcode-content input#snap_amount').val();
            var auto_hide_mode = $('.scrollbar-shortcode-content select#auto_hide_mode').val();         
            var upload_type = $('.scrollbar-shortcode-content select#upload_type').val();           
            var auto_expand_mode = $('.scrollbar-shortcode-content select#auto_expand_mode').val();
            var rtl = $('.scrollbar-shortcode-content select#rtl').val();
            var text_content = $('.scrollbar-shortcode-content textarea#text_content').val();
            var nested_shortcode = $('.scrollbar-shortcode-content select#nested_shortcode').val();
            var custom_style = $('.scrollbar-shortcode-content select#custom_style').val();
            var dragger_rail_color = $('.scrollbar-shortcode-content input#dragger_rail_color').val();
            var dragger_rail_width = $('.scrollbar-shortcode-content input#dragger_rail_width').val();
            var dragger_rail_border_radius = $('.scrollbar-shortcode-content input#dragger_rail_border_radius').val();
            var dragger_bar_color = $('.scrollbar-shortcode-content input#dragger_bar_color').val();
            var dragger_bar_width = $('.scrollbar-shortcode-content input#dragger_bar_width').val();
            var dragger_bar_border_radius = $('.scrollbar-shortcode-content input#dragger_bar_border_radius').val();
            var dragger_bar_hover_color = $('.scrollbar-shortcode-content input#dragger_bar_hover_color').val();
            var dragger_rail_margin = $('.scrollbar-shortcode-content input#dragger_rail_margin').val();
            var dragger_bar_margin = $('.scrollbar-shortcode-content input#dragger_bar_margin').val();
            var horizontal_div_width = $('.scrollbar-shortcode-content input#horizontal_div_width').val();
                     
            var output = '';
            var nested_shortcode_start = '';
            var nested_shortcode_end = '';
            if(nested_shortcode)
            nested_shortcode_start =  '-' + nested_shortcode+' ';
            if(nested_shortcode)
            nested_shortcode_end = '-' + nested_shortcode;
            
            // setup the output of our shortcode
            var openning_div = "";
            var closing_div = "";
            if (axis == "x" || axis == "yx") {
                div_width =  "";
                if (horizontal_div_width) {
                    div_width =  horizontal_div_width+"px";
                }
                var openning_div = '<br>[custom-content-scrollbar-div'+nested_shortcode_start+' '+'width="'+div_width+'"]';
                var closing_div = '[/custom-content-scrollbar-div'+nested_shortcode_end+']<br>';
            }
            
            output = '[custom-content-scrollbar'+nested_shortcode_start+' ';
            if(scrollbar_theme)
            output += 'themes="' + scrollbar_theme + '" ';
            if(custom_class)
            output += 'class="' + custom_class + '" ';
            if(arrow_button_mode)
            output += 'arrow_button_mode="' + arrow_button_mode + '" ';             
            if(width)
            output += 'width="' + width + unit_type_width + '" ';
            if(height)
            output += 'height="' + height + 'px" ';
            if(tablet_device_width)
            output += 'tablet_device_width="' + tablet_device_width + unit_type_tablet_device_width + '" ';
            if(mobile_device_horizontal)
            output += 'mobile_device_horizontal="' + mobile_device_horizontal + unit_type_mobile_device_horizontal + '" ';
            if(mobile_device_vertical)
            output += 'mobile_device_vertical="' + mobile_device_vertical + unit_type_mobile_device_vertical + '" ';
            if(axis)
            output += 'axis="' + axis + '" ';
            if(scroll_to_y)
            output += 'scroll_to_y="' + scroll_to_y + '" '; 
            if(scroll_to_x)
            output += 'scroll_to_x="' + scroll_to_x + '" '; 
            if(mouse_wheel_axis)
            output += 'mouse_wheel_axis="' + mouse_wheel_axis + '" ';               
            if(scrollbar_position)
            output += 'scrollbar_position="' + scrollbar_position + '" ';
            if(scroll_speed)
            output += 'scroll_speed="' + scroll_speed + '" ';
            if(auto_hide_mode)
            output += 'auto_hide_mode="' + auto_hide_mode + '" ';
            if(auto_expand_mode)
            output += 'auto_expand_mode="' + auto_expand_mode + '" ';
            if(snap_amount)
            output += 'snap_amount="' + snap_amount + '" ';
            if(custom_style)
            output += 'custom_style="' + custom_style + '" ';
            if(upload_type)
            output += 'upload_type="' + upload_type + '" ';
            if(custom_style == "true") {
                if(dragger_rail_color)
                output += 'dragger_rail_color="' + dragger_rail_color + '" ';
                if(dragger_rail_width)
                output += 'dragger_rail_width="' + dragger_rail_width + '" ';
                if(dragger_rail_border_radius)
                output += 'dragger_rail_border_radius="' + dragger_rail_border_radius + '" ';
                if(dragger_bar_color)
                output += 'dragger_bar_color="' + dragger_bar_color + '" ';
                if(dragger_bar_width)
                output += 'dragger_bar_width="' + dragger_bar_width + '" ';
                if(dragger_bar_border_radius)
                output += 'dragger_bar_border_radius="' + dragger_bar_border_radius + '" ';
                if(dragger_bar_hover_color)
                output += 'dragger_bar_hover_color="' + dragger_bar_hover_color + '" ';
                if(dragger_rail_margin)
                output += 'dragger_rail_margin="' + dragger_rail_margin + '" ';
                if(dragger_bar_margin)
                output += 'dragger_bar_margin="' + dragger_bar_margin + '" ';
            }
            var all_images_with = $('#uploaded-images img').map(function(){
               return "<div class='wp-scrollbar-image'><img src='"+this.currentSrc+"' src='"+this.currentSrc+"' /></div>";
            }).get();
            if (upload_type == "gallery") {
                text_content = all_images_with.join("");
                text_content = (text_content) ? text_content : '<br> Add your images here <br>' ;
            } else {
                text_content = (text_content) ? '<br>'+text_content+'<br>' : '<br> Write or insert your code here <br>' ;
            }
            if(rtl)
            output += 'rtl="' + rtl + '" '; 
            output += ']' + openning_div + text_content + closing_div + '[/custom-content-scrollbar'+nested_shortcode_end+']';
            
            if(tinyMCE && tinyMCE.activeEditor) {
                tinyMCE.activeEditor.execCommand( 'mceInsertContent', false, output );
            } 
            var create_text_mode = document.querySelector(".html-active .wp-editor-area").selectionStart;
            var custom_content_scrollbar_textAreaTxt = jQuery(".html-active .wp-editor-area").val();
            jQuery(".html-active .wp-editor-area").val(custom_content_scrollbar_textAreaTxt.substring(0, create_text_mode) + output + custom_content_scrollbar_textAreaTxt.substring(create_text_mode) );

            $('.scrollbar-shrotcode-container-area').hide();
        });  
    });

    /*$(document).mouseup(function (e) {
        var container = $(".scrollbar-shrotcode-container");
        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            $(".scrollbar-shrotcode-container-area").hide();
        }
    });*/

    // Show/hide scroll to field by axis
    $(function () {
        $( '.scroll-to-x' ).hide();
        $( '.scroll-to-y' ).hide();
        $( '.custom-style' ).hide();
        $( '.horizontal-margin' ).hide();
        $( '.horizontal-div-width' ).hide();
        $( '.responsive-width' ).hide();
        $( '#axis' ).on( 'change', function() {
            if ( $( this ).val() == "y" ) {
                $( '.scroll-to-y' ).slideDown();
                $( '.scroll-to-x' ).slideUp();
                $( '.horizontal-div-width' ).slideUp();
            } else if ( $( this ).val() == "x" ) {
                $( '.scroll-to-x' ).slideDown();
                $( '.horizontal-margin' ).slideDown();
                $( '.horizontal-div-width' ).slideDown();
            } else if ( $( this ).val() == "yx" ) {
                $( '.scroll-to-y' ).slideDown();
                $( '.scroll-to-x' ).slideDown();
                $( '.horizontal-div-width' ).slideDown();
            }
        } ).trigger( 'change' );

        $( '#responsive_width' ).on( 'change', function() {
            if ( $( this ).val() == "yes" ) {
                $( '.responsive-width' ).slideDown();
            } else {
                $( '.responsive-width' ).slideUp();
            } 
        } ).trigger( 'change' );

        $( '#custom_style' ).on( 'change', function() {
            if ( $( this ).val() == "true" ) {
                $( '.custom-style' ).slideDown();
            } else {
                $( '.custom-style' ).slideUp();
            } 
        } ).trigger( 'change' );

        $( '#upload_type' ).on( 'change', function() {
            if ( $( this ).val() == "gallery" ) {
                $( '.content-field' ).slideUp();
                $( '.gallery-field' ).slideDown();
            } else {
                $( '.gallery-field' ).slideUp();
                $( '.content-field' ).slideDown();
            } 
        } ).trigger( 'change' );
    });

});
