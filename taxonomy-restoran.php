<?php
    get_header();
?>
<?php
$info_phone = get_template_directory_uri().'/public/img/phone.png';
$info_clock = get_template_directory_uri().'/public/img/clock.png';
$info_globe = get_template_directory_uri().'/public/img/globe.png';
$restoran_fiksni =  get_term_meta( get_queried_object()->term_id, 'restoran_fiksni', true);
$restoran_mobilni = get_term_meta( get_queried_object()->term_id, 'restoran_mobilni', true);
$restoran_facebook = get_term_meta( get_queried_object()->term_id, 'restoran_facebook', true);
$restoran_vrijeme = get_term_meta( get_queried_object()->term_id, 'restoran_radno_vrijeme', true);
$restoran_id = get_queried_object()->term_id;
$restoran_name = get_queried_object()->name;
if(!empty($restoran_fiksni) && !empty($restoran_mobilni)) {
    $telefon = $restoran_fiksni." | ".$restoran_mobilni;
}
else {
    $telefon = $restoran_fiksni;
}
?>
<body>
	<header >
		<section class="section-navigation">
            <div class="header-container">
                <div class="logo-holder">
                    <a href="<?php echo get_site_url().'/restoran'; ?>">
                        <div class="logo"></div>
                    </a>
                </div>
            </div>
		</section>
	</header>
    <main>
    <div class='title_container'>
        <div class='title_tax'>
            <h3><?php echo $restoran_name ?></h3>
        </div>
        <div class='additional_info'>
            <div class='additional_row'>
                <div class='icon' style='background-image: url( <?php echo $info_phone ?>)'></div>
                <div  class='info'>
                    <?php echo $telefon ?>
                </div>
            </div>
            <div  class='additional_row'>
                <div class='icon' style='background-image: url( <?php echo $info_clock ?>)'></div>
                <div  class='info'>
                    <?php echo $restoran_vrijeme ?>
                </div>
            </div>
            <div  class='additional_row'>
                <div class='icon' style='background-image: url( <?php echo $info_globe ?>)'></div>
                <div class='info'>
                    <a href="<?php echo $restoran_facebook ?>"><?php echo $restoran_name ?></a>
                </div>
            </div> 
        </div>    
    </div>
        <div class='navbar_secondary'>
            <nav class="menu" id="theMenu">
                    <?php
                        $args = array(
                            'theme_location'  =>  'secondary',
                            'menu_id'         =>  'menu',
                            'menu_class'      =>  'tab',
                        );
                        wp_nav_menu( $args );
                    ?>
            </nav>
        </div>
            <div  class="section_jela">
                    <?php
                        echo kategorije_restorani($restoran_id, $restoran_name);
                    ?>
            </div>
        </div>
    </main>
<?php
    get_footer();
?>