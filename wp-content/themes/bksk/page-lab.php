<?php
/**
 * @package WordPress
 * @subpackage: Theme
 * Template Name: Lab
 */
?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="twocol">
<div class="block rect1">
	<div class="text small">
	<h2><?php the_title(); ?></h2>
	</div>
</div>

<div class="bg float sq2">
<?php echo disciplineImage('specialty', 'sustainability','Sustainability','projects we\'ve done'); ?>
<div class="text">	
	<h3>projects we've done</h3>
</div>	
</div>

</div>

<div class="twocol">
	<div class="bg sq2">
<?php $args = array(
	'post_type' => 'work',
	'orderby' => 'rand',
/*
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'project_type',
			'field'    => 'slug',
			'terms'    => array( 'cultural-civic' )
		)
	),
*/
	'meta_query' => array(
		array(
			'key' => 'featured',
			'compare' => '==',
			'value' => '1'
		)
	),
	'posts_per_page' => 1
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
	$the_query->the_post();
		$feat_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'sq500');
	echo '<a href="'.get_site_url().'/work"><img src="'.$feat_img[0].'" alt="'.get_the_title().'" /></a>';
	}
} ?>
<div class="text">	
	<h3>what we're thinking</h3>
</div>	
</div>

<div class="link bg sq1">
<?php $img = wp_get_attachment_image(4909, 'sq2'); 
	echo $img; ?>
<div class="text">	
	<h3>About</h3>
</div>
</div>

<div class="block sq1 last">

</div>
</div>

<div class="clearfix"></div>
<div class="twocol first">

<div class="rect1 historic bg block">
<?php echo disciplineImage('preservation_project_type', 'historic','preservation-historic','historic resource analyses'); ?>
<div class="text">	
	<h3>NYC Design Strategy Tool</h3>
</div>	
</div>

<div class="block float sq1"></div>

<div class="link float bg sq1 last bw">
<?php $img = wp_get_attachment_image(5089, 'sq1'); 
	echo $img; ?>
<div class="text">	
	<h3>Contact</h3>
</div>
</div>

</div>

<div class="twocol last">
	<div class="sq2 block tools">
<?php $img = wp_get_attachment_image(5065, 'sq2'); 
	echo $img; ?>
<div class="text">	
	<h3>tools we use</h3>
</div>	
</div>
</div>
	


<?php endwhile; endif; ?>
<?php get_footer(); ?>