<?php
class customMetaBox{
    const SLUG_JELO = customPostType::SLUG_JELO;
    function __construct()
    {
        add_action('add_meta_boxes', array( $this, 'add_meta_box_cijene'));
        add_action('save_post',array( $this, 'spremi_cijene'));
    }

    function add_meta_box_cijene()
    {
        add_meta_box('meta-box-cijene',
            'Cijene:',
            array( $this, 'custom_meta_box_markup' ),
            self::SLUG_JELO,
            'normal',
            'default');
    }
    public function custom_meta_box_markup($post)
    {
        wp_nonce_field('spremi_cijene', 'cijena_normal_nonce');
        wp_nonce_field('spremi_cijene', 'cijena_small_nonce');
        wp_nonce_field('spremi_cijene', 'cijena_large_nonce');
        wp_nonce_field('spremi_cijene', 'cijena_grande_nonce');
        wp_nonce_field('spremi_cijene', 'cijena_jumbo_nonce');

        $cijena_normal = get_post_meta($post->ID, 'cijena_normal', true);
        $cijena_small = get_post_meta($post->ID, 'cijena_small', true);
        $cijena_large = get_post_meta($post->ID, 'cijena_large', true);
        $cijena_grande = get_post_meta($post->ID, 'cijena_grande', true);
        $cijena_jumbo = get_post_meta($post->ID, 'cijena_jumbo', true);

        echo /**@lang text*/ '<div>
                <div>
                    <label for="cijena_normal">Cijena: </label>
                    <input id="cijena_normal" name="cijena_normal" type="text" value="'.$cijena_normal.'">
                    <br>
                    <label for="cijena_small"> Cijena (mala): </label>
                    <input id="cijena_small" name="cijena_small" type="text" value="'.$cijena_small.'">
                    <br>
                    <label for="cijena_large"> Cijena (veliki): </label>
                    <input id="cijena_large" name="cijena_large" type="text" value="'.$cijena_large.'">
                    <br>
                    <label for="cijena_grande"> Cijena (grande): </label>
                    <input id="cijena_grande" name="cijena_grande" type="text" value="'.$cijena_grande.'">
                    <br>
                    <label for="cijena_jumbo"> Cijena (jumbo): </label>
                    <input id="cijena_jumbo" name="cijena_jumbo" type="text" value="'.$cijena_jumbo.'">
                    <br>
                </div>
              </div>';
    }
    function spremi_cijene($post_id)
    {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision( $post_id );
        $is_valid_nonce_normal = ( isset( $_POST[ 'cijena_normal_nonce' ] ) && wp_verify_nonce( $_POST[ 'cijena_normal_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        $is_valid_nonce_small = ( isset( $_POST[ 'cijena_small_nonce' ] ) && wp_verify_nonce( $_POST[ 'cijena_small_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        $is_valid_nonce_large = ( isset( $_POST[ 'cijena_large_nonce' ] ) && wp_verify_nonce( $_POST[ 'cijena_large_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        $is_valid_nonce_grande = ( isset( $_POST[ 'cijena_grande_nonce' ] ) && wp_verify_nonce( $_POST[ 'cijena_grande_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        $is_valid_nonce_jumbo = ( isset( $_POST[ 'cijena_jumbo_nonce' ] ) && wp_verify_nonce( $_POST[ 'cijena_jumbo_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
        if ( $is_autosave || $is_revision || !$is_valid_nonce_normal || !$is_valid_nonce_small || !$is_valid_nonce_large || !$is_valid_nonce_grande || !$is_valid_nonce_jumbo)
        {
            return;
        }
        if(!empty($_POST['cijena_normal']))
        {
            update_post_meta($post_id, 'cijena_normal', $_POST['cijena_normal']);
        }
        else
        {
            delete_post_meta($post_id, 'cijena_normal');
        }

        if(!empty($_POST['cijena_small']))
        {
            update_post_meta($post_id, 'cijena_small', $_POST['cijena_small']);
        }
        else
        {
            delete_post_meta($post_id, 'cijena_small');
        }

        if(!empty($_POST['cijena_large']))
        {
            update_post_meta($post_id, 'cijena_large', $_POST['cijena_large']);
        }
        else
        {
            delete_post_meta($post_id, 'cijena_large');
        }

        if(!empty($_POST['cijena_grande']))
        {
            update_post_meta($post_id, 'cijena_grande', $_POST['cijena_grande']);
        }
        else
        {
            delete_post_meta($post_id, 'cijena_grande');
        }
        if(!empty($_POST['cijena_jumbo']))
        {
            update_post_meta($post_id, 'cijena_jumbo', $_POST['cijena_jumbo']);
        }
        else
        {
            delete_post_meta($post_id, 'cijena_jumbo');
        }
    }
}
?>