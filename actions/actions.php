<?php
require_once(get_stylesheet_directory() . '/classes/class-cpt.php');
require_once(get_stylesheet_directory() . '/classes/class-cmb.php');
const SLUG_RESTORAN = customTaxonomies::SLUG_RESTORAN;
const SLUG_SASTOJCI = customTaxonomies::SLUG_SASTOJCI;
const SLUG_JELO = customPostType::SLUG_JELO;
const SLUG_VRSTE_JELA = 'vrste_jela';
function kategorije_jela()
{
	$args = array(
		'taxonomy' => SLUG_VRSTE_JELA,
		'parent' => 0
	);
	$vrste_jela = get_terms ($args);
	$html = "";
	foreach ($vrste_jela as $vrsta_jela)
	{
		$img = get_term_meta( $vrsta_jela->term_id, 'design-cat-background-image',  true );
		$url = get_term_link($vrsta_jela->term_id, SLUG_VRSTE_JELA);
		$row = 
		"<div class='thumb_holder'>
			<a href='".$url."'>
				<div class='thumbnail_jelo' style='background-image: url(".$img.");'></div>
			<h3 class='thumbnail_title'>".$vrsta_jela->name."</h3>
			 <div class='thumb_overlay'></div></a>
		</div>";
		$html .= $row;
	}
	return $html;
}
function restorani()
{
	$args = array(
		'taxonomy' => SLUG_RESTORAN,
		'hide_empty' => false
	);
	$restorani = get_terms($args);
	$html = "<tbody>";
	foreach ($restorani as $restoran)
	{
		$fiksni = 	get_term_meta( $restoran->term_id, 'restoran_fiksni',  true );
		$mobilni = 	get_term_meta( $restoran->term_id, 'restoran_mobilni',  true );
		$facebook = get_term_meta( $restoran->term_id, 'restoran_facebook',  true );
        $url = get_term_link($restoran->term_id, SLUG_RESTORAN);       
        $logo =  get_template_directory_uri().'/public/img/facebook.png';
		$row =
			"<tr class='restoran'>
                   <td class='name'><a href='".$url."'>".$restoran->name."</a></td>
                   <td class='phone'>".$mobilni."</td>
                   <td class='phone'>".$fiksni."</td>
                   <td class='fb_fill'><a href='".$facebook."'>
                            <div class='fill' style='background-image: url(".$logo.")'></div>
                        </a>
                    </td>
               </tr>";
		$html .= $row;
	}
    $html .= "</tbody>";
	return $html;
}
function kategorije_restorani($restoran_id, $restoran_name)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'jelo',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => SLUG_RESTORAN,
                'field' => 'term_id',
                'terms' => $restoran_id
            )
        ));
    $jela = get_posts($args);
    $all_terms = array();
    $html = "";
    foreach ($jela as $jelo) {
        $args = array(
            'parent' => 0
        );
        $terms = wp_get_post_terms($jelo->ID, SLUG_VRSTE_JELA, $args);
        if(!in_array($terms, $all_terms))
        {
            $all_terms[] = $terms;
        }
    }
    foreach ($all_terms as $single=>$value) {
        foreach ($value as $val)
        {
            $img = get_term_meta($val->term_id, 'design-cat-background-image', true);
            $url = get_term_link($val->term_id, SLUG_VRSTE_JELA);
            $row = 
                "<div class='thumb_holder'>
                    <a href='".$url."?restoran_id=".$restoran_id."&restoran_name=".$restoran_name."'>
                        <div class='thumbnail_jelo' style='background-image: url(".$img.");'></div>
                        <h3 class='thumbnail_title'>".$val->name."</h3>
                     <div class='thumb_overlay'></div></a>
                </div>";
            $html .= $row;
        }
    }
    return $html;
}
function jela_kategorija($kategorija_id)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'jelo',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => SLUG_VRSTE_JELA,
                'field' => 'term_id',
                'terms' => $kategorija_id
            )
        ));
    $jela = get_posts($args);
    $html = "<tbody>";
    foreach ($jela as $jelo) {
        $row = 
            "<tr class='restoran'>
                <td class='name'><a href='".$jelo->guid."'>".$jelo->post_title."</a></td>
                <td></td>                      
             </tr>";
            $html .= $row;
    }
    $html .= "</tbody>";
    return $html;
}
function restoran_jelo($kategorija_id, $restoran_id)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'jelo',
        'post_status' => 'publish',
        'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => SLUG_VRSTE_JELA,
                    'field' => 'term_id',
                    'terms' => $kategorija_id
                ),
                array(
                    'taxonomy' => SLUG_RESTORAN,
                    'field' => 'term_id',
                    'terms' => $restoran_id
                )
        ));
    $jela = get_posts($args);
    $cijena_add = "";
    if($kategorija_id === 4)
    {
        $html ="<thead>
        <tr>
            <th class='meal_name'>NAZIV</th>
            <th class='sastojci_title'>SASTOJCI</th>
            <th class='price'>NORMAL</th>
            <th class='price'>JUMBO</th>
        </tr>
    </thead>
    <tbody>";
    }
    else {
        $html ="<thead>
                <tr>
                    <th class='meal_name'>NAZIV</th>
                    <th class='sastojci_title'>SASTOJCI</th>
                    <th class='price'></th>
                    <th class='price'>CIJENA</th>
                </tr>
            </thead>
            <tbody>";
    }
    
    foreach ($jela as $jelo) {
        $cijena_normal = get_post_meta($jelo->ID, 'cijena_normal', true);
        $cijena_small = get_post_meta($jelo->ID, 'cijena_small', true);
        $cijena_large = get_post_meta($jelo->ID, 'cijena_large', true);
        $cijena_grande = get_post_meta($jelo->ID, 'cijena_grande', true);
        $cijena_jumbo = get_post_meta($jelo->ID, 'cijena_jumbo', true);
        $sastojci = wp_get_post_terms($jelo->ID, SLUG_SASTOJCI);
        $sastojci_list = array();
        foreach ($sastojci as $sastojak=>$val)
        {
            $sastojci_list [] = $val->name;
        }
        $single = implode(', ',$sastojci_list);
        if(!empty($sastojci))
        {
            $sastojci_display = "(".$single.") ";
        }
        else{
            $sastojci_display = "";
        }
        if (!empty($cijena_normal) && !empty($cijena_jumbo))
        {
            $row =
                "<tr class='jelo'>
                    <td class='meal_name'>".$jelo->post_title."</td> 
                    <td class='sastojci'>".$sastojci_display."</td> 
                    <td class='price'>".$cijena_normal." kn</td> 
                    <td class='price'>".$cijena_jumbo." kn</td>               
                </tr>";
        }
        elseif(!empty($cijena_large) && !empty($cijena_jumbo))
        {
            $row =
                "<tr class='jelo'>
                    <td class='meal_name'>".$jelo->post_title."</td> 
                    <td class='sastojci'>".$sastojci_display."</td> 
                    <td class='price'>".$cijena_large." kn</td> 
                    <td class='price'>".$cijena_jumbo." kn</td>               
                </tr>";
        }
        elseif (empty($cijena_jumbo))
        {
            if(empty($cijena_normal))
            {
                $cijena_normal = $cijena_large;
            }
            $row = 
                "<tr class='jelo'>
                    <td class='meal_name'>".$jelo->post_title."</td> 
                    <td class='sastojci'>".$sastojci_display."</td>
                    <td class='price'></td> 
                    <td class='price'>".$cijena_normal." kn</td>               
                </tr>";
        }
        elseif (!empty($cijena_small) && !empty($cijena_large))
        {
            $row = 
                "<tr class='jelo'>
                    <td class='meal_name'>".$jelo->post_title."</td> 
                    <td class='sastojci'>".$sastojci_display."</td> 
                    <td class='price'>".$cijena_normal." kn</td>   
                    <td class='price'>".$cijena_large." kn</td>              
                </tr>";
        }

        $html .= $row;
    };
    $html .= "</tbody>";
    return $html;
}
function kategorija_child($kategorija_id)
{
    $args = array (
        'taxonomy'=> SLUG_VRSTE_JELA,
        'parent'=> 0
    );
    $kategorije_child = get_terms($args);
    $html = "<tbody>";
    foreach ($kategorije_child as $child) {
        if ( $kategorija_id === $child->term_id) {
            $args = array(
                'parent' => $child->term_id,
                'orderby' => 'slug',
                'hide_empty' => false );
            $terms = get_terms( SLUG_VRSTE_JELA, $args );
            if($terms) {
                foreach ( $terms as $term ) {
                    $term_id = $term->term_id;
                    $url = get_term_link($term->term_id, SLUG_VRSTE_JELA);
                    $row = 
                        "<tr class='child'>   
                            <td ><a href='".$url."?term_id=".$term_id."'>". $term->name . "</a></td>
                        </tr>";
                    $html .= $row;
                }
            }
            else{
                $args = array(
                    'posts_per_page' => -1,
                    'post_type' => 'jelo',
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => SLUG_VRSTE_JELA,
                            'field' => 'term_id',
                            'terms' => $kategorija_id
                        )
                    ));
                $jela = get_posts($args);
                $html = "
                            <thead>
                                <tr>
                                    <th class='meal_name'>NAZIV</th>
                                    <th class='restaurant'>LOKACIJA</th>
                                    <th class='phone_both'>KONTAKT</th>
                                    <th class='price'>CIJENA</th>
                                </tr>
                            </thead>
                            <tbody>";
                foreach ($jela as $jelo) {
                    $cijena_normal = get_post_meta($jelo->ID, 'cijena_normal', true);
                    $restorani = wp_get_post_terms($jelo->ID, SLUG_RESTORAN);
                    foreach ($restorani as $restoran=>$val)
                    {
                        $restoran_name = $val->name;
                        $fiksni = 	get_term_meta( $val->term_id, 'restoran_fiksni',  true );
                        $mobilni = 	get_term_meta( $val->term_id, 'restoran_mobilni',  true );
                        if(!empty($fiksni) && !empty($mobilni)) {
                            $telefon = $fiksni." | ".$mobilni;
                        }
                        else {
                            $telefon = $fiksni;
                        }
                    }
                    $row = 
                            "<tr class='jelo'>
                                <td class='meal_name'>".$jelo->post_title."</td>
                                <td class='restaurant'>".$restoran_name."</td> 
                                <td class='phone_both'>".$telefon."</td>
                                <td class='price'>".$cijena_normal." kn</td>                 
                            </tr>";
                    $html .= $row;
                }
            }
        }
    }
    $html .= "</tbody>";
    return $html;
}
function kategorija ($term_id)
{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'jelo',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => SLUG_VRSTE_JELA,
                'field' => 'term_id',
                'terms' => $term_id
            )
        ));
    $jela = get_posts($args);
    $html = 
        "<thead>
                <tr>
                    <th class='meal_name'>NAZIV</th>
                    <th class='restaurant'>LOKACIJA</th>
                    <th class='phone_both'>KONTAKT</th>
                    <th class='price'>CIJENA</th>
                </tr>
            </thead>
            <tbody>";
    foreach ($jela as $jelo) {
        $cijena_normal = get_post_meta($jelo->ID, 'cijena_normal', true);
        if(!empty($cijena_normal))
        {
            $cijena = $cijena_normal;
        }
        else{
            $cijena = get_post_meta($jelo->ID, 'cijena_large', true);
        }
        $restorani = wp_get_post_terms($jelo->ID, SLUG_RESTORAN);
        foreach ($restorani as $restoran=>$val) {
            $restoran_name = $val->name;
            $fiksni = 	get_term_meta( $val->term_id, 'restoran_fiksni',  true );
            $mobilni = 	get_term_meta( $val->term_id, 'restoran_mobilni',  true );
            if(!empty($fiksni) && !empty($mobilni)) {
                $telefon = $fiksni." | ".$mobilni;
            }
            else {
                $telefon = $fiksni;
            }
            $row =
                "<tr class='jelo'>
                    <td class='meal_name'>".$jelo->post_title."</td>
                    <td class='restaurant'>".$restoran_name."</td> 
                    <td  class='phone_both'>".$telefon."</td>
                    <td class='price'>".$cijena." kn</td>            
                </tr>";
            $html .= $row;
        }
}
$html .= "</tbody>";
return $html;
}
?>