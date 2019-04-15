<?php
    get_header();
?>
<?php
$kategorija_id = get_queried_object()->term_id;
$restoran = '';
$info_phone = get_template_directory_uri().'/public/img/phone.png';
$info_clock = get_template_directory_uri().'/public/img/clock.png';
$info_globe = get_template_directory_uri().'/public/img/globe.png';
if (isset($_GET ['restoran_name']))
{
    $restoran = $_GET ['restoran_name'];
    $restoran_id = $_GET['restoran_id'];
    $restoran_fiksni =  get_term_meta( $_GET['restoran_id'], 'restoran_fiksni', true);
    $restoran_mobilni = get_term_meta( $_GET['restoran_id'], 'restoran_mobilni', true);
    $restoran_facebook = get_term_meta( $_GET['restoran_id'], 'restoran_facebook', true);
    $restoran_vrijeme = get_term_meta( $_GET['restoran_id'], 'restoran_radno_vrijeme', true);
    if(!empty($restoran_fiksni) && !empty($restoran_mobilni)) {
        $telefon = $restoran_fiksni." | ".$restoran_mobilni;
    }
    else {
        $telefon = $restoran_fiksni;
    }
    $additional_info =
                '<div class="additional_row">
                    <div class="icon" style="background-image: url('.$info_phone.')"></div>
                    <div  class="info">
                        '.$telefon.'
                    </div>
                </div>
                <div  class="additional_row">
                    <div class="icon" style="background-image: url('.$info_clock.')"></div>
                    <div  class="info">
                        '.$restoran_vrijeme.'
                    </div>
                </div>
                <div  class="additional_row">
                    <div class="icon" style="background-image: url('.$info_globe.')"></div>
                    <div class="info">
                        <a href="'.$restoran_facebook.'">'.$restoran.'</a>
                    </div>
                </div>';
}
else
{
    if (isset($_GET['term_id'])){
        $kategorija_child = $_GET['term_id'];
    }
    $restoran = get_queried_object()->name;
    $additional_info = '';
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
                <h3><?php echo $restoran ?></h3>
            </div>
            <div class='additional_info'>
                <?php
                    echo $additional_info;
                ?>
            </div>
        </div>
        <div class="section_list">
            <table class="popis-jela">
                    <?php
                        if(!empty($_GET['restoran_id'])) {
                            echo restoran_jelo($kategorija_id, $restoran_id);
                        }
                        elseif (!empty($_GET['term_id']))
                        {
                            echo kategorija($kategorija_child);
                        }
                        else {
                            echo kategorija_child($kategorija_id);
                        }
                    ?>
            </table>
        </div>
    </div>      
</main>
<?php
    get_footer();
?>