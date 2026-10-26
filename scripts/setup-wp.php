<?php
/**
 * Script de provisionamento automático das páginas e menu do portfólio da Flávia no WordPress via WP-CLI.
 */

// 1. Limpar apenas posts padrão ("Olá, mundo!" / "Sample Page") se existirem
$default_posts = get_posts( array(
	'post_type'   => array( 'post', 'page' ),
	'numberposts' => -1,
	'post_status' => 'any',
) );
foreach ( $default_posts as $p ) {
	if ( in_array( $p->post_name, array( 'hello-world', 'ola-mundo', 'sample-page', 'pagina-de-exemplo' ), true ) ) {
		wp_delete_post( $p->ID, true );
	}
}

// 2. Definir e criar/atualizar as 5 páginas a partir dos arquivos originais enviados
$pages_config = array(
	array(
		'title' => 'Início',
		'slug'  => 'inicio',
		'file'  => '/var/www/html/paginas-wordpress/1-inicio.html',
		'order' => 1,
	),
	array(
		'title' => 'Passatempos e Interesses',
		'slug'  => 'passatempos-e-interesses',
		'file'  => '/var/www/html/paginas-wordpress/2-passatempos-e-interesses.html',
		'order' => 2,
	),
	array(
		'title' => 'Trabalho e Estudo',
		'slug'  => 'trabalho-e-estudo',
		'file'  => '/var/www/html/paginas-wordpress/3-trabalho-e-estudo.html',
		'order' => 3,
	),
	array(
		'title' => 'Formação Acadêmica',
		'slug'  => 'formacao-academica',
		'file'  => '/var/www/html/paginas-wordpress/4-formacao-academica.html',
		'order' => 4,
	),
	array(
		'title' => 'Contato',
		'slug'  => 'contato',
		'file'  => '/var/www/html/paginas-wordpress/5-contato.html',
		'order' => 5,
	),
);

$created_pages = array();

foreach ( $pages_config as $cfg ) {
	$content = file_get_contents( $cfg['file'] );
	$existing = get_page_by_path( $cfg['slug'], OBJECT, 'page' );
	$post_data = array(
		'post_title'     => $cfg['title'],
		'post_name'      => $cfg['slug'],
		'post_content'   => $content,
		'post_status'    => 'publish',
		'post_type'      => 'page',
		'menu_order'     => $cfg['order'],
		'comment_status' => 'closed',
		'ping_status'    => 'closed',
	);
	if ( $existing ) {
		$post_data['ID'] = $existing->ID;
		$page_id = wp_update_post( $post_data );
		WP_CLI::log( "Página atualizada: {$cfg['title']} (ID: {$page_id})" );
	} else {
		$page_id = wp_insert_post( $post_data );
		WP_CLI::log( "Página criada: {$cfg['title']} (ID: {$page_id})" );
	}
	$created_pages[ $cfg['slug'] ] = $page_id;
}

// 3. Configurar página inicial estática ("Início")
update_option( 'show_on_front', 'page' );
update_option( 'page_on_front', $created_pages['inicio'] );
update_option( 'blogname', 'Flávia Gonçalves' );
update_option( 'blogdescription', 'Desenvolvedora Backend • Java & Spring Boot' );
update_option( 'timezone_string', 'America/Sao_Paulo' );

// 4. Ativar o tema personalizado
switch_theme( 'flavia-portfolio' );
WP_CLI::log( "Tema 'flavia-portfolio' ativado." );

// 5. Criar e associar o Menu Principal com as 5 páginas na ordem correta
$menu_name = 'Menu Principal';
$menu_exists = wp_get_nav_menu_object( $menu_name );
if ( $menu_exists ) {
	wp_delete_nav_menu( $menu_name );
}
$menu_id = wp_create_nav_menu( $menu_name );

foreach ( $pages_config as $cfg ) {
	$pid = $created_pages[ $cfg['slug'] ];
	wp_update_nav_menu_item( $menu_id, 0, array(
		'menu-item-title'     => $cfg['title'],
		'menu-item-object-id' => $pid,
		'menu-item-object'    => 'page',
		'menu-item-status'    => 'publish',
		'menu-item-type'      => 'post_type',
		'menu-item-position'  => $cfg['order'],
	) );
}

$locations = get_theme_mod( 'nav_menu_locations' );
if ( ! is_array( $locations ) ) {
	$locations = array();
}
$locations['primary'] = $menu_id;
set_theme_mod( 'nav_menu_locations', $locations );
WP_CLI::log( "Menu Principal criado e vinculado ao local 'primary'." );

// 6. Atualizar estrutura de links permanentes
global $wp_rewrite;
$wp_rewrite->set_permalink_structure( '/%postname%/' );
$wp_rewrite->flush_rules( true );
WP_CLI::success( "Portfólio da Flávia Gonçalves configurado com sucesso!" );
