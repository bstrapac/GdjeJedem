<?php
    include __DIR__."/classes/class-cpt.php";
    include __DIR__."/classes/class-taxonomies.php";
    include __DIR__."/classes/class-cmb.php";
    include __DIR__."/actions/actions.php";
    include __DIR__."/image_upload/taxonomy_image_upload.php";
    include __DIR__."/custom_meta/restoran_meta.php";
    if ( ! function_exists( 'theme_init' ) )
    {
        function theme_init()
        {
            register_nav_menus
            (
                array
                    (
                        'primary' => "Main menu",
                        'secondary'=> "Secondary menu"
                    )
            );
        }
    }
    add_action( 'after_setup_theme', 'theme_init' );
    add_action( 'admin_enqueue_scripts', 'init_leaflet_css');
    add_action( 'admin_enqueue_scripts', 'init_leaflet_js');
    add_action( 'admin_enqueue_scripts', 'init_js_files');
    add_action( 'wp_enqueue_scripts', 'init_css_files' );
    add_action( 'wp_enqueue_scripts', 'init_leaflet_js');
    add_action( 'wp_enqueue_scripts', 'init_js_files');
    
    function init_css_files()
    {
        wp_enqueue_style( 'main-css', get_template_directory_uri() . '/public/main.css' );
        wp_enqueue_style( 'font-rubik', 'https://fonts.googleapis.com/css?family=Rubik', false );
        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.4.0/dist/leaflet.css');
    }
    function init_leaflet_css()
    {
        wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.4.0/dist/leaflet.css');
    }
    function init_js_files()
    {
        wp_enqueue_script( 'image-js', get_template_directory_uri() . '/image_upload/ImageHandler.js', array('jquery','media-upload'), true );
        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.4.0/dist/leaflet.js',  array('jquery'), true);
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/resources/js/script.js', array('jquery'), true);
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), true);
        wp_enqueue_media();
    }
    function init_leaflet_js($hook)
    {
        if($hook != 'edit-tags.php' && $hook != 'term.php') return;
        wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.4.0/dist/leaflet.js',  array('jquery'), true);
        wp_enqueue_script( 'leaf-admin-js', get_template_directory_uri() . '/resources/leaflet/leaflet-admin.js', array('jquery'), true);
    }
    $cpt = new customPostType();
    $tax = new customTaxonomies();
    $cmb = new customMetaBox();
    $img = new Dish_Taxonomy_Meta();
    $info = new customMetaRestoran();
?>