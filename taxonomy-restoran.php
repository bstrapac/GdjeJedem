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
$restoran_lat = get_term_meta( get_queried_object()->term_id, 'restoran_lat', true);
$restoran_lng = get_term_meta( get_queried_object()->term_id, 'restoran_lng', true);
$restoran_info = term_description();
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
                <ul id="menu" class="tab">
                    <li class="menu-item cjenik"> <a href="#">Cijenik</a></li>
                    <li class="menu-item about"> <a href="#">O nama</a></li>
                </ul> 
            </nav>
        </div>
            <div  class="section_jela">
                    <?php
                        echo kategorije_restorani($restoran_id, $restoran_name);
                    ?>
            </div>
        </div>
        <section class="section_about">
            <div class="about_descritpion">
               <?php
                    echo $restoran_info; 
                ?>
            </div>
                <div class="about_map" id="map"></div>  
                 <script type="text/javascript">
                        var map = L.map('map').setView( [45.8332815,17.3864087], 13);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                        var Icon = L.icon({
                            iconUrl: '<?php echo  get_template_directory_uri().'/public/img/marker.png' ?>',
                            iconSize:[50, 50]
                        });
                         L.marker([ <?php echo $restoran_lat ;?> , <?php echo $restoran_lng ;?>], {icon: Icon}).addTo(map);
                </script>
        </section> 
    </main>
<?php
    get_footer();
?>