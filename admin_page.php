<div class="wrap">

    <h2>Mini Popup</h2>
    <p>A simple plugin to display pop-up on your homepage with lightbox effect. Select an image and pick your URL destination. Turn it on or off. Done!</p>

    <form method="post">
    <?php wp_nonce_field( 'minipop-nonce' ); ?>

    <table class="form-table" role="presentation" style="border-bottom: 2px solid #000">
        <tr>
            <th scope="row" width="20%">Turn On / Off</th>
            <td>

            <fieldset><label for="minipop_iszuddin_toggle">
            <input name="minipop_iszuddin_toggle" type="checkbox" id="minipop_iszuddin_toggle" value="1" 
            <?php checked( get_option('minipop_iszuddin_toggle', 0), 1 ); ?>    
            />
	        Is the pop-up on or off?</label></fieldset>

            </td>
        </tr>
        <tr>
            <th scope="row" colspan="2" style="border-bottom: 2px solid #000"><h3 style="margin-bottom: 0px;">Desktop Screen</h3></th>
        </tr>
        <tr>
            <th scope="row"><label for="minipop_iszuddin_desktop_popup">Pop-up Image</label></th>
            <td><input type="text" class="regular-text" name="minipop_iszuddin_desktop_popup" id="minipop_iszuddin_desktop_popup"
                value="<?php echo esc_attr( get_option('minipop_iszuddin_desktop_popup', '') ) ?>">
                <input type="button" class="button media-upload-button" value="Select or Upload" data-field="minipop_iszuddin_desktop_popup">
                <p class="description">Recommended size of horizontal 1000 x 533 pixels</p>
            </td>            
        </tr>
        <tr>
            <th scope="row"><label for="minipop_iszuddin_desktop_url">URL</label></th>
            <td><input type="text" class="regular-text" name="minipop_iszuddin_desktop_url" id="minipop_iszuddin_desktop_url"
                value="<?php echo esc_attr( get_option('minipop_iszuddin_desktop_url', '#') ) ?>">
            </td>              
        </tr>
        <tr>
            <th scope="row" colspan="2" style="border-bottom: 2px solid #000"><h3 style="margin-bottom: 0px;">Mobile Screen</h3></th>
        </tr>
        <tr>
            <th scope="row"><label for="minipop_iszuddin_mobile_popup">Pop-up Image</label></th>
            <td><input type="text" class="regular-text" name="minipop_iszuddin_mobile_popup" id="minipop_iszuddin_mobile_popup"
                value="<?php echo esc_attr( get_option('minipop_iszuddin_mobile_popup', '') ) ?>">
                <input type="button" class="button media-upload-button" value="Select or Upload" data-field="minipop_iszuddin_mobile_popup">
                <p class="description">Recommended size of portrait 600 x 1000 pixels</p>

            </td>            
        </tr>
        <tr>
            <th scope="row"><label for="minipop_iszuddin_mobile_url">URL</label></th>
            <td><input type="text" class="regular-text" name="minipop_iszuddin_mobile_url" id="minipop_iszuddin_mobile_url"
                value="<?php echo esc_attr( get_option('minipop_iszuddin_mobile_url', '#') ) ?>">
            </td>              
        </tr>
    </table>
<p>The pop-up requires that you set the image for both desktop and mobile to work. If there is no value for both or either of the images, the pop-up will not trigger on the homepage.</p>
    <?php submit_button('Save Settings'); ?>

    </form>
</div>