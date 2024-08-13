jQuery( document ).ready(function() {
    var wxacs_themes = JSON.parse(wxacs_themes_data.data);

    var wxacs_theme_options = "";
    if(wxacs_themes.length>0){
        jQuery.each(wxacs_themes, function (key, val) {
            wxacs_theme_options+="<option value='"+val.id+"'>"+val.title+"</option>"
        });
    }else{
        wxacs_theme_options = "<option value='0'>No theme</option>";
    }




    jQuery(".wxacs_color_picker").spectrum({
        showAlpha: true,
        preferredFormat: "rgb",
    });
    //slider-input
    jQuery(".wxacs_number_slider").each(function () {
       var el_disable = jQuery(this).data("disable");
       var is_disable = false;
       if(el_disable === true){
           is_disable = true;
       }
       var wxacs_from = jQuery(this).data("from");
       var wxacs_to = jQuery(this).data("to");
       var wxacs_format = jQuery(this).data("format");
       wxacs_from = parseInt(wxacs_from);
       wxacs_to = parseInt(wxacs_to);
        jQuery(this).jRange({
            from: wxacs_from,
            to: wxacs_to,
            step: 1,
            theme:"theme-blue",
            scale: [wxacs_from , wxacs_to],
            format: wxacs_format,
            width: 300,
            showLabels: true,
            snap: true,
            disable:is_disable,
        });
    });


    jQuery("input[name='wxacs_ease_scroll']").on('change', function(){
        if (this.checked)
        {
            jQuery(".wxacs_ease_scroll_child").removeClass("wxacs_hidden");
        }else{
            jQuery(".wxacs_ease_scroll_child").addClass("wxacs_hidden");
        }
    });


    /*for add_selector*/

    var wxacs_actions_html = '<span class="wxacs_edit_selector wxacs_selector_action dashicons dashicons-edit"></span><span class="wxacs_delete_selector wxacs_selector_action dashicons dashicons-trash"></span>';
    var selectors_list_table = jQuery('#selectors_list_table').DataTable({
        order: [[ 0, "desc" ]],
    });

    jQuery(".add_selector").click(function () {
        var wxacs_selector = jQuery("#wxacs_selector").val();
        if(wxacs_selector!== ""){
            selectors_list_table.row.add( [
                wxacs_selector,
                '<select class="wxacs_select_theme">'+wxacs_theme_options+'</select>',
                wxacs_actions_html
            ] ).draw( false );
        }
        wxacs_update_selectors();
    });
    var wxacs_edit_flag = true;
    jQuery(document).on('click', '.wxacs_edit_selector', function (){
        if(wxacs_edit_flag) {
            var wxacs_row = jQuery(this).closest("tr");
            var wxacs_tds = wxacs_row.find("td").first();
            var selector_name = wxacs_tds.html();
            wxacs_tds.html("<input type='text' value='" + selector_name + "'><button class='wxacs_save_changes'>Add</button>");
            wxacs_edit_flag = false;
        }

    });
    jQuery(document).on('click', '.wxacs_delete_selector', function (){
        var wxacs_row = jQuery(this).closest("tr");
        selectors_list_table.row( wxacs_row ).remove().draw();
        wxacs_update_selectors();
    });
    jQuery(document).on('click', '.wxacs_save_changes', function (){
        var wxacs_row = jQuery(this).closest("tr");
        var wxacs_tds = wxacs_row.find("td").first();
        var selector_name = wxacs_tds.find("input").val();
        if(selector_name !== ""){
            wxacs_tds.html(selector_name);
            wxacs_edit_flag = true;
        }
        wxacs_update_selectors();
    });
    jQuery(document).on('change', '.wxacs_select_theme', function () {
        wxacs_update_selectors();
    });



    jQuery('body').on('click', '.wxacs_add_thumb_image', function(e){
        e.preventDefault();

        var button = jQuery(this);

        if(button.hasClass("wxacs_remove_image")){
            button.removeClass("wxacs_remove_image")
            jQuery(".wxacs_image").html("");
            button.html("Add thumb image");
        }else{
            button.addClass("wxacs_remove_image");
            button.html("Remove image");
            var custom_uploader = wp.media({
                title: 'Add thumb image',
                library : {
                    type : ['image' ]
                },
                button: {
                    text: 'Use this image'
                },
                multiple: true
            }).on('select', function() {
                var attachments = custom_uploader.state().get('selection');
                attachments.each(function(attachment) {
                    var image_url = attachment.attributes.url;
                    if(image_url !== "" && attachment.attributes.type === 'image'){
                        jQuery(".wxacs_image").html('<img class="wxacs_thumb_image" src="'+image_url+'"><input type="hidden" name="wxacs_image_id" value="'+attachment.id+'">');
                    }
                });
            }).open();
        }
    });
});



function wxacs_get_table_data() {
    var wxacs_selectors_data = [];
    jQuery("#selectors_list_table tbody tr").each(function (e) {
        var _this = jQuery(this);
        var selected_theme = _this.find("select").val();
        var selector_name = _this.find("td").first().html();
        var item_ob = {
            selector:selector_name,
            theme:selected_theme,
        }
        wxacs_selectors_data.push(item_ob);
    });
    return wxacs_selectors_data;
}
function wxacs_update_selectors() {
    var wxacs_selectors_data = wxacs_get_table_data();
    jQuery.ajax({
        type: "POST",
        url: wxacs_admin_ajax.url,
        dataType:"json",
        data: {
            action:'wxacs_add_selector',
            nonce: wxacs_admin_ajax.nonce,
            wxacs_data:wxacs_selectors_data,
        },
        success: function(data){
            if(data.success === true){

            }
        }
    });
}

