<?php
get_header();
?>

<main id="main-content" class="site-main" tabindex="-1">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-hero">
				<span class="page-kicker">Flávia Gonçalves &bull; Portfólio</span>
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();
