<!DOCTYPE html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<!-- <meta name="author" content="Станислав Петров">
	<meta name="copyright" content="Website of web-studio St"> -->
	<style> body {opacity: 0;} </style>
<?php wp_head(); ?>
</head>
<body <?php body_class('d-flex flex-column'); ?>>
	<div hidden>
<?php get_template_part('assets/images/symbol', 'defs.svg'); ?>
		<div class="popup" id="popup">
<?php get_template_part( 'form' ); ?>
		</div>
	</div>
	<header class="header d-flex">
		<div class="container d-flex">
			<div class="row flex-fill">
				<div class="logo col-4 col-sm-3 col-lg-2 d-flex justify-content-start align-items-center">
					<?php if ( ! is_front_page() ) :
						$home = home_url();
					else :
						$home = '#';
					endif; ?>
					<a href="<?php echo $home; ?>">
						<h1>
							<?php bloginfo('name'); ?>
							<?php dynamic_sidebar( 'widget-logotype' ); ?>
						</h1>
					</a>
					<!-- <svg class="icon icon-logo"><use xlink:href="#icon-logo"></use></svg> -->
				</div>
				<nav class="col-6 d-none d-lg-flex align-items-stretch" role="navigation">
					<?php wp_nav_menu( array(
						'theme_location'  => 'center',
						'container'       => false,
						'menu_class'      => 'menu-center d-flex flex-fill justify-content-around align-items-center', 
						'menu_id'         => 'menu-center',
						'fallback_cb'     => '__return_empty_string',
						'depth'           => 1,
					) ); ?>
				</nav>
				<div class="col-8 col-sm-9 col-md-6 offset-md-3 col-lg-4 offset-lg-0 d-flex justify-content-end align-items-center">
					<a href="#popup" class="button-popup" id="button-popup">Связаться с нами</a>
					<a href="#" class="button-menu" id="button-menu">
						<svg class="icon icon-menu"><use xlink:href="#icon-menu"></use></svg>
					</a>
					<nav role="navigation">
						<?php wp_nav_menu( array(
							'theme_location'  => 'dropdown',
							'container'       => false,
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu-side', 
							'menu_id'         => 'menu-side',
							'fallback_cb'     => '__return_empty_string',
						) ); ?>
					</nav>
				</div>
			</div>
		</div>
	</header>
