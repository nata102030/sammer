<?php
$wxacs_selectors = get_option("wxacs_selectors");
?>
<h1 class="wxacs_section_title wp-heading-inline">Add selector</h1>
<div class="wxacs_add_selector">
    <div class="wxacs_selector_tools">
        <label for="wxacs_selector">Add selector</label>
        <input name="wxacs_selector" id="wxacs_selector">
        <button class="add_selector">Add</button>
    </div>
    <div class="selectors_list">
        <table id="selectors_list_table" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Selector name</th>
                <th>Theme</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php if(is_array($wxacs_selectors)): ?>
                <?php foreach ($wxacs_selectors as $wxacs_selector):?>
                    <tr>
                        <td><?php echo $wxacs_selector["selector"]?></td>
                        <td>
                            <select class="wxacs_select_theme">
                                <?php if(isset($wxacs_themes_list) && is_array($wxacs_themes_list) && !empty($wxacs_themes_list)):?>
                                    <?php foreach ($wxacs_themes_list as $wxacs_theme):?>
                                        <?php
                                            $wxacs_selected = "";
                                            if($wxacs_selector["theme_id"] === $wxacs_theme["id"]){
                                                $wxacs_selected = "selected";
                                            }
                                        ?>
                                        <option value="<?php echo $wxacs_theme["id"]?>" <?php echo $wxacs_selected;?>><?php echo $wxacs_theme["title"];?></option>
                                    <?php endforeach;?>
                                <?php else:?>
                                    <option value="0">No theme</option>
                                <?php endif;?>
                            </select>
                        </td>
                        <td>
                            <span class="wxacs_edit_selector wxacs_selector_action dashicons dashicons-edit"></span>
                            <span class="wxacs_delete_selector wxacs_selector_action dashicons dashicons-trash"></span>
                        </td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
            </tbody>
            <tfoot>
            <tr>
                <th>Selector name</th>
                <th>Theme</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
