<footer class="site-footer">
	<div class="footer-inner">
		<div>
			&copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?> <strong><?php bloginfo( 'name' ); ?></strong> — Desenvolvedora Backend (Java &amp; Spring Boot).
		</div>
		<div class="footer-links">
			<a href="https://github.com/FlaviaMarcella" target="_blank" rel="noopener noreferrer">GitHub ↗</a>
			<a href="https://linkedin.com/in/flavia-marcella" target="_blank" rel="noopener noreferrer">LinkedIn ↗</a>
			<a href="mailto:flaviamgm011@gmail.com">E-mail</a>
		</div>
	</div>
</footer>

<script>
(function() {
	const btn = document.getElementById('theme-toggle');
	const icon = document.getElementById('theme-icon');
	function syncIcon() {
		const current = document.documentElement.getAttribute('data-theme') || 'dark';
		if (icon) icon.textContent = current === 'dark' ? '☀️' : '🌙';
	}
	syncIcon();
	if (btn) {
		btn.addEventListener('click', function() {
			const current = document.documentElement.getAttribute('data-theme') || 'dark';
			const next = current === 'dark' ? 'light' : 'dark';
			document.documentElement.setAttribute('data-theme', next);
			localStorage.setItem('flavia_theme', next);
			syncIcon();
		});
	}

	const menuBtn = document.getElementById('menu-toggle');
	const menuWrapper = document.getElementById('primary-menu-wrapper');
	if (menuBtn && menuWrapper) {
		const menuIcon = menuBtn.querySelector('.menu-toggle-icon');
		function setMenuState(open) {
			menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
			menuWrapper.classList.toggle('is-open', open);
			if (menuIcon) menuIcon.textContent = open ? '✕' : '☰';
		}
		menuBtn.addEventListener('click', function() {
			const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
			setMenuState(!isExpanded);
		});
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && menuBtn.getAttribute('aria-expanded') === 'true') {
				setMenuState(false);
				menuBtn.focus();
			}
		});
	}
})();
</script>
<?php wp_footer(); ?>
</body>
</html>
