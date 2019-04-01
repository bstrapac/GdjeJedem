<?php
    get_header();
?>
<body>
	<header >
		<section class="section-navigation">
            <div class="header-container">
                <div class="logo-holder">
                    <a href="<?php echo get_site_url(); ?>">
                        <div class="logo"></div>
                    </a>
                </div>
            </div>
		</section>
	</header>
    <main>
    <div class='title_container'>
        <div class='title_tax'>
            <h3>Politika privatnosti</h3>
        </div>
        
    </div>
    <div class="privacy_policy">
        <?php 
        if ( have_posts() ) 
        {
           while ( have_posts() )  
           {
              the_post(); 
              the_content();
           }
        }    
        ?>
    </div>
    </main>
<?php
    get_footer();
?>