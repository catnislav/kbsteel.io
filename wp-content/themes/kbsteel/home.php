<?php get_header(); ?>

	<main class="main page-news d-flex flex-fill align-items-center">
		<div class="container">
			<div class="row no-gutters d-flex">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="block-news col-12 col-lg-6" id="post-<?php the_ID(); ?>">
					<?php the_post_thumbnail(); ?>
					<div class="text">
						<h3><?php the_title(); ?></h3>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>"><small>Подробнее</small></a>
					</div>
				</article>
			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Нет новостей' ); ?></p>
			<?php endif; ?>

			</div>
		</div>
	</main>

<?php get_footer(); ?>
