<?php
/*
Template Name: Продукт
Template Post Type: page
*/
?>
<?php get_header(); ?>
	<main class="main page-product d-flex flex-fill align-items-center">

		<?php
			$pages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'menu_order', ) );
			// echo '<pre>' . print_r( $pages, true ) . '</pre>';
			$data_0 = array();
			$data_1 = array();
			$data_2 = array();
			$data_3 = array();
			foreach( $pages as $page ) :
				$order = $page->menu_order;
				if ( $order === 0 ) :
					$data_0[$order] = '
						<div>
							<img src="' . get_the_post_thumbnail_url( $page->ID, 'full' ) . '" alt="' . get_the_title( $page->ID ) . '" />
							<a href="' . get_page_link( $page->ID ) . '"><h3>' . get_the_title( $page->ID ) . '</h3></a>
						</div>
					';
				endif;
				if ( $order > 0 && $order < 4 ) :
					$input = get_the_title( $page->ID );
					$result = explode( ':', $input );
					$data_1[$order] = '
						<li>
							<a href="' . get_page_link( $page->ID ) . '">' . $result[1] . '</a>
						</li>
					';
				endif;
				if ( $order > 3 && $order < 6 ) :
					$data_2[$order] = '
						<div>
							<img src="' . get_the_post_thumbnail_url( $page->ID, 'full' ) . '" alt="' . get_the_title( $page->ID ) . '" />
							<a href="' . get_page_link( $page->ID ) . '"><h3>' . get_the_title( $page->ID ) . '</h3></a>
						</div>
					';
				endif;
				if ( $order > 5 && $order < 9 ) :
					$data_3[$order] = '
						<div>
							<img src="' . get_the_post_thumbnail_url( $page->ID, 'full' ) . '" alt="' . get_the_title( $page->ID ) . '" />
							<a href="' . get_page_link( $page->ID ) . '"><h3>' . get_the_title( $page->ID ) . '</h3></a>
						</div>
					';
				endif;
			endforeach;
		?>

		<div class="container">
			<div class="row no-gutters">
				<div class="block-product col-12 col-lg-6">

					<h2><?php the_field( 'nazvanie_sleva' ); ?></h2>

					<?php $izobrazhenie_sleva = get_field( 'izobrazhenie_sleva' ); ?>
					<?php if ( $izobrazhenie_sleva ) { ?>
						<img src="<?php echo $izobrazhenie_sleva['url']; ?>" alt="<?php echo $izobrazhenie_sleva['alt']; ?>" />
					<?php } ?>

					<div class="line d-flex flex-column-reverse flex-sm-row justify-content-center">

						<div>

							<?php
								foreach( $data_0 as $item_0 ) :
									echo $item_0;
								endforeach;
							?>

							<ul>

								<?php
									foreach( $data_1 as $item_1 ) :
										echo $item_1;
									endforeach;
								?>

							</ul>

						</div>
						
						<?php
							foreach( $data_2 as $item_2 ) :
								echo $item_2;
							endforeach;
						?>
						
					</div>

				</div>
				<div class="block-product col-12 col-lg-6">

					<h2><?php the_field( 'nazvanie_sprava' ); ?></h2>

					<?php $izobrazhenie_sprava = get_field( 'izobrazhenie_sprava' ); ?>
					<?php if ( $izobrazhenie_sprava ) { ?>
						<img src="<?php echo $izobrazhenie_sprava['url']; ?>" alt="<?php echo $izobrazhenie_sprava['alt']; ?>" />
					<?php } ?>

					<div class="line d-flex flex-column-reverse flex-sm-row justify-content-center">

						<?php
							foreach( $data_3 as $item_3 ) :
								echo $item_3;
							endforeach;
						?>

					</div>

				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
