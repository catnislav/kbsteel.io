<?php get_header(); ?>

	<main class="main page-news-single d-flex flex-fill align-items-center">
		<div class="block-news-single container">

			<?php while ( have_posts() ) : the_post(); // Start the loop. ?>

			<div class="row no-gutters">
				<div class="image col-12">

					<?php the_post_thumbnail( 'full' ); ?>

				</div>
			</div>
			<div class="row no-gutters">
				<div class="content col-12">

					<h2><?php the_title(); ?></h2>
					<p><?php the_content(); ?></p>

				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-12">

					<?php the_post_navigation(); ?>

				</div>
			</div>

			<?php endwhile; // End of the loop. ?>

		</div>
	</main>

<?php get_footer(); ?>
