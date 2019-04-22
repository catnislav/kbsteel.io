<?php
/*
Template Name: Контакты
Template Post Type: page
*/
?>
<?php get_header(); ?>
	<main class="main page-contacts d-flex flex-fill align-items-center">
		<div class="container">
			<div class="row no-gutters">
				<div class="map col-12 col-lg-8">
					<?php the_field( 'kod_karty' ); ?>
				</div>
				<div class="form d-flex flex-wrap col-12 col-lg-4 align-items-center align-items-lg-end">
					<div class="flex-fill d-flex col-12 col-sm-6 col-lg-12 justify-content-center align-items-center">
						<h3>Форма обратной связи /</h3>
					</div>
					<div class="d-flex flex-column col-12 col-sm-6 col-lg-12 justify-content-center align-items-center">
<?php get_template_part( 'form' ); ?>
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="faces col-12">
					<div class="row no-gutters">
						<?php $images = acf_photo_gallery( 'komanda', $post->ID ); //Get the images ids from the post_metadata
				    
				    if ( count( $images ) ) : //Check if return array has anything in it

			        foreach ( $images as $image ) :

		            $id = $image['id']; // The attachment id of the media
		            $url = $image['url']; //Goto any link when clicked
		            $target = $image['target']; //Open normal or new tab
		            $title = $image['title']; //The title
		            $caption = $image['caption']; //The caption
		            $full_image_url = $image['full_image_url']; //Full size image url
		            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 570, 480); //Resized size to 262px width by 160px height image url
		            // $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
		            // $name = get_field('photo_gallery_name', $id); //Get the src which is a extra field (See below how to add extra fields)
						?>

						<div class="faces-item col-12 col-sm-6">

		          <img src="<?php echo $full_image_url; ?>" alt="<?php echo $url; ?>">

							<div class="info">
			          <p><?php echo $url; ?></p>
			          <p><?php echo $caption; ?></p>
								<a href="tel:<?php echo $target; ?>" rel="nofollow" target="_blank"><?php echo $target; ?></a>
								<br>
								<a href="mailto:<?php echo $title; ?>" rel="nofollow" target="_blank"><?php echo $title; ?></a>
							</div>

						</div>

						<?php endforeach; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php get_footer(); ?>
