
	<footer class="footer d-flex">
		<div class="container d-flex">
			<div class="row flex-fill">
				<div class="company col-3 col-lg-2 d-none d-sm-flex justify-content-start align-items-center">
					<?php if ( ! is_front_page() ) :
						$home = home_url();
					else :
						$home = '#';
					endif; ?>
					<a href="<?php echo $home; ?>"><?php bloginfo( 'name' ); ?></a> 
				</div>
				<div class="col-6 col-lg-7 d-flex">
					<address class="d-flex flex-fill align-items-center">
						<?php wp_nav_menu( array(
							'theme_location'  => 'contacts',
							'container'       => false,
							'menu_class'      => 'menu-contacts d-flex flex-column-reverse flex-lg-row flex-fill justify-content-center justify-content-lg-around align-items-start align-items-sm-center', 
							'menu_id'         => 'menu-contacts',
							'fallback_cb'     => '__return_empty_string',
							'depth'           => 1,
						) ); ?>
					</address>
				</div>
				<div class="col-6 col-sm-3 col-lg-3 d-flex">
					<?php wp_nav_menu( array(
						'theme_location'  => 'networks',
						'container'       => false,
						'menu_class'      => 'menu-networks d-flex flex-fill justify-content-end align-items-center', 
						'menu_id'         => 'menu-networks',
						'fallback_cb'     => '__return_empty_string',
						'depth'           => 1,
					) ); ?>
					<!-- <svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg>
					<svg class="icon icon-facebook"><use xlink:href="#icon-facebook"></use></svg> -->
				</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
