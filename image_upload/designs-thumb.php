<th scope="row" valign="top">
    <label for="presenter_id">Thumbnail: </label>
</th>
<td>
    <div class="moment-input-option designs-thumb-field">
        <button class="button upload-image upload-image-background"><?php _e("Upload", "momoments"); ?></button>
        <br><br>
        <input type="text" name="design-cat-background-image" class="moments-background-image moments-images-input" value="<?php echo $thumb ?>"  readonly>
        <br>
        <img class='taxonomy-term-image-attach' src='<?php echo $thumb ?>'/>
    </div>
</td>
<br>