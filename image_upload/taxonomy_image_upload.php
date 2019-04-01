<?php
class Dish_Taxonomy_Meta
{
    public function __construct()
    {
        add_action('vrste_jela' . '_add_form_fields', [$this, 'outputFields']);
        add_action('vrste_jela' . '_edit_form_fields', [$this, 'outputEditFields'], 1);
        add_action('created_' . 'vrste_jela', [$this, 'saveMetaData']);
        add_action('edited_' . 'vrste_jela', [$this, 'saveMetaData']);
    }
    public function outputFields()
    {
        $thumb = '';
        include_once (get_stylesheet_directory().'/image_upload/designs-thumb.php');
    }
    public function outputEditFields($tag) {
        $thumb = get_term_meta($tag->term_id, 'design-cat-background-image', true);
        include_once (get_stylesheet_directory().'/image_upload/designs-thumb.php');
    }
    public function saveMetaData($term_id) {
        if (isset($_REQUEST['design-cat-background-image'])) {
            update_term_meta( $term_id, 'design-cat-background-image', $_REQUEST['design-cat-background-image']);
        }
    }
}