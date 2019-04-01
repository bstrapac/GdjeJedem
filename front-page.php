<?php
    get_header();
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
    <div class="navbar">
        <nav class="menu" id="theMenu">
            <?php
            $args = array(
                'theme_location'  =>  'primary',
                'menu_id'       =>  'menu',
                'menu_class'    =>  'tab',
            );
            wp_nav_menu( $args );
            ?>
        </nav>
    </div>
    <div>
       <table class="popis-restorana">
               <?php
                 echo restorani();
               ?>
       </table>
    </div>    
</main>
<?php
    get_footer();
?>
