<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Portfólio de Flávia Gonçalves — Desenvolvedora Backend com foco em Java, Spring Boot, APIs REST, Cloud AWS e Ciência da Computação (UNIFAL-MG).">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo esc_attr( wp_get_document_title() ); ?>">
	<meta property="og:description" content="Desenvolvedora Backend com foco em Java e Spring Boot • Graduanda em Ciência da Computação na UNIFAL-MG.">
	<meta property="og:image" content="https://flaviamarcella.github.io/SquareProfissional.jpg">
	<meta name="twitter:card" content="summary">
	<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( get_template_directory_uri() . '/favicon.svg' ); ?>">
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

<a href="#main-content" class="skip-link visually-hidden">Pular para o conteúdo principal</a>

<header class="site-header">
	<div class="header-inner">
		<div class="site-branding">
			<span class="brand-badge" aria-hidden="true">&lt;FG /&gt;</span>
			<div>
				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</p>
				<span class="site-subtitle"><?php bloginfo( 'description' ); ?></span>
			</div>
		</div>

		<nav class="main-navigation" aria-label="Principal">
			<div class="header-controls">
				<button type="button" class="theme-toggle" id="theme-toggle" aria-label="Alternar tema claro ou escuro">
					<span id="theme-icon" aria-hidden="true">☀️</span>
				</button>
				<button type="button" class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="primary-menu-wrapper" aria-label="Menu">
					<span class="menu-toggle-icon" aria-hidden="true">☰</span>
				</button>
			</div>

			<div class="nav-menu-wrapper" id="primary-menu-wrapper">
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
			</div>
		</nav>
	</div>
</header>
