<?php
class customMetaRestoran{
    public function __construct()
    {
        add_action('restoran' . '_add_form_fields', [$this, 'outputField']);
        add_action('restoran' . '_edit_form_fields', [$this, 'outputEditField'], 1);
        add_action('created_' . 'restoran', [$this, 'saveMetaData']);
        add_action('edited_' . 'restoran', [$this, 'saveMetaData']);
    }
    public function outputField()
    {
        $fiksni = '';
        $mobilni = '';
        $adresa = '';
        $facebook = '';
        $radno_vrijeme = '';
        include_once (get_stylesheet_directory().'/custom_meta/field_design.php');
    }
    public function outputEditField($tag) {
        $fiksni = get_term_meta($tag->term_id, 'restoran_fiksni', true);
        $mobilni = get_term_meta($tag->term_id, 'restoran_mobilni', true);
        $adresa = get_term_meta($tag->term_id, 'restoran_adresa', true);
        $facebook = get_term_meta($tag->term_id, 'restoran_facebook', true);
        $radno_vrijeme = get_term_meta($tag->term_id, 'restoran_radno_vrijeme', true);
        include_once (get_stylesheet_directory().'/custom_meta/field_design.php');
    }
    public function saveMetaData($term_id) {
        if (isset($_REQUEST['restoran_fiksni']) && isset($_REQUEST['restoran_mobilni']) && isset($_REQUEST['restoran_adresa']) && isset($_REQUEST['restoran_facebook']))
        {
            update_term_meta( $term_id, 'restoran_fiksni', $_REQUEST['restoran_fiksni']);
            update_term_meta( $term_id, 'restoran_mobilni', $_REQUEST['restoran_mobilni']);
            update_term_meta( $term_id, 'restoran_adresa', $_REQUEST['restoran_adresa']);
            update_term_meta( $term_id, 'restoran_facebook', $_REQUEST['restoran_facebook']);
            update_term_meta( $term_id, 'restoran_radno_vrijeme', $_REQUEST['restoran_radno_vrijeme']);
        }
    }
}