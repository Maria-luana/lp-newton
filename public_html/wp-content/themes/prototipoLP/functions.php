<?php


// -- Inicio Funções para Limpar o Header -- //
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'start_post_rel_link', 10, 0 );
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
// -- Fim Funções para Limpar o Header -- //


// -- Inicio Registra Menus -- // 
	function register_my_menus() {
		register_nav_menus(
		array(
			'menu-principal' => esc_html__( 'Menu Principal', 'theme-textdomain' ),
		)
		);
	}
	add_action( 'init', 'register_my_menus' );

	require get_template_directory() . '/bootstrap-navwalker.php';
// -- Fim Registra Menus -- // 


// -- Inicio Registra Widgets -- // 
	function informacoes_numero_whatsapp() {
		register_sidebar( array (
			'name' => 'Descrição Número Whatsapp',
			'id' => 'numero_whatsapp',
		));
	}
	add_action('widgets_init', 'informacoes_numero_whatsapp');
	function informacoes_numero_telefone() {
		register_sidebar( array (
			'name' => 'Descrição Número Telefone',
			'id' => 'numero_telefone',
		));
	}
	add_action('widgets_init', 'informacoes_numero_telefone');
	function informacoes_newslleter() {
		register_sidebar( array (
			'name' => 'Descrição Newslleter',
			'id' => 'desc_newslleter',
		));
	}
	add_action('widgets_init', 'informacoes_newslleter');
	function informacoes_desc_agende_blog() {
		register_sidebar( array (
			'name' => 'Descrição Agende Blog',
			'id' => 'desc_agende_blog',
		));
	}
	add_action('widgets_init', 'informacoes_desc_agende_blog');
	function informacoes_link_agende_blog() {
		register_sidebar( array (
			'name' => 'Link Agende Blog',
			'id' => 'link_agende_blog',
		));
	}
	add_action('widgets_init', 'informacoes_link_agende_blog');
// -- Fim Registra Widgets -- // 



// -- Inicio Login Personalizado -- //

	function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/login-style.css" />';
	}
	add_action('login_head', 'my_custom_login');

	add_image_size( 'pequena', 200, 150, true );

// -- Fim Login Personalizado -- //


// -- Inicio Definir o que o Cliente pode ver -- //

	if ( current_user_can('editor') ) {
		function my_remove_menu_pages() {
			remove_menu_page('index.php');
			// remove_menu_page('edit.php');
			remove_menu_page('edit-comments.php');
			remove_menu_page('tools.php');
		}
		add_action( 'admin_menu', 'my_remove_menu_pages' );
			
		
	}

// -- Fim Definir o que o Cliente pode ver -- //


// -- Inicio Allow editors to see Appearance menu -- //
	$role_object = get_role( 'editor' );
	// $role_object->add_cap( 'edit_theme_options' );
	function hide_menu() {
	
		// Hide theme selection page
		remove_submenu_page( 'themes.php', 'themes.php' );

		// Hide customize page
		remove_submenu_page( 'themes.php', 'customize.php' );
	
		// Hide customize page
		global $submenu;
		unset($submenu['themes.php'][6]);
	
	}

	add_action('admin_head', 'hide_menu');
// -- Fim Allow editors to see Appearance menu -- //


// -- Inicio Corrige a questão das colunas no dashboard -- //

	function wpse126301_dashboard_columns() {
			add_screen_option(
				'layout_columns',
				array(
					'max'		=> 2,
					'default'	=> 1
				)
			);
	}
	add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );

// -- Fim Corrige a questão das colunas no dashboard -- //


// -- Inicio Remove link das imagens inseridas com o editor -- //

	function rkv_imagelink_setup() {
		$image_set = get_option( 'image_default_link_type' );

		if ($image_set !== 'none') {
			update_option('image_default_link_type', 'none');
		}
	}
	add_action('admin_init', 'rkv_imagelink_setup', 10);

// -- Fim Remove link das imagens inseridas com o editor -- //




// -- Ínicio Custom Posts Types -- //

	// Custom Type Banner
	add_action('init', 'register_banner');
	function register_banner() {

		register_post_type('banner', array(
			'label' => 'banner',
			'description' => 'Banner',
			'public' => true,
			'menu_icon'   => 'dashicons-images-alt',
			'show_ui' => true,
			'show_in_menu' => true,
			'capability_type' => 'post',
			'map_meta_cap' => true,
			'hierarchical' => false,
			'numberposts' => -1,
			'rewrite' => array('slug' => 'banner', 'with_front' => true),

			'query_var' => true,
			'supports' => array('title', 'page-attributes','post-formats'),
			
			'labels' => array (
				'name' => 'Banner',
				'singular_name' => 'Banner',
				'menu_name' => 'Banner',
				'add_new' => 'Adicionar Novo',
				'add_new_item' => 'Adicionar Novo Banner',
				'edit' => 'Editar',
				'edit_item' => 'Editar Banner',
				'new_item' => 'Novo Banner',
				'view' => 'Ver Banner',
				'view_item' => 'Ver Banner',
				'search_items' => 'Procurar Banner',
				'not_found' => 'Nenhum Banner Encontrado',
				'not_found_in_trash' => 'Nenhum Banner Encontrado no Lixo',
				'parent' => 'Parent Banner',
			)
		)); 
	}
	// Método para o registro da Custom Taxonomy Tipo Banner 

	function custom_tax_banner(){
		$custom_tax_nome = 'categorias_banner';
		$custom_post_type_nome = 'banner';
		
		$labels = array(
			'name' => 'Categorias',
			'singular_name' => 'Categoria',
			'menu_name' => 'Categoria',
			'add_new' => 'Adicionar Nova',
			'all-items' => 'Todas as Categorias',
			'add_new_item' => 'Adicionar Novo Banner',
			'edit' => 'Editar',
			'edit_item' => 'Editar Banner',
			'new_item' => 'Novo Banner',
			'view' => 'Ver Banner',
			'view_item' => 'Ver Banner',
			'search_items' => 'Procurar Banner',
			'not_found' => 'Nenhum Banner Encontrado',
			'not_found_in_trash' => 'Nenhum Banner Encontrado no Lixo',
			'parent' => 'Parent Banner',
		);
		$args = array(
			'label' => __('Categorias de banners'),
			'hierarchical' => true,
		);
		register_taxonomy( $custom_tax_nome, $custom_post_type_nome, $args );
	}
	add_action( 'init', 'custom_tax_banner' );	

// -- Fim Custom Posts Types -- //