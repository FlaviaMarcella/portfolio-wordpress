<?php
get_header();
?>

<main class="site-main home-content-wrapper">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-hero">
				<span class="page-kicker">Portfólio Pessoal &bull; Backend Developer</span>
				<h1 class="page-title">Olá, eu sou a Flávia Gonçalves 👋</h1>
			</div>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>

		<section class="quick-sections" aria-label="Navegação rápida pelo portfólio">
			<a class="quick-card" href="<?php echo esc_url( home_url( '/trabalho-e-estudo/' ) ); ?>">
				<span class="quick-card-kicker">01 / PROJETOS</span>
				<span class="quick-card-title">Trabalho e Estudo</span>
				<span class="quick-card-desc">Java, Spring Boot, APIs REST, Novo SISMET, SmartAgro e mais.</span>
			</a>
			<a class="quick-card" href="<?php echo esc_url( home_url( '/formacao-academica/' ) ); ?>">
				<span class="quick-card-kicker">02 / EDUCAÇÃO</span>
				<span class="quick-card-title">Formação Acadêmica</span>
				<span class="quick-card-desc">Ciência da Computação (UNIFAL-MG) e Técnico em Informática (IFSULDEMINAS).</span>
			</a>
			<a class="quick-card" href="<?php echo esc_url( home_url( '/passatempos-e-interesses/' ) ); ?>">
				<span class="quick-card-kicker">03 / SOBRE MIM</span>
				<span class="quick-card-title">Passatempos e Interesses</span>
				<span class="quick-card-desc">Café do Sul de Minas, liderança colaborativa, estudos e plantas.</span>
			</a>
			<a class="quick-card" href="<?php echo esc_url( home_url( '/contato/' ) ); ?>">
				<span class="quick-card-kicker">04 / CONEXÃO</span>
				<span class="quick-card-title">Contato</span>
				<span class="quick-card-desc">E-mail, WhatsApp, LinkedIn, GitHub e localização na UNIFAL-MG.</span>
			</a>
		</section>
		<?php
	endwhile;
	?>
</main>

<?php
get_footer();
