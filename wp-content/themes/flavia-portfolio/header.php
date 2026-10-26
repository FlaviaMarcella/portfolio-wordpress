<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		(function() {
			const savedTheme = localStorage.getItem('flavia_theme') || 'dark';
			document.documentElement.setAttribute('data-theme', savedTheme);
		})();
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="header-inner">
		<div class="site-branding">
			<span class="brand-badge">&lt;FG /&gt;</span>
			<div>
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<span class="site-subtitle"><?php bloginfo( 'description' ); ?></span>
			</div>
		</div>

		<nav class="main-navigation" aria-label="Menu Principal">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'nav-menu',
					'container'      => false,
				) );
			} else {
				echo '<ul class="nav-menu">';
				wp_list_pages( array(
					'title_li'    => '',
					'sort_column' => 'menu_order,post_title',
				) );
				echo '</ul>';
			}
			?>
			<button type="button" class="theme-toggle" id="theme-toggle" aria-label="Alternar tema claro/escuro">
				<span id="theme-icon">☀️</span>
			</button>
		</nav>
	</div>
</header>
