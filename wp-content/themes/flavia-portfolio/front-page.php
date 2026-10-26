<?php
get_header();
?>

<main id="main-content" class="site-main home-content-wrapper" tabindex="-1">
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

				<div class="hero-cta-group">
					<a class="btn-cta btn-cta-primary icon-start icon-code" href="<?php echo esc_url( home_url( '/trabalho-e-estudo/' ) ); ?>">
						Ver Projetos &amp; Repositórios
					</a>
					<a class="btn-cta btn-cta-secondary icon-start icon-github" href="https://github.com/FlaviaMarcella" target="_blank" rel="noopener noreferrer">
						GitHub (@FlaviaMarcella) ↗
					</a>
					<a class="btn-cta btn-cta-secondary icon-start icon-linkedin" href="https://www.linkedin.com/in/flaviamarcella" target="_blank" rel="noopener noreferrer">
						LinkedIn ↗
					</a>
					<a class="btn-cta btn-cta-secondary icon-start icon-mail" href="<?php echo esc_url( home_url( '/contato/' ) ); ?>">
						Contato
					</a>
				</div>
			</div>
		</article>

		<section class="quick-sections">
			<a class="quick-card" href="<?php echo esc_url( home_url( '/trabalho-e-estudo/' ) ); ?>">
				<span class="quick-card-kicker icon-start icon-code">01 / PROJETOS &amp; GITHUB</span>
				<span class="quick-card-title">Trabalho e Estudo</span>
				<span class="quick-card-desc">Java, Spring Boot, .NET, AWS Bedrock, Manager Financial, Novo SISMET e mais.</span>
			</a>
			<a class="quick-card" href="<?php echo esc_url( home_url( '/formacao-academica/' ) ); ?>">
				<span class="quick-card-kicker icon-start icon-grad">02 / EDUCAÇÃO</span>
				<span class="quick-card-title">Formação Acadêmica</span>
				<span class="quick-card-desc">Ciência da Computação (UNIFAL-MG) e Técnico em Informática (IFSULDEMINAS).</span>
			</a>
			<a class="quick-card" href="<?php echo esc_url( home_url( '/passatempos-e-interesses/' ) ); ?>">
				<span class="quick-card-kicker icon-start icon-coffee">03 / SOBRE MIM</span>
				<span class="quick-card-title">Passatempos e Interesses</span>
				<span class="quick-card-desc">Café da tarde, tempo com família e amigos, jogos de simulação e tecnologia.</span>
			</a>
			<a class="quick-card" href="<?php echo esc_url( home_url( '/contato/' ) ); ?>">
				<span class="quick-card-kicker icon-start icon-mail">04 / CONEXÃO</span>
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
