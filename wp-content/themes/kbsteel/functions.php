<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Add / Добавить */

	/* Redirect from 404.php page / Переход с несуществующей страницы на главную */

		add_action( 'wp', 'redirecting_404_wp', 1 );
		function redirecting_404_wp() {
			if (is_404()) {
				wp_redirect( home_url(), 301 );
				exit;
			}
		}

	/* Add theme support / Добавить поддержку в тему */

		function kbsteel_setup() {
			// load_theme_textdomain( 'lacrepe', get_template_directory() . '/languages' );
			add_theme_support( 'title-tag' );
			add_theme_support( 'post-thumbnails' );
			set_post_thumbnail_size( 500, 500, true );
			/* Add useful image sizes for use through Add Media modal */
				// add_image_size( 'gallery-size', 370, 370, true );
				// update_option( 'thumbnail_size_w', 400 );
				// update_option( 'thumbnail_size_h', 300 );
				// update_option( 'medium_size_w', 600 );
				// update_option( 'medium_size_h', 400 );
				// update_option( 'large_size_w', 1920 );
				// update_option( 'large_size_h', 900 );
				// update_option( 'thumbnail_crop', 1 );
				// update_option( 'medium_crop', 1 );
				// update_option( 'large_crop', 1 );
			register_nav_menus( array(
				'center'   => 'Центральное меню',
				'dropdown' => 'Выпадающее меню',
				'contacts' => 'Контактное меню',
				'networks' => 'Социальное меню',
			) );
			add_theme_support( 'html5', array(
				'gallery',
				'caption',
			) );
			// add_theme_support( 'custom-logo' );
			// add_theme_support( 'customize-selective-refresh-widgets' );
		}
		add_action( 'after_setup_theme', 'kbsteel_setup' );

	/* Add new image sizes in Add Media / Добавить новые размеры изображений */
		// add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
		// function wpshout_custom_sizes( $sizes ) {
		//     return array_merge( $sizes, array(
		//         'gallery-size' => __( 'Галерея' ),
		//         'news-size' => __( 'Новости' ),
		//         'banner-size' => __( 'Баннер' ),
		//     ) );
		// }

	/* Add widgets / Добавить виджеты */
		function kbsteel_widgets_init() {
			register_sidebar( array(
				'name'          => 'Логотип в шапке',
				'id'            => 'widget-logotype',
				'description'   => 'Вы можете сменить логотип здесь',
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		}
		add_action( 'widgets_init', 'kbsteel_widgets_init' );

	/* Connecting styles and scripts / Подключить стили и скрипты */
		function kbsteel_styles() {
			wp_enqueue_style( 'normalize', get_theme_file_uri('/assets/css/normalize.css'), array(), null );
			wp_enqueue_style( 'bootstrap-grid', get_theme_file_uri('/assets/css/bootstrap-grid.css'), array(), null );
			wp_enqueue_style( 'magnific-popup', get_theme_file_uri('/assets/css/magnific-popup.css'), array(), null );
			wp_enqueue_style( 'kbsteel-style', get_stylesheet_uri(), array( 'normalize', 'bootstrap-grid', 'magnific-popup' ), null );
		}
		add_action( 'wp_footer', 'kbsteel_styles' );

		function kbsteel_scripts() {
			wp_deregister_script( 'jquery' );
			wp_enqueue_script( 'jquery-script', get_theme_file_uri('/assets/js/jquery-3.3.1.min.js'), array(), null, true );
			wp_enqueue_script( 'magnific-popup-script', get_theme_file_uri('/assets/js/jquery.magnific-popup.min.js'), array('jquery-script'), null, true );
			wp_enqueue_script( 'mask-script', get_theme_file_uri('/assets/js/jquery.mask.min.js'), array('jquery-script'), null, true );
			if ( is_front_page() ) {
				wp_enqueue_script( 'cycle-script', get_theme_file_uri('/assets/js/jquery.cycle.all.min.js'), array('jquery-script'), null, true );
				wp_enqueue_script( 'kbsteel-script', get_theme_file_uri('/script.js'), array('jquery-script', 'magnific-popup-script', 'mask-script', 'cycle-script'), null, true );
			} else {
				wp_enqueue_script( 'kbsteel-script', get_theme_file_uri('/script.js'), array('jquery-script', 'magnific-popup-script', 'mask-script'), null, true );
			}
		}
		add_action( 'wp_enqueue_scripts', 'kbsteel_scripts');

		// function lacrepe_costumize_preview() {
		// 	wp_enqueue_script( 'lacrepe_costumize_preview', get_theme_file_uri( '/lacrepe-customizer.js' ), array( 'lacrepe-script' ), '', true );
		// }
		// add_action( 'customize_preview_init', 'lacrepe_costumize_preview');

	/* The post thumbnail alt / Атрибут альт для миниатюры поста */
		// function get_the_post_thumbnail_alt($post_id) {
		//     return get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
		// }
		// function the_post_thumbnail_alt($post_id) {
		//     echo get_the_post_thumbnail_alt($post_id);
		// }

	/* Add count of posts round / Добавить счетчик постов */
		add_action( 'admin_menu', 'add_user_menu_bubble' );
		function add_user_menu_bubble(){
			global $menu;
			$count = wp_count_posts()->publish; // pending, draft
			if( $count ){
				foreach( $menu as $key => $value ){
					if( $menu[$key][2] == 'edit.php' ){
						$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
						break;
					}
				}
			}
		}

	/* Create extra fields for ACF Photo Gallery Field / Создать дополнительные поля для галереи ACF Photo Gallery Field */
		// function my_extra_gallery_fields( $args, $attachment_id, $field ){
		// 	$args['alt'] = array('type' => 'text', 'label' => 'Alt', 'name' => 'alt', 'value' => get_field($field . '_alt', $attachment_id) ); //Creates Altnative Text field
		// 	return $args;
		// }
		// add_filter( 'acf_photo_gallery_image_fields', 'my_extra_gallery_fields', 10, 3 );

	/* Add ajax variables / Добавить переменные для ajax */
		function ajax_enqueue_vars() {
			// wp_localize_script( 'lacrepe-script', 'ajax_object', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
			wp_localize_script( 'kbsteel-script', 'ajax_mail', array( 'url' => get_template_directory_uri() . '/mail.php' ) );
		}
		add_action( 'wp_enqueue_scripts', 'ajax_enqueue_vars' );



/* Remove / Удалить */

	/* Remove title from navigation markup / Удалить заголовок в навигации по статьям */
		add_filter('navigation_markup_template', 'my_navigation_markup_template');
		function my_navigation_markup_template() {
		     return '
		     <nav class="navigation %1$s" role="navigation">
		         <div class="nav-links">%3$s</div>
		     </nav>';
		}

	/* Remove unnecessary / Удалить ненужное */
		function remove_unnecessary() {
			// remove_filter( 'the_content', 'wpautop' );
			// remove_filter( 'the_excerpt', 'wpautop' );
			// remove_filter( 'comment_text', 'wpautop' );
			remove_action( 'wp_head', 'wp_resource_hints', 2 );
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_action ('wp_head', 'rsd_link' );
			remove_action( 'wp_head', 'wlwmanifest_link' );
			remove_action( 'wp_head', 'wp_shortlink_wp_head' );
			remove_action( 'wp_head', 'wp_generator' );
			add_filter('rest_enabled', '__return_false');
			remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
			remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
			remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
			remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
			remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
			remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
			remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
			remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
			remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
			remove_action( 'init',          'rest_api_init' );
			remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
			remove_action( 'parse_request', 'rest_api_loaded' );
			remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
			remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
			remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
			/* If inserts from other sites then comment out the following line */
			remove_action( 'wp_head',                'wp_oembed_add_host_js'                 );
		}
		add_action( 'after_setup_theme', 'remove_unnecessary' );
	
	/* Remove versions on styles and scripts / Удалить версии в стилях и скриптах */
		add_filter( 'script_loader_src', '_remove_script_version' );
		add_filter( 'style_loader_src', '_remove_script_version' );
		function _remove_script_version( $src ){
			$parts = explode( '?', $src );
			return $parts[0];
		}

	/* Close the ability to publish via xmlrpc.php / Закрыть возможность публикации через xmlrpc.php */
		add_filter('xmlrpc_enabled', '__return_false');



/* Change / Изменить */

	/* Change fields for "ACF Photo Gallery Field" plugin */
		function change_ACF_fields() {
			global $post;
			// var_dump( is_page_template( get_theme_file_uri( '/templates/contacts.php' ) ) );
			// if ( is_page_template( 'templates/contacts.php' ) ) { 
			// 	echo '<script>alert(' . is_page_template( 'templates/contacts.php' ) . ')</script>';
			// }

			if ( ! $post ) return false;

			// if ( ! is_null($post) && $post->ID == 34 ) {
			if ( get_post_meta( $post->ID, '_wp_page_template', true ) === 'templates/contacts.php' ) {
				//Create extra fields called Altnative Text and Custom Classess
				function my_extra_gallery_fields( $args, $attachment_id, $field ){
					// Remove old fields
					$args['url']['label'] = 'Full name';
					$args['target']['label'] = 'Phone';
					$args['target']['type'] = 'text';
					$args['title']['label'] = 'Email';
					$args['caption']['label'] = 'Position';
					$args['caption']['type'] = 'text';
					// $args['url'] = array( 'type' => 'text', 'label' => 'Full name', 'name' => 'name', 'value' => ($args['url'])?$args['url']:null );
					// $args['target'] = array( 'type' => 'text', 'label' => 'Phone', 'name' => 'phone', 'value' => ($args['target'])?$args['target']:null );
					// $args['title'] = array( 'type' => 'text', 'label' => 'Email', 'name' => 'email', 'value' => ($args['title'])?$args['title']:null );
					// $args['caption'] = null;
					// Add new fields
					// $args['name'] = array( 'type' => 'text', 'label' => 'Full name', 'name' => 'name', 'value' => get_field( $field . '_name', $attachment_id ) );
					// $args['phone'] = array( 'type' => 'text', 'label' => 'Phone', 'name' => 'phone', 'value' => get_field( $field . '_phone', $attachment_id ) );
					// $args['email'] = array( 'type' => 'text', 'label' => 'Email', 'name' => 'email', 'value' => get_field( $field . '_email', $attachment_id ) );
					return $args;
				}
				add_filter( 'acf_photo_gallery_image_fields', 'my_extra_gallery_fields', 10, 3 );
			}
		}

		add_action( 'admin_notices', 'change_ACF_fields' );

	/* Only text in tag title / Только текст в заголовке */
		function only_title($title){
			if( isset($title['tagline']) ) unset( $title['tagline'] );
			return $title;
		}
		add_filter( 'document_title_parts', 'only_title' );

	/* Change name posts to news / Изменить имя постов на новости */
		add_filter('post_type_labels_post', 'rename_posts_labels');
		function rename_posts_labels( $labels ){
			$new = array(
				'name'                  => 'Новости',
				'singular_name'         => 'Новость',
				'add_new'               => 'Добавить новость',
				'add_new_item'          => 'Добавить новость',
				'edit_item'             => 'Редактировать новость',
				'new_item'              => 'Новая новость',
				'view_item'             => 'Просмотреть новость',
				'search_items'          => 'Поиск новостей',
				'not_found'             => 'Новости не найдены',
				'not_found_in_trash'    => 'Новости в корзине не найдены',
				'parent_item_colon'     => '',
				'all_items'             => 'Все новости',
				'archives'              => 'Архивы новостей',
				'insert_into_item'      => 'Вставить в новость',
				'uploaded_to_this_item' => 'Загруженные для этой новости',
				'featured_image'        => 'Миниатюра новости',
				'filter_items_list'     => 'Фильтровать список новостей',
				'items_list_navigation' => 'Навигация по списку новостей',
				'items_list'            => 'Список новостей',
				'menu_name'             => 'Новости',
				'name_admin_bar'        => 'Новости',
			);
			return (object) array_merge( (array) $labels, $new );
		}
